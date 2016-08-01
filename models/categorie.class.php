<?php
class categorie extends basesql{
	protected $id;
	protected $name;
	protected $description;
	
	//SETTERS
	public function setId($id){
		$this->id=$id;
	}
	public function setName($name){
		$this->name=trim($name);
	}
	public function setDescription($description){
		$this->description=trim($description);
	}

	//GETTERS
	public function getId(){
		return $this->id;
	}
	public function getName($Name){
		return $this->Name;
	}
	public function getDescription($description){
		return $this->description;
	}

	public function getForm(){
		return [	
					"options" => [
						"method"=>"POST",
						"action"=>"",
						"id"=>"contact",
						"name"=>"contact",
						"submit"=>"Envoyer"
						],
					"struct" => [
						"name"=>[ "label"=>"", "type"=>"text", "id"=>"name", "placeholder"=>"Votre nom", "required"=>"Votre nom", "msgerror"=>"name" ],
						"firstname"=>[ "label"=>"", "type"=>"text", "id"=>"firstname", "placeholder"=>"Votre prénom", "required"=>1, "msgerror"=>"firstname" ],
						"email"=>[ "label"=>"", "type"=>"text", "id"=>"email", "placeholder"=>"Votre email", "required"=>1, "msgerror"=>"passwordconfirm" ],
						"content"=>[ "label"=>"", "type"=>"textarea", "id"=>"content", "placeholder"=>"Votre message", "required"=>1, "msgerror"=>"contentpage" ]
					]
		];
	}
	
}