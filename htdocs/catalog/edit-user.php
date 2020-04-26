<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/main.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body id="bg">
<?php 
session_start();
?>
<?php if(empty($_POST)) :?>
<h2 style="border-bottom: 2px solid; width: 40%; color: #ff7a7a; margin-bottom: 2%">Edit Account:</h2>

<div id="accordion" class="flex-container">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="mybutton" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Change Username
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
    <input class="myin" class="input" name="user" id="user" type="text" placeholder="Username">
    </div>
    </div>
  </div>
  <div class="card" class="flex-container">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="mybutton" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Change password
        </button>
      </h5>
    </div>
    
    <div d="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
    <input class="myin" class="input" name="pass" id="pass" type="password" placeholder="Password">
    </div>
    </div>
  </div>
</div>

<form class="card" class="flex-container" action="index.php" method="post">
<div class="flex-container2">
</div>    
<label for="pass">Password:</label>
    <div class="flex-container2">
    <input class="mybutton" type="reset">
    <input class="mybutton"  type="submit" value="Login">
    </div>
</form>
<div class="flex-container" style="margin-top: 2%">
<button class="mybutton" onClick="document.location.href=\'create-account.php\'">Create Account</button>
</div>
<?php else :?>


<?php endif; ?>
</body>
</html>