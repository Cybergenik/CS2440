<?php

include_once('db.php');
class Auth extends Conn{
    private $auth;
    private $user;
    private $pass;
    private $result;

    function __construct($user, $pass){
        $user_auth = $this->conn->prepare("SELECT username, password FROM secure WHERE username=?");

        $this->user = str_replace(' ', '', $user);
        $this->pass = $pass; 

        $user_auth->bind_param("s", $this->user);
        $user_auth->execute();

        $this->$auth = $this->result = $user_auth->get_result()->fetch_assoc();
        var_dump($this->result);
        $this->closeConn();
        
        if($this->auth != NULL){
            $pass = $this->result[1];#DB Password
        
            if(password_verify($this->pass, $pass)){
                $this->auth = 1; 
            }
            else{
                $this->auth = 0; 
            }
        }
        else{
            $this->auth = 0; 
        }
    }
    function getAuth(){
        return $this->auth;
    }
    function getUser(){
        return $this->user;
    }
    function getPass(){
        return $this->pass;
    }
}
?>