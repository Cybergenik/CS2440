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
        }
        else{
           header('location: index.php?email='.$email.'&phone='.$phone);
            if (empty($_POST['email'])){
            echo "<h4 style='font-color: red'>Please fill out the email field</h4>";
            }
            elseif (empty($_POST['phone'])){
                echo "<h4 style='font-color: red'>Please fill out the phone field</h4>";
            }
            else{
                echo "<h4 style='font-color: red'>Please fill out all fields</h4>";
            }
        }

    ?>
</body>
</html>