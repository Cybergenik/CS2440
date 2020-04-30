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
    function getConn(){
        return $this->conn;
    }
    function closeConn(){
        $this->conn->close();
    }
}

?>