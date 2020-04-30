<?php

include_once('db.php');
class User extends Conn{
    private $uexists;
    private $user;
    private $pass;

    function __construct($user, $pass){
        $exists = $this->conn->prepare("SELECT * FROM users WHERE username= ?");
        
        $this->user = str_replace(' ', '', $user);
        $this->pass = password_hash($pass, PASSWORD_BCRYPT_DEFAULT_COST);
        
        $exists->bind_param("s", $this->user);
        $exists->execute();
        $result = $exists->get_result();
        
        $this->uexists = $result->num_rows;
    }
    function getUexists(){
        return $this->uexists;
    }
    function addUser(){
        $add_user = $this->conn->prepare('INSERT INTO users (username, password) VALUES(?, ?)');
        $add_user->bind_param("ss", $this->user, $this->pass);
        $add_user->execute();
    }
    function updateUser($new_user){
        $update_user = $this->conn->prepare('UPDATE users SET username=? WHERE username=?');
        $update_usr->bind_param("ss", $new_user, $this->user);
        $update_user->execute();
    }
    function updatePass($new_pass){
        $update_user = $this->conn->prepare('UPDATE users SET password=? WHERE username=?');
        $update_usr->bind_param("ss", $new_pass, $this->user);
        $update_user->execute();
    }
}
?>