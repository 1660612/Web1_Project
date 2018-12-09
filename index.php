
<?php
/**
 * Created by PhpStorm.
 * User: Tien Quach
 * Date: 12/9/2018
 * Time: 4:48 PM
 */
session_start();
foreach(glob("DAO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("DTO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("BUS/*.php") as $filename)
{
    include $filename;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang web bán hàng</title>
</head>
<body>
    <?php
        if(!isset($_SESSION['user_id']))
        {
            echo 'Redirect to page bán hàng';
            ?>
            <a href="./GUI/login.php">Login</a>

            <?php
        }
        else if(isset($_SESSION['user_id']) && UserDAO::is_admin() == true)
        {
            echo 'Redirect to admin page';
        }
    ?>
</body>
</html>