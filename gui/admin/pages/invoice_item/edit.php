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
$invoice_item =  new InvoiceItem();
if(isset($_GET['id']))
{
    $invoice_item->id = $_GET['id'];
}
if(isset($_POST['quantity']))
{
    $invoice_item->quantity = $_POST['quantity'];
}
if(isset($_POST['price']))
{
    $invoice_item->price = $_POST['price'];
}
if(isset($_POST['product_id']))
{
    $invoice_item->product_id = $_POST['product_id'];
}
if(isset($_POST['invoice_id']))
{
    $invoice_item->invoice_id = $_POST['invoice_id'];
}
(new InvoiceItemBUS())->Update($invoice_item);
header("refresh: 0; url='../../index.php?a=7'");

?>