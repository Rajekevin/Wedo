<?php

class membre extends basesql{

    public $id;
	public $login;
	public $pass;
    public $actif;
	public $sexe;
	public $ville;
	public $birth;
	public $mail;
    public $avatar;
    public $statut;
    public $token; 
    public $date_inscription;

    public function setId($id){
        $this->id=intval($id);
    }

    public function setActif($actif){
         $this->actif=$actif;
    }

    public function setLogin($login){
        $this->login=$login;
    }
    public function setPass($pass){
        $this->pass=$pass;
    }
    public function setSexe($sexe){
        $this->sexe=$sexe;
    }
    public function setVille($ville){
        $this->ville=$ville;
    }
   
    public function setBirth($birth){
        $this->birth=trim($birth);
    }

 
    public function setMail($mail){
        $this->mail=$mail;
    }
    public function setStatut($statut){
        // $this->statut=2;

        $this->statut=$statut;
    }
    public function setavatar($avatar){
       

        $this->avatar=$avatar;
    }

    public function setToken(){ 

        $this->token = md5($this->login.$this->mail.SALT.date("Ymd")); 
    }


    public function setDateInscription($date_inscription){
        $this->date_inscription=trim($date_inscription);
    }


    
    //GETTERS

    public function getid(){
        return $this->id;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getPassword(){
        return $this->password;
    }

    public function getToken(){
        return $this->token;
    }

    public function getActif(){
        return $this->actif;
    }

    public function getProfilId(){
        return $this->profilId;
    }

    public function getAvatar(){
        return $this->avatar;
    }


    public function getForm($login, $mail, $avatar){
        return [
                    "options" => [
                        "method"=>"POST",
                        "action"=>"",
                        "id"=>"updateForm",
                        "submit"=>"Mettre à jour"
                        ],
                    "struct" => [
                        "avatar"=>[ "label"=>"avatar", "type"=>"file", "id"=>"avatar", "placeholder"=>"", "required"=>1, "msgerror"=>"", "value"=>$avatar ],    
                        "pseudo"=>[ "label"=>"login", "type"=>"text", "id"=>"login", "value"=>$login, "required"=>1, "msgerror"=>"name" ],
                        "email"=>[ "label"=>"mail", "type"=>"text", "id"=>"mail", "value"=>$mail, "required"=>1, "msgerror"=>"email" ],
                        "password"=>[ "label"=>"mot de passe", "type"=>"password", "id"=>"password", "required"=>1, "msgerror"=>"password" ],
                        "passwordconfirm"=>[ "label"=>"confirmation", "type"=>"password", "id"=>"passwordconfirm", "required"=>1, "msgerror"=>"passwordconfirm" ]
                    ]
        ];
    }
    public function getFormResetPass(){
        return [    
                    "options" => [
                        "method"=>"POST",
                        "action"=>"",
                        "id"=>"demandeMdpForm",
                        "submit"=>"Valider"
                        ],
                    "struct" => [
                        "email"=>[ "label"=>"Votre email", "type"=>"text", "id"=>"email", "required"=>1, "msgerror"=>"email" ]
                    ]
        ];
    }



       public static function emailExist($mail) {
            return (Membre::findBy("mail", $mail, "string"));
            }
 


}

     


