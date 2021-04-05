<?php

require 'model/database.php';

session_start();

if (isset($_POST['submit']) AND isset($_POST['password']))
    {
        $password=$_POST['password'];
        
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$pseudo=$_GET['pseudo'];
		
	   $req = $bdd->prepare('UPDATE membres SET password = :pass_hache  WHERE pseudo = :pseudo');
   		$req->execute(array(
   			'pseudo' => $pseudo,
   			'pass_hache' => $pass_hache));

        header('location:connexion.php');
    }

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="Style.css" type="text/css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width" />
        <title>GBAF: Groupement Banque-Assurance Français</title>
    </head>

    <body>

   <header>
      <div class="header">
         <a href="connexion.php"><img class="logo" src="Visuels/logo_fond blanc2.png" alt="Logo GBAF: Groupement Banque Assurance Français" title="Logo GBAF" /></a>
    </div>
    </header> 

        <div id="box">
            <div>
                <h1>MODIFIER MON MOT DE PASSE</h1>
            </div>

            <div class="password_f">
                <form method="POST" action="">
                <div class="formulaire">
                    <label for="password">Nouveau mot de Passe</label>
                    <div>
                    <input type="password" size="43" id="password" name="password">
                    </div>
                </div>

                <div>
                    <p><input type="submit" name="submit" value="MODIFIER" class="bouton"></p>
                </div>
                </form>
            </div>
        </div>

     <footer>
        <?php include("_footer.php"); ?> 
    </footer>
    
    </body>

</html>