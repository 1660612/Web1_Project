<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:14 AM
 */

class ChiTietDonDatHang
{
    var $MaChiTietDonDatHang;
    var $SoLuong;
    var $GiaBan;
    var $MaDonDatHang;
    var $MaSanPham;

    public function __construct()
    {
        $this->MaChiTietDonDatHang = 0;
        $this->SoLuong = 0;
        $this->GiaBan = 0;
        $this->MaDonDatHang = 0;
        $this->MaSanPham = 0;
    }
}