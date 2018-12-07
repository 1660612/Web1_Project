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
    var $db_dbName = "1660612_QuanLySanPham";

    public function ExecuteQuery($sql)
    {
        $conn = mysqli_connect($this->db_host,$this->db_username,$this->db_password,$this->db_dbName) or die("Cannot connect to Database");
        mysqli_query($conn, "set name 'utf8'");
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
}