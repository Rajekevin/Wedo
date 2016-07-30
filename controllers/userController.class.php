<?php

// require('lib/password.php');



class userController{

	

	public function indexAction($args){
		
    //TODO		

	}



	public function subscribeAction($args) {
		$v = new view();
		$v->setView("user/subscribe");
	}
}
