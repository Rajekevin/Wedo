<?php


class reglementController{

	public function indexAction($args){
		session_start();
		$v = new view();
		$v->setView("Mentions/reglement");




		$page = new page();
		$pages = $page->getAllBy([],[],'');

		$v->assign('page',$pages);




			







	}
}


