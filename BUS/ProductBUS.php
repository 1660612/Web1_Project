<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 10:48 AM
 */

class ProductBUS
{
    public function GetAll()
    {
        $sql = "select id, name, receipt_date, total_sale_count, product_type_id, manufacturer_id, image, price, view_count, description, product_source from products";
        $result = $this->ExecuteQuery($sql);
        $products = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $product = new Product();
            $product->id = $id ;
            $product->name = $name ;
            $product->receipt_date = $receipt_date ;
            $product->total_sale_count = $total_sale_count ;
            $product->product_type_id = $product_type_id ;
            $product->manufacturer_id = $manufacturer_id ;
            $product->image = $image ;
            $product->price = $price ;
            $product->view_count = $view_count ;
            $product->description = $description ;
            $product->product_source = $product_source ;
            $products[] = $product;
        }

        return $products;
    }

    public function GetByID($product_id)
    {
        $sql = "select id, name, receipt_date, total_sale_count, product_type_id, manufacturer_id, image, price, view_count, description, product_source from products WHERE id = $product_id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        extract($row);
        $product = new Product();
        $product->id = $id ;
        $product->name = $name ;
        $product->receipt_date = $receipt_date ;
        $product->total_sale_count = $total_sale_count ;
        $product->product_type_id = $product_type_id ;
        $product->manufacturer_id = $manufacturer_id ;
        $product->image = $image ;
        $product->price = $price ;
        $product->view_count = $view_count ;
        $product->description = $description ;
        $product->product_source = $product_source ;
        return $product;
    }

    public function Insert($product)
    {
        $sql = "INSERT INTO products(name, receipt_date, total_sale_count, product_type_id, manufacturer_id, image, price, view_count, description, product_source) VALUES ('$product->name', '$product->receipt_date', $product->total_sale_count, $product->product_type_id, $product->manufacturer_id, '$product->image', $product->price, $product->view_count, '$product->description', '$product->product_source')";
        $this->ExecuteQuery($sql);
    }

    public function Delete($product)
    {
        $sql = "DELETE FROM products WHERE id = $product->id";
        $this->ExecuteQuery($sql);
    }

    public function Update($product)
    {
        $sql = "UPDATE products SET name = '$product->name', receipt_date = '$product->receipt_date', total_sale_count = $product->total_sale_count, product_type_id = $product->product_type_id, manufacturer_id = $product->manufacturer_id, image = '$product->image', price = $product->price, view_count = $product->view_count, description = '$product->description', product_source = '$product->product_source' WHERE id = $product->id";
        $this->ExecuteQuery($sql);
    }
}