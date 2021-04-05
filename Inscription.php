<?php

require 'model/database.php';

if (isset($_POST['submit']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['pseudo']) AND isset($_POST['email']) AND isset($_POST['password']) AND isset($_POST['question']) AND isset($_POST['reponse']))
{
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $pseudo=$_POST['pseudo']; 
    $email=$_POST['email'];
    $password=$_POST['password'];
    $question=$_POST['question'];
    $reponse=$_POST['reponse'];
    $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);


    $req = $bdd->prepare('INSERT INTO membres(nom, prenom, pseudo, password, email, question, reponse, date_inscription) VALUES (:nom, :prenom, :pseudo, :pass_hache, :email, :question, :reponse, CURDATE())');
    $req->execute(array(
    'nom'=>$nom,
    'prenom'=>$prenom,
    'pseudo'=>$pseudo,
    'pass_hache'=>$pass_hache,
    'email'=>$email,
    'question'=>$question,
    'reponse'=>$reponse
    ));
}

session_start();
if(isset($_POST['pseudo']))
{
    $_SESSION['pseudo']=$_POST['pseudo'];
    header('Location:Accueil.php');
}
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Style.css" type="text/css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>GBAF: Groupement Banque-Assurance Français</title>
    </head>

    <body>

    <div class="header">
         <a href="connexion.php"><img class="logo" src="Visuels/logo_fond blanc2.png" alt="Logo GBAF: Groupement Banque Assurance Français" title="Logo GBAF" /></a>
    </div>
     
        <div id="box">

            <h1>INSCRIPTION</h1>

            <form method="POST" action="#">

                <div class="formulaire">
                    <label for="nom">Nom</label>
                    <div>
                    <input type="text" size="43" id="nom" name="nom">
                    </div>
                </div>

                <div class="formulaire">
                    <label for="prenom">Prénom</label>
                    <div>
                    <input type="text" size="43" id="prenom" name="prenom">
                    </div>
                </div>

                <div class="formulaire">
                    <label for="pseudo">Identifiant</label>
                    <div>
                    <input type="text" size="43" id="pseudo" name="pseudo">
                    </div>
                </div>

                <div class="formulaire">
                    <label for="email">Email</label>
                    <div>
                    <input type="text" size="43" id="email" name="email">
                    </div>
                </div>

                <div class="formulaire">
                    <label for="inputPassword">Mot de Passe</label>
                    <div>
                    <input type="password" size="43" id="inputPassword" name="password">
                    </div>
                </div> 

                <div class="formulaire">
                    <label for="question">Question secrète</label>
                    <div>
                    <select name="question" id="secret_question">
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

                <div>
                    <p><input type="submit" name="submit" value="S'INSCRIRE" class="bouton"></p>
                </div>
            </form>
        </div>

    <footer>
        <?php include("_footer.php"); ?> 
    </footer>

    </body>

</html><!-- 
Nom ;
Prénom ;
UserName ;
Password ;
Question secrète ;
Réponse à la question secrète -->