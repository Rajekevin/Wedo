<?php

require('lib/password.php');

class adminController{


	function indexAction($args){
		session_start();
		
				// Afficher les erreurs à l'écran
ini_set('display_errors', 1);
// Enregistrer les erreurs dans un fichier de log
ini_set('log_errors', 1);
// Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
// Afficher les erreurs et les avertissements

		 if(isset($_SESSION['id']) && isset($_SESSION['token']) && isset($_SESSION['statut']) && isset($_SESSION['login'])){
		 	
		 	if ($_SESSION['login'] && $_SESSION['statut']== 1) {
		 		
		 			
			 	$v = new view();
				$v -> setViewBo("admin");	
				$a = new commentaire();
				$commentaire = $a->getAllBy([],['id'=>'DESC'], 1);
				$v->assign('commentaire',$commentaire);
				//Compteur commentaire pour Stat BO
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



		/*On stocke dans une variable le timestamp qu'il était il y a 5 minutes :
		$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 min
			$removeCo = $a->getAllBy([],[],'');
 			foreach($removeCo as $key => $value): 
	
 			endforeach; 

			$connectes=new connectes();

			if($a->getTimestamp(time()) < $timestamp_5min ){
			$id->getId["id"];
 			$test = $connectes->remove(['id'=>$id]);*/

				$v->assign('connectes', $connectes);
				$a->setIp($_SERVER['REMOTE_ADDR']);
				$a->setTimestamp(time());
				$a->save();
		 	}else{
		 		echo "Vous n'êtes pas autorisé à accéder à cette section.";
		 		header("Location:".WEBROOT."index");
		 	}
		 }else{
		 	header("Location:".LINK."admin/index");
		 }
	}




	
	
/*Login Form For Back-Office*/


	public function connexionBoAction($args){

		session_start();
		echo "Admin";
		
		$v = new view();
		$v -> setViewCo("connexionbo");

				
			$error = FALSE;
			$msg_error= "Identifiants incorrects";
			if(isset($args['email']) AND isset($args['pass'])){
				
				
				$membre= new membre();
				$tab = $membre->getOneBy(['mail'=>$args['email']]);

				

				//Si aucune information, identifiants not ok
				if(empty($tab)){
					$error = TRUE;
				}else{				
					

		         	$membre->setMail($args['email']);	
		         	$membre->setStatut($args['statut']);	
									
								
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
		         	$membre->setToken();
		         	$membre->save();
		         
					//on déclare les variables session avec l'id et le token de l'user
		         	$_SESSION['id'] = $tab['id'];
		         	$_SESSION['login'] = $tab['login'];
					$_SESSION['token'] = $tab['token'];
		         	$_SESSION['statut'] = $tab['statut'];
					header('Location:'.LINK.'admin/index' );
				
		         
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


	

	public function articleListAction($args){
		session_start();

	 if (isset($_SESSION['login']))
	            { 
		$v = new view();
		$v->setViewBo("articlelist");
		
		/* List of articles */
		$a = new article();
		$article = $a->getAllBy([],['id'=>'DESC'],'');


		$v->assign('articlelist',$article);


	}
	else{echo"no no no"; }
		
}


public function removeArticleAction($args){
	 
		session_start();
		if (isset($_SESSION['login'])){ 
		
		$v = new view();
		$v->setViewBo("removeArticle");
		/* List of articles */
		$a = new article();
		$article = $a->getAllBy([],[],'');
		$v->assign('removeArticle',$article);
	}else{
		echo "Impossible d'accéder à cette page :(";
	}
}



	public function updateArticleAction($args){
		session_start();

	if (isset($_SESSION['login']))
	         { 
			$v = new view();
			$v->setViewBo("updateArticle");
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
			
	}

		public function createArticleAction($args){
		session_start();



	    
		if (isset($_SESSION['login'])){ 
		$var = implode ($args);
                            	
		$v = new view();
		$v->setViewBo("createArticle");
		/* List of articles */

		$a = new article();
		$article = $a->getAllBy([],[],'');

		$c = new categorie();
		$categorie = $c->getAllBy([],[],'');



		

		$articles= $a->getOneBy(["id"=>$var]);		
		$v->assign('articles',$articles);

	

		

		// $membre= new membre();
		// $tab = $membre->getOneBy(['mail'=>$args['email']]);

		// $_SESSION['id'] = $tab['id'];
		// $_SESSION['login'] = $tab['login'];
		// $_SESSION['token'] = $tab['token'];
		// $_SESSION['statut'] = $tab['statut'];

		

		$v->assign('createArticle',$article);
		$v->assign('categorie',$categorie);
	}else{
		echo "Impossible d'accéder à cette page";
	}
		
}

	public function addArticleAction($args){
		session_start();
		if (isset($_SESSION['login']))
                            { 
		$v = new view();
		$v->setViewBo("addArticle");
	}else{
		echo "Impossible d'accéder à cette page";
	}
}


//COMMENTAIRE

	public function commentaireListAction($args){
		session_start();

	 if (isset($_SESSION['login']))
	            { 
		$v = new view();
		$v->setViewBo("commentairelist");
		
		/* List of comment */
		$a = new commentaire();
		
		$commentaire = $a->getAllBy([],[],'');
		$v->assign('commentairelist',$commentaire);
	}
	else{echo"no no no"; }
		
	}

public function removeCommentaireAction($args){
	 
	session_start();
	 if (isset($_SESSION['login']))
                            { 
		
		$v = new view();
		$v->setViewBo("removecommentaire");
		/* List of articles */
		$a = new commentaire();
		$commentaire = $a->getAllBy([],[],'');
		$v->assign('removeCommentaire',$commentaire);
	}else{
		echo "Impossible d'accéder à cette page :(";
	}
}



	public function updateCommentaireAction($args){
		session_start();

	if (isset($_SESSION['login']))
         { 
		$v = new view();
		$v->setViewBo("updateCommentaire");
		/* List of articles */

		$a = new article();
		$article = $a->getAllBy([],[],'');
		$v->assign('updateCommentaire',$article);
	}else{
		echo"Impossible d'accéder à cette page";
	}
		
}

	public function createCommentaireAction($args){
		session_start();
	if (isset($_SESSION['login']))
                            { 
		$v = new view();
		$v->setViewBo("createCommentaire");
		/* List of articles */

		$a = new article();
		$article = $a->getAllBy([],[],'');
		$v->assign('createCommentaire',$article);
	}else{
		echo "Impossible d'accéder à cette page";
	}
		
}

	public function addCommentaireAction($args){
		session_start();
		if (isset($_SESSION['login']))
                            { 
		$v = new view();
		$v->setViewBo("addCommentaire");
	}else{
		echo "Impossible d'accéder à cette page";
	}
}
//End Commentaire

	public function userListAction($args){
		session_start();
	if (isset($_SESSION['login']))
              { 
		$v = new view();
		$v->setViewBo("userlist");

		$membre = new membre();
		$membre= $membre->getAllBy([],[],'');

		$v->assign('userlist',$membre);
		}else{
			echo "Impossible d'accéder à cette page";
		}
	}

	public function createUserAction($args){
		session_start();



	if (isset($_SESSION['login']))
	         { 
			$v = new view();
			$v->setViewBo("createUser");

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

	if (isset($_SESSION['login']))
           { 
		$v = new view();
		$v->setViewBo("removeuser");

		$membre = new membre();
		$membre= $membre->getAllBy([],[],'');

		$v->assign('removeuser',$membre);
	}else{
		echo"Impossible d'accéder à la page";
	}
		
}

	public function updateUserAction($args){

		session_start();
	if (isset($_SESSION['login']))
                    { 
		
		$v = new view();
		$v->setViewBo("updateUser");

		$membre = new membre();
		$membre= $membre->getAllBy([],[],'');

		$v->assign('updateuser',$membre);
	}
	else{
		echo"Impossible d'accéder à la page"; 
	}
		
}


	public function addUserAction($args){

	if (isset($_SESSION['login']))
                    { 
		session_start();
		$v = new view();
		$v->setViewBo("addUser");
	}else{
		echo "Impossible d'accéder à la page";
	}
}



	/*PAGE*/

	public function createPageAction($args){

		session_start();
	if (isset($_SESSION['login']))
            { 
		$v = new view();
		$v->setViewBo("createPage");


		$var = implode ($args);
		/* List of articles */

		$p = new page();
		$pages= $p->getAllBy([],[],'');
		$v->assign('createPage',$pages);



		$page= new page();
		$thisPage = $page->getOneBy(['id'=>$var]);
		$v->assign('thisPage',$thisPage);




		$pages= $page->getOneBy(["id"=>$var]);

		
		$v->assign('pages',$pages);

	}else{
		echo "Impossible d'accéder à la page";
	}
}


	public function profilAction($args){
	if (isset($_SESSION['login'])){ 
		session_start();
		$v = new view();
		$v->setViewBo("profil");
	}else{
		echo "Impossible d'accéder à la page";
	}
}
	public function modifMenuAction($args){
		session_start();
	if (isset($_SESSION['login']))
                    { 
		$v = new view();
		$v->setViewBo("modifMenu");
	}else{
		echo "Impossible d'accéder à la page";
	}
}
	public function modifFooterAction($args){
		session_start();

	if (isset($_SESSION['login']))
              { 
		$v = new view();
		$v->setViewBo("modifFooter");
	}else{
		echo "Impossible d'accéder à la page";
	}
}



	public function Flux_RSSAction($args){
		session_start();

	if (isset($_SESSION['login']))
           { 
		$v = new view();
		$v->setViewBo("Flux_RSS");

		$file = "WEDO Rss feeds";

		$v ->assign('hello', $file);
	}
	else{
		echo "Impossible d'accéder à la page"; 
	}
}

	public function themeCustomAction($args){
		session_start();

		$tO = new themeCustom();

        $v = new view();
		$v->setViewBo("themeCustom");
		
		/* Mise à jour du footer */
		$footerForm = $tO->getFooterForm();
		$footerErrors = [];

		if($_SERVER["REQUEST_METHOD"] == "POST"){
		}

		$v->assign('footerForm',$footerForm);
		$v->assign('footerErrors',$footerErrors);

		/*Mise à jour logo */
		$logoForm = $tO->getLogoForm();
		$logoErrors = [];

		$v->assign('logoForm',$logoForm);
		$v->assign('logoErrors',$logoErrors);

		/*Mise à jour Header */
		$headerForm = $tO->getHeaderForm();
		$headerErrors = [];

		$v->assign('headerForm',$headerForm);
		$v->assign('headerErrors',$headerErrors);

		/*Mise à jour des infos du site */
		$websiteInfoForm = $tO->getWebsiteInfoForm();
		$websiteInfoErrors = [];

		$v->assign('websiteInfoForm',$websiteInfoForm);
		$v->assign('websiteInfoErrors',$websiteInfoErrors);

		/*Mise à jour Header */
		$headerForm = $tO->getHeaderForm();
		$headerErrors = [];

		$v->assign('headerForm',$headerForm);
		$v->assign('headerErrors',$headerErrors);
	}







	public function updateReglementAction($args){

		session_start();
		if (isset($_SESSION['login']))
	                    { 
			
			$v = new view();
			$v->setViewBo("updateReglement");

			$page= new page();
			$pages= $page->getAllBy([],[],'');

			$v->assign('updateReglement',$pages);
		}
		else{
			echo"Impossible d'accéder à la page"; 
		}
			
	}


	public function mesArticlesAction($args){

		session_start();
		if (isset($_SESSION['login']))
	                    { 
			
			$v = new view();
			$v->setViewBo("mesArticles");

			$article = new article();
	
			$articles = $article->getAllBy(["id_user"=>$_SESSION['id']],['id'=>'DESC'],"");
			
			$v->assign("articles",$articles);
		}
		else{
			echo"Impossible d'accéder à la page"; 
		}
			
	}
	
}