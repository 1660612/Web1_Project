<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 10:46 AM
 */

class ManufacturerBUS
{
    var $manufacturerDAO;

    public function __construct()
    {
        $this->manufacturerDAO = new ManufacturerDAO();
    }

    public function GetAll()
    {
        return $this->manufacturerDAO->GetAll();
    }

    public function GetByID($manufacturer_id)
    {
        return $this->manufacturerDAO->GetByID($manufacturer_id);
    }

    public function Insert($manufacturer)
    {
        $this->manufacturerDAO->Insert($manufacturer);
    }

    public function Delete($manufacturer_id)
    {
        $manufacturer = new Manufacturer();
        $manufacturer->id = $manufacturer_id;
        $this->manufacturerDAO->Delete($manufacturer);
    }

    public function Update($manufacturer)
    {
        $this->manufacturerDAO->Update($manufacturer);
    }
}