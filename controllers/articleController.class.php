<?php

// require('lib/password.php');



class articleController{

	


	public function musculationAction($args){
		session_start();
		$v = new view();

		

		$var = implode ($args);
		$v->setView("article/article");


		

		$a = new article();
		$article = $a->getAllBy([],[],'');
		$v->assign('article',$article);
		

		//Creation d'un nouvelle article
		$article = new article();
		$thisArticle = $article->getOneBy(['title'=>$var]);
		$v->assign('thisArticle',$thisArticle);

		
	
		$a = new article();


		$title = article::findBy("title", $var, "string");
		

		if($title==false)
		{
			echo"cette page n'existe pas"; //si la page n'existe pas renvoie un message d'erreur
			//$v->setView("user/login");
		}else{


		$idArticle = $title->getId();
		
		$v->assign('idArticle',$idArticle );
		



}


		//Affichage des commentaires par article
		// $com = new commentaire();
		// $commentaires = $com->getAllBy([],['id'=>'DESC'],20);
		// $v->assign('commentaires', $commentaires);


		$var = [];



		// if (isset($_SESSION['login']))
	 //            { 
		//var_dump($test);
		//on récupère les pseudo et les avatars des utilisateurs qui ont commentés
		// foreach ($commentaires as $key => $value){
		// 	$us = new membre();
		// 	$users = $us->getOneBy(['id'=>$_SESSION['id']]);
		// 	$thisuser[$key]['photo'] = $users['photo'];
		// 	$thisuser[$key]['login'] = $users['login'];
		// }
		// $v->assign('thisuser', $thisuser);

// }


	// if($_SERVER["REQUEST_METHOD"] == "POST"){
		// if(isset($_POST['comm'])){


		
		// $errors = validator::check($form["struct"], $args);
		// $commentaire = new commentaire();
		// $commentaire->envoieCommentaire($thisArticle['id']);

	
		// }

	
		

		// $v->assign("form", $form);
		// $v->assign("errors", $errors);
		


		

	}



		public function allAction($args){
		session_start();
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

	

		

	





}
