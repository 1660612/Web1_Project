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
if(isset($_GET['id']))
{
    (new ManufacturerBUS())->Delete($_GET['id']);
}
header("refresh: 0; url='../../index.php?a=6'");

?>