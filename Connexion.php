<?php

require 'model/database.php';

$error="";

if (isset($_POST['submit']) AND isset($_POST['pseudo']) AND isset($_POST['password']))
    {
        $pseudo=$_POST['pseudo'];
        $password=$_POST['password'];

        $req = $bdd->prepare('SELECT password FROM membres WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $resultat = $req->fetch();

        $PasswordCorrect = password_verify($_POST['password'], $resultat['password']);

        if (!$resultat)
            {
                $error= '<strong>Mauvais identifiant ou mot de passe !</strong>';
            }
        else
            {
                if ($PasswordCorrect) 
                    {
                        session_start();
                        if(isset($_POST['pseudo']))
                            {
                                $_SESSION['pseudo']=$_POST['pseudo'];
                                header('Location:Accueil.php');
                            }
                    }
                else 
                    {
                        $error= '<strong>Mauvais identifiant ou mot de passe !</strong>';
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
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
        <title>GBAF: Groupement Banque-Assurance Français</title>
    </head>

<!--page de base quand l'utilisateur n'est pas connecté ou s'est déconnecté-->
    <body>

    <div class="header">
         <a href="connexion.php"><img class="logo" src="Visuels/logo_fond blanc2.png" alt="Logo GBAF: Groupement Banque Assurance Français" title="Logo GBAF" /></a>
    </div>   
       
    	<div id="box">

            <h1>CONNEXION</h1>
            
            <form method="post" action="#">
                <div class="formulaire">
                    <label for="pseudo">Identifiant</label>
                    <div>
                    <input type="text" size="43" id="pseudo" name="pseudo">
                    </div>
                </div>

                <div class="formulaire">
                    <label for="password">Mot de Passe</label>
                    <div>
                    <input type="password" size="43" id="password" name="password">
                    </div>
                </div>

                <div>
                    <p><input type="submit" name="submit" value="CONNEXION" class="bouton"></p>
                </div>
            </form>
            
            <div class="error_msg">
                <?php
                echo $error;
                ?>
            </div>
            
            <p>Mot de passe oublié ? 
                <a class="cliquez" href="Password_forgotten.php"> Cliquez ici !</a><br/>
            Pas encore inscrit ? 
                <a class="cliquez" href="Inscription.php"> Cliquez ici !</a></p>
            
        </div>

    <footer>
        <?php include("_footer.php"); ?> 
    </footer>

    </body>
</html>