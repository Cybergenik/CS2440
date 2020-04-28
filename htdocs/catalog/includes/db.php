<?php

class Conn{

    private $servername;
    private $username;
    private $password;
    private $dbname; 
    private $conn;

    function __construct(){
        $this->servername = "us-cdbr-iron-east-04.cleardb.net";
        $this->username = "bc5c6e77231e1a";
        $this->password = "a624b284fb3c60e";
        $this->dbname = "heroku_d1a3b3905955062";

        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error)
            die("Connection failed: " . $this->conn->connect_error);
    }
    function getConn(){
        return $this->conn;
    }
    function closeConn(){
        $this->conn->close();
    }
}

?>