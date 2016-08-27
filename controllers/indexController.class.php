<?php

// require('lib/password.php');



class indexController{

	

	public function indexAction($args){
		session_start();
		
    
	    // Afficher les erreurs à l'écran
	    ini_set('display_errors', 1);
	    // Enregistrer les erreurs dans un fichier de log
	    ini_set('log_errors', 1);
	    // Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
	    ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
	    
   
		$v = new view();
		$v->setView("indexIndex");




		$a = new article();

		$v->assign('a',$a);
		// $article = $a->getAllBy(["id_category"=>1],["id"=>"DESC"],3);

		$article = $a->getAllBy([],["id"=>"DESC"],3);

		



	
		$v->assign('articlelist',$article);

		$c = new categorie();

		$v->assign('c',$c);


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

	