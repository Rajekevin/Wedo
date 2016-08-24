<?php

// require('lib/password.php');



class adminController{

	

	public function indexAction($args){
		session_start();

		echo"Vous n'avez pas accès à cette partie";

	if(isset($_SESSION['id']) && isset($_SESSION['token']) && isset($_SESSION['statut']) && isset($_SESSION['login'])){

		echo"VOUS NAVEZ PAS ACCES";
		 	
		 	if ($_SESSION['login'] && $_SESSION['statut']== 1) {

		 		 	


		 		$v = new view();
				$v -> setViewBo("admin/admin");	

				
				$a = new commentaire();
				$commentaire = $a->getAllBy([],['id'=>'DESC'], 1);
				$v->assign('commentaire',$commentaire);
				// //Compteur commentaire pour Stat BO
				$commentaires = $a->getAllBy([],[], '');
				$v->assign('commentaires',$commentaires);




				//Compteur d'articles pour stat BO
				$a = new article();
				$articles = $a->getAllBy([],[],'');
				$v->assign('articles', $articles);
				//Compteur d'utilisateur pour stat BO
				$a = new membre();
				$users = $a->getAllBy([],[],'');
				$v->assign('users', $users);	
				// $a = new connectes();
				$a = new connectes();
				$connectes = $a->getAllBy([],[],'');
				foreach ($connectes as $key => $value): 

				endforeach; 
		 		
		 			
		


		 	}else{
		 		echo "Vous n'êtes pas autorisé à accéder à cette section.";
		 		header("Location:".WEBROOT."index");
		 	}	
  

	}
}





	/*Login Form For Back-Office*/


	public function loginAction($args){



		session_start();
		

	 if (isset($_SESSION['login']))
	            { 
		
		$v = new view();
		$v -> setViewCo("admin/login");

			

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

			

			}else{

				echo "TATATA Tu n'est pas invité pour le moment, un jour peu-être ... qui sait ?";
			}



		}/*exit*/





		public function articleListAction($args){
		session_start();

	 	if (isset($_SESSION['login'])&&($_SESSION['statut'])==1)
	            { 
		$v = new view();
		$v->setViewBo("admin/article/articlelist");
		
		/* List of articles */
		$a = new article();
		$article = $a->getAllBy([],['id'=>'DESC'],'');


		$v->assign('articlelist',$article);


	}
	else{echo"no no no"; }
		
	}/*exit*/





	public function removeArticleAction($args){
	 
			session_start();
			if (isset($_SESSION['login'])&&($_SESSION['statut']==1) ){ 
			
			$v = new view();
			$v->setViewBo("admin/article/removeArticle");
			/* List of articles */
			$a = new article();
			$article = $a->getAllBy([],[],'');
			$v->assign('removeArticle',$article);
		}else{
			echo "Impossible d'accéder à cette page :(";
		}
	}/*exit*/


	public function updateArticleAction($args){
		session_start();

	if (isset($_SESSION['login'])&&($_SESSION['statut']==1)   )
	         { 
			$v = new view();
			$v->setViewBo("admin/article/updateArticle");
			/* List of articles */

			$a = new article();
			$article = $a->getAllBy([],[],'');
			$v->assign('updateArticle',$article);

			$c = new categorie();
		    $categorie = $c->getAllBy([],[],'');

			$v->assign('categorie',$categorie);
		}else{
			echo"Impossible d'accéder à cette page";
		}
			
	}/*exit*/



		public function createArticleAction($args){
		session_start();

	    // Afficher les erreurs à l'écran
	    ini_set('display_errors', 1);
	    // Enregistrer les erreurs dans un fichier de log
	    ini_set('log_errors', 1);
	    // Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
	    ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
		
	    
		if (isset($_SESSION['login'])&&($_SESSION['statut']==1)   ){ 
		$var = implode ($args);

	
                            	
		$v = new view();
		$v->setViewBo("admin/article/createArticle");
				/* List of articles */

		$a = new article();
		$article = $a->getAllBy([],[],'');

		$c = new categorie();
		$categorie = $c->getAllBy([],[],'');		

		// $articles= $a->getOneBy(["id"=>$var]);		
		// $v->assign('articles',$articles);

		

		$v->assign('createArticle',$article);
		$v->assign('categorie',$categorie);



		
		
	}else{
		echo "Impossible d'accéder à cette page";
	}
		
}/*exit*/





	public function mesArticlesAction($args){

		session_start();
		if (isset($_SESSION['login'])&&($_SESSION['statut']==1)  )
	                    { 
			
			$v = new view();
			$v->setViewBo("admin/article/mesArticles");

			$article = new article();
	
			$articles = $article->getAllBy(["id_user"=>$_SESSION['id']],['id'=>'DESC'],"");
			
			$v->assign("articles",$articles);
		}
		else{
			echo"Impossible d'accéder à la page"; 
		}
			
	}/*exit*/





/*categorie*/



	public function categorieAction($args){
		session_start();

	 	if (isset($_SESSION['login'])&&($_SESSION['statut'])==1)
	            { 
		$v = new view();
		$v->setViewBo("admin/categorie/categorielist");
		
		/* List of categorie */
		$c = new categorie();
		$categorie = $c->getAllBy([],['id'=>'ASC'],'');




		$v->assign('categorielist',$categorie);


	}
	else{echo"no no no"; }
		
	}/*exit*/




	public function createCategorieAction($args){
		session_start();

	 	if (isset($_SESSION['login'])&&($_SESSION['statut'])==1)
	            { 
		$v = new view();
		$v->setViewBo("admin/categorie/createCategorie");
		
		/* List of articles */
		$c = new categorie();
		$categorie = $c->getAllBy([],['id'=>'DESC'],'');


		$v->assign('categorielist',$categorie);





	}
	else{echo"no no no"; }
		
	}/*exit*/


	public function updateCategorieAction($args){
		session_start();

	 	if (isset($_SESSION['login'])&&($_SESSION['statut'])==1)
	            { 
		$v = new view();
		$v->setViewBo("admin/categorie/updateCategorie");
		
		/* List of articles */
		$c = new categorie();
		$categorie = $c->getAllBy([],['id'=>'DESC'],'');


		$v->assign('updatecategorie',$categorie);


		  


	}
	else{echo"no no no"; }
		
	}/*exit*/




		public function removeCategorieAction($args){
		session_start();


		    // Afficher les erreurs à l'écran
	    ini_set('display_errors', 1);
	    // Enregistrer les erreurs dans un fichier de log
	    ini_set('log_errors', 1);
	    // Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
	    ini_set('error_log', dirname(__file__) . '/log_error_php.txt');

	 	if (isset($_SESSION['login'])&&($_SESSION['statut'])==1)
	            { 
		$v = new view();
		$v->setViewBo("admin/categorie/removeCategorie");
		
		/* List of categorie */
		$c = new categorie();
		$categorie = $c->getAllBy([],[],'');


		$v->assign('removeCategorie',$categorie);





		  


	}
	else{echo"no no no"; }
		
	}/*exit*/






	/*USER*/



		public function userListAction($args){
		session_start();
	if (isset($_SESSION['login']) &&($_SESSION['statut'])==1)
              { 
		$v = new view();
		$v->setViewBo("admin/user/userlist");

		$membre = new membre();
		$membre= $membre->getAllBy([],[],'');

		$v->assign('userlist',$membre);
		}else{
			echo "Impossible d'accéder à cette page";
		}
	}

	public function createUserAction($args){
		session_start();



	if (isset($_SESSION['login']) &&($_SESSION['statut'])==1)
	         { 
			$v = new view();
			$v->setViewBo("admin/user/createUser");

			$pays = ["fr"=>"France", "gb"=>"England", "es"=>"Spanish", "it"=>"Italy"];

			 $sexe = [0=>"homme", 1=>"femme"];  
		  

			$membre = new membre();
			$membre= $membre->getAllBy([],[],'');

			$v->assign("pays",$pays);
			$v->assign('createuser',$membre);
			$v->assign("sexe",$sexe);

			 
		}else{
			echo "Impossible d'accéder à cette page";
		}		
	}


	public function removeUserAction($args){
		session_start();

	if (isset($_SESSION['login']) &&($_SESSION['statut'])==1)
           { 
		$v = new view();
		$v->setViewBo("admin/user/removeuser");

		$membre = new membre();
		$membre= $membre->getAllBy([],[],'');

		$v->assign('removeuser',$membre);
	}else{
		echo"Impossible d'accéder à la page";
	}
		
}

	public function updateUserAction($args){

		session_start();
	if (isset($_SESSION['login']  ) &&($_SESSION['statut'])==1    )
                    { 
		
		$v = new view();
		$v->setViewBo("admin/user/updateUser");

		$membre = new membre();
		$membre= $membre->getAllBy([],[],'');

		$v->assign('updateuser',$membre);
	}
	else{
		echo"Impossible d'accéder à la page"; 
	}






		
}


public function commentaireListAction($args){
		session_start();

	 if (isset($_SESSION['login']))
	            { 

   // Afficher les erreurs à l'écran
	    ini_set('display_errors', 1);
	    // Enregistrer les erreurs dans un fichier de log
	    ini_set('log_errors', 1);
	    // Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
	    ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
	            	
		$v = new view();
		$v->setViewBo("admin/commentaire/commentairelist");
		
		/* List of comment */
		$a = new commentaire();
		
		$commentaire = $a->getAllBy([],['id'=>'DESC'],'');
		$v->assign('commentairelist',$commentaire);
	}
	else{echo"no no no"; }
		
	}


	public function removeCommentaireAction($args){
	 
	session_start();
	 if (isset($_SESSION['login']))
                            { 
		
		$v = new view();
		$v->setViewBo("admin/commentaire/removecommentaire");
		/* List of articles */
		$a = new commentaire();
		$commentaire = $a->getAllBy([],[],'');
		$v->assign('removeCommentaire',$commentaire);
	}else{
		echo "Impossible d'accéder à cette page :(";
	}
}


public function updateReglementAction($args){

		session_start();
		if (isset($_SESSION['login']))
	                    { 
			
			$v = new view();
			$v->setViewBo("admin/options/updateReglement");

			$page= new page();
			$pages= $page->getAllBy([],[],'');

			$v->assign('updateReglement',$pages);
		}
		else{
			echo"Impossible d'accéder à la page"; 
		}
			
	}












}