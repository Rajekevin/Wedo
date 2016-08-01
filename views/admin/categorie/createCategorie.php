    <?php
    // Tout début du code PHP. Situé en haut de la page web
    ini_set("display_errors",0);error_reporting(0);
    ?>
<?php foreach ($createCategorie as $key => $value): 
	?>

	<?php endforeach; ?>


	<?php
    $c = new categorie();


    //$id= intval($_GET["id"]);

    $tab=$c->getOneBy(['id'=>$id]);

    //$id=$a->setId($tab['id']);

     if(isset($_POST['cat'])&&isset($_POST['description']) ) 
			    {
			    	

			    	$c = new categorie();
					$c->setName($_POST['cat']);
					$c->setDescription($_POST['description']);			
					

					$c->save();
					echo"Votre categorie vient d'être creer ! ";
			      
				}

 
?>


<table border="0" cellpadding="" cellspacing="1" width="100%">
 <tr>
    <th colspan="4">Creer une categorie</th>
  </tr>


<form name="inscription" method="post" action="" >



    <tr>
    <td><label>Nom de la categorie</label></td>
    <td><input type="text" name="cat" value="<?php echo $tab['name']; ?>" required></td></tr><br />

    <tr>
    <td><label>Description de la categorie </label></td>
    <td><input type="text" name="description" value="<?php echo $tab['description']; ?>" required></tr><br />

   

     

    
   
   <tr> <td><input type="submit" value="Je créer une categorie !"></td></tr>

</table>
    </p>
</form>










	


