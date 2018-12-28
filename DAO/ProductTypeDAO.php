<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 11:18 AM
 */

class ProductTypeDAO extends DB
{
    public function GetAll()
    {
        $sql = "select id, name from product_types";
        $result = $this->ExecuteQuery($sql);
        $product_types = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $product_type = new ProductType();
            $product_type->id = $id;
            $product_type->name = $name;
            $product_types[] = $product_type;
        }

        return $product_types;
    }

    public function GetByID($product_type_id)
    {
        $sql = "select id, name from product_types WHERE id = $product_type_id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        extract($row);
        $product_type = new ProductType();
        $product_type->id = $id;
        $product_type->name = $name;
        return $product_type;
    }

    public function Insert($product_type)
    {
        $sql = "INSERT INTO product_types(name) VALUES ('$product_type->name')";
        $this->ExecuteQuery($sql);
    }

    public function Delete($product_type)
    {
        $sql = "DELETE FROM products WHERE products.product_type_id = $product_type->id";
        $this->ExecuteQuery($sql);
        $sql = "DELETE FROM product_types WHERE id = $product_type->id";
        $this->ExecuteQuery($sql);
    }

    public function Update($product_type)
    {
        $sql = "UPDATE product_types SET name = '$product_type->name' WHERE id = $product_type->id";
        $this->ExecuteQuery($sql);
    }

    public function SearchByName($product_type_name)
    {
        $sql = "select id, name from product_types WHERE name LIKE '%$product_type_name%'";
        $result = $this->ExecuteQuery($sql);
        $product_types = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $product_type = new ProductType();
            $product_type->id = $id;
            $product_type->name = $name;
            $product_types[] = $product_type;
        }
        return $product_types;
    }
}