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
  <div class="card" class="flex-container">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="mybutton" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Change Username
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="mybutton" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Change password
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably havent heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>

<form class="card" class="flex-container" action="index.php" method="post">
<div class="flex-container2">
</div>    
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
<?php else :?>


<?php endif; ?>
</body>
</html>