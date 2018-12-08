<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:21 AM
 */

class Product
{
    var $id;
    var $name;
    var $receipt_date;
    var $total_sale_count;
    var $product_type_id;
    var $manufacturer_id;
    var $image;
    var $price;
    var $view_count;
    var $description;
    var $product_source;

    public function __construct()
    {
        $this->id = 0;
        $this->name = "";
        $this->receipt_date = "";
        $this->total_sale_count = 0;
        $this->product_type_id = 0;
        $this->manufacturer_id = 0;
        $this->image = "";
        $this->price = 0;
        $this->view_count = 0;
        $this->description = "";
        $this->product_source = "";
    }
}