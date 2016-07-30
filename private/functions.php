<?php

	function connectBdd(){
		try{
        	return new PDO('mysql:host=localhost; dbname= mydb', 'root', '');    
        }catch(Exception $e){
            die("Error :".$e->getMessage());
        }
	}

	function getUser($bdd, $condition = [], $columns = "*"){
		//Condition est un tableau du type ["email"=>"y.skrzypczyk@gmail.com"]
		//Column est une liste du type "name,surname,...."

		$sql = "SELECT ".$columns." FROM membre  ";
		if(!empty($condition)){
			$sql .="WHERE ";
			foreach ($condition as $key => $value) {
				$list_of_conditions[] = $key."= :".$key;
			}
			$sql .= implode(" AND ", $list_of_conditions);
		}

		$query = $bdd->prepare($sql);
		$query->execute($condition);

		return $query->fetchAll();

	}

	function setUser( $bdd, $user=[]){

		$sql = "INSERT INTO membre 
                (login,pass,sexe,ville,pays,birth,mail,statut)
                VALUES (:login,:pass,:sexe,:ville,:pays,:birth,:mail,:statut);";
	
		$query = $bdd->prepare($sql);
		$query->execute($user);         

	}

	function verifyPwd($user, $pwd){
		return password_verify($pwd, $user['pwd']);
	}

	function createToken($user=[]){
		return md5($user["id"].$user["name"].$user["email"].SALT.date("Ymd"));
	}

	function logAuth($elements){

		$path_log = "log";
		$name_file = "auth.txt";
		//Est ce que le dossier existe
		if( !file_exists($path_log) ){
			//Si non il faut le créer
			mkdir($path_log);
		}
		//On ouvre le fichier 
		//(s'il n'existe pas il faut le créer et écrire à la suite)
		$handle = fopen($path_log."/".$name_file, "a");
		//Ecrire dedans
		fwrite($handle, $elements["login"]."->".$elements["pwd"]."\r\n");
		//Fermer le fichier
		fclose($handle);
	}

	function isConnected(){
		if (isset($_SESSION["token"]) && isset($_SESSION["id"])) {
			$token = $_SESSION["token"];
			$id = $_SESSION["id"];	

			$bdd = connectBdd();
			$users = getUser($bdd, ["id"=>$id]);	

			if (!empty($users)) {
				$user = $users[0];	

				if ($token == createToken($user)) {
					return TRUE;
				}
			}
		}
		return FALSE;
	}

	function getChaine() {
		$chars = '123456789ABCDEFGHJKLMNPQRSTUVWXYZ';
		$code = '';
		for ($i=0; $i<4; $i++) {
			$code .= $chars{ mt_rand( 0, strlen($chars) - 1 ) };
		}
		return $code;
	}

	function getTab($tab) {
		return $tab[array_rand($tab)];
	}