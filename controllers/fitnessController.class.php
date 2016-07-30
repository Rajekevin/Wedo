<?php



class fitnessController{

	public function indexAction($args){
		session_start();
		$v = new view();
		$v->setView("fitness");


		
		$var = implode ($args);

		$article = new article();
		$thisArticle = $article->getOneBy(['id'=>$var]);
		$v->assign('thisArticle',$thisArticle);
		
		

		//Les 3 derniers articles
		$lastArticle = $article->getAllBy([],['id'=>'DESC'],6);
		$v->assign('lastArticle', $lastArticle);




	}
}