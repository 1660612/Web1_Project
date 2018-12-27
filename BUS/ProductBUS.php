<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 10:48 AM
 */

class ProductBUS
{
    var $productDAO;

    public function __construct()
    {
        $this->productDAO = new ProductDAO();
    }

    public function GetAll()
    {
        return $this->productDAO->GetAll();
    }

    public function GetByID($product_id)
    {
        return $this->productDAO->GetByID($product_id);
    }

    public function Insert($product)
    {
        $this->productDAO->Insert($product);
    }

    public function Delete($product_id)
    {
        $product = new Product();
        $product->id = $product_id;
        $this->productDAO->Delete($product);
    }

    public function Update($product)
    {
        $this->productDAO->Update($product);
    }

    public function SearchByName($product_name)
    {
        return $this->productDAO->SearchByName($product_name);
    }

    public function GetProductTypeName($product_id)
    {
        return $this->productDAO->GetProductTypeName($product_id);
    }

    public function GetManufacturerName($product_id)
    {
        return $this->productDAO->GetManufacturerName($product_id);
    }

    public function GetTop10ByDate()
    {
        return $this->productDAO->GetTop10ByDate();
    }

    public function GetProductsByProductType($product_type_id)
    {
        return $this->productDAO->GetProductsByProductType($product_type_id);
    }

    public function GetProductsByManufacturer($manufacturer_id)
    {
        return $this->productDAO->GetProductsByManufacturer($manufacturer_id);
    }
}