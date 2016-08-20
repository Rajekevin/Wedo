<?php foreach ($removeuser as $key => $value): ?>

<?php endforeach; ?>

<?php
	$membre = new membre();
	$id= $_GET["id"];
	//var_dump($id);
	$test = $membre->remove(['id'=>$id]);
	//var_dump($membre->remove(['id'=>$id]));


	echo"Votre utilisateur vient d'être supprimé ! ";
?>