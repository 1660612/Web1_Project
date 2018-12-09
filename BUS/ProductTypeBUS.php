<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 11:18 AM
 */

class ProductTypeBUS
{
    var $productTypeDAO;

    public function __construct()
    {
        $this->productTypeDAO = new ProductTypeDAO();
    }

    public function GetAll()
    {
        return $this->productTypeDAO->GetAll();
    }

    public function GetByID($product_type_id)
    {
        return $this->productTypeDAO->GetByID($product_type_id);
    }

    public function Insert($product_type)
    {
        $this->productTypeDAO->Insert($product_type);
    }

    public function Delete($product_type_id)
    {
        $product_type = new ProductType();
        $product_type->id = $product_type_id;
        $this->productTypeDAO->Delete($product_type);
    }

    public function Update($product_type)
    {
        $this->productTypeDAO->Update($product_type);
    }
}