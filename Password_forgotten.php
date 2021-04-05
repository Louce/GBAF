<?php

require 'model/database.php';

$error="";

//je vérifie que les zone de formulaire sont bien remplies par l'utilisateur et mes variables définies
if (isset($_POST['pseudo']) AND isset($_POST['question']) AND isset($_POST['reponse']))
{
    $pseudo=$_POST['pseudo'];
    $question=$_POST['question'];
    $reponse=$_POST['reponse'];

//je demande à récupérer les infos sur la bdd des questions et réponses en fonction du pseudo
    $req = $bdd->prepare('SELECT question, reponse FROM membres WHERE pseudo = :pseudo');
    $req->execute(array('pseudo' => $pseudo));
    $resultat = $req->fetch();

//je comparre les q/r de ma base de données avec ce que l'utilisateur a renseigné pour vérifier qu'elles sont identiques
    $qr_correct = ($_POST['question'] == $resultat['question']) && ($_POST['reponse'] == $resultat['reponse']);

//si mauvaise réponse et/ou mauvaise question par rapport au pseudo = message d'erreur
    if (!$resultat)
        {
             $error = '<strong>L\'identifiant, la question ou la réponse n\'est pas valide !</strong>';
        }
    else
            {
                if ($qr_correct) // si c'est correct l'utilisateur est redirigé vers la page pour modifier le mdp
                    {
                        session_start();
                        if(isset($_POST['pseudo']))
                            {
                                $_SESSION['pseudo']=$_POST['pseudo'];
                                header('Location:modif_mdp.php?pseudo='.$_POST['pseudo']);
                            }
                    }
                else 
                    {
                        $error= '<strong>L\'identifiant, la question ou la réponse n\'est pas valide !</strong>';
                    }
            }

$req->closeCursor();
}

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Style.css" type="text/css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width" />
        <title>GBAF: Groupement Banque-Assurance Français</title>
    </head>

    <body>

    <div class="header">
         <a href="connexion.php"><img class="logo" src="Visuels/logo_fond blanc2.png" alt="Logo GBAF: Groupement Banque Assurance Français" title="Logo GBAF" /></a>
    </div>

        <div id="box">
            <div>
                <h1>MODIFIER MON MOT DE PASSE</h1>
            </div>

            <div class="password_f">
                <form method="POST" action="#">
                <div class="formulaire">
                    <label for="pseudo">Identifiant</label>
                    <div>
                    <input type="text" size="43" id="pseudo" name="pseudo">
                    </div>
                </div>

                <div class="formulaire">
                    <label for="question">Question secrète</label>
                    <div>
                    <select name="question" id="question">
                        <option value="animal">Le nom de votre premier animal de compagnie</option>
                        <option value="nomJF">Le nom de jeune fille de votre grand-mère maternelle</option>
                        <option value="personnage">Votre personnage historique préféré</option>
                        <option value="amour">Le nom et le prénom de votre premier amour</option>
                    </select>
                    </div>
                </div> 

                <div class="formulaire">
                    <label for="reponse">Réponse</label>
                    <div>
                    <input type="text" size="43" id="reponse" name="reponse">
                    </div>
                </div> 

                <div class="error_msg">
                    <?php echo $error; ?>
                </div>

                <div>
                    <p><input type="submit" name="submit" value="MODIFIER" class="bouton"></p>
                </div>
                </form>
            </div>
        </div>

     <footer>
        <?php include("_footer.php"); ?> 
    </footer>
    
    </body>

</html>