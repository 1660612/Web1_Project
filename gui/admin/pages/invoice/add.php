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
$invoice =  new Invoice();
if(isset($_POST['created_date']))
{
    $invoice->created_date = $_POST['created_date'];
}
if(isset($_POST['total_price']))
{
    $invoice->total_price = $_POST['total_price'];
}
if(isset($_POST['user_id']))
{
    $invoice->user_id = $_POST['user_id'];
}
(new InvoiceBUS())->Insert($invoice);
header("refresh: 0; url='../../index.php?a=3'");
?>