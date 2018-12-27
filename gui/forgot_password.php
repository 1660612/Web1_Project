<?php
/**
 * Created by PhpStorm.
 * User: Tien Quach
 * Date: 12/9/2018
 * Time: 4:48 PM
 */
foreach(glob("../DAO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("../DTO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("../BUS/*.php") as $filename)
{
    include $filename;
}
?>
<?php
session_start();
if(isset($_POST['user_name']) && isset($_POST['password']))
{
    $user = new UserBUS();
    $users = $user->GetAll();

    foreach($users as $user_check_login)
    {
        if($user_check_login->username == $_POST['user_name']
            && $user_check_login->password == md5(sha1($_POST['password'])))
        {
            $_SESSION['current_user_id'] = $user_check_login->id;
        }
    }
}
if(isset($_SESSION['current_user_id']))
{
    $is_admin = (new UserBUS())->is_admin($_SESSION['current_user_id']);
    if($is_admin == true)
    {
        header("refresh:0; url=./admin/index.php");
        exit();
    }
    else {
        header("refresh:0; url=./client/index.php");
        exit();
    }
}

if(isset($_POST['user_name']) && isset($_POST['email']))
{
    $users = (new UserBUS())->GetAll();
    foreach ($users as $check_user)
    {
        if($check_user->email == $_POST['email'] && $check_user->username == $_POST['user_name'])
        {
            $pass = generateRandomString();
            $check_user->password = md5(sha1($pass));
            (new UserBUS())->Update($check_user);
            $to = $check_user->email;
            $subject = "Lấy lại mật khẩu";
            $message = "<h2>Shop thời trang nam</h2>
            <div class='text-info'>Xin chào $check_user->full_name. Bạn đã yêu cầu lấy lại mật khẩu và đây là mật khẩu mới của bạn!</div>
            <p>Mật khẩu mới của bạn là: $pass</p>";
            $headers = 'From: system@shop.com';
            $headers = 'Content-Type: text/html; charset=utf-8'." \r\n";
            $mail_sent = mail($to, $subject, $message, $headers);
        }
    }
}
function generateRandomString($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/all.min.css" />
    <link rel="stylesheet" href="./css/style.css" />


    <!-- jQuery library -->
    <script src="./js/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="./js/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="./js/bootstrap.min.js"></script>
    <link rel="icon" type="image/png" href="../img/admin.png" />
    <script src="./js/javascript.js"></script>
    <style>
        #login{
            width: 390px;
        }
    </style>
</head>
<body>
<div id="login" class="w-25 mx-auto mt-5">
    <form id="login_form" action="" method="post">
        <h2 id="login-header" class="text-center">Lấy lại mật khẩu</h2>
        <hr/>
        <div class="form-group row">
            <label class="col-sm-4">User Name: </label>
            <input type="text" name="user_name" class="form-control col-sm-8" placeholder="Nhập user name..."/>
        </div>
        <div class="form-group row">
            <label class="col-sm-4">Email:</label>
            <input type="text" name="email" class="form-control col-sm-8" placeholder="Nhập email..."/>
        </div>
        <div class="text-center">
            <input class="btn btn-primary" type="submit" value="Lấy lại mật khẩu" />
            <a href="./login.php" class="btn btn-info">Đăng nhập</a>
        </div>
    </form>
</div>
</body>
</html>