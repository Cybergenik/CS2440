<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body id='bg'>
    <?php
        if (!empty($_POST['email']) && !empty($_POST['phone'])){
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $eregex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            $pregex = '/^\([0-9]{3}\)-[0-9]{3}-[0-9]{4}$/';
            if (!preg_match($eregex ,$email) && preg_match($pregex, $phone)) {
                if(empty($email))
                    header('location: index.php?err=1&phone='.$phone);
                else
                    header('location: index.php?err=4&phone='.$phone);
            }
            elseif (!preg_match($pregex ,$phone) && preg_match($eregex, $email)) {
                if (empty($phone))
                    header('location: index.php?err=2&email='.$email);
                else
                    header('location: index.php?err=5&email='.$email);
            }
            elseif (!preg_match($pregex ,$phone) && !preg_match($eregex, $email)){
                if (empty($email) && empty($phone))
                    header('location: index.php?err=3');
                else
                    header('location: index.php?err=6');
            }
            elseif (preg_match($pregex ,$phone) && preg_match($eregex, $email)){
                echo '<h1>Data Validated</h1>';
                echo '<div class="flex-container3">';
                echo '<h4>Thank you</h4>';
                echo $email." | ".$phone;
                echo '</div>';
            }
        }
    ?>
</body>
</html>