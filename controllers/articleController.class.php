<?php

class articleController{

	public function indexAction($args){
		session_start();
		$v = new view();

		$var = implode ($args);
		$v->setView("article");


		
		//Creation d'un nouvelle article
		$article = new article();
		$thisArticle = $article->getOneBy(['url'=>$var]);
		$v->assign('thisArticle',$thisArticle);
		
		

		//Les derniers articles
		$lastArticle = $article->getAllBy([],['id'=>'DESC'],4);
		$v->assign('lastRemind', $lastArticle);

		//Affichage des commentaires par article
		$com = new commentaire();
		$commentaires = $com->getAllBy([],['id'=>'DESC'],20);
		$v->assign('commentaires', $commentaires);

	


		//Affichage des commentaires par article
		
		// $var = [];
		//var_dump($test);
		//on récupère les pseudo et les avatars des utilisateurs qui ont commentés
		// foreach ($commentaires as $key => $value) {
		// 	$us = new membre();
		// 	$users = $us->getOneBy(['id'=>$_SESSION['id']]);
		// 	$thisuser[$key]['photo'] = $users['photo'];
		// 	$thisuser[$key]['login'] = $users['login'];
		// }
		// $v->assign('thisuser', $thisuser);





		//Formulaire de commentaire
		// $form = $com->getForm();
		// $errors = [];
		

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		
		$errors = validator::check($form["struct"], $args);




}

	
	
	}
	

}