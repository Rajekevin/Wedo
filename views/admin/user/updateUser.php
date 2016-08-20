<?php foreach ($updateuser as $key => $value): ?>

<?php endforeach; ?>
<?php
	$membre = new membre();

	$id= intval($_GET["id"]);

	$tab=$membre->getOneBy(['id'=>$id]);
	//var_dump($tab['id']);

	$id=$membre->setId($tab['id']);

	if(isset($_POST['valider'])&& isset($_POST['login'])&&isset($_POST['mail'])&&isset($_POST['statut']))
	{
	 			
		$membre->setLogin($_POST['login']);
		$membre->setMail($_POST['mail']);			
		$membre->setStatut($_POST['statut']);
		$membre->save();
	}
?>
<form name="inscription" method="post" action="" >
	<label>
		<h5>LOGIN</h5> 
		<input type="text" name="login" value="<?php echo $tab['login']; ?>"/>
	</label>

	<label>
		<h5>MAIL</h5> 
		<input type="text" name="mail" value="<?php echo $tab['mail']; ?>" />
	</label>

	<label>
		<h5>Statut</h5> 
		<input type="numeric" name="statut" value="<?php echo $tab['statut'];?>"/>
	</label>
	<input type="submit" name="valider" value="valider"/>

</form>



