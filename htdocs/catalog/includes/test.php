<?php
$servername = "us-cdbr-iron-east-04.cleardb.net";
$username = "bc5c6e77231e1a";
$password = "4350b0ee";
$dbname = "heroku_d1a3b3905955062";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$result = mysqli_query($conn, "SELECT COUNT(id) FROM products;");

$result = mysqli_fetch_array($result, MYSQLI_ASSOC);
var_dump($result["COUNT(id)"])
?>