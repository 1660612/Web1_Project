<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang quản lý</title>
    <link rel="stylesheet" href="./bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css" />
    <script src="./bootstrap/assets/js/vendor/jquery-slim.min.js"></script>
    <script src="./bootstrap/assets/js/vendor/popper.min.js"></script>
    <script src="./bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
    <?php
        if(isset($_POST['user_name']) && isset($_POST['password']))
        {
            $user_name = $_POST['user_name'];
            $password = $_POST['password'];
            
            $_SESSION['user_name'] = $user_name;
            $_SESSION['password'] = $password;

            if($user_name == '' || $password == '')
            {
    ?>
            <script>
                alert("Sai mật khẩu hoặc tài khoản!");
            </script>
    <?php
                header('Refresh: 0; URL = login.php');
            }
            echo "Chao ban ".$user_name." den voi Website"; 
            include 'left-sidebar/left-menu.php';
        }
        else if($_SESSION['user_name'] && $_SESSION['password'])
        {
            echo "Chao ban ".$_SESSION['user_name']." den voi Website"; 
            include 'left-sidebar/left-menu.php';
        }
        else{

            header('Refresh: 0; URL = login.php');
        }
    ?>
</body>
</html>
<script>
    alert(<?php $_SESSION['user_name'] ?>);
</script>