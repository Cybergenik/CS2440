<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/match.js"></script>
    <title>Insecure Password</title>
</head>
<body id="bg">
    <?php
        echo '<h1>Account Creation</h1>';
        echo '<a class="mybutton" href="index.php">Back</a>';
        //Read file and extract credentials
        $auth = Array();
        
        $servername = "us-cdbr-iron-east-04.cleardb.net";
        $username = "bc5c6e77231e1a";
        $password = "a624b284fb3c60e";
        $dbname = "heroku_d1a3b3905955062";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM secure";
        $results = mysqli_query($conn, $sql);

        $secret = mysqli_query($conn, "SELECT secret FROM secret ");
        $secret = mysqli_fetch_assoc($secret);
        $secret = $secret['secret'];

        $auth = Array();
        while($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            $auth += Array($row['username'] => $row['password']);
        }
        //display error messages and missed fields
        $x = false;
        if(!empty($_POST)){
            //Make sure fields are filled
            if(empty($_POST['user']) || empty($_POST['pass']) || empty($_POST['vpass']) || empty($_POST['secret'])){
                echo "<h4 style='text-align: center'>Please fill out all fields</h4>";
            }
            //validate username and password match
            else{
                include_once('hash.php');
                $uexists = array_key_exists($_POST['user'], $auth);
                if(!$uexists && $_POST['secret'] == $secret){
                    $user = $_POST["user"];
                    $pass = hasher($_POST['user'], $_POST['pass']);
                    $sql2 = 'INSERT INTO secure (username, password) VALUES("'.$user.'", "'.$pass.'")';
                    mysqli_query($conn, $sql2);
                    $x = true;  
                }
                elseif($uexists){
                    echo "<h4 style='text-align: center'>That Username is taken<h4>";
                }
                elseif($_POST['secret'] != $secret){
                    echo "<h4 style='text-align: center'>Secret Code is wrong<h4>";
                }
            }
        }

        if (isset($_POST['user'])) $uvalue = $_POST['user']; else $uvalue = '';
        if (isset($_POST['pass'])) $pvalue = $_POST['pass']; else $pvalue = '';
        if (isset($_POST['vpass'])) $vpvalue = $_POST['vpass']; else $vpvalue = '';
        if (isset($_POST['secret'])) $svalue = $_POST['secret']; else $svalue = '';

        //Display Form
        if (empty($_POST) || !$x){
            echo '
            <form class="flex-container" action="create-account.php" method="post">
            <label for="user">Username:</label>        
                <input class="myin" class="input" name="user" id="user" type="text" placeholder="Username" value="'.$uvalue.'">
            <label for="pass">Password:</label>
                <input class="myin" class="input" name="pass" id="pass" onkeyup="checker()" type="password" placeholder="Password" value="'.$pvalue.'">
            <label for="vpass"> Verify Password:</label>
                <p id="warning" style="color: red" hidden>No Match</p>
                <input class="myin" class="input" name="vpass" id="vpass" onkeyup="checker()" type="password" placeholder="Password" value="'.$vpvalue.'">
            <label for="secret">Secret Code:</label>
                <input class="myin" class="input" name="secret" id="secret" type="password" placeholder="Secret Code" value="'.$svalue.'">    
                <div class="flex-container2">
                <input class="mybutton" type="reset">
                <input id="submit" class="mybutton" type="submit" value="Create Account">
                </div>
            </form>
            ';
        }
        //Display Access Granted
        elseif ($x){
            $conn->close();
            header("Location: index.php?acc=1");
        }

    ?>
</body>
</html>