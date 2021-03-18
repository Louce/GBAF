<?php
session_start();
if(isset($_POST['identifiant'])){
    $_SESSION['Identifiant']=$_POST['identifiant'];
    header('Location:01.2_accueil user.php');
}

?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="00_style.css" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
        <title>GBAF: Groupement Banque-Assurance Français</title>
    </head>

<!--page de base quand l'utilisateur n'est pas connecté ou s'est déconnecté-->

    <div class="header">
    	 <img class="logo" src="Visuels/logo_fond blanc.png" alt="Logo GBAF: Groupement Banque Assurance Français" title="Logo GBAF" />
    </div>


    <body>   
       
    	<div id="connexion">
            <h1>MON COMPTE</h1>
 
            <form class="account_access" method="post" action="#">
                <p><label class="label_connexion" for="Identifiant">Identifiant: </label></p>
                    <p><input class="input_connexion" type="text" name="identifiant" id="Identifiant" size="30px" /></p>

                <p><label class="label_connexion" for="mdp">Mot de passe: </label></p>
                    <p><input class="input_connexion" type="password" name="password" id="mdp" size="30px" /></p>
                    <input class="bouton_connection" type="submit" value="CONNEXION" />

                <div class="inscription">
                    Pas encore inscrit ? 
                    	<a class="cliquez" href="02_inscription.php"> Cliquez ici !</a>
                </div>

                <div class="inscription">
                	Mot de passe oublié ? 
                    	<a class="cliquez" href="07_password forgotten.php"> Cliquez ici !</a>
                </div>
            </form>
        </div>

    </body>


	<footer>
		<?php include("_footer.php"); ?> 
	</footer>

</html>