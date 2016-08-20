<?php foreach ($removeCategorie as $key => $value): ?>

<?php endforeach; ?>

<?php
	$c = new categorie();

	$id= $_GET["id"];

	

	$test = $c->remove(['id'=>$id]);


	// $article = $a->remove([]);

	echo"La catégorie vient d'être supprimé ! ";

	echo"Vous allez être redirigé à la liste des catégorie dans 5s...... ";



?>

<meta http-equiv="refresh" content="4;categorie/categorielist" />