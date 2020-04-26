<?php
include_once('globals.php');
global $servername;
global $username;
global $password;
global $dbname; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
class Product{
        private $total;
        private $name;
        private $desc;
        private $price;
        private $image;

    function __construct($id){
        global $conn;
        $sql = "SELECT * FROM products WHERE id = $id";
        $results = mysqli_query($conn, $sql);

        $total = mysqli_query($conn, "SELECT COUNT(*) FROM products;");
        $total = mysqli_fetch_array($total, MYSQLI_ASSOC);
        $this->total = $total["COUNT(*)"];

        $product = mysqli_fetch_array($results, MYSQLI_ASSOC);
        $this->name = $product['name'];
        $this->desc = $product['desc'];
        $this->price = $product['price'];
        $this->image = $product['image'];
    }
    public function getTotal(){
        return $this->total;
    }
    public function getName(){
        return $this->name;
    }
    public function getDesc(){
        return $this->desc;
    }
    public function getPrice(){
        return $this->price;
    }
    public function getImg(){
        return $this->image;
    }
}

function connClose(){
    global $conn;
    $conn->close();
}

?>