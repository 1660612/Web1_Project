<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 1:24 AM
 */

class ShoppingCart
{
    var $id;
    var $product_id;
    var $amount;
    var $total_price;

    public function __construct()
    {
        $this->id = 0;
        $this->product_id = 0;
        $this->amount = 0;
        $this->total_price = 0;
    }
}