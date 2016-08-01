<?php foreach ($removeCategorie as $key => $value): ?>

<?php endforeach; ?>

<?php
	$c = new categorie();

	$id= $_GET["id"];

	

	$test = $a->remove(['id'=>$id]);


	// $article = $a->remove([]);

	echo"La catégorie vient d'être supprimé ! ";

?>