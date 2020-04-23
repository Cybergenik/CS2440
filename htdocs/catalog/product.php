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
    <title>Product</title>
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
<?php endif;?>
</div>
<?php
    if(!empty($_POST)){
        if(isset($_SESSION['auth'])){

            if(!isset($_SESSION['prodid'])){
                $_SESSION['prodid'] = array();
                $_SESSION['qty'] = array();
                $_SESSION['price'] = array();
                $_SESSION['name'] = array();
            }
            array_push($_SESSION['prodid'], $_POST['prodid']);
            array_push($_SESSION['qty'], $_POST['qty']);
            array_push($_SESSION['price'], $_POST['price']);
            array_push($_SESSION['name'], $_POST['name']);
            header("Location: catalog.php");
        }
        elseif(!isset($_SESSION['auth'])){
        echo '
        <div class="flex-container">
        <br><br><h2 style="border-bottom: 2px solid;">Please Log in before adding items to your Cart</h2><br>
        <a class="mybutton" style="color: #151D21;" href="index.php">Login</a>  
        ';
        }
    }

    if(isset($_GET['prodId']) && !empty($_GET['prodId']) && empty($_POST)){
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
                    <h2 style=" width: 50%; margin: 0% 0% 5% 0%; font-size: 40px;">$'.$product->getPrice().'</h2>
                    <p style=" width: 75%; margin: 0% 0% 5% 0%;">'.$product->getDesc().'</p>
                    <form action="product.php" method="POST">
                    <div class="flex-container2">
                        <input type="hidden" name="prodid" value="'.$prodid.'">
                        <input type="hidden" name="name" value="'.$product->getName().'">
                        <input type="hidden" name="price" value="'.$product->getPrice().'">
                        <label for="amount">Amount:</label>
                        <input style="width: 15%;" class="myin" type="number" min="1" name="qty" step="1" value="1">
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