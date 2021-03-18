<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="00_style.css" type="text/css" />
        <meta name="viewport" content="width=device-width" />
        <title>GBAF: Groupement Banque-Assurance Français</title>
    </head>

 	 <div class="header">
    	 <img class="logo" src="Visuels/logo_fond blanc.png" alt="Logo GBAF: Groupement Banque Assurance Français" title="Logo GBAF" />
    </div>

    <body>



    	<div id="formulaire_inscription">

    		<h1>Mon inscription</h1>

    		<form method="post" action="03_configaccount.php">

    			<p><label for=username>Identifiant:</label></p>
    				<p><input type="text" name="username" id="username" size="43px" /></p>

    				<p><label for=prenom>Adresse mail:</label></p>
    				<p><input type="email" name="email" id="email" size="43px" /></p>
    		
    			<p><label for="mdp">Mot de passe: </label></p>
                	<p><input type="password" name="password" id="mdp" size="43px" /></p>

                	<p><label for="mdp">Retapez votre mot de passe: </label></p>
                	<p><input type="password" name="password" id="mdp" size="43px" /></p>

                <p><label for="secretquestion">Question secrète:</label></p>
                	<p><select name="secretquestion" id="secretquestion">
                		<option value="animal">Le nom de votre premier animal de compagnie</option>
                		<option value="nomJF">Le nom de jeune fille de votre grand-mère maternelle</option>
                		<option value="personnage">Votre personnage historique préféré</option>
                		<option value="amour">Le nom et le prénom de votre premier amour</option>
                	</select>
                </p>
                
                <p><label for=reponse>Réponse:</label></p>
    				<p><input type="text" name="reponse" id="reponse" size="43px" /></p>
               
                <p><input class="bouton_connection" type="submit" value="CONNEXION" /></p>

    		</form>
    	</div>
    </body>

   <footer>
		<?php include("_footer.php"); ?> 
	</footer>

</html><!-- 
Nom ;
Prénom ;
UserName ;
Password ;
Question secrète ;
Réponse à la question secrète -->