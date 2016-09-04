
<?php foreach ($updateArticle as $key => $value): 
	?>

	<?php endforeach; ?>
<?php
$a = new article();


$id= intval($_GET["id"]);

$tab=$a->getOneBy(['id'=>$id]);




$id=$a->setId($tab['id']);

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
			echo "Les dimensions sont trop élevées, ne donnez pas trop de lait à votre";
			return false;
			# code...
		}


		return move_uploaded_file($_FILES[$index] ['tmp_name'], $destination.$_FILES[$index]['name']);
		// return move_uploaded_file($_FILES[$index] ['tmp_name'], $destination.mt_rand(0,1000)."-".$_FILES[$index]['name']);


	}




if(isset($_POST['valider'])&& isset($_POST['title'])&&isset($_POST['auteur'])&&isset($_POST['description'])&&isset($_POST['contenu'])  ){
 			
 			$a->setAuteur($_POST['auteur']);
			$a->setDescription($_POST['description']);			
			$a->setTitle($_POST['title']);

				/*on recherche l'id de la catégorie sélectionné par l'user */
			$idCategory = categorie::findBy("name", $_POST['categorie'], "string");
			$idCategory = $idCategory->getId();
		
		
			$a->setIdCategory($idCategory);

			$a->setContenu($_POST['contenu']);
			if(upload("img","public/img/article/", array("png","jpg","gif", "bmp"),100000000000000000000,array(15420,15420))==true)
				{

					echo "L'upload s'est bien pasé !";
				}

			$a->setImg($_FILES['img']['name']);

			$a->save();

			echo " votre Article à été mise à jour :)";


			echo"Vous allez être redirigé à la liste de vos  articles dans 5s...... ";
               ?>
 			<meta http-equiv="refresh" content="4;mesArticles" />
 			<?php
		}




?>
<form name="inscription" method="post" action="" enctype="multipart/form-data">
<label>
	<h5>titre</h5> 
	<input type="text" name="title" value="<?php echo $tab['title']; ?>"/>
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
	<h5>Auteur</h5> 
	<input type="text" name="auteur" value="<?php echo $tab['auteur']; ?>" />
</label>

<label>
	<h5>Description</h5> 
	<textarea name="description"><?php echo $tab['description'];?></textarea>
</label>

<h5>CONTENU</h5> 
<textarea id="editor1" name="contenu"><?php echo $tab['contenu'];?></textarea>
<script type="text/javascript">
	window.onload = function()
	{
		CKEDITOR.replace( 'editor1' );
	};
</script>

<label for="photo">Image : Icône du fichier (JPG, PNG ou GIF | max. 15 Ko) :</label>  
<input type="file" id="img" name="img" value="<?php echo $tab['img']; ?>">


<input type="submit" name="valider" value="valider"/>

</form>


<!--  $test = $a->save(['id'=>$id]);

 var_dump($a->save(['id'=>$id])); -->

