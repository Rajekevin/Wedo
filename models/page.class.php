<?php
class page extends basesql{
	protected $id;
	protected $title;
	protected $contenu;


	
	//SETTERS
	public function setId($id){
		$this->id=$id;
	}
	public function setTitle($title){
		$this->$title=trim($title);
	}
	public function setContenu($contenu){
		$this->contenu=trim($contenu);
	}

	//GETTERS
	public function getId($id){
		return $this->$id;
	}
	public function getTitle($title){
		return $this->title;
	}
	public function getContenu($contenu){
		return $this->contenu;
	}




	
}