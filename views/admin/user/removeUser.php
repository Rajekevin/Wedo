<?php foreach ($removeuser as $key => $value): ?>

<?php endforeach; ?>

<?php
	$membre = new membre();
	$id= $_GET["id"];
	//var_dump($id);

	if ($id==1||$id==2){
		# code...

		echo "HOP HOP on ne supprime pas dieu ;( !";
	}else{


	$test = $membre->remove(['id'=>$id]);
	//var_dump($membre->remove(['id'=>$id]));


	echo"Votre utilisateur vient d'être supprimé ! ";


	 echo"Vous allez être redirigé à la liste des utilisateurs du site Wedo dans 5s...... ";
	}
 ?>
            <meta http-equiv="refresh" content="4;userlist" />
