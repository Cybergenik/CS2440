<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/main.css">
  <title>Data Validation</title>
</head>
<body id="bg">
  <?php
    function derror(){
      echo "<script>alert('Please fill out fields')</script>";
    }
    if (isset($_GET['err']))
      derror();
    if (isset($_GET['email'])) $evalue = $_GET['email']; else $evalue = '';
    if (isset($_GET['phone'])) $pvalue = $_GET['phone']; else $pvalue = '';

    echo '<h1>Data Validation</h1>';
    echo '<form class="flex-container" action="process.php" method="post">';
    echo '    <input class="myin" class="input" name="email" id="email" type="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2, 4}$" value="'. $evalue .'">';
    echo '    <input class="myin" class="input" name="phone" id="phone" type="tel" placeholder="Phone Number " pattern="[0-9]{3}[0-9]{3}[0-9]{4}" value="'. $pvalue .'">';
    echo '    <div class="flex-container2">';
    echo '    <input class="mybutton" type="reset">';
    echo '    <input class="mybutton" type="submit">';
    echo '    </div>';
    echo '</form>';
  ?>
</body>
</html>