<?php

class Conn{

    private $conn;

    function __construct(){
        #region DB Credentials
        $servername = "us-cdbr-iron-east-04.cleardb.net";
        $username = "bc5c6e77231e1a";
        $password = "a624b284fb3c60e";
        $dbname = "heroku_d1a3b3905955062";
        #endregion

        $this->conn = new mysqli($servername, $username, $password, $dbname);
        if ($this->conn->connect_error)
            die("Connection failed: " . $this->conn->connect_error);
    }
    function getAuth($user, $pass){
        $user_auth = $this->conn->prepare("SELECT username, password FROM secure WHERE username=?");

        $user = str_replace(' ', '', $user); 

        $user_auth->bind_param("s", $user);
        $user_auth->execute();

        $this->result = $user_auth->get_result()->fetch_assoc();
        
        if($this->auth != NULL){
            $db_pass = $this->result[1];#DB Password
        
            if(password_verify($pass, $db_pass)){
                return true; 
            }
            else{
               return false;
            }
        }
        else{
            return false; 
        }
    }
    function getConn(){
        return $this->conn;
    }
    function closeConn(){
        $this->conn->close();
    }
}

?>