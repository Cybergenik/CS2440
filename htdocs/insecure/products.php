<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body id="bg">
    <a class="mybutton" href="index.php">Back</a>
    <?php
        echo '<h1>Order a T-shirt</h1>';
        $band = '';
        $color = '';
        $size = '';
        $style = '';

        $fvalue = '';
        $lvalue = '';
        $evalue = '';
        $pvalue = '';
        $mvalue = '';

        //Arrays for different drop down options
        $bands = array("My Chemical Romance", "Green Day", "Queen", "Nirvana", "Beatles", "Blink-182", "Red Hot Chili Peppers", "Coldplay", "Twenty One Pilots", "Led Zepplin");
        $tcolor = array("Red", "Blue", "Green", "Purple", "Pink");
        $tsize = array("Extra Small", "Small", "Medium", "Large", "Extra Large");
        $tstyle = array("Hoodie", "Short Sleeve", "Long Sleeve", "Jersey", "Tank op");

        //function for displaying options
        function display($things, $preset){
            foreach ($things as $i){
                if ($i == $preset){
                echo "<option selected value='".$i."'>". $i ."</option><br>"; $x++;
                }
                else{
                echo "<option value='".$i."'>". $i ."</option><br>"; $x++;
                }
            }
        }
        //display error message and missed fields
        if(!empty($_POST)){
            $unfilled = array();
            if(empty($_POST['band'])){
                array_push($unfilled, "Band");
            }
            if(empty($_POST['color'])){
                array_push($unfilled, "Shirt Color");
            }
            if(empty($_POST['size'])){
                array_push($unfilled, "Shirt Size");
            }
            if(empty($_POST['style'])){
                array_push($unfilled, "Shirt Style");
            }
            if(empty($_POST['fname'])){
                array_push($unfilled, "First Name");
            }
            if(empty($_POST['lname'])){
                array_push($unfilled, "Last Name");
            }
            if(empty($_POST['email'])){
                array_push($unfilled, "Email");
            }
            if(empty($_POST['phone'])){
                array_push($unfilled, "Phone Number");
            }
            if(empty($_POST['mailing'])){
                array_push($unfilled, "Mailing Address");
            }
        }
        
        if (!empty($unfilled)){
            echo "You need to fill out the following fields:<br><br>";
            foreach($unfilled as $i){
                echo $i.", "; 
            }
        }

        if (isset($_POST["band"])) {$band = $_POST['band'];} else $band = '';
        if (isset($_POST["color"])) {$color = $_POST['color'];} else $color = '';
        if (isset($_POST["size"])) {$size = $_POST['size'];} else $size = '';
        if (isset($_POST["style"])) {$style = $_POST['style'];} else $style = '';

        if (isset($_POST["fname"])) $fvalue = $_POST['fname']; else $fvalue = '';
        if (isset($_POST["lname"])) $lvalue = $_POST['lname']; else $lvalue = '';
        if (isset($_POST["email"])) $evalue = $_POST['email']; else $evalue = '';
        if (isset($_POST["phone"])) $pvalue = $_POST['phone']; else $pvalue = '';
        if (isset($_POST["mailing"])) $mvalue = $_POST['mailing']; else $mvalue = '';

        if (empty($_POST) || !empty($unfilled))
        {
            echo '<form class="flex-container" action="products.php" method="post">';
            echo '    <select class="mybutton" name="band" id="bands">';
            echo '        <option disabled selected value="" hidden> -- select band -- </option>';
            echo '        '.display($bands, $band).'';
            echo '    </select>';
            echo '    <select class="mybutton" name="color" id="tcolor">';
            echo '        <option disabled selected value="" hidden> -- select color -- </option>';
            echo '        '.display($tcolor, $color).'';
            echo '    </select>';
            echo '    <select class="mybutton" name="size" id="tsize">';
            echo '        <option disabled selected value="" hidden> -- select size -- </option>';
            echo '        '.display($tsize, $size).'';
            echo '    </select>';
            echo '    <select class="mybutton" name="style" id="tstyle">';
            echo '        <option disabled selected value="" hidden> -- select style -- </option>';
            echo '        '.display($tstyle, $style).'';
            echo '    </select>';
            echo '    <input class="myin" class="input" name="fname" id="fname" type="text" placeholder="First Name" value="'. $fvalue .'">';
            echo '    <input class="myin" class="input" name="lname" id="lname" type="text" placeholder="Last Name" value="'. $lvalue .'">';
            echo '    <input class="myin" class="input" name="email" id="email" type="email" placeholder="Email" value="'. $evalue .'">';
            echo '    <input class="myin" class="input" name="phone" id="phone" type="tel" placeholder="Phone Number" value="'. $pvalue .'">';
            echo '    <input class="myin" class="input" name="mailing" id="mailing" type="text" placeholder="Mailing Address" value="'. $mvalue .'">';
            echo '    <div class="flex-container2">';
            echo '    <input class="mybutton" type="reset">';
            echo '    <input class="mybutton" onclick="saver()" type="submit">';
            echo '    </div>';
            echo '</form>';
        }
        elseif(empty($unfilled)) {
            echo "<h2><u>Your Order</u></h2>";
            echo "<div class='flex-container'>";
            echo "<p>".$_POST['fname']." ".$_POST['lname']."</p>";
            echo "<p>".$_POST['mailing']."</p>";
            echo "<p>".$_POST['email']."</p>";
            echo "<p>".$_POST['phone']."</p>";
            echo "<p>1 ".$_POST['size']." ".$_POST['color']." ".$_POST['band']." ".$_POST['style']."</p>";
            echo "</div>";
        }
    ?>
</body>
</html>