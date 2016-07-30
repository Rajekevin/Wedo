<?php


class reglementController{

	public function indexAction($args){
		session_start();
		$v = new view();
		$v->setView("reglement");




		$page = new page();
		$pages = $page->getAllBy([],[],'');

		$v->assign('page',$pages);




			
				//Newsletter
	if(isset($_POST['newsletter'])){

			$news = new newsletter();			
			//On renseigne le sujet et le message de l'email
			$news->setSujet("Newsletter of Wedo");
			$news->setDestinataires($_POST['email']);
			$news->setMessage(file_get_contents('http://localhost/wedo/index/newsletter'));

			 			
			//envoie de l'email


			$news->envoieNewsletter();


			$news->setSubscribe($_POST['email']);
			if(isset($_SESSION['id'])){
			$news->setIdUser($_SESSION['id']);	
			}
			$news->save();
		}
	 if(isset($_POST['contact'])){





			$mail = new PHPMailer();

			


		
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'social.media.wedo@gmail.com';                 // SMTP username
			$mail->Password = 'wedoawesome';                           // SMTP password
			$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 465;                                    // TCP port to connect to
			 

			// Expéditeur
			$mail->setFrom($_POST['email']);
			$mail->addAddress('social.media.wedo@gmail.com');     // Add a recipient
			$mail->addReplyTo($_POST['email']);
			 
			$mail->isHTML(true);                                  // Set email format to HTML
			 // message
			$mail->Subject = "Contact WEDO";
			$mail->Body    = $_POST['content'];
			
			$mail->CharSet = "utf-8";
			  // Envoi du mail avec gestion des erreurs
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}





}
	}
}


