

<?php



function upload($index,$destination,$extension=false,$maxsize=false,$size=false)
  {
    if(empty($_FILES[$index]) || $_FILES[$index]["error"]>0)
    {
      echo "Hum...c'est embarrassant une erreur est survenue durant l'upload";
      return false;
    }

    if($maxsize != false && $_FILES[$index]["size"]>$maxsize)
    {
      echo "Le poids du fichier est trop lourd, faites lui faire du sport :x";
      return false;
    }


    $dimension = getimagesize($_FILES[$index]['tmp_name']);
    if ($dimension[0] > $size[0] || $dimension[1] >$size[1]) 
    {
      echo "Les dimensions sont trop élevées, ne donnez pas trop de lait à votre Image";
      return false;
      # code...
    }


    return move_uploaded_file($_FILES[$index] ['tmp_name'], $destination.$_FILES[$index]['name']);
    // return move_uploaded_file($_FILES[$index] ['tmp_name'], $destination.mt_rand(0,1000)."-".$_FILES[$index]['name']);


  }

	$membre = new membre();
	$id= $_SESSION['id'];


	$tab=$membre->getOneBy(['id'=>$id]);


	$id=$membre->setId($tab['id']);



	if(isset($_POST['valider'])&& isset($_POST['login'])&&isset($_POST['mail']))
	{
	 			
		$membre->setLogin($_POST['login']);
		$membre->setMail($_POST['mail']);	

		if(upload("photo","public/img/avatar/", array("png","jpg","gif", "bmp"),100000000000000000000,array(15420,15420))==true)
			{

				

				echo "Votre avatar a été bien mis à jour ! ";

			}		
		
		$membre->setAvatar($_FILES['photo']['name']);
		$membre->save();?>

    <meta http-equiv="refresh" content="1;profil?login=<?= $_POST['login']; ?>" />




    <?php 


	}

?>

?>



<div id="home" class="site-content articles white">


<form method="POST" action=""  enctype="multipart/form-data">
  <fieldset>
    <legend>Utilisateur</legend>  

    <label for="pseudo">Pseudo :</label> : <input type="pseudo" id="login" name="login" value="<?php echo $login; ?>" required>

    
    <br><br>
    <label for="email">Email :</label> : <input type="email" id="mail" name="mail" value="<?php echo $mail; ?>" required>
    <br><br>



    <label for="photo">Photo :</label> : <input type="file" id="photo" name="photo" value="<?php echo $photo; ?>">

  
    <br><br>
    
      
    <br><br>
    <input type="submit" name="valider" value="valider">  
  </fieldset>
</form>
</div>