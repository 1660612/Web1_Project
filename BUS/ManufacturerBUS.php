<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 10:46 AM
 */

class ManufacturerBUS
{

    public function GetAll()
    {
        $sql = "select id, name, phone_number, address, logo from manufacturers";
        $result = $this->ExecuteQuery($sql);
        $manufacturers = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $manufacturer = new Manufacturer();
            $manufacturer->id = $id;
            $manufacturer->name = $name;
            $manufacturer->phone_number = $phone_number;
            $manufacturer->address = $address;
            $manufacturer->logo = $logo;
            $manufacturers[] = $manufacturer;
        }

        return $manufacturers;
    }

    public function GetByID($manufacturer_id)
    {
        $sql = "select id, name, phone_number, address, logo from manufacturers WHERE id = $manufacturer_id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        extract($row);
        $manufacturer = new Manufacturer();
        $manufacturer->id = $id;
        $manufacturer->name = $name;
        $manufacturer->phone_number = $phone_number;
        $manufacturer->address = $address;
        $manufacturer->logo = $logo;
        return $manufacturer;
    }

    public function Insert($manufacturer)
    {
        $sql = "INSERT INTO manufacturers(name, phone_number, address, logo) VALUES ('$manufacturer->name','$manufacturer->phone_number','$manufacturer->address','$manufacturer->logo')";
        $this->ExecuteQuery($sql);
    }

    public function Delete($manufacturer)
    {
        $sql = "DELETE FROM manufacturers WHERE id = $manufacturer->id";
        $this->ExecuteQuery($sql);
    }

    public function Update($manufacturer)
    {
        $sql = "UPDATE manufacturers SET name = '$manufacturer->name', price = $manufacturer->price, phone_number = $manufacturer->phone_number, address = $manufacturer->address, logo = $manufacturer->logo WHERE id = $manufacturer->id";
        $this->ExecuteQuery($sql);
    }
}