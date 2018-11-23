<?php
    include("../../../controllers/users/sessions_controller.php");
    include("../../../lib/DataProvider.php");
    if(isset($_POST['user_name']) && isset($_POST['password']))
    {
        $_SESSION["user_name"] = $_POST['user_name'];
        $_SESSION["password"] = $_POST['password'];
    }

?>

<?php
    if(!isset($_SESSION["user_name"]))
    {
        header("Refresh:0; url=../login.php");
    }
    else {
        $user = $_SESSION['user_name'];
        $pass = $_SESSION['password'];
        $result = DataProvider::ExecuteQuery("select * from TaiKhoan where TenDangNhap = '$user' and MatKhau = '$pass'");
        $check = mysqli_fetch_array($result);
        if(!isset($check))
        {
            header("Refresh:0; url=../login.php");
        }
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>Admin Page</title>
            <link rel="stylesheet" href="../../../css/style.css" />
        </head>
        <body>
            <?php
            include_once("./layouts/header.php");
            ?>
            <?php
                include_once("./layouts/menu.php");
            ?>
        </body>
        </html>
        <?php
    }
?>