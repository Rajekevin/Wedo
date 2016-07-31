<?php

// require('lib/password.php');



class userController{

	

	public function indexAction($args){
		
    //TODO		

	}



	public function subscribeAction($args) {

		session_start();


		 // Afficher les erreurs à l'écran
	    ini_set('display_errors', 1);
	    // Enregistrer les erreurs dans un fichier de log
	    ini_set('log_errors', 1);
	    // Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
	    ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
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
	        /*if(strlen($this->surname)<2){
	            $error = TRUE;
	            $msg_error .= "<li>Le prénom doit faire plus d'un caractère";
	        }
	        if( $this->name === $this->surname){
	            $error = TRUE;
	            $msg_error .= "<li>Le prénom doit être différent du nom";
	        }*/
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
	        /*if(! isset($ville[$args['pays']]) )
	        {
	            $error = TRUE;
	            $msg_error .= "<li>Votre ville n'existe pas";
	        }*/
	        /*if(!in_array($this->sexe, $sexe))
	        {
	            $error = TRUE;
	            $msg_error .= "<li>Le genre n'existe pas";
	        }*/

	        
	        //gestion du captcha

	       /* $code = strtoupper($code);
	        if( $code != $captcha ) 
	        {
	           $error = TRUE;
	           $msg_error .= "<li>Le code est incorrect";
	        }*/


	     



	      
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
	            echo "<ul>";
	            echo '<script type="text/javascript">window.alert("'.$msg_error.'");</script>';
	            echo "</ul>";
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
			// $membre->setVille($args['ville']);
			$membre->setDateInscription(date('Y-m-d H:i:s'));
			$membre->setActif($actif);
			// $membre->setMail($args['email']);

			$membre->setVille($args['ville']);
			$membre->setStatut($statut);

			
			// $membre->setAvatar($img);
			$membre->setToken();

			$membre->save();
			}

		

			//on récupère l'id de l'utilisateur

   //       	$thisuser = new membre();
			// $tab = $thisuser->getOneBy(['mail'=>$args['email']]);
   //       	//envoie de l'email de validation
   //          $email = new email();			
			// //On renseigne le sujet et le message de l'email
			// $email->setSujet("Validation de votre inscription");
			// $email->setDestinataires($args['email']);
			// $email->setMessage("Bienvenue sur WEDO,<br />
			// Pour activer votre compte, veuillez cliquer sur le lien ci dessous ou bien copier celui-ci dans l'url de votre navigateur. 
			// <br />

			// ".LINK."index/activerCompte?id=".$tab['id']."<br />

			// ---------------<br />
			// Ceci est un mail automatique, Merci de ne pas y répondre");			
			// //envoie de l'email
			// $email->envoieEmail();
   //      	echo 'Bienvenue '.$args['login'].', vous allez recevoir un email pour valider votre compte';
   //      	var_dump($tab['id']);

			}
		
		}
	}
}
