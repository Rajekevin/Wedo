<?php


class commentaire extends basesql{
	protected $id;
	protected $id_user;
	protected $nom_user;
	protected $commentaire;
	protected $date;
	protected $id_article;
	//SETTERS
	public function setId($id){
		$this->id=$id;
	}

	public function setNom_User($nom_user){
		$this->nom_user=trim($nom_user);
	}
	public function setid_User($id_user){
		$this->id_user=trim($id_user);
	}
	public function setCommentaire($commentaire){
		$this->commentaire=trim($commentaire);
	}
	public function setDate($date){
		$this->date=$date;
	}
	public function setID_Article($id_article){
		$this->id_article=$id_article;
	}
	//GETTERS
	public function getId(){
		return $this->id;
	}

	public function getNom_User(){
		return $this->nom_user;
	}
	public function getCommentaire(){
		return $this->commentaire;
	}
	public function getDate(){
		return $this->date;
	}
	public function getId_Article(){
		return $this->id_article;
	}
		public function getId_user(){
		return $this->id_user;
	}




	public function envoieCommentaire($idArticle){

		
		$id_user = $_SESSION['id'];
		$commentaire = $_POST["content"];
		$date = date("Y-m-d H:i:s");
		$comment = new commentaire();

		$comment-> setid_User($id_user);
	
     	$comment->setNom_User($_SESSION['login']);
     	$comment->setCommentaire(strip_tags($commentaire));
     	$comment->setDate($date);
     	
     	$comment->setID_Article($idArticle);
     	$comment->save();

     		$login = $_SESSION['login'];

     			
     		$email = new email();		

     		$monUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 	

     		$url = $monUrl;
			// //On renseigne le sujet et le message de l'email
			$email->setSujet("Un internaute à Commenté sur Wedo");
			 $email->setDestinataires('wedo.media.social@gmail.com');
			 $email->setMessage($login."<br/>vient de commenté <br/>".$commentaire."<br/>sur <br/>".$url);			
			// //envoie de l'email
			$email->envoieEmail();     	



	




	}


		public function getCommentaireForm(){

		return [	
				"options" => [
					"method"=>"POST",
					"id"=>"comm",
					"name"=>"comm",
					"action"=>"",
					"submit"=>"Je commente !"
					 ],
				"struct" => [
					"content"=>[ "label"=>"", "type"=>"textarea", "id"=>"content", "placeholder"=>"Votre message", "required"=>1, "msgerror"=>"contentpage" ],
					   
						
				]
		];

	}

}