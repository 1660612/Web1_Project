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
                && $user_check_login->password == $_POST['password'])
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
            header("refresh:0; url=./index.php");
            exit();
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
    <form id="login_form" action="" method="post">
        <h2 id="login-header" class="text-center">Login Form</h2>
        <hr/>
        <label class="display-block float-left label-form">User Name: </label><input class="display-block" type="text" name="user_name" placeholder="Enter user name..." />
        <label class="display-block float-left label-form">Password: </label><input class="display-block" type="password" name="password" placeholder="Enter password..." />
        <input class="btn btn-submit" type="submit" value="Login" style="margin-left: 130px;height: 38px; margin-top: 10px;" />
    </form>
</body>
</html>