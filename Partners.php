<?php

require 'model/database.php';

session_start();
if(isset($_POST['pseudo']))
    {
        $_SESSION['pseudo']=$_POST['pseudo'];
        header('Location:Partners.php');
    }
    
if (isset($_POST['detruire'])) 
    {
        $_SESSION["Identifiant"]="";
        session_destroy();
        header('Location:Connexion.php');
    }

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Style.css" type="text/css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <title>GBAF: Groupement Banque-Assurance Français</title>
    </head>


    <header>
    	<?php include("_header.php"); ?> 
    </header>

    <body>

        <div id="partner">
            <h1>ACTEURS ET PARTENAIRES DU GBAF</h1>
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
                                <a class="lire_suite" href="partners_suite.php?id_partenaire=<?php echo $donnees['id']; ?>">Lire la suite</a>
                            </p>
                        </div>
                    </div>
                <?php
                }
            $req->closeCursor();
        ?>
    </body>
       
    <footer>
        <?php include("_footer.php"); ?>
    </footer>

    </body>

</html>