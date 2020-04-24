<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/search.js"></script>
    <title>Catalog</title>
</head>
<body id="bg">
<h1 class="banner"><span>Cyber's Gaming Store</span></h1>
<div class="banner-nav">
<?php if(!isset($_SESSION['auth'])) :?>
    <a href="index.php">Login</a>
    <a href="create-account.php">Create-Account</a>
<?php else:?>
    <a href="index.php">Home</a>
<?php endif;?>
    <a href="catalog.php">Products</a>
<?php if(isset($_SESSION['auth'])) :?>
    <a href="logout.php">Logout</a>
    <a href="cart.php" style="margin-left: 5%;"><img src="img/cart.png" alt="Cart" height="32" width="32"></a>
    <?php
    if(isset($_SESSION['prodid'])){
        echo sizeof($_SESSION['prodid']);
    }
    ?>
<?php endif;?>
</div>
<h2 style="border-bottom: 2px solid; width: 15%; color: #ff7a7a;">Catalog</h2>
<div class="flex-container2" style="margin-top: 5%">
<input class="myin" type="text" id="searchTerm" onkeyup ="nameSearch()">
<input class="mybutton" type="button" onclick="nameSearch()" value="Search">
</div>
<div class="flex-catalog" id="catalog">
<?php
include_once('includes/product.php');
    $total = new Product(1);
    for($i = 1; $i <= $total->getTotal();$i++) {
        $product = new Product($i);
        echo '
        <div class="card" id="card-style" id="prod'.$i.'">
        <h5 class="card-title" style="color: black; text-align: center; font-size: 25px; border-bottom: 2px solid;">'.$product->getName().'</h5>
        <img class="card-img-top" id="prod-img" src="'.$product->getImg().'" alt="Product" height="100%" witdth="100%">
        <div class="card-body">
            <p class="card-text" style="color: black; font-size: 17px; height: 15%; width: 100%;" hidden>'.$product->getDesc().'</p>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item" style="color: black; text-align: center;">Price: $'.$product->getPrice().'</li>
        </ul>
        <div class="card-body">
            <a href="product.php?prodId='.$i.'" class="mybutton" class="card-link" style="margin-left: 13%;">View product details</a>
        </div>
        </div>
        ';
    }
    connClose();
?>
</div>
</body>
</html>