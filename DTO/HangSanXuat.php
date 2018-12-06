<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:06 AM
 */

class HangSanXuat
{
    var $MaHangSanXuat;
    var $TenHangSanXuat;
    var $LogoURL;
    var $BiXoa;

    public function __construct()
    {
        $this->MaHangSanXuat = 0;
        $this->TenHangSanXuat = "";
        $this->LogoURL = "";
        $this->BiXoa = 0;
    }
}