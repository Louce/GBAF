<?php
session_start();
if(!$_SESSION["Identifiant"]||$_SESSION["Identifiant"]==""){
    header('Location:01.1_accueil.php');
}
if (isset($_POST['detruire'])) {
    $_SESSION["Identifiant"]="";
    session_destroy();
    header('Location:01.1_accueil.php');
}
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
        <link rel="stylesheet" href="00_style.css" type="text/css" />
        <title>GBAF: Groupement Banque-Assurance Français</title>
    </head>


    <header>
    	
<div id="header">
    <div class="logoheader">
        <img class="logo" src="Visuels/logo_fond blanc.png" alt="Logo GBAF: Groupement Banque Assurance Français" title="Logo GBAF" />
    </div>
 
    <div id="nav">
            <?php include("_menu.php"); ?>
    </div>

    <div class="nom_prenom">
        <p class="pheader">Bonjour <?php  echo $_SESSION["Identifiant"]; ?></p>
        <div class="deconnexion"><a class="adeconnexion" href="01.1_accueil.php">DECONNEXION</a></div>
    </div>
</div>
    </header>


    <body>   
        
       

    	<div id="presentation">

            <div class="texte_presentation">
                <h1>Groupement Banque-Assurance Français</h1>

                <p>Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
			         les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.</p>

            </div>

                <img class="img_presentation" src="visuels/handshake.jpg">

    	</div>

    	<div id="liste_partenaires">

            <div class="texte_partenaires">
                <h2>Acteurs et partenaires</h2>

                <p>Le GBAF souhaite proposer aux salariés des grands groupes français un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers.<br>
            Bienvenu dans notre extranet !</p>
            </div>

            <div class="partenaires">
                <div><img class="logo_partner" src="Visuels/CDEmini.png." alt="logo CDE" title="Logo CDE"></div>
                <div class="text_partner">
                    <h3>La Chambre des Entrepreneurs</h3>
                    <p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation.</p>
                </div>
                <div class="bouton_suite"><a class= "suite" href="08_CDE.php">Afficher la suite</a></div>
            </div>

            <div class="partenaires">
                <div><img class="logo_partner" src="Visuels/Dsa_francemini.png" alt="logo DSA France" title="Logo DSA France"></div>
                <div class="text_partner">
                    <h3>DSA France</h3>
                    <p>Dsa France accélère la croissance du territoire et s’engage avec les collectivités territoriales. Nous accompagnons les entreprises dans les étapes clés de leur évolution.</p>
                </div>
                <div class="bouton_suite"><a class= "suite" href="09_DSA.php">Afficher la suite</a></div>
            </div>

            <div class="partenaires">
                <div><img class="logo_partner" src="Visuels/formation_comini.png" alt="logo formation and co" title="Logo Formation & Co"></div>
                <div class="text_partner">
                    <h3>Formation & Co</h3>
                    <p>Formation&co est une association française présente sur tout le territoire. Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.</p>
                </div>
                <div class="bouton_suite"><a class= "suite" href="10_Formation_co.php">Afficher la suite</a></div>
            </div>

            <div class="partenaires">
                <div><img class="logo_partner" src="Visuels/protectpeoplemini.png" alt="logo protect people" title="Logo Protect People"></div>
                <div class="text_partner">
                    <h3>ProtectPeople</h3>
                    <p>Protectpeople finance la solidarité nationale. Nous appliquons le principe édifié par la Sécurité sociale française en 1945 : permettre à chacun de bénéficier d’une protection sociale.</p>
                </div>
                <div class="bouton_suite"><a class= "suite" href="11_protectpeople">Afficher la suite</a></div>
            </div>

    	</div>
   
    </body>
    <form method="post" action="#">
        <input type="submit" name="detruire" value="deconnexion">
    </form>


    <footer>
    	<?php include("_footer.php"); ?>
    </footer>

</html>