<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:11 AM
 */

class Invoice
{
    var $id;
    var $created_date;
    var $total_price;
    var $user_id;

    public function __construct()
    {
        $this->id = 0;
        $this->created_date = "";
        $this->total_price = 0;
        $this->user_id = 0;
    }
}