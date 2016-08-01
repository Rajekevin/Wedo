
<?php foreach ($createArticle as $key => $value): 
	?>

	<?php endforeach; ?>


<?php
$a = new article();


// $id= intval($_GET["id"]);

$tab=$a->getOneBy(['id'=>$id]);


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
			echo "Les dimensions sont trop élevées, ne donnez pas trop de lait à votre image";
			return false;
			# code...
		}


		return move_uploaded_file($_FILES[$index] ['tmp_name'], $destination.$_FILES[$index]['name']);
		// return move_uploaded_file($_FILES[$index] ['tmp_name'], $destination.mt_rand(0,1000)."-".$_FILES[$index]['name']);


	}


if(isset($_POST['valider'])&& isset($_POST['title'])&&isset($_POST['description'])&&isset($_POST['contenu']) ){
 			
 			$a->setAuteur($_SESSION['login']);
			$a->setDescription($_POST['description']);			
			$a->setTitle($_POST['title']);
			$a->setIdUser($_SESSION['id']);
			$a->setDate(date('Y-m-d H:i:s'));

			// if($_POST['categorie']=="Musculation"){
			// $a->setIdCategory(1);
			// 	}else{
			// $a->setIdCategory(2);

			// 	}
			$a->setContenu($_POST['contenu']);

		

			
			/*on recherche l'id de la catégorie sélectionné par l'user */
			$idCategory = categorie::findBy("name", $_POST['categorie'], "string");
			$idCategory = $idCategory->getId();
		
		
			$a->setIdCategory($idCategory);

			if(upload("img","public/img/article/", array("png","jpg","gif", "bmp"),100000000000000000000,array(15420,15420))==true)
			{

				echo "L'upload s'est bien passé !";
			}

			$a->setImg($_FILES['img']['name']);

			$a->save();

			
			


        	

		// foreach ($articles as $key => $value): 
  //                   // if ($thisArticle['id'] != $value['id']):
  //         var_dump($value['id']);
  //         	endforeach;

  //         	$idArticle = $value['id'];
  //         	$theArticle= $idArticle+1;
		//  echo "Votre article vient d'être publier rendez-vous sur  http://localhost/wedo/index/a?id=".$theArticle;
		}




?>


<form name="inscription" method="post" action=""   enctype="multipart/form-data" >
<label>
	<h5>titre</h5> 
	<input type="text" name="title" required="" value="<?php echo $tab['title']; ?>"/>
</label>


<H5>Categorie</h5>

<select name="categorie">
  
<?php foreach($categorie as $key => $value){ 

		 ?>
<option required="" value="<?php echo $value['name'];?>"><?php echo $value['name'];?></option>
           <?php 
		}
		?>
             </select>




<label>
	<h5>Description</h5> 
	<textarea name="description" required="" ><?php echo $tab['description'];?></textarea>
</label>


<label> <h5>Contenu</h5>

<textarea id="editor1"  required="" name="contenu"><?php echo $tab['contenu'];?></textarea>
<script type="text/javascript" required="">
	window.onload = function()
	{
		CKEDITOR.replace( 'editor1' );
	};
</script>
</label>


<label for="photo">Image : Icône du fichier (JPG, PNG ou GIF | max. 15 Ko) :</label>  
<input type="file" id="img" name="img" value="<?php echo $tab['img']; ?>">



<input type="submit" name="valider" value="valider"/>


		 

</form>

<!--  $test = $a->save(['id'=>$id]);

 var_dump($a->save(['id'=>$id])); -->

