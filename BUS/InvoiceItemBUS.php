<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 2:46 AM
 */

class InvoiceItemBUS
{
    var $invoiceItemDAO;

    public function __construct()
    {
        $this->invoiceItemDAO = new InvoiceItemDAO();
    }

    public function GetAll()
    {
        return $this->invoiceItemDAO->GetAll();
    }

    public function GetByID($invoice_item_id)
    {
        return $this->invoiceItemDAO->GetByID($invoice_item_id);
    }

    public function Insert($invoice_item)
    {
        $this->invoiceItemDAO->Insert($invoice_item);
    }

    public function Delete($invoice_item_id)
    {
        $invoice_item = new InvoiceItem();
        $invoice_item->id = $invoice_item_id;
        $this->invoiceItemDAO->Delete($invoice_item);
    }

    public function Update($invoice_item)
    {
        $this->loaiSanPhamDAO->Update($invoice_item);
    }
}