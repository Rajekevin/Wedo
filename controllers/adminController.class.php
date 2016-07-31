<?php

// require('lib/password.php');



class adminController{

	

	public function indexAction($args){
		session_start();

		echo"Vous n'avez pas accès à cette partie";

	if(isset($_SESSION['id']) && isset($_SESSION['token']) && isset($_SESSION['statut']) && isset($_SESSION['login'])){

		echo"VOUS NAVEZ PAS ACCES";
		 	
		 	if ($_SESSION['login'] && $_SESSION['statut']== 1) {

		 		 	header('Location:'.LINK.'admin/index' );
		 		
		 			
		


		 	}else{
		 		echo "Vous n'êtes pas autorisé à accéder à cette section.";
		 		header("Location:".WEBROOT."index");
		 	}	
  

	}
}





	/*Login Form For Back-Office*/


	public function loginAction($args){



		session_start();
		echo"Vous n'avez pas accès à cette partie";
		
		$v = new view();
		$v -> setViewCo("admin/login");

			var_dump($args);

	        $error = FALSE;
			$msg_error= "Identifiants incorrects";
			if(isset($args['email']) AND isset($args['pass'])){//verifie le mail + pwd sinon erreur
				
				
				$membre= new membre();
				$tab = $membre->getOneBy(['mail'=>$args['email']]);

				

				if(empty($tab)){//si aucune info 
					$error = TRUE;// affiche erreur
				}else{				
					

		         	$membre->setMail($args['email']);	
		         	//$membre->setStatut($args['statut']);	
									
								
					if (!password_verify($args['pass'], $tab['pass'])) {
					    $error = TRUE;
					}					

					if($tab['statut']==2)
					{
						$error = TRUE;
					}						

					
				}

				if($error == TRUE){
		            echo "<ul>";
		            echo $msg_error;
		            echo "</ul>";
		        }else{		         	
		         	
					//$membre->setId($args['id']);
		   //       	$membre->setToken();
		   //       	$membre->save();
		         
					// //on déclare les variables session avec l'id et le token de l'user
		   //       	$_SESSION['id'] = $tab['id'];
		   //       	$_SESSION['login'] = $tab['login'];
					// $_SESSION['token'] = $tab['token'];
		   //       	$_SESSION['statut'] = $tab['statut'];
					header('Location:'.LINK.'admin/index' );
				 echo "MDR";
		         
		        	echo 'Welcome '.$args['email'].', vous êtes désormais connecté';

		        }

	            
	          

			
			}

			/*exit*/
		}


}