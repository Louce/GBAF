<!--formulaire de contact + coordonnées-->
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

    	<div id="contact">

    		<div class="formulaire_contact">

    			<h2>Formulaire de contact</h2>

    			<form method="post" action="03_configaccount.php">
    				<p><label for=nom>Nom:</label></p>
    					<p><input type="text" name="nom" id="nom" size="43px" /></p>

    				<p><label for=prenom>Prénom:</label></p>
    					<p><input type="text" name="prenom" id="prenom" size="43px" /></p>

    				<p><label for=prenom>Adresse email:</label></p>
    					<p><input type="email" name="mail" id="mail" size="43px" /></p>

    				<p><label for=prenom>Votre message:</label></p>
    					<p><textarea rows="25" cols="120">Tapez votre message ici.</textarea></p>

    				<p><input type="checkbox" name="RGPD" id="RGPD"/>
    					<label for="RGPD">Dans le cadre de la nouvelle loi RGPD, j'autorise ce site à conserver mes données transmises via ce formulaire. Aucune exploitation commerciale ne sera faites des données conservées et elles ne seront pas transmises à un tiers.</label></p>
    					

    				<p><input type="submit" name="envoyer" value="Envoyer"></p>
    			</form>
    		</div>
    	

    		<div class="info">
    		
    			<h2>Coordonnées</h2>

    			<p>GBAF: Groupement Banque Assurance Français</p>
    			<p>1 avenue de l'argent <br/> 92800 PUTEAUX</p>
    			<!--voir pour intégrer map-->
    			<p>Tel: 01 58 61 97 52</p>

    		</div>
    	</div>
    </body>

	<footer>
		<?php include("_footer.php"); ?> 
	</footer>

</html>