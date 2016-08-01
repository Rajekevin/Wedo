<?php 
class article extends basesql{

	protected $id;
	protected $id_user;
	protected $id_category;
	protected $title;
	protected $auteur;
	protected $description;
	protected $contenu;
	protected $img;
	protected $url;
	protected $date;
	

	public function __construct(){
		parent::__construct();
	}

		//SETTERS
	public function setId($id){
		$this->id=intval($id);
	}
	public function setIdUser($id_user){
		$this->id_user=$id_user;
	}
	
	public function setIdCategory($id_category){
		$this->id_category=$id_category;
	}
	public function setTitle($title){
		$this->title=trim($title);
	}
	
	public function setUrl($title){
		$this->url=str_replace(' ','-',trim($title));
	}
	public function setAuteur($auteur){
		$this->auteur=trim($auteur);
	}
	public function setDescription($description){
		$this->description=trim($description);
	}


	public function setContenu($contenu){
		$this->contenu=trim($contenu);
	}
	public function setImg($img){
		$this->img=$img;
	}
	public function setDate($date){
		$this->date=trim($date);
	}

	//GETTERS
	public function getId(){
		return $this->id;
	}
	public function getIdUser(){
		return $this->$id_user;
	}
	public function getIdCategory(){
		return $this->$id_category;
	}	
	public function getUrl(){
		return $this->url;
	}
	public function getTitle(){
		return $this->title;
	}
	public function getAuteur(){
		return $this->auteur;
	}
	public function getDescription(){
		return $this->description;
	}

	public function getContenu($contenu){
		$this->contenu=trim($contenu);
	}
	public function getImg(){
		return $this->$img;
	}
	public function getDate(){
		return $this->date;
	}



	public function getForm(){
		return [	
					"options" => [
						"method"=>"POST",
						"action"=>"",
						"id"=>"addArticleForm",
						"submit"=>"Ajouter"
						],
					"struct" => [
						"title"=>[ "label"=>"", "type"=>"text", "id"=>"title", "placeholder"=>"Titre", "required"=>1, "msgerror"=>"name" ],
						"category"=>[ "label"=>"category", "type"=>"select", "id"=>"category", "placeholder"=>"", "required"=>0, "msgerror"=>"auteur" ],
						"img"=>[ "label"=>"media", "type"=>"file", "id"=>"img", "placeholder"=>"", "required"=>1, "msgerror"=>"" ],
						"description"=>[ "label"=>"", "type"=>"textarea", "id"=>"description", "placeholder"=>"Votre message", "required"=>1, "msgerror"=>"contentpage" ]
					]
		];
	}

	

}