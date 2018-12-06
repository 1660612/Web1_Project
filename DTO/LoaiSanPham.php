<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:06 AM
 */

    class LoaiSanPham
    {
        var $MaLoaiSanPham;
        var $TenLoaiSanPham;
        var $BiXoa;

        public function __construct()
        {
            $this->MaLoaiSanPham=0;
            $this->TenLoaiSanPham="";
            $this->BiXoa=0;
        }
    }
?>