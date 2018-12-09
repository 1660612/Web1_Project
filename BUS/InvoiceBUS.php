<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 2:37 AM
 */

class InvoiceBUS
{
    var $invoiceDAO;

    public function __construct()
    {
        $this->invoiceDAO = new InvoiceDAO();
    }

    public function GetAll()
    {
        return $this->invoiceDAO->GetAll();
    }

    public function GetByID($invoice_id)
    {
        return $this->invoiceDAO->GetByID($invoice_id);
    }

    public function Insert($invoice)
    {
        $this->invoiceDAO->Insert($invoice);
    }

    public function InsertWithName($tenLoaiSanPham)
    {
        $loaiSanPham = new ProductTypeDAO();
        $loaiSanPham->TenLoaiSanPham = $tenLoaiSanPham;
        $this->loaiSanPhamDAO->Insert($loaiSanPham);
    }

    public function Delete($maLoaiSanPham)
    {
        $loaiSanPham = new ProductTypeDAO();
        $loaiSanPham->MaLoaiSanPham = $maLoaiSanPham;
        $this->loaiSanPhamDAO->Delete($loaiSanPham);
    }

    public function Update($tenLoaiSanPham)
    {
        $loaiSanPham = new ProductTypeDAO();
        $loaiSanPham->TenLoaiSanPham = $tenLoaiSanPham;
        $this->loaiSanPhamDAO->Update($loaiSanPham);
    }
}