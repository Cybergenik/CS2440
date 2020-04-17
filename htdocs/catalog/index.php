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
        echo '<h1>Secure Login</h1>';
        
        $servername = "us-cdbr-iron-east-04.cleardb.net";
        $username = "bc5c6e77231e1a";
        $password = "4350b0ee";
        $dbname = "heroku_d1a3b3905955062";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM secure";
        $results = mysqli_query($conn, $sql);

        $auth = Array();
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
                include_once('includes/hash.php');
                $key = array_keys($auth, hasher($_POST['user'], $_POST['pass']));
                if (implode($key) == $_POST['user'] && $auth[implode($key)] == hasher($_POST['user'], $_POST['pass'])){
                    $x = true;
                }
                else {
                    echo "<h2 style='color: red'>Access Denied</h2>";
                }
            }
        }
        //Display Form
        if(!empty($_GET)){
            if($_GET['acc'] == 1)
                echo '<div class="flex-container"><h3>Account Created, please login</h3></div>';
        }
        if (empty($_POST) || !$x){
            echo '
            <form class="flex-container" action="index.php" method="post">
            <label for="user">Username:</label>        
                <input class="myin" class="input" name="user" id="user" type="text" placeholder="Username">
            <label for="pass">Password:</label>
                <input class="myin" class="input" name="pass" id="pass" type="password" placeholder="Password">
                <div class="flex-container2">
                <input class="mybutton" type="reset">
                <input class="mybutton" type="submit">
                </div>
            </form>
            <div class="flex-container">
            <button class="mybutton" onClick="document.location.href=\'create-account.php\'">Create Account</button>
            </div>
            ';
        }
        //Display Access Granted
        elseif ($x){
            echo "<br><br><h2 style='color: green'>Access Granted</h2>";
            echo '<a class="mybutton" href="index.php">Back</a>';
            $conn->close();
        }

    ?>
</body>
</html>