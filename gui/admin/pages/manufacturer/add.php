<?php
/**
 * Created by PhpStorm.
 * User: Tien Quach
 * Date: 12/23/2018
 * Time: 4:47 PM
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

$manufacturer =  new Manufacturer();

if(isset($_POST['name']))
{
    $manufacturer->name = $_POST['name'];
}

if(isset($_POST['phone_number']))
{
    $manufacturer->phone_number = $_POST['phone_number'];
}

if(isset($_POST['address']))
{
    $manufacturer->address = $_POST['address'];
}

if(isset($_FILES['logo']))
{
    if(getimagesize($_FILES['logo']['tmp_name']) == FALSE)
    {
        echo 'please choose an image';
    }
    else
    {
        $image = addslashes($_FILES['logo']['tmp_name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        $manufacturer->logo =$image;
    }
}
(new ManufacturerBUS())->Insert($manufacturer);
header("refresh: 0; url='../../index.php?a=6'");