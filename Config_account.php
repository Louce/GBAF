<?php

require 'model/database.php';

session_start();

if(isset($_POST['pseudo']))
    {
        $_SESSION['pseudo']=$_POST['pseudo'] || $_POST['pseudo_modif'];
        header('Location:config_account2.php');
    }

if (isset($_POST['detruire'])) 
    {
        $_SESSION["Identifiant"]="";
        session_destroy();
        header('Location:Connexion.php');
    }

$error = "";

if (isset($_POST['submit']) AND isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['pseudo_modif']) AND isset($_POST['email']))
    {
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $pseudo_modif=$_POST['pseudo_modif'];
        $email=$_POST['email'];
        $pseudo=$_SESSION['pseudo'];
          
        $req = $bdd->prepare('UPDATE membres SET nom = :nom, prenom = :prenom, pseudo = :pseudo_modif, email = :email  WHERE pseudo = :pseudo');
        $req->execute(array(
        'nom' => $nom,
        'prenom' => $prenom,
        'pseudo_modif' => $pseudo_modif,
        'email' => $email,
        'pseudo' => $pseudo
        ));

        if (empty($_POST['nom']) || empty($_POST['prenom']) || empty($_POST['pseudo_modif']) || empty($_POST['email']))
            {
                $error= '<strong>Veuillez remplir tous les champs !</strong>';
            }
        
        else 
            {
                $_SESSION['pseudo'] = $pseudo_modif;
                header('location:accueil.php');
            }
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

    <header>
        <?php include("_header.php"); ?> 
    </header>
     
        <div id="box">

            <h1>MODIFIER MON COMPTE</h1>

            <p>Tous les champs doivent être remplis.</p>
            <p class="error_msg"><?php echo $error ?></p>

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
                    <label for="pseudo_modif">Identifiant</label>
                    <div>
                    <input type="text" size="43" id="pseudo_modif" name="pseudo_modif">
                    </div>
                </div>

                <div class="formulaire">
                    <label for="email">Email</label>
                    <div>
                    <input type="text" size="43" id="email" name="email">
                    </div>
                </div>

                <div>
                    <p><input type="submit" name="submit" value="MODIFIER" class="bouton"></p>
                </div>

            </form>
        </div>

    <footer>
        <?php include("_footer.php"); ?> 
    </footer>

    </body>

</html>