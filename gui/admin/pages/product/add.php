<?php
/**
 * Created by PhpStorm.
 * User: Tien Quach
 * Date: 12/12/2018
 * Time: 1:55 PM
 */
session_start();

foreach(glob("../../../../DAO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("../../../../DTO/*.php") as $filename)
{
    include $filename;
}
foreach(glob("../../../../BUS/*.php") as $filename)
{
    include $filename;
}
$user =  new User();
if(isset($_POST['username']))
{
    $userBUS = new UserBUS();
    $result = $userBUS->CheckUserNameExist($_POST['username']);
    if($result==true)
    {
        $error = 1;
        header("Location:../../index.php?a=5&bus=user&error=$error");
        exit();
    }
    elseif($result == false)
    {
        $user->username = $_POST['username'];
    }
}
if(isset($_POST['password']))
{
    $user->password = $_POST['password'];
}
if(isset($_POST['fullname']))
{
    $user->full_name = $_POST['fullname'];
}
if(isset($_POST['avatar']))
{
    if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
    {
        echo 'please choose an image';
    }
    else
    {
        $image = addslashes($_FILES['image']['tmp_name']);
//        $name = addslashes($_FILES['image']['name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        $user->avatar = $image;
    }
}
if(isset($_POST['address']))
{
    $user->address = $_POST['address'];
}
if(isset($_POST['phone_number']))
{
    $user->phone_number = $_POST['phone_number'];
}
if(isset($_POST['email']))
{
    $user->email = $_POST['email'];
}
if(isset($_POST['role_id']))
{
    $user->role_id = $_POST['role_id'];
}

(new UserBUS())->Insert($user);
header("refresh: 0; url='../../index.php?a=2'");
?>