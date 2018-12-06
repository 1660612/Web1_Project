<?php
    include_once("./lib/DataProvider.php");
    session_start();
    if(isset($_POST['user_name']) && isset($_POST['password']))
    {
        $_SESSION["user_name"] = $_POST['user_name'];
        $_SESSION["password"] = $_POST['password'];
    }
    if(isset($_SESSION['user_name']))
    {
        $is_admin = DataProvider::is_admin();
        if($is_admin == true)
        {
            header("refresh:0; url=./admin/index.php");
        }
        else {
            header("refresh:0; url=./index.php");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form action="" method="post">
        User Name: <input type="text" name="user_name" placeholder="Enter user name..." />
        Password: <input type="password" name="password" placeholder="Enter password..." />
        <input type="submit" value="Login" />
    </form>
</body>
</html>