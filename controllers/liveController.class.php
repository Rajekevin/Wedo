<?php

class liveController{

	public function indexAction($args){
		session_start();
		$v = new view();
		$v->setView("live");
	}
}