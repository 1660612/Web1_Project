<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:44 AM
 */

class LoaiSanPham extends DB
{
    public function GetAll()
    {
        $sql = "select MaLoaiSanPham, TenLoaiSanPham, BiXoa from LoaiSanPham";
        $result = $this->ExecuteQuery($sql);
        $listLoaiSanPham = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $loaiSanPham = new LoaiSanPham();
            $loaiSanPham->MaLoaiSanPham = $MaLoaiSanPham;
            $loaiSanPham->TenLoaiSanPham = $TenLoaiSanPham;
            $loaiSanPham->BiXoa = $BiXoa;
            $listLoaiSanPham[] = $loaiSanPham;
        }

        return $listLoaiSanPham;
    }

    public function GetAllAvailable()
    {
        $sql = "select MaLoaiSanPham, TenLoaiSanPham, BiXoa from LoaiSanPham where BiXoa = 0";
        $result = $this->ExecuteQuery($sql);
        $listLoaiSanPham = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $loaiSanPham = new LoaiSanPham();
            $loaiSanPham->MaLoaiSanPham = $MaLoaiSanPham;
            $loaiSanPham->TenLoaiSanPham = $TenLoaiSanPham;
            $loaiSanPham->BiXoa = $BiXoa;
            $listLoaiSanPham[] = $loaiSanPham;
        }

        return $listLoaiSanPham;
    }

    public function GetByID($MaLoaiSanPham)
    {
        $sql = "select MaLoaiSanPham, TenLoaiSanPham, BiXoa from LoaiSanPham where MaLoaiSanPham = $MaLoaiSanPham";
        $result = $this->ExecuteQuery($sql);
        if($result == null)
        {
            return null;
        }
        $row=mysqli_fetch_array($result);
        extract($row);
        $loaiSanPham = new LoaiSanPham();
        $loaiSanPham->MaLoaiSanPham = $MaLoaiSanPham;
        $loaiSanPham->TenLoaiSanPham = $TenLoaiSanPham;
        $loaiSanPham->BiXoa = $BiXoa;
        return $loaiSanPham;
    }

    public function Insert($loaiSanPham)
    {
        $sql = "INSERT INTO LoaiSanPham(TenLoaiSanPham, BiXoa) VALUES ('$loaiSanPham->TenLoaiSanPham',$loaiSanPham->BiXoa)";
        $this->ExecuteQuery($sql);
    }
}