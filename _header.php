<?php

require 'model/database.php';

$nom_prenom = "";

    if (isset($_SESSION['pseudo']))
    {
        $pseudo=$_SESSION['pseudo'];
        $req = $bdd->prepare('SELECT nom, prenom FROM membres WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $resultat = $req->fetch();

            if (isset($resultat))
            {
                $nom_prenom = htmlspecialchars($resultat['prenom']) . ' ' . htmlspecialchars($resultat['nom']);
            }
    }

?>

<div id="header">
    <div>
        <a href="accueil.php"><img class="logo" src="Visuels/logo_fond blanc2.png" alt="Logo GBAF: Groupement Banque Assurance Français" title="Logo GBAF" /></a>
    </div>
 
    <div id="nav">
            <?php include("_menu.php"); ?>
    </div>
    
    <div class="header_membre">
        <div class="nom_prenom">
            <img src="Visuels/membre.png" alt="logo membre" title="Logo compte membre" />
            <p>Bonjour <?php  echo $nom_prenom; ?></p>
        </div>
        <div>
            <form method="post" action="#">
            <input class="bouton" type="submit" name="detruire" value="Déconnexion">
        	</form>
        </div>
    </div>
    
</div>