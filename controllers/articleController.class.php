<?php
class articleController

{
	public function indexAction($args)
	{
		session_start();

			    // Afficher les erreurs à l'écran
	    ini_set('display_errors', 1);
	    // Enregistrer les erreurs dans un fichier de log
	    ini_set('log_errors', 1);
	    // Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
	    ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
	    
	
		$v = new view();
		
		$var = implode ($args);
		$v->setView("article/article");


		
		$a = new article();
		$article = $a->getAllBy([],[],'');
		$v->assign('article',$article);
			$monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  
		//Affichage de l'article demandé
		$article = new article();
		$thisArticle = $article->getOneBy(['url'=>$monUrl]);
		$v->assign('thisArticle',$thisArticle);
		
	
		$a = new article();
	
		$url = article::findBy("url", $monUrl, "string");
			
		if($url==false)
		{
			echo"cette page n'existe pas"; //si la page n'existe pas renvoie un message d'erreur
			//$v->setView("user/login");
		}else{
		$idArticle = $url->getId();

		
		$v->assign('idArticle',$idArticle );
/*like*/
		$interest = new interest();		
		$theseLikes = $interest->getAllBy(['id_article'=>$idArticle],['id'=>'DESC'],'');
		/*nbre de j'aime*/
		$nbOfLikes = count($theseLikes);		
		$v->assign('theseLikes',$theseLikes);	
		$v->assign('nbOfLikes',$nbOfLikes);
		// $v->assign("formLike",$formLike);
		
		
}
		$a = new article();
		$url= article::findBy("url", $monUrl, "string");
		
		if($url==false)
		{
			echo"cette page n'existe pas"; //si la page n'existe pas renvoie un message d'erreur
			//$v->setView("user/login");
		}else{
		$idArticle = $url->getId();
		
		$v->assign('idArticle',$idArticle );
	}
		//Affichage des commentaires par article
		$com = new commentaire();
		$commentaires = $com->getAllBy([],['id'=>'DESC'],20);
		$v->assign('commentaires', $commentaires);
		$var = [];
		if (isset($_SESSION['login']))
	            { 
		
		//on récupère les pseudo et les avatars des utilisateurs qui ont commentés
		foreach ($commentaires as $key => $value){
			$us = new membre();
			$users = $us->getOneBy(['id'=>$_SESSION['id']]);
			$thisuser[$key]['avatar'] = $users['avatar'];
			$thisuser[$key]['login'] = $users['login'];
		}
		$v->assign('thisuser', $thisuser);
}
	//Formulaire de commentaire
		$form = $com->getCommentaireForm();
		$errors = [];

	
	

		if(isset($_POST['comm']) ) {
			$trimmed = trim($_POST['content']);

			if ($trimmed==true){
				# code...
			
			

			var_dump($_POST['content']);
		$errors = validator::check($form["struct"], $args);
		$commentaire = new commentaire();
		$commentaire->envoieCommentaire($_POST['idArticle']);
			$sendCommentaire= "Votre commentaire vient d'être envoyé. Rappelez-vous que tous commentaires ne respectant pas la chartre du site pourra faire
		l'objet d'une sanction ;(";
		$v->assign ("sendCommentaire", $sendCommentaire);

	}else{

		$msg = 'HOP HOP.....Nourrisez-moi, je suis en période de prise de masse :(';
		$v->assign ("msg", $msg);
	}
	
		}


	
	
		
		$v->assign("form", $form);
		$v->assign("errors", $errors);

	}








		public function allAction($args){
		session_start();

		    
	    // Afficher les erreurs à l'écran
	    ini_set('display_errors', 1);
	    // Enregistrer les erreurs dans un fichier de log
	    ini_set('log_errors', 1);
	    // Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
	    ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
	    
		$v = new view();
		
		$var = implode ($args);
		$v->setView("article/articlelist");
		
		$a = new article();
		// $article = $a->getAllBy(["id_category"=>1],["id"=>"DESC"],3);
		$article = $a->getAllBy([],["id"=>"DESC"],3);
		$v->assign('articlelist',$article);
		$c = new categorie();
		//On cherche tous les catégories
		$categorie = $c->getAllBy([],['id'=>'ASC'],'');
		
		$idCategorie = Article::findBy("id_category",$a->getIdCategory(),"int");
		
		//on récupère tous les 4 derniers articles en fonction de chaque catégorie
		$articles = $a->getAllBy(['id_category' => $c->getId()], ['id' => 'DESC'] ,'');
		// $articles = $a->getAllBy(['id_category' => 1], ['id' => 'DESC', 'LIMIT' => '4'] ,'');
	
		$v->assign('categorielist',$categorie);
		// $v->assign('articles',$articles);
		
		
	
	
		
	}



	public function ratingAction($args){
		session_start();
		$v = new view();
		
		$monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];  
		$v->setView("article/rating");
		$var = implode ($args);
		$a = new article();
		$url = article::findBy("url", $monUrl, "string");
		
		// $idArticle = $title->getId();
		
		// $v->assign('idArticle',$idArticle );
	
	
		
	
}




public function showAction($args)
	{
	session_start();
		$v = new view();
		
		$var = implode ($args);
		$v->setView("article/show");
		
		$c = new categorie();
		$categorielist = $c->getAllBy([],[],'');
		$thisCat = $c->getOneBy(['name'=>$var]);
		
	
		
	
		
		$title = categorie::findBy("name", $args[0], "string");
		
		if($title==false)
		{
			echo"cette page n'existe pas"; //si la page n'existe pas renvoie un message d'erreur
			//$v->setView("user/login");
		}else{
		$idCat = $title->getId();
		echo $idCat;
		
		$v->assign('idCat',$idCat );
		$a = new article();
		//on récupère tous les 4 derniers articles en fonction de chaque catégorie
		$articles = $a->getAllBy(['id_category' => $idCat], ['id' => 'DESC'] ,'');
		$v->assign('articles',$articles);

		
		
		}

	}
}
