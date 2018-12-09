<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:38 AM
 */

class DB
{
    var $db_host = "localhost";
    var $db_username = "root";
    var $db_password = "";
    var $db_dbName = "quanlybanhang";

    public function ExecuteQuery($sql)
    {
        $conn = mysqli_connect("localhost","root","","quanlybanhang") or die("Cannot connect to Database");
        mysqli_set_charset($conn,"utf8");
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
}