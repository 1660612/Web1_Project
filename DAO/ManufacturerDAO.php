<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 10:46 AM
 */

class ManufacturerDAO extends DB
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
        if($manufacturer->name != '' && $manufacturer->name != null)
        {
            $sql = "UPDATE manufacturers SET name = '$manufacturer->name' WHERE id = $manufacturer->id";
            $this->ExecuteQuery($sql);
        }
        if($manufacturer->price != '' && $manufacturer->price != null)
        {
            $sql = "UPDATE manufacturers SET price = $manufacturer->price WHERE id = $manufacturer->id";
            $this->ExecuteQuery($sql);
        }
        if($manufacturer->phone_number != '' && $manufacturer->phone_number != null)
        {
            $sql = "UPDATE manufacturers SET phone_number = '$manufacturer->phone_number' WHERE id = $manufacturer->id";
            $this->ExecuteQuery($sql);
        }
        if($manufacturer->address != '' && $manufacturer->address != null)
        {
            $sql = "UPDATE manufacturers SET address = '$manufacturer->address' WHERE id = $manufacturer->id";
            $this->ExecuteQuery($sql);
        }
        if($manufacturer->logo != '' && $manufacturer->logo != null)
        {
            $sql = "UPDATE manufacturers SET logo = '$manufacturer->logo' WHERE id = $manufacturer->id";
            $this->ExecuteQuery($sql);
        }
    }

    public function SearchByName($manufacturer_name)
    {
        $sql = "select id, name, phone_number, address, logo from manufacturers WHERE name LIKE '%$manufacturer_name%'";
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

}