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
        public static function index_action($model_name)
        {
            $query = "select * from $model_name";
            return self::ExecuteQuery($query);
        }
        public static function is_admin()
        {
            $result = self::ExecuteQuery("select taikhoan.*, loaitaikhoan.* from taikhoan, loaitaikhoan where taikhoan.MaLoaiTaiKhoan = loaitaikhoan.MaLoaiTaiKhoan and loaitaikhoan.TenLoaiTaiKhoan = 'Admin' and taikhoan.TenDangNhap = '".$_SESSION['user_name']."'");


            if(empty($result) == false)
            {
                $check = mysqli_fetch_array($result);
                if(empty($check) == false)
                {
                    extract($check);
                    if(isset($check))
                    {
                        if($TenLoaiTaiKhoan == "Admin")
                        {
                            header("refresh:0; url=../users/admin/aIndex.php");
                        }
                    }
                }
            }
        }
    }
?>