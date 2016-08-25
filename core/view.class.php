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

	 if(isset($_POST['contact'])){


require('lib/PHPMailer/class.smtp.php'); 
require('lib/PHPMailer/class.phpmailer.php');

			$mail = new PHPMailer();

			


		
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'wedo.media.social@gmail.com';                 // SMTP username
			$mail->Password = 'wedoawesome95';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                    // TCP port to connect to
			 

			// Expéditeur
			$mail->setFrom($_POST['email']);
			$mail->addAddress('wedo.media.social@gmail.com');     // Add a recipient
			$mail->addReplyTo($_POST['email']);
			 
			$mail->isHTML(true);                                  // Set email format to HTML
			 // message
			$mail->Subject = "Contact WEDO";
			$mail->Body    = $_POST['content'];
			
			$mail->CharSet = "utf-8";
			  // Envoi du mail avec gestion des erreurs
			if(!$mail->send()) {
			    // echo 'Message could not be sent.';
			    // echo 'Mailer Error: ' . $mail->ErrorInfo;
			    $error = TRUE;
	            $msg_error = "Votre message ne peut pas être envoyé";
	            // $msg_error .= 'Mailer Error: ' . $mail->ErrorInfo;

		        $this->assign('error',$error);
			    $this->assign('msg_error',$msg_error);
	        
			} else {
				$send = TRUE;
				$msg_send = "Votre message a été envoyé";
			    // echo 'Message has been sent';

			    $this->assign('send',$send);
			    $this->assign('msg_send',$msg_send);
			}





}
		

			
	
			// $this->assign("form", $form);
			// $this->assign("errors", $errors);


	

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



				// $a = new connectes();
				// $a->setIp($_SERVER['REMOTE_ADDR']);
				// $a->setTimestamp(time());
				
				// $connectes = $a->getAllBy([],[],'');
				// foreach ($connectes as $key => $value): 

				// endforeach; 
				// $this->assign('connectes', $connectes);
			
				// $a->save();
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



