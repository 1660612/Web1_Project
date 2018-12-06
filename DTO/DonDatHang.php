<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:11 AM
 */

class DonDatHang
{
    var $MaDonDatHang;
    var $NgayLap;
    var $TongThanhTien;
    var $MaTaiKhoan;
    var $MaTinhTrang;

    public function __construct()
    {
        $this->MaDonDatHang = 0;
        $this->NgayLap = new DateTime();
        $this->TongThanhTien = 0;
        $this->MaTaiKhoan = 0;
        $this->MaTinhTrang = 0;
    }
}