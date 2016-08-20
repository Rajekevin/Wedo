<?php
class connectes extends basesql{
	protected $id;
	protected $ip;
	protected $timestamp;
	
	

	//SETTERS

	public function setId($id){
		$this->id=intval($id);


	}
	public function setIp($ip){
		$this->ip=$_SERVER['REMOTE_ADDR'];
	}
	public function setTimestamp($timestamp){
		$this->timestamp=time();
	}
	
	//GETTERS

	public function getId($id){
		return $this->$id;
	}
	public function getIp($ip){
		return $this->$ip;
	}
	public function getTimestamp($timestamp){


		return $this->$timestamp;
	}


}