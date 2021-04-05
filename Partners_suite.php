<?php
//connexion bdd
require 'model/database.php';

//session
session_start();
if(isset($_POST['pseudo']))
{
    $_SESSION['pseudo']=$_POST['pseudo'];
    header('Location:Partners_suite.php');
}
//fermer la session
if (isset($_POST['detruire'])) 
{
    $_SESSION["Identifiant"]="";
    session_destroy();
    header('Location:Connexion.php');
}


//récupérer le prénom pour l'afficher dans les commentaires
$prenom = "";

    if (isset($_SESSION['pseudo']))
    {
        $pseudo=$_SESSION['pseudo'];
        $req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo');
        $req->execute(array('pseudo' => $pseudo));
        $resultat = $req->fetch();

            if (isset($resultat))
            {
                $prenom = htmlspecialchars($resultat['prenom']);
            }
            $id=intval($resultat['id']);
    }

// système likes/dislikes
if(isset($_GET['id_partenaire'])) 
{
    $id_partenaire = htmlspecialchars($_GET['id_partenaire']);
    $likes = "";
    $dislikes = "";

    /*afficher likes*/
    $req_likes = $bdd->prepare('SELECT COUNT(*) AS nblikes FROM likes WHERE id_partenaire = :id_partenaire');
    $req_likes->execute(array('id_partenaire' => $id_partenaire));
    $result_likes = $req_likes->fetchcolumn();

    if ($result_likes)
    {
        $likes = $result_likes;
    }

    /*afficher dislikes*/
    $req_dislikes = $bdd->prepare('SELECT COUNT(*) AS nbdislikes FROM dislikes WHERE id_partenaire = :id_partenaire');
    $req_dislikes->execute(array('id_partenaire' => $id_partenaire));
    $result_dislikes = $req_dislikes->fetchcolumn();

    if ($result_dislikes)
    {
        $dislikes = $result_dislikes;
    }

}
//vérifier les likes par rapport à l'id utilisateur
$req1 = $bdd->prepare('SELECT * FROM likes WHERE id_membre = :id_membre AND id_partenaire= :id_partenaire');
$req1->execute(array(
    'id_membre' => $id, 
    'id_partenaire'=>$_GET['id_partenaire']
    ));
$data1=$req1->fetch();

//vérifier les dislikes par rapport à l'id utilisateur
$req2 = $bdd->prepare('SELECT * FROM dislikes WHERE id_membre = :id_membre AND id_partenaire= :id_partenaire');
$req2->execute(array(
    'id_membre' => $id, 
    'id_partenaire'=>$_GET['id_partenaire']
    ));
$data2=$req2->fetch();


//insérer les likes
if(isset($_GET['action']) == 1) 
    {
        $getaction = (int) $_GET['action'];

        $req_likes = $bdd->prepare('INSERT INTO likes(id_partenaire, id_membre) VALUES(:id_partenaire, :id_membre)');
        $req_likes->execute(array(
            'id_partenaire' => $_GET['id_partenaire'],
            'id_membre' => $id
            ));

        header('location: Partners_suite.php?id_partenaire='.$id_partenaire);
     }

//insérer dislikes
elseif (isset($_GET['action']) == 2) 
     {
        $getaction = (int) $_GET['action'];

        $req_dislikes = $bdd->prepare('INSERT INTO dislikes(id_partenaire, id_membre) VALUES(:id_partenaire, :id_membre)');
        $req_dislikes->execute(array(
            'id_partenaire' => $_GET['id_partenaire'],
            'id_membre' => $id
            ));

        header('location: Partners_suite.php?id_partenaire='.$id_partenaire);
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


<?php 
//afficher le partenaire
    $req = $bdd->prepare('SELECT * FROM partenaires WHERE id = ?');
    $req->execute(array($_GET['id_partenaire']));
    $donnees = $req->fetch();

   
?>
        <div id="partner">
            <div class="partenaires">          
                <div class="texte_acteur">
                    <h3>
                        <?php echo ($donnees['nom_partenaire']); ?> <br/>
                    </h3>
                    <img src=<?php echo ('visuels/'.$donnees['images'].''); ?>>
                    <p>
                        <?php echo nl2br($donnees['presentation']); ?> <br/> 
                    <p>

<?php
/*système like/dislike*/


?>
                    <div class="dis_like">
                        <?php 
                        if($data1)
                        {
                        ?>
                            <img src="Visuels/like.png" alt="pouce vers le haut" title="like" class="btn_like" />
                            <p class="likes"><?php echo $likes; ?></p>
                        <?php 
                        } 
                        else
                        {
                           ?>
                           <a href="Partners_suite.php?id_partenaire=<?php echo $_GET['id_partenaire'] ?>&action=1"><img src="Visuels/like.png" alt="pouce vers le haut" title="like" class="btn_like" /></a>
                           <?php 
                        }
                        ?>

                        <?php 
                        if($data2)
                        {
                        ?>
                            <img src="Visuels/dislike.png" alt="pouce vers le bas" title="dislike" class="btn_like" />
                            <p class="dislikes"><?php echo $dislikes; ?></p>
                        <?php 
                        } 
                        else
                        {
                           ?>
                           <a href="Partners_suite.php?id_partenaire=<?php echo $_GET['id_partenaire'] ?>&action=2"><img src="Visuels/dislike.png" alt="pouce vers le bas" title="dislike" class="btn_like" /></a>
                           <?php 
                        }
                        ?>
            		 
            		
            		
            	   </div>
                </div>
            </div>
        </div>

        <div class="box_commentaires">
            <div class="com">
            	<h4>COMMENTAIRES</h4>
            </div>
   
        <?php
            $req->closeCursor();

        //Récupérer les commentaires de la bdd pour les afficher
            $req = $bdd->prepare('SELECT auteur, contenu, date_com FROM commentaires WHERE id_partenaire = ? ORDER BY date_com DESC');
            $req->execute(array($_GET['id_partenaire']));
            while ($donnees = $req->fetch())
                {
        ?>
                    <div class="commentaire"> 
                        <div>
                            <p><strong><?php echo htmlspecialchars($donnees['auteur']); ?> le <?php echo $donnees['date_com']; ?></strong></p>
                            <p><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></p>
                        </div>
                    </div>
                    
        <?php
                }

        $req->closeCursor();
        ?>

            <div class="com">

                    <form action="#" method="POST">
                        <div>
                            <label for='auteur'>Nom d'utilisateur</label>
                            <div>
                            <input type="text" size="51" id="auteur" name="auteur" value="<?php echo $prenom; ?>">
                            </div>
                        </div>

                        <div>
                            <label for='contenu'>Commentaire</label>
                            <div>
                            <textarea id ="contenu" name="contenu" rows="10" cols="100" placeholder="Tapez votre commentaire ici"></textarea>
                            </div>
                        </div>

                        <div>
                            <p><input class="bouton" type="submit" name="submit" value="Envoyer"></p>
                        </div>
                    </form>
            </div>
        </div>

        <?php
        //insérer les données du formulaire de commentaires dans la bdd
            if (isset($_POST['submit']) AND isset($_POST['auteur']) AND isset($_POST['contenu']))
                {
                    $auteur=$_POST['auteur'];
                    $contenu=$_POST['contenu'];
                    $id_partenaire=$_GET['id_partenaire'];
                
                    $req = $bdd->prepare('INSERT INTO commentaires(id_partenaire, auteur, contenu, date_com) VALUES (:id_partenaire, :auteur, :contenu, CURDATE())');
                    $req->execute(array(
                        'id_partenaire' => $id_partenaire,
                        'auteur'=>$auteur,
                        'contenu'=>$contenu
                        ));
        //afficher le commentaire posté
                    $show = $bdd->prepare('SELECT auteur, contenu, date_com FROM commentaires WHERE id_partenaire = ? ORDER BY id DESC LIMIT 1');
                    $show->execute(array($_GET['id_partenaire']));
                    while ($donnees = $show->fetch())
                        { 
                            ?>
                                <div class="box_commentaires"> 
                                    <div>
                                        <h4>NOUVEAU COMMENTAIRE</h4>
                                        <p><strong><?php echo htmlspecialchars($donnees['auteur']); ?></strong> le <?php echo $donnees['date_com']; ?></p>
                                        <p><?php echo nl2br(htmlspecialchars($donnees['contenu'])); ?></p>
                                    </div>
                                </div>
                            <?php
                        }
                }

        $req->closeCursor();
        ?>

    </body>
       
     <footer>
        <?php include("_footer.php"); ?>
    </footer>

    </body>

</html>