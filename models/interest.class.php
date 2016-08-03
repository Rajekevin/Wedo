<?php
class Interest extends basesql{

	protected $id;
	protected $id_user;
	protected $id_article;
	protected $date;


	//SETTERS
	public function setId($id){
		$this->id=$id;
	}

	public function setIdUser($id_user){
		$this->id_user=$id_user;
	}
	
	public function setIdArticle($id_article){
		$this->id_article=$id_article;
	}
	public function setDate($date){
		$this->date=trim($date);
	}

	//GETTERS
	public function getId(){
		return $this->$id;
	}

	public function getIdUser(){
		return $this->$id_user;
	}

	public function getIdArticle(){
		return $this->$id_article;
	}
	public function getDate(){
		return $this->date;
	}	


	public function getLikeForm(){

		return [	
					"options" => [
						"method"=>"POST",
						"action"=>"",
						"id"=>"likeForm",
						"submit"=>"like"
						],
					"struct" => [ ]
		];

	}

	public function getUnlikeForm(){

		return [	
					"options" => [
						"method"=>"POST",
						"action"=>"",
						"id"=>"unlikeForm",
						"submit"=>"unlike"
						],
					"struct" => [	]
		];

	}

}