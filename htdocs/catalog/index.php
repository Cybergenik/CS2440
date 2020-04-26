<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <title>Login</title>
</head>
<body id="bg">
    <h1 class="banner"><span>Cyber's Gaming Store</span></h1>
    <div class="banner-nav">
    <?php if(!isset($_SESSION['auth'])) :?>
        <a href="index.php">Login</a>
        <a href="create-account.php">Create-Account</a>
    <?php else:?>
        <a href="edit-user.php" style="position: absolute; top: 10; left: 0;"><?php echo $_SESSION['auth']?></a>
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
    <br>
    <?php
        include_once('includes/globals.php');       
        global $servername;
        global $username;
        global $password;
        global $dbname; 

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //display error messages and missed fields
        if(!empty($_POST)){
            //Make sure fields are filled
            if(empty($_POST['user']) || empty($_POST['pass'])){
                echo "<h4 style='text-align: center'>Please fill out all fields<h4>";
            }
            //validate username and password match
            else{
                include_once('includes/hash.php');
                $user_auth = $conn->prepare("SELECT * FROM secure WHERE username=? AND password=?");
                $user = $_POST['user'];
                var_dump($user);
                $pass = hasher($_POST['user'], $_POST['pass']);
                $user_auth->bind_param("ss", $user, $pass);
                //Assign variables
                //Execute SQL
                $user_auth->execute();
                $result = $user_auth->get_result();
                $auth = $result->num_rows;

                if ($auth){
                    $_SESSION['auth'] = $user;
                    header('Location: index.php');
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
        if (!isset($_SESSION['auth'])){
            echo '
            <h2 style="border-bottom: 2px solid; width: 15%; color: #ff7a7a; margin-bottom: 2%">Log in:</h2>
            <form class="flex-container" action="index.php" method="post">
            <label for="user">Username:</label>        
                <input class="myin" class="input" name="user" id="user" type="text" placeholder="Username">
            <label for="pass">Password:</label>
                <input class="myin" class="input" name="pass" id="pass" type="password" placeholder="Password">
                <div class="flex-container2">
                <input class="mybutton" type="reset">
                <input class="mybutton"  type="submit" value="Login">
                </div>
            </form>
            <div class="flex-container" style="margin-top: 2%">
            <button class="mybutton" onClick="document.location.href=\'create-account.php\'">Create Account</button>
            </div>
            ';
        }
        //Display Access Granted
        elseif (isset($_SESSION['auth'])){
            $conn->close();
            echo "<h2 style='color: #ff7a7a;'>Welcome to <u>Cyber's</u> Gamer Shop</h2>
            <br><br><h2>Gamers Choices:</h2><br>
            <div class='flex-container2'>
            ";
            include_once('includes/globals.php');  
            global $servername;
            global $username;
            global $password;
            global $dbname; 
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $select = "SELECT * FROM web_poll";
            $results = mysqli_query($conn, $select);
            $data = Array(mysqli_fetch_array($results));

            $league = ($data[0]['league'] / $data[0]['moba_total']) * 100;
            $dota = ($data[0]['dota'] / $data[0]['moba_total']) * 100;
            $smite = ($data[0]['smite'] / $data[0]['moba_total']) * 100;
            $hots = ($data[0]['hots'] / $data[0]['moba_total']) * 100;

            $mobasData = array( 
                array("label"=>"League of Legends", "y"=>$league),
                array("label"=>"DOTA", "y"=>$dota),
                array("label"=>"Smite", "y"=>$smite),
                array("label"=>"Heroes of the Storm", "y"=>$hots),
            );
            $csgo = ($data[0]['csgo'] / $data[0]['shooter_total']) * 100;
            $overwatch = ($data[0]['overwatch'] / $data[0]['shooter_total']) * 100;
            $cod = ($data[0]['cod'] / $data[0]['shooter_total']) * 100;
            $fortnite = ($data[0]['fortnite'] / $data[0]['shooter_total']) * 100;

            $shootersData = array( 
                array("label"=>"Counter Strike", "y"=>$csgo),
                array("label"=>"Overwatch", "y"=>$overwatch),
                array("label"=>"Call Of Duty", "y"=>$cod),
                array("label"=>"Fortnite", "y"=>$fortnite),
            );
            
            echo "<br><div id='mobasContainer' style='height: 370px; width: 50%; text-color: white;'></div>";
            echo '
            <script>
                var mobas = new CanvasJS.Chart("mobasContainer", {
                animationEnabled: true,
                backgroundColor: null,
                title: {
                    text: "MOBA Popularity",
                    fontColor: "white"
                },
                subtitles: [{
                    text: "2020",
                    fontColor: "white"
                }],
                data: [{
                    type: "pie",
                    indexLabelFontColor: "white",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",
                    dataPoints: '.json_encode($mobasData, JSON_NUMERIC_CHECK).'
                }]
            });
            mobas.render();
            </script>
            ';
            echo "<br><br><div id='shootersContainer' style='height: 370px; width: 50%; color: white;'></div>";
            echo '
            <script>
                var shooters = new CanvasJS.Chart("shootersContainer", {
                animationEnabled: true,
                backgroundColor: null,
                colorSet:  "colorSet1",
                title: {
                    text: "Shooters Popularity",
                    fontColor: "white"
                },
                subtitles: [{
                    text: "2020",
                    fontColor: "white"
                }],
                data: [{
                    type: "pie",
                    indexLabelFontColor: "white",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabel: "{label} ({y})",
                    dataPoints: '.json_encode($shootersData, JSON_NUMERIC_CHECK).'
                }]
            });
            shooters.render();
            </script>
            </div>
            ';
            $conn->close();
            echo '
                <div class="flex-container">
                <a class="mybutton" style="color: #151D21;" href="https://lucianoremes2440.herokuapp.com/web-poll" target="_blank">Take the Survey!</a> 
                </div>
            ';
        }
    ?>
</body>
</html>