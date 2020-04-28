<?php
include_once('globals.php');

class Auth{
    private $auth;
    private $user;
    private $pass;

    function __construct($user, $pass){
        include_once('db.php');
        $conn = Conn();

        $user_auth = $conn->getConn()->prepare("SELECT * FROM secure WHERE username=? AND password=?");
        
        include_once('includes/hash.php');
        $this->user = str_replace(' ', '', $user);
        $this->pass = hasher($user, str_replace(' ', '', $pass));
        
        $user_auth->bind_param("ss", $user, $pass);
        $user_auth->execute();
        $result = $user_auth->get_result();
        $this->auth = $result->num_rows;
        $conn->closeConn();
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