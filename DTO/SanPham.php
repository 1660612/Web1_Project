<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:21 AM
 */

class SanPham
{
    var $MaSanPham;
    var $TenSanPham;
    var $HinhURL;
    var $GiaSanPham;
    var $NgayNhap;
    var $SoLuongTon;
    var $SoLuongBan;
    var $SoLuotXem;
    var $MoTa;
    var $BiXoa;
    var $MaLoaiSanPham;
    var $MaHangSanXuat;

    public function __construct()
    {
        $this->MaSanPham=0;
        $this->TenSanPham="";
        $this->HinhURL="";
        $this->GiaSanPham=0;
        $this->NgayNhap=new DateTime();
        $this->SoLuongTon=0;
        $this->SoLuongBan=0;
        $this->SoLuotXem=0;
        $this->MoTa="";
        $this->BiXoa=0;
        $this->MaLoaiSanPham=0;
        $this->MaHangSanXuat=0;
    }
}