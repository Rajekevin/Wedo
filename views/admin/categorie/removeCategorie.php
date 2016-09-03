<?php foreach ($removeCategorie as $key => $value): ?>

<?php endforeach; ?>

<?php
	$c = new categorie();

	$id= $_GET["id"];

 if ($id==1||$id==2||$id==3){
		# code...

		echo "HOP HOP on ne supprime ces catégories ;( !";
	}else{


	$test = $c->remove(['id'=>$id]);


	// $article = $a->remove([]);

	echo"La catégorie vient d'être supprimé ! ";

	echo"Vous allez être redirigé à la liste des catégorie dans 5s...... ";
	}

	



?>

<meta http-equiv="refresh" content="4;categorie/categorielist" />