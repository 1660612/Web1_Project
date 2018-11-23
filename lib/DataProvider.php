<?php
    class DataProvider
    {
        public static function ExecuteQuery($query)
        {
            $con = mysqli_connect("localhost", "root", "", "1660612_quanlysanpham") or die ("Cannot connect DB");
            mysqli_query($con, "set name 'utf8'");

            $result = mysqli_query($con, $query);
            mysqli_close($con);
            return $result;
        }
    }
?>