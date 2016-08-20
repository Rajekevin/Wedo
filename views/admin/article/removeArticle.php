<?php foreach ($removeArticle as $key => $value): ?>

<?php endforeach; ?>
<?php
	$a = new article();


	$id= $_GET["id"];

	//var_dump($id);

	$test = $a->remove(['id'=>$id]);

	//var_dump($a->remove(['id'=>$id]));

	// var_dump($a->remove(['$id']));

	$article = $a->remove([]);


	echo"Votre Article vient d'être supprimé ! ";
?>