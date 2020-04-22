<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
</head>
<body id="bg">
<h1 class="banner"><span>Cyber's Gaming Store</span></h1>
<div class="banner-nav">
    <a href="index.php">Login</a>
    <a href="create-account.php">Create-Account</a>
    <a href="catalog.php">Products</a>
    <a href="logout.php">Log out</a>
    <a href="cart.php" style="padding: 1.6%; margin-left: 10%;"><img src="img/cart.png" alt="Cart" height="32" width="32"></a>
</div>
<?php
    if(isset($_GET['prodId']) && !empty($_GET['prodId'])){
        $prodid = $_GET['prodId'];
        include_once('includes/product.php');
        $product = new Product($prodid);

        echo '
        <div class="flex-product">
        <div class="card" style="width: 90%; height: 70%; margin-bottom: 10%; transition: 0.2s ease-out; align-self: center; background: none; border-color: white; border: 2px solid; ">
        <h1 class="card-title" style="text-align: center; border-bottom: 2px solid; border-color: white;">'.$product->getName().'</h1>
        <div class="card-body">
            <div class="flex-product">
                <img style="max-height: 500px; max-width: 600px; height: 60%; width: 60%;" src="'.$product->getImg().'" alt="Product">
                <div class="flex-container">
                    <p style=" width: 75%;">'.$product->getDesc().'</p>
                    <form action="cart.php" method="POST">
                    <div class="flex-container2">
                        <input type="hidden" name="prodid" value="'.$prodid.'">
                        <label for="amount">Amount:</label>
                        <input style="width: 15%;" class="myin" type="number" min="1" id="amount" name="amount" step="1" value="1">
                        <input class="mybutton" type="submit" value="Add to Cart"> 
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>
        ';
    }

?>
</body>
</html>