<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
    <input type="text" name="login" placeholder="Login"><br>
    <input type="text" name="haslo" placeholder="Password"><br>
    <button type="submit" name="loginbtn">log in</button><br>
    <button type="submit" name="signin">sign in</button><br>
    </form>

    <?php

    $conn = mysqli_connect("localhost","root","","zalogowani");


    if(isset($_POST['signin'])){
    $login = $_POST["login"];
    $haslo = $_POST["haslo"];
    $q = "INSERT INTO wszystko(login,haslo) VALUES('$login','$haslo')";
    $result1 = mysqli_query($conn, $q);

    if($result1){
        header("location: qr.php");
    }
    }

    if(isset($_POST['login'])){
        $login = $_POST["login"];
        $haslo = $_POST["haslo"];
        $q2 = "SELECT * FROM wszystko WHERE login = '$login' AND haslo = '$haslo'";
        $result2 = mysqli_query($conn, $q2);
    
        if(mysqli_num_rows($result2)){
            header("location: qr.php");
        }
        }
    ?>
</body>
</html>
