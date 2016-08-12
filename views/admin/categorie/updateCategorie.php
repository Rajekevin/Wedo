
<?php foreach ($updatecategorie as $key => $value): 
	?>

	<?php endforeach; ?>
<?php
$c = new categorie();


$id= intval($_GET["id"]);

$tab=$c->getOneBy(['id'=>$id]);




$id=$c->setId($tab['id']);





if( isset($_POST['valider'])&&isset($_POST['cat'])&&isset($_POST['description'])  ){
 			
 			
			    	
					$c->setName(strip_tags($_POST['cat']));
					$c->setDescription(strip_tags($_POST['description']));			
					

					$c->save();
					echo"Votre categorie a été mis à jour ! ";
		}




?>



<table border="0" cellpadding="" cellspacing="1" width="100%">
 <tr>
    <th colspan="4">Mise à jour de la  categorie : <?php echo $tab['name']; ?></th>
  </tr>


<form name="inscription" method="post" action="" >



    <tr>
    <td><label>Nom de la categorie</label></td>
    <td><input type="text" name="cat" value="<?php echo $tab['name']; ?>" required></td></tr><br />

    <tr>
    <td><label>Description de la categorie </label></td>
    <td><input type="text" name="description" value="<?php echo $tab['description']; ?>" required></tr><br />

   

     

    
   
   <tr> <td><input type="submit" name="valider" value="Mise à jour de la categorie !"></td></tr>

</table>
    </p>
</form>


<!--  $test = $a->save(['id'=>$id]);

 var_dump($a->save(['id'=>$id])); -->

