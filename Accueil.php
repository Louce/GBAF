<?php
require 'model/database.php';

/*session_start();
if(!$_SESSION["pseudo"]||$_SESSION["pseudo"]=="")
    {
        header('Location:Accueil.php');
    }*/
    
session_start();
if(isset($_POST['pseudo']))
    {
        $_SESSION['pseudo']=$_POST['pseudo'];
        header('Location:Accueil.php');
    }

if (isset($_POST['detruire'])) 
    {
        $_SESSION["Identifiant"]="";
        session_destroy();
        header('Location:Connexion.php');
    }

if(isset($_POST['suite']) AND ($_POST['suite'] == 'Lire la suite')) 
    { 
        header("Location:partners.php"); 
    } 
?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no"/>
        <link rel="stylesheet" href="Style.css" type="text/css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>GBAF: Groupement Banque-Assurance Français</title>
    </head>

    <body>  

    <header>
        <?php include("_header.php"); ?>
    </header> 

    	<div id="presentation">
            <div class="texte_presentation">
                <h1>GROUPEMENT BANQUE-ASSURANCE FRANCAIS</h1>

                <p>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :
                    <ul>
                        <li>BNP Paribas ;</li>
                        <li>BPCE ;</li>
                        <li>Crédit Agricole ;</li>
                        <li>Crédit Mutuel-CIC ;</li>
                        <li>Société Générale ;</li>
                        <li>La Banque Postale.</li>
                    </ul>
                Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.</p>
            </div>

            <div>
                <img src="visuels/image_body.jpg" style="width:800px;height:400px;">
            </div>
    	</div>

    	<div id="liste_partenaires">

            <div class="texte_presentation_acteur">
                    <h1>ACTEURS & PARTENAIRES</h1>

                    <p>Le GBAF souhaite proposer aux salariés des grands groupes français un point d’entrée unique, répertoriant un grand nombre d’informations sur les partenaires et acteurs du groupe ainsi que sur les produits et services bancaires et financiers.<br>
                Bienvenu dans notre extranet !</p>
                </div>
        
       <?php 
            $req = $bdd->query("SELECT * FROM partenaires ORDER BY id");
                while ($donnees = $req->fetch())
                {
                ?>
                    <div class="partenaires">
                        <div class="texte_acteur">
                            <h3>
                                <?php echo ($donnees['nom_partenaire']); ?> <br/>
                            </h3>
                            <img src=<?php echo ('visuels/'.$donnees['images'].''); ?>>
                            <p>
                                <?php echo nl2br($donnees['presentation']); ?> <br/> 
                            </p>
                            <p>
                                <a class="lire_suite" href="partners.php">Lire la suite</a>
                            </p>
                        </div>
                    </div>
                <?php
                }
            $req->closeCursor();
        ?>
    	</div>

    <footer>
        <?php include("_footer.php"); ?>
    </footer>
    
    </body>

</html>