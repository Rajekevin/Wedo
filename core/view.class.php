<?php


class view{
	protected $data = [];
	protected $view;
	protected $template;

	public function setView($view, $layout="template"){
		// $view = indexIndex
		$path_view = "views/".$view.".php";
		$path_template = "views/".$layout.".php";

		if( file_exists($path_view) ){
			$this->view=$path_view;

		// 	$c = new categorie;
		// $categories = $c->getAllBy([],	["id"=>"ASC"],	12);
		
		// //var_dump($categories);
		// $form = $c->getForm();
		// $errors = [];


	

			if(file_exists($path_template)){
				$this->template=$path_template;
			}else{
				die("Le template n'existe pas");
			}

		}else{
			die("La vue n'existe pas");
		}
	}



	public function setViewBo($view, $layout="templateBo"){
		$path_view = "views/".$view.".php";
		$path_template = "views/".$layout.".php";
		if (file_exists($path_view)) {
			$this->view=$path_view;
			if (file_exists($path_template)) {



				$a = new connectes();
				$connectes = $a->getAllBy([],[],'');
				foreach ($connectes as $key => $value): 

				endforeach; 
				$this->assign('connectes', $connectes);
				$a->setIp($_SERVER['REMOTE_ADDR']);
				$a->setTimestamp(time());
				$a->save();

				$this->template=$path_template;
			}
			else{
				die("Erreur, le template n'existe pas");
			}
		}
		else{
			die("Erreur, la vue n'existe pas");
		}
	}


		public function setViewCo($view, $layout="CoTemplateBo"){
		$path_view = "views/".$view.".php";
		$path_template = "views/".$layout.".php";
		if (file_exists($path_view)) {
			$this->view=$path_view;
			if (file_exists($path_template)) {
				$this->template=$path_template;
			}
			else{
				die("Erreur, le template n'existe pas");
			}
		}
		else{
			die("Erreur, la vue n'existe pas");
		}
	}

	public function assign($key, $value){
		$this->data[$key]=$value;
	}

	public function __destruct(){
		extract($this->data);
		include $this->template;
	}


	public function createForm($form, $errors){
		global $errors_msg;
		include "views/form.php";
	}
	public function createFormSelect($form, $errors, $select){
		global $errors_msg;
		include "views/form.php";
	}
}



