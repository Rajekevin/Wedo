<?php foreach ($removeCommentaire as $key => $value): ?>

<?php endforeach; ?>

<?php
	$a = new commentaire();

	$id= $_GET["id"];

	//var_dump($id);

	$test = $a->remove(['id'=>$id]);


	// $article = $a->remove([]);

	echo"Le commentaire vient d'être supprimé ! ";

	   echo"Vous allez être redirigé à la liste des commentaires dans 5s...... ";
               ?>
 <meta http-equiv="refresh" content="4;commentairelist" />

