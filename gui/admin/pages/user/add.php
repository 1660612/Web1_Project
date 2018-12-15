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
    $user->username = $_POST['username'];
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
    $user->avatar = $_POST['avatar'];
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