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

    public function Delete($invoice_id)
    {
        $invoice = new Invoice();
        $invoice->id = $invoice_id;
        $this->invoiceDAO->Delete($invoice);
    }

    public function Update($invoice)
    {
        $this->invoiceDAO->Update($invoice);
    }

    public function getUserFullName($invoice_id)
    {
        return $this->invoiceDAO->getUserFullName($invoice_id);
    }

    public function GetTop10ByDate()
    {
        return $this->invoiceDAO->GetTop10ByDate();
    }
}