<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:14 AM
 */

class InvoiceItem
{
    var $id;
    var $quantity;
    var $price;
    var $product_id;
    var $invoice_id;

    public function __construct()
    {
        $this->id = 0;
        $this->quantity = 0;
        $this->price = 0;
        $this->product_id = 0;
        $this->invoice_id = 0;
    }
}