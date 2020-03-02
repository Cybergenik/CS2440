<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (!empty($_POST['email']) && !empty($_POST['phone'])){
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $eregex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
            $pregex = '/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/';
            if (!preg_match($eregex ,$email) && preg_match($pregex, $phone)) {
                header('location: index.php?err=4&phone='.$phone);
            }
            elseif (!preg_match($pregex ,$phone) && preg_match($eregex, $email)) {
                header('location: index.php?err=5&email='.$email);
            }
            elseif (!preg_match($pregex ,$phone) && !preg_match($eregex, $email)){
                header('location: index.php?err=6');
            }
            elseif (preg_match($pregex ,$phone) && preg_match($eregex, $email)){
                echo '<h1>Data Validated</h1>';
                echo '<h4>Thank you</h4>';
                echo $email;
                echo $phone;
            }
        }
        elseif (empty($_POST['email']) && !empty($_POST['phone'])){
            header('location: index.php?err=2&phone='.$phone);
        }
        elseif (empty($_POST['phone']) && !empty($_POST['email'])){
            header('location: index.php?err=1&email='.$email);
        }
        elseif (empty($_POST['email']) && empty($_POST['phone'])){
            header('location: index.php?err=3');
        }
    ?>
</body>
</html>