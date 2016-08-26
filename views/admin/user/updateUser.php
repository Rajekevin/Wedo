<?php foreach ($updateuser as $key => $value): ?>

<?php endforeach; ?>
<?php
	$membre = new membre();

	$id= intval($_GET["id"]);

	$tab=$membre->getOneBy(['id'=>$id]);
	//var_dump($tab['id']);

	$id=$membre->setId($tab['id']);

if(isset($_POST['valider'])&& isset($_POST['login'])&&isset($_POST['mail'])&&isset($_POST['statut'])&&isset($_POST['pass1']) &&isset($_POST['pass2']) )
	{
	 			
		$membre->setLogin($_POST['login']);
		$membre->setMail($_POST['mail']);			
		$membre->setStatut($_POST['statut']);


		if(strlen($_POST['pass1']) <8 || strlen($_POST['pass2'])>12)
	        {
	            $error = TRUE;
	            $msg_error .= " | Le mot de passe doit faire entre 8 et 12 caractères";
	            echo $msg_error;
	        }
		  if($_POST['pass1'] != $_POST['pass2'])
	        {
	            $error = TRUE;
	            $msg_error .= " | Le mot de passe de confirmation ne correspond pas";
	            echo $msg_error;
	        }

	        $pwd = password_hash($_POST['pass1'], PASSWORD_DEFAULT);


	     $membre->setPass($pwd);


		$membre->save();
	}
?>
<form name="inscription" method="post" action="" >
	<label>
		<h5>LOGIN</h5> 
		<input type="text" name="login" required="" value="<?php echo $tab['login']; ?>"/>
	</label>

	<label>
		<h5>Nouveau mot de passe : </h5> 
		<input type="password" name="pass1" id="name" required=""  placeholder="Mot de passe" required/>
	</label>
	<label>
		<h5>Retaper le mot de passe : </h5> 
		 <input type="password" name="pass2"  id="name" required=""  placeholder="Retapez votre mot de passe" required/>
	</label>

	<label>
		<h5>MAIL</h5> 
		<input type="text" name="mail"  required=""  value="<?php echo $tab['mail']; ?>" />
	</label>

	<label>
		<h5>Statut</h5> 
		<input type="numeric" name="statut" required=""  value="<?php echo $tab['statut'];?>"/>
	</label>
	<input type="submit" name="valider" value="valider"/>

</form>



