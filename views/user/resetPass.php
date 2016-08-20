<div id="home" class="site-content articles white">
<h1>Mot de passe oublié :? </h1>
<div id="subscribe">

<center>
	<?php 
		$this->createForm($form,$error);


if(isset($msg_error)){
 echo $msg_error;
}

if(isset($msg)){
 echo $msg;
}

	 ?> 
	 </center>
</div>
</div>