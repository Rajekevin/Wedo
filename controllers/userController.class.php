<?php

// require('lib/password.php');



class userController{

	

	public function indexAction($args){
		
    //TODO		

	}


	public function subscribeAction($args) {

		session_start();

		$v = new view();
		$v->setView("user/subscribe");
		
	   	$pays = ["fr"=>"France", "gb"=>"England", "es"=>"Spanish", "it"=>"Italy"];
	    $sexe = [0=>"homme", 1=>"femme"];
	    $v->assign("pays",$pays);
	    $v->assign("sexe",$sexe);

	    $error = FALSE;
	    $msg_error = "";

	    if( isset($args['login']) &&  isset($args['pass1']) &&  isset($args['sexe'])&&
		    isset($args['birth']) &&  isset($args['email']) &&    isset($args['pass2']) &&    isset($args['ville'])  )
	    {
	        $args['login'] = strtolower(trim($args['login']));
	        $args['email'] = strtolower(trim($args['email']));
	        $args['ville'] = strtolower(trim($args['ville']));

	        //$args['sexe'] = strtolower(trim($args['sexe']));


	
	        if(strlen($args['login'])<2)
	        {
	            $error = TRUE;
	            $msg_error .= "Le login doit faire plus d'un caractère";
	    	}
	    
	        if(!filter_var($args['email'], FILTER_VALIDATE_EMAIL))
	        {
	            $error = TRUE;
	            $msg_error .= " | Email invalide";
	        }
	        if(strlen($args['pass1']) <8 || strlen($args['pass1'])>12)
	        {
	            $error = TRUE;
	            $msg_error .= " | Le mot de passe doit faire entre 8 et 12 caractères";
	        }
	        if($args['pass1'] != $args['pass2'])
	        {
	            $error = TRUE;
	            $msg_error .= " | Le mot de passe de confirmation ne correspond pas";
	        }
	         
	        $now = new DateTime();


	        //Vérifier la présence du "-"
	        if( strpos($args['birth'], "-") )
	        {
	            $explode_date = explode("-", $args['birth']);
	            
	            list($year, $month, $day) = explode('-', $args['birth']);
	            $time_birthday = mktime(0, 0, 0, $month, $day, $year);

	            if( checkdate ( $month , $day , $year ))
	            {
	                $bith = new DateTime($args['birth']);
	                $interval = $now->diff($bith);
	                $age = $interval->y;

	                if($age >= 100 )
	                {
	                    $error = TRUE;
	                    $msg_error .= " | Date de naissance incorrecte";
	                }
	            }
	        }
	        //Vérifier la présence du "/"
	        else if( strpos($args['birth'], "/") )
	        {

	            list($day, $month, $year) = explode('/', $args['birth']);
	            $time_birth = mktime(0, 0, 0, $month, $day, $year);

	            if( checkdate ( $month , $day , $year ))
	            {
	                $bithDate = new DateTime($year."-".$month."-".$day);
	                $interval = $now->diff($bithDate);
	                $age = $interval->y;

	                if($age >= 100 )
	                {
	                    $error = TRUE;
	                    $msg_error .= " | Date de naissance incorrecte";
	                }
	            }
	        }
	        //Erreur
	        else
	        {
	            $error = TRUE;
	            $msg_error .= " | Date de naissance incorrecte";
	        }

	      	if($error)
	      	{
	           $v->assign('error',$error);
		       $v->assign('msg_error',$msg_error);
	        }
		    else
		    {
	        $pwd = password_hash($args['pass1'], PASSWORD_DEFAULT);

	       	$statut=2; 
	       	$actif=0;
	       		//$img="defaut.jpg";	   

			$membre = new membre(); 
			if($membre->emailExist($args['email'])){
				echo '<script type="text/javascript">window.alert("cette email existe déjà");</script>';			

				}else{
			$membre->setMail($args['email']);
			$membre->setLogin($args['login']);
			$membre->setSexe($args['sexe']);
			$date1 = strtr($args['birth'], '/', '-');
			$date = date('Y-m-d', strtotime($date1));
			$membre->setBirth($date);				
			$membre->setPass($pwd);
			$membre->setDateInscription(date('Y-m-d H:i:s'));
			$membre->setActif($actif);
			$membre->setVille($args['ville']);
			$membre->setStatut($statut);			
			$membre->setToken();
			$membre->setAvatar("default_user.jpg");
			$membre->save();



				//on récupère l'id de l'utilisateur

         	$thisuser = new membre();
			$tab = $thisuser->getOneBy(['mail'=>$args['email']]);
         	//envoie de l'email de validation
            $email = new email();			
			//On renseigne le sujet et le message de l'email
			$email->setSujet("Validation de votre inscription");
			$email->setDestinataires($args['email']);
			$email->setMessage("Bienvenue sur WEDO,<br />
			Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou bien copier celui-ci dans l'url de votre navigateur. 
			<br />

			".LINK."user/activerCompte?id=".$tab['id']."&token=".$tab['token']."<br />

			---------------<br />
			Ceci est un mail automatique, Merci de ne pas y répondre");			
			//envoie de l'email
			$email->envoieEmail();
        $welcome ='Bienvenue '.$args['login'].', vous allez recevoir un email pour valider votre compte';
            $v->assign('welcome',$welcome); 
        	

			}
		}		
	}
}


	public function activerCompteAction($args){
		session_start();
		$v = new view();


		$v->setView("user/login");
		//var_dump($args);
		

		$id = $_GET['id'];
		
	
					//On renseigne la classe user

					$membre=  new membre();
					$membre->setId($id);
		         	$membre->setToken();
		         	//On active le compte

		         	$actif=1;
		         	$membre->setActif($actif);
		         	$membre->save();



		         	$error = FALSE;
					$msg_error= "Identifiants incorrects";

?>
				 <meta http-equiv="refresh" content="2;login" />	
<?php
			//Si les inputs email et password sont initialisé
			if(isset($args['email']) AND isset($args['pass'])){
				
				//Demander au serveur SQL toutes les informations en fonction de l'email
				$membre= new membre();
				$tab = $membre->getOneBy(['mail'=>$args['email']]);


				//Si aucune information, identifiants not ok
				if(empty($tab)){
					$error = TRUE;
				}else{				
					

		         	$membre->setMail($args['email']);				
					if (!password_verify($args['pass'], $tab['pass'])) {
					    $error = TRUE;
					}


						//vérification actif
				if ($tab['actif'] == 0) {
					$error = TRUE;
					$msg_error = "Votre compte n'est pas encore activé";
					}
					
				}

			


				if($error == TRUE){
		            echo "<ul>";
		            echo $msg_error;
		            echo "</ul>";
		        }else{
		         	
		         	//On renseigne la classe user
					//$membre->setId($args['id']);
		         	$membre->setToken();
		         	$membre->save();
		         
		         	$_SESSION['id'] = $tab['id'];
		         	$_SESSION['login'] = $tab['login'];
					$_SESSION['token'] = $tab['token'];
					$_SESSION['statut'] = $tab['statut'];

					header('Location: '.LINK);
					//on déclare les variables session avec l'id et le token de l'user		         
		        	echo 'Welcome '.$args['email'].', vous êtes désormais connecté';
		        }

			}

		       

		
	}
	/*end*/


public function loginAction($args)
	{
		session_start();
		$v = new view();
		$v->setView("user/login");



		
			$error = FALSE;
			$msg_error= "Identifiants incorrects";



			//Si les inputs email et password sont initialisé
			if(isset($args['email']) AND isset($args['pass'])){
				
				//Demander au serveur SQL toutes les informations en fonction de l'email
				$membre= new membre();
				$tab = $membre->getOneBy(['mail'=>$args['email']]);


				//Si aucune information, identifiants not ok
				if(empty($tab)){
					$error = TRUE;
				}else{				
					

		         	$membre->setMail($args['email']);				
					if (!password_verify($args['pass'], $tab['pass'])) {
					    $error = TRUE;
					}


						//vérification actif
				if ($tab['actif'] == 0) {
					$error = TRUE;
					$msg_error = "Votre compte n'est pas encore activé";
					}
					
				}

				


				if($error == TRUE){
		        


		           $v->assign('error',$error);
		            $v->assign('msg_error',$msg_error);


		        }else{
		         	
		         	//On renseigne la classe user
					//$membre->setId($args['id']);
		         	$membre->setToken();
		         	$membre->save();
		         
		         	$_SESSION['id'] = $tab['id'];
		         	$_SESSION['login'] = $tab['login'];
					$_SESSION['token'] = $tab['token'];
					$_SESSION['statut'] = $tab['statut'];

					header('Location: '.LINK);
					//on déclare les variables session avec l'id et le token de l'user		         
		        	echo 'Welcome '.$args['email'].', vous êtes désormais connecté';
		        }
		       
		       


			}

	}

	public function deconnexionAction($args){
		session_start();
		unset($_SESSION['id']);
		unset($_SESSION['login']);
		unset($_SESSION['token']);
		
		header('Location: '.WEBROOT);
	}



	public function profilAction($args)
	{
		session_start();

	
		$v = new view();
		$v->setView("user/profil");


		

		$var = implode ($args);


		
		
		$user = membre::findBy("login", $args['login'], "string");
		 

		

		if($user==false)
		{
			$v->setViewError("error");
		}else{


			$idUser = $user->getId();
			$avatar = $user->getAvatar();
			$Login = $user->getLogin();
			$ville = $user->getVille();
			$date = $user->getDateInscription();
			$statut = $user->getStatut();
		
			$v->assign('idUser',$idUser);
			$v->assign('login',$Login);
			$v->assign('ville',$ville);
			$v->assign('date',$date);
			$v->assign('avatar',$avatar);
			$v->assign('statut',$statut);


		  $userCom = commentaire::findBy("nom_user", $args['login'], "string");

		  
		   $v->assign('userCom',$userCom);
		         
         if ($userCom==true){

          $userCom = $userCom->getId_Article();
         
         
          $v->assign('userCom',$userCom);
          

         




        $commentaire = new commentaire();
	
		$commentaires = $commentaire->getAllBy(["nom_user"=>$args['login']],['id_article'=>'DESC'],"4");
		 $commentaires =  $commentaire->getId_Article();
		
	
		$v->assign("commentaires",$commentaires);

		

	

		


		 $articles = commentaire::findBy("nom_user", $args['login'], "string");	
		$v->assign('articles',$articles);
		
		
		



		$commentaire = new commentaire();
	
		$coms = $commentaire->getAllBy(["nom_user"=>$args['login']],['id'=>'DESC'],"4");
	
		$v->assign("coms",$coms);

			}



/*récupère lobjet membre en fonction du login*/

		
		$idMembre= $user->getId();

		$i = new interest();
	
		$interest = $i->getAllBy(["id_user"=>$idMembre],['id'=>'DESC'],"4");


	
		$v->assign("interest",$interest);


		



	

		}

	
           



		

	}


	public function updateProfilAction($args)
	{
		session_start();
		$v = new view();
		$v->setView("user/updateProfil");

			

		$var = implode ($args);

		$thisuser = new membre();
	    $tab= $thisuser->getOneBy(['id'=>$_SESSION['id']]);

	    $_SESSION['avatar'] = $tab['avatar'];
		$_SESSION['login'] = $tab['login'];
		$_SESSION['token'] = $tab['token'];
		$_SESSION['statut'] = $tab['statut'];
		$_SESSION['mail'] = $tab['mail'];
		$_SESSION['date_inscription'] = $tab['date_inscription'];
		$_SESSION['ville'] = $tab['ville'];


		$user = membre::findBy("login", $var, "string");
		

		if($user==false)
		{
			echo"cette page n'existe pas"; //si la page n'existe pas renvoie un message d'erreur
			//$v->setView("user/login");
		}else{


			$idUser = $user->getId();
			$Login = $user->getLogin();
			$ville = $user->getVille();
			$date = $user->getDateInscription();
			$mail = $user->getMail();
			$photo = $user->getAvatar();
		
			$v->assign('idUser',$idUser);
			$v->assign('login',$Login);
			$v->assign('ville',$ville);
			$v->assign('date',$date);
			$v->assign('mail',$mail);
			$v->assign('photo',$photo);



		}




		

	}

	public function uploadAction($args)
	{
		session_start();
		$v = new view();
		$v->setView("user/upload");



		

	}



public function dropAction($args)
	{
		session_start();
		$v = new view();
		$v->setView("user/drop");



		

	}




		public function resetPassAction($args)
 	{
		//session_start();
		//Nouvelle vue
		$v = new view();
 		$v->setView("user/resetPass");

 		$membre = new membre();
 
 		//Formulaire de commentaire
 		$form = $membre->getFormResetPass();
 		$error = [];
 
 		if($_SERVER["REQUEST_METHOD"] == "POST"){
 			$errors = validator::check($form["struct"], $args);
 
 			if(!filter_var($args['email'], FILTER_VALIDATE_EMAIL)){
 	            $error = TRUE;
 	            $msg_error .= "<li>Email invalide</li>";
 	        }
 
         	//Demander au serveur SQL toutes les informations en fonction de l'email
 			$membre = new membre();
 			$tab = $membre->getOneBy(['mail'=>$args['email']]);
 
 			//Si aucune information, identifiants not ok
 			if(empty($tab)){
 				$error = TRUE;
 				$msg_error .= "<li>Il n'existe aucun compte avec cet email</li>";
 			}else{
 				//création d'un mot de passe aléatoire
 				$chars = '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';
 				$pwd = '';
 				for ($i=0; $i<8; $i++) {
 					$pwd .= $chars{ mt_rand( 0, strlen($chars) - 1 ) };
 				}
 
 				//hashage du mot de passe
 				$pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
 
 				//var_dump($pwd);
 				//var_dump($pwdHash);die();
 
 				//on enregistre le nouveau mdp
 				$thisMembre = new membre();
 	         	$thisMembre->setId($tab['id']);
 	         	$thisMembre->setPass($pwdHash);
 	         	$thisMembre->save();
 
 				//envoie de remise à zéro du mot de passe
 	         	$email = new email();
 
 				//On renseigne le sujet et le message de l'email
 				$email->setSujet("Réinitialisation de votre mot de passe");
 				$email->setDestinataires($args['email']);
 				$email->setMessage("Bonjour ".$tab['login'].",<br />
 				Votre mot de passe a été réinitialisé.<br />
 				Voici votre nouveau mot de passe : ".$pwd."<br />
 				Vous pouvez ensuite le modifier en vous connectant et en accédant à votre espace utilisateur<br />
 				---------------<br />
 				Ceci est un mail automatique, Merci de ne pas y répondre");			
 				//envoie de l'email
 				$email->envoieEmail();
 			}
 
 			if($error == TRUE){
 	            echo "<ul>";
 	            echo $msg_error;
 	            echo "</ul>";


 		$v->assign("msg_error", $msg_error);
 	        }else{

 				$msg = 'Bonjour '.$tab['login'].', vous allé recevoir un email avec votre nouveau mot de passe';
 				$v->assign("msg", $msg);

 	        }
 
 		}
 
 		$v->assign("form", $form);
 		$v->assign("error", $error);
 		
 		
 	}



	

		
}
