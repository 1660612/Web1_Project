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

$product_type =  new ProductType();

if(isset($_POST['name']))
{
    $product_type->name = $_POST['name'];
}

(new ProductTypeBUS())->Insert($product_type);
header("refresh: 0; url='../../index.php?a=4'");
?>

