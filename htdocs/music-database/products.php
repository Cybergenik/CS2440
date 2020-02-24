<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/saveform.js"></script>
    <title>Products</title>
</head>
<body id="bg">
    <a class="mybutton" href="index.php">Back</a>
    <?php
        $fvalue = '';
        $lvalue = '';
        $evalue = '';
        $pvalue = '';
        $mvalue = '';

        $bands = array("My Chemical Romance", "Green Day", "Queen", "Nirvana", "Beatles", "Blink-182", "Red Hot Chili Peppers", "Coldplay", "Twenty One Pilots", "Led Zepplin");
        $tcolor = array("Red", "Blue", "Green", "Purple", "Pink");
        $tsize = array("Extra Small", "Small", "Medium", "Large", "Extra Large");
        $tstyle = array("Hoodie", "Short Sleeve", "Long Sleeve", "Jersey", "Tank op");

        function display($things){
            foreach ($things as $i){
                echo "<option value='".$i."'>". $i ."</option><br>"; $x++;
            }
        }
        $x = true;
        $error = array();
        if (!empty($_POST)){
            foreach ($_POST as $i){
                if (empty($i)){ $x = false; array_push($error, $i);}
            }
        }
        if(!$x && !empty($error)){
            echo "You need to fill out all the form:<br>";
            foreach ($error as $i){
                if (!isset($i))
                    echo "<p>".$i."</p>";
                    echo "<script> document.getElementsById(".$i.").InnerHTML = 'FILL THIS' </script>";
                echo $i." ";
            }
        }
        if (isset($_GET["fname"])) $fvalue = $_GET['fname']; else $fvalue = '';
        if (isset($_GET["lname"])) $lvalue = $_GET['lname']; else $lvalue = '';
        if (isset($_GET["email"])) $evalue = $_GET['email']; else $evalue = '';
        if (isset($_GET["phone"])) $pvalue = $_GET['phone']; else $pvalue = '';
        if (isset($_GET["mailing"])) $mvalue = $_GET['mailing']; else $mvalue = '';

        if (empty($_POST) || !$x)
        {
            echo '<script>putter()</script>';
            echo '<h1>Order a T-shirt</h1>';
            echo '<form class="flex-container" action="products.php" method="post">';
            echo '    <select class="mybutton" name="band" id="bands">';
            echo '        <option disabled'; if($bvalue == 0) echo"selected"; echo ' value hidden> -- select band -- </option>';
            echo '        '.display($bands).'';
            echo '    </select>';
            echo '    <select class="mybutton" name="color" id="tcolor">';
            echo '        <option disabled '; if($bvalue == 0) echo"selected"; echo ' value hidden> -- select color -- </option>';
            echo '        '.display($tcolor).'';
            echo '    </select>';
            echo '    <select class="mybutton" name="size" id="tsize">';
            echo '        <option disabled '; if($bvalue == 0) echo"selected"; echo ' value hidden> -- select size -- </option>';
            echo '        '.display($tsize).'';
            echo '    </select>';
            echo '    <select class="mybutton" name="style" id="tstyle">';
            echo '        <option disabled '; if($bvalue == 0) echo"selected"; echo ' value hidden> -- select style -- </option>';
            echo '        '.display($tstyle).'';
            echo '    </select>';
            echo '    <input class="myin" class="input" name="fname" id="fname" type="text" placeholder="First Name" value="'. $fvalue .'">';
            echo '    <input class="myin" class="input" name="lname" id="lname" type="text" placeholder="Last Name" value="'. $lvalue .'">';
            echo '    <input class="myin" class="input" name="email" id="email" type="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" value="'. $evalue .'">';
            echo '    <input class="myin" class="input" name="phone" id="phone" type="tel" placeholder="Phone Number " pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="'. $pvalue .'">';
            echo '    <input class="myin" class="input" name="mailing" id="mailing" type="text" placeholder="Mailing Address" value="'. $mvalue .'">';
            echo '    <div class="flex-container2">';
            echo '    <input class="mybutton" type="reset">';
            echo '    <input class="mybutton" onclick="saver()" type="submit">';
            echo '    </div>';
            echo '</form>';
        }
        else {
            echo "<h1><u>Your Order</u></h1>";
            echo "<p>".$_POST['fname']." ".$_POST['lname']."</p>";
            echo "<p>".$_POST['mailing']."</p>";
            echo "<p>".$_POST['email']."</p>";
            echo "<p>".$_POST['phone']."</p>";
            echo "<p>1 ".$_POST['size']." ".$_POST['color']." ".$_POST['band']." ".$_POST['style']."</p>";
        }
    ?>
</body>
</html>