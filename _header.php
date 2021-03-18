
<div id="header">
	<div class="logoheader">
		<img class="logo" src="Visuels/logo_fond blanc.png" alt="Logo GBAF: Groupement Banque Assurance Français" title="Logo GBAF" />
	</div>
 
	<div id="nav">
            <?php include("_menu.php"); ?>
	</div>

	<div class="nom_prenom">
		<p class="pheader">Bonjour <?php  echo $_SESSION['identifiant']; ?></p>
		<div class="deconnexion"><a class="adeconnexion" href="01.1_accueil.php">DECONNEXION</a></div>
	</div>
</div>
