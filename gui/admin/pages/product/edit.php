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
$product =  new Product();
if(isset($_GET['id']))
{
    $product->id = $_GET['id'];
}
if(isset($_POST['name']))
{
    $product->name = $_POST['name'];
}

if(isset($_POST['receipt_date']))
{
    $product->receipt_date = $_POST['receipt_date'];
}

if(isset($_POST['total_sale_count']))
{
    $product->total_sale_count = $_POST['total_sale_count'];
}

if(isset($_POST['product_type_id']))
{
    $product->product_type_id = $_POST['product_type_id'];
}

if(isset($_POST['manufacturer_id']))
{
    $product->manufacturer_id = $_POST['manufacturer_id'];
}
if(isset($_FILES['image']))
{
    if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
    {
        echo 'please choose an image';
    }
    else
    {
        $image = addslashes($_FILES['image']['tmp_name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);
        $product->image =$image;
    }
}

if(isset($_POST['price']))
{
    $product->price = $_POST['price'];
}

if(isset($_POST['description']))
{
    $product->description = $_POST['description'];
}

if(isset($_POST['product_source']))
{
    $product->product_source = $_POST['product_source'];
}

(new ProductBUS())->Update($product);
header("refresh: 0; url='../../index.php?a=1'");

?>