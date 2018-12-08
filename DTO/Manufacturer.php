<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:06 AM
 */

class Manufacturer
{
    var $id;
    var $name;
    var $phone_number;
    var $address;
    var $logo;

    public function __construct()
    {
        $this->id = 0;
        $this->name = "";
        $this->phone_number = "";
        $this->address = "";
        $this->logo = "";
    }
}