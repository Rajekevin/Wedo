<?php

// require('lib/password.php');



class indexController{

	

	public function indexAction($args){
		
    
	    // Afficher les erreurs à l'écran
	    ini_set('display_errors', 1);
	    // Enregistrer les erreurs dans un fichier de log
	    ini_set('log_errors', 1);
	    // Nom du fichier qui enregistre les logs (attention aux droits à l'écriture)
	    ini_set('error_log', dirname(__file__) . '/log_error_php.txt');
	    
   
		$v = new view();
		$v->setView("indexIndex");


		

	}
}

	