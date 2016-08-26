
<?php foreach ($createArticle as $key => $value): 
	?>

	<?php endforeach; ?>


<?php
$a = new article();




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



function format_url($str)
	{
    // $str = mb_strtolower($str);
    $str = utf8_decode($str);
    $str = strtr($str, utf8_decode('àâäãáåçéèêëíìîïñóòôöõøùúûüýÿ'), 'aaaaaaceeeeiiiinoooooouuuuyy');
    $str = preg_replace('`[^a-z0-9]+`', '-', $str);
    $str = trim($str, '-');
    return $str;
	}




if(isset($_POST['valider'])&& isset($_POST['title'])&&isset($_POST['description'])&&isset($_POST['contenu']) ){



			if($a->titleExist($_POST['title'])) {
				echo '<script type="text/javascript">window.alert("Le titre existe déjà");</script>';			

				}else{
 			
 			$a->setAuteur(strip_tags($_SESSION['login']));
			$a->setDescription(strip_tags($_POST['description']));			
			
			$a->setIdUser($_SESSION['id']);
			$a->setDate(date('Y-m-d H:i:s'));
		
			$title=$_POST['title'];
			$a->setTitle($title);
	
			$a->setContenu($_POST['contenu']);

			
			$titre=format_url($_POST['title']);

		

			
			/*on recherche l'id de la catégorie sélectionné par l'user */
			$idCategory = categorie::findBy("name", $_POST['categorie'], "string");
			$idCategory = $idCategory->getId();
		
		
			$a->setIdCategory($idCategory);

			if(upload("img","public/img/article/", array("png","jpg","gif", "bmp"),100000000000000000000,array(15420,15420))==true)
			{

				echo "L'upload s'est bien passé !";
			}

			$a->setImg($_FILES['img']['name']);
			
			$value=0;
			$a->setInterest($value);


			// var_dump($a);
			$url =  ARTICLE.$titre;

		
			$a->setUrl($url);

			var_dump($a);

			echo "Votre article vient d'être creer : rendez-vous ici  $url ";

			   


			

			$a->save();


			
			}


        	

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
<input type="file" required="" id="img" name="img" value="<?php echo $tab['img']; ?>">



<input type="submit" name="valider" value="valider"/>


		 

</form>



