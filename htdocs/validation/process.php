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
            echo "<script>alert('Please fill out the email field')</script>";
            }
            elseif (empty($_POST['phone'])){
                echo "<script>alert('Please fill out the phone field')</script>";
            }
            else{
                echo "<script>alert('Please fill out all fields')</script>";
            }
        }

    ?>
</body>
</html>