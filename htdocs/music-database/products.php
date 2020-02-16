<!DOCTYPE html>
<html lang="en">
<?php
    $bands = array("Chemical Romance", "Green Day", "Queen", "Nirvana", "Beatles", "Blink-182", "AC/DC", "Bon Jovi", "Twenty One Pilots", "Led Zepplin");
    $tcolor = array("red", "blue", "green", "purple", "pink");
    $tsize = array("XS", "S", "M", "L", "XL");
    $tstyle = array("hoodie", "short sleeve", "long sleeve", "jersey", "tank top");

    function display($things){
        foreach ($things as $i){echo "<option value='".$i."'>".$things[$i]."</option><br>";}
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
</head>
<body>
    <form action="products.php" method="post">
        <select>
            <?php
            display($bands) 
            ?>
        </select>
        <select>
            <?php
            display($tcolor) 
            ?>
        </select>
        <select>
            <?php
            display($tsize) 
            ?>
        </select>
        <select>
            <?php
            display($tstyle) 
            ?>
        </select>
        <input name="search-word" type="text">
        <input type="reset">
        <input type="submit">
    </form>

<?php
    $stuff = array("little ", "boy ", "went ", "to ", "the ", "park.");
    echo $stuff;

    function shower($phrases){
        $ret = "<div class='wrapper'>";

        for  ($x = 0; $x < sizeof($phrase); $x++){
            $ret .= "<div class='shirts'";

        }
    }
?>
    
</body>
</html>