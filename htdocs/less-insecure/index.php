<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insecure Password</title>
</head>
<body id="bg">
    <?php
        echo '<h1>Less-Insecure Password</h1>';
        //Read file and extract credentials
        $auth = Array();
        
        $servername = "us-cdbr-iron-east-04.cleardb.net";
        $username = "bc5c6e77231e1a";
        $password = "4350b0ee";
        $dbname = "heroku_d1a3b3905955062";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM notsecure";
        $results = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            $auth += Array($row['username'] => $row['password']);
        }

        //display error messages and missed fields
        $x = false;
        if(!empty($_POST)){
            //Make sure fields are filled
            if(empty($_POST['user']) || empty($_POST['pass'])){
                echo "<h4 style='text-align: center'>Please fill out all fields<h4>";
            }
            //validate username and password match
            else{
                $key = array_keys($auth, $_POST['pass']);
                if (implode($key) == $_POST['user'] && $auth[implode($key)] == $_POST['pass']){
                    $x = true;
                }
                else {
                    echo "<h2 style='color: red'>Access Denied</h2>";
                }
            }
        }
        //Display Form
        if (empty($_POST) || !$x){
            echo '<form class="flex-container" action="index.php" method="post">';
            echo '<label for="user">Username:</label>';        
            echo '    <input class="myin" class="input" name="user" id="user" type="text" placeholder="Username"><br>';
            echo '<label for="pass">Password:</label>'; 
            echo '    <input class="myin" class="input" name="pass" id="pass" type="password" placeholder="Password">';
            echo '    <div class="flex-container2">';
            echo '    <input class="mybutton" type="reset">';
            echo '    <input class="mybutton" type="submit">';
            echo '    </div>';
            echo '</form>';
        }
        //Display Access Granted
        elseif ($x){
            echo "<br><br><h2 style='color: green'>Access Granted</h2>";
            $conn->close();
        }

    ?>
</body>
</html>