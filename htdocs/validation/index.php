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
    echo '<h1>Data Validation</h1>';

    if (isset($_GET['email'])) $evalue = $_GET['email']; else $evalue = '';
    if (isset($_GET['phone'])) $pvalue = $_GET['phone']; else $pvalue = '';

    if ($_GET['err'] == 1){
      echo "<h4 style='font-color: red'>Please fill Email field</h4>";
    }
    elseif ($_GET['err'] == 2){
      echo "<h4 style='font-color: red'>Please fill Phone field</h4>";
    }
    elseif ($_GET['err'] == 3){
      echo "<h4 style='font-color: red'>Please fill out Both fields</h4>";
    }
    elseif ($_GET['err'] == 4){
      echo "<h4 style='font-color: red'>Invalid Email field</h4>";
    }
    elseif ($_GET['err'] == 5){
      echo "<h4 style='font-color: red'>Invalid Phone field</h4>";
    }
    elseif ($_GET['err'] == 6){
      echo "<h4 style='font-color: red'>Both are Invalid</h4>";
    }

    echo '<form class="flex-container" action="process.php" method="post">';
    echo '    <input class="myin" class="input" name="email" id="email" placeholder="email@email.com" value="'. $evalue .'">';
    echo '    <input class="myin" class="input" name="phone" id="phone" placeholder="123-123-1234"  value="'. $pvalue .'">';
    echo '    <div class="flex-container2">';
    echo '    <input class="mybutton" type="reset">';
    echo '    <input class="mybutton" type="submit">';
    echo '    </div>';
    echo '</form>';
  ?>
</body>
</html>