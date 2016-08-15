<?php

error_reporting(-1);
class basesql{

	private $table;
	private $pdo;
	private $columns = [];

	public function __construct(){
		$this->table = get_called_class();
		$dsn = 'mysql:dbname='.BDD_DBNAME.';host='.BDD_HOST;

		try{
			$this->pdo = new PDO($dsn,BDD_USER,BDD_PWD);
		}catch(Exception $e){
			die("Erreur SQL : ".$e->getMessage());
		}

		$all_vars = get_object_vars($this);
		$class_vars = get_class_vars(get_class());
		$this->columns = array_keys(array_diff_key($all_vars, $class_vars));
	}

	public function save(){


	//UPDATE

	if (is_numeric($this->id)) {


			//UPDATE
			$sql = "UPDATE ".$this->table.
				" SET";
			$i = 0;


			foreach ($this->columns as $column) {

				if (isset($this->$column) && $column != 'id') {

					$sql .= ($i == 0)?' ':' ,';
					$sql .= $column." = :".$column;
					$data[$column] = $this->$column;
					$i++;
				}
			}
			$sql .= " WHERE id = ".$this->id;

			//var_dump($sql);
			$query = $this->pdo->prepare($sql);
			$query->execute($data);


			//var_dump($data); test update
			return $query->fetch();





		}


			// $query->execute(array(
			// 					'title' => $_POST['title'],
			// 					'description' => $_POST['description'],
			// 					'auteur' => $_POST['auteur']

			// 				));







		else{

			//INSERT
			$sql = "INSERT INTO ".$this->table." (".implode(",", $this->columns).")
					VALUES (:".implode(",:", $this->columns).")";

			$query = $this->pdo->prepare($sql);

			foreach ($this->columns as $column) {
				$data[$column] = $this->$column;
			}
			$query->execute($data);

			

		}
	}

	// public function update($condition){

		// echo "UPDAT";


		// $sql = "UPDATE ".$this->table;

		// 	$sql.=" SET";


		// 	$sql .= " AND ";
		// 	$sql .="WHERE id = ".$this->id;

		// $query = $this->pdo->prepare($sql);
		// $query->execute($condition);

		// return $query->fetch();
		// var_dump($query);


	// }

	public function update(){



	}





	function getOneBy($condition){

		$sql = "SELECT * FROM ".$this->table;
		if(!empty($condition)){
			$sql.=" WHERE ";
			foreach ($condition as $key => $value) {
				$list_of_conditions[] = $key."= :".$key;
			}
			$sql .= implode(" AND ", $list_of_conditions);
		}

		$query = $this->pdo->prepare($sql);
		$query->execute($condition);

		return $query->fetch();
	}


		function getAllBy($condition, $order, $limit){
	
		$sql = "SELECT * FROM ".$this->table;
		if(!empty($condition)){
			$sql.=" WHERE ";
			foreach ($condition as $key => $value) {
				$list_of_conditions[] = $key." = '".$value."'";
			}
			$sql .= implode(" AND ", $list_of_conditions);
		}
		if(!empty($order)){
			$sql.=" ORDER by ";
			foreach ($order as $key => $value){
				$list_of_orders[] = $key." ".$value;
			}
			$sql.=implode(" , ", $list_of_orders);
		}
		if(!empty($limit)){
			$sql.=" LIMIT ".$limit;
		}
		//var_dump($sql);
		$query = $this->pdo->prepare($sql);
		$query->execute($condition);

		// var_dump($query);
		return $query->fetchAll();

		// var_dump($query);
	}




		function remove($condition){
		$sql= "DELETE FROM ".$this->table;
		if(!empty($condition)){
			$sql.=" WHERE ";
			foreach ($condition as $key => $value){
				$list_of_conditions[] = $key." = ".$value;

			}
			$sql.=implode(" , ", $list_of_conditions);
			//var_dump($sql);
		$query = $this->pdo->prepare($sql);
		$query->execute($condition);
		}
	}









public static function findBy($column, $value, $valueType, $fetch=true, $Orderby=false, $ParamOrder="id", $OrderWay="ASC") {
		$instance = new static;
		//Si il y a plusieurs columns a vérifier
		if(is_array($column) && is_array($value) && is_array($valueType)){
			$sql = "SELECT * FROM "
			.$instance->table." WHERE ";
			for($i=0;$i<count($column);$i++){
				if($i == 0){
					$sql = $sql . $column[$i];
				}else{
					$sql = $sql . " AND ".$column[$i];
				}
				if ($valueType[$i] == "string") {
					$sql = $sql."='".$value[$i]."'";
				}
				else if ($valueType[$i] == "int") {
					$sql = $sql."=".$value[$i];
				}
				if($i+1 == count($column)){
					if ($Orderby==true){
						$sql = $sql." ORDER BY ".$ParamOrder." ".$OrderWay." ;";
					} else{
						$sql = $sql." ;";
					}
				}
			}
			$query = $instance->pdo->prepare($sql);
			$query->execute();

			
		}else{ //Sinon on fait une simple requete sur une colonne
			$sql = "SELECT * FROM "
			.$instance->table." WHERE "
			.$column;
			if ($valueType == "string") {
				if ($Orderby==true){
					$sql = $sql."='".$value."' ORDER BY ".$ParamOrder." ".$OrderWay." ;";
				} else{
					$sql = $sql."='".$value."';";
				}				
			}
			else if ($valueType == "int") {
				if ($Orderby==true){
					$sql = $sql."=".$value." ORDER BY ".$ParamOrder." ".$OrderWay." ;";
				} else{
					$sql = $sql."=".$value.";";
				}
			}
			$query = $instance->pdo->prepare($sql);
			$query->execute();


		}
	
		if($fetch == true){
			$item = $query->fetch(PDO::FETCH_ASSOC);
			if($item) {
				foreach ($item as $column => $value) {
					$instance->$column = $value;
				}
				return $instance;
			}
			else {
				return False;
			}
		}else{
			$item = $query->fetchAll();
			if($item) {
				return $item;
			}
			else {
				return False;
			}
		}
	}

	public static function findAll($limit = false, $orderBy = false, $column = "*", $orderWay="ASC") {
		$instance = new static;
		$sql = "SELECT ".$column." FROM ".$instance->table;
		if($orderBy != false){
			$sql = $sql . " order by " . $orderBy . " ". $orderWay;
		}
		if(is_array($limit)){
			if($limit != false){
				$sql = $sql . " limit ". $limit[0] . " , " . $limit[1];
			}
		}else{
			if($limit != false){
				$sql = $sql . " limit 0 , ". $limit;
			}
		}
		$sql = $sql.";";
		$query =  $instance->pdo->prepare($sql);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_CLASS, get_called_class());
		$items = $query->fetchAll();
		return $items;
	}

	public static function findById($id) {
		$instance = new static;
		$sql = "SELECT * FROM ".$instance->table;
		if (is_numeric($id)) {
			$sql = $sql." WHERE id=".$id.";";
			$query =  $instance->pdo->prepare($sql);
			$query->execute();
			$item = $query->fetch(PDO::FETCH_ASSOC);
			foreach ($item as $column => $value) {
				$instance->$column = $value;
			}
			return $instance;
		} else {
			return False;
		}
	}

/*pokemon go function*/
	public static function Attrapelestous($limit = false, $orderBy = false, $column = "*", $orderWay="ASC") {
		$instance = new static;
		$sql = "SELECT ".$column." FROM ".$instance->table;
		if($orderBy != false){
			$sql = $sql . " order by " . $orderBy . " ". $orderWay;
		}
		if(is_array($limit)){
			if($limit != false){
				$sql = $sql . " limit ". $limit[0] . " , " . $limit[1];
			}
		}else{
			if($limit != false){
				$sql = $sql . " limit 0 , ". $limit;
			}
		}
		$sql = $sql.";";
		$query =  $instance->pdo->prepare($sql);
		$query->execute();
		$query->setFetchMode(PDO::FETCH_CLASS, get_called_class());
		$items = $query->fetchAll();
		return $items;
	}




}
