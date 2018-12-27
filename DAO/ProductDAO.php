<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 10:48 AM
 */

class ProductDAO extends DB
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
        $sql = "INSERT INTO products(name, receipt_date, total_sale_count, product_type_id, manufacturer_id, image, price, view_count, 
description, product_source) VALUES ('$product->name', '$product->receipt_date', $product->total_sale_count, $product->product_type_id, 
$product->manufacturer_id, '$product->image', $product->price, $product->view_count, '$product->description', '$product->product_source')";
        $this->ExecuteQuery($sql);
    }

    public function Delete($product)
    {
        $sql = "DELETE FROM products WHERE id = $product->id";
        $this->ExecuteQuery($sql);
    }

    public function Update($product)
    {
        if($product->name != '' && $product->name != null)
        {
            $sql = "UPDATE products SET name = '$product->name' WHERE id = $product->id";
            $this->ExecuteQuery($sql);
        }
        if($product->receipt_date != '' && $product->receipt_date != null)
        {
            $sql = "UPDATE products SET receipt_date = '$product->receipt_date' WHERE id = $product->id";
            $this->ExecuteQuery($sql);
        }
        if($product->total_sale_count != '' && $product->total_sale_count != null)
        {
            $sql = "UPDATE products SET total_sale_count = $product->total_sale_count WHERE id = $product->id";
            $this->ExecuteQuery($sql);
        }
        if($product->product_type_id != '' && $product->product_type_id != null)
        {
            $sql = "UPDATE products SET product_type_id = $product->product_type_id WHERE id = $product->id";
            $this->ExecuteQuery($sql);
        }
        if($product->manufacturer_id != '' && $product->manufacturer_id != null)
        {
            $sql = "UPDATE products SET manufacturer_id = $product->manufacturer_id WHERE id = $product->id";
            $this->ExecuteQuery($sql);
        }
        if($product->image != '' && $product->image != null)
        {
            $sql = "UPDATE products SET image = '$product->image' WHERE id = $product->id";
            $this->ExecuteQuery($sql);
        }
        if($product->price != '' && $product->price != null)
        {
            $sql = "UPDATE products SET price = $product->price WHERE id = $product->id";
            $this->ExecuteQuery($sql);
        }
        if($product->view_count != '' && $product->view_count != null)
        {
            $sql = "UPDATE products SET view_count = $product->view_count WHERE id = $product->id";
            $this->ExecuteQuery($sql);
        }
        if($product->description != '' && $product->description != null)
        {
            $sql = "UPDATE products SET description = '$product->description' WHERE id = $product->id";
            $this->ExecuteQuery($sql);
        }
        if($product->product_source != '' && $product->product_source != null)
        {
            $sql = "UPDATE products SET product_source = '$product->product_source' WHERE id = $product->id";
            $this->ExecuteQuery($sql);
        }
    }

    public function SearchByName($product_name)
    {
        $sql = "select id, name, receipt_date, total_sale_count, product_type_id, manufacturer_id, image, price, view_count, description, product_source from products WHERE name LIKE '%$product_name%'";
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

    public function GetProductTypeName($product_id)
    {
        $sql = "select product_types.name from products, product_types WHERE products.id = $product_id AND products.product_type_id = product_types.id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        return $row[0];
    }

    public function GetManufacturerName($product_id)
    {
        $sql = "select manufacturers.name from products, manufacturers WHERE products.id = $product_id AND products.manufacturer_id = manufacturers.id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        return $row[0];
    }

    public function GetTop10ByDate()
    {
        $sql = "select id, name, receipt_date, total_sale_count, product_type_id, manufacturer_id, image, price, view_count, description, product_source from products ORDER BY receipt_date DESC LIMIT 10";
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

    public function GetProductsByProductType($product_type_id)
    {
        $sql = "select id, name, receipt_date, total_sale_count, product_type_id, manufacturer_id, image, price, view_count, description, product_source from products WHERE product_type_id = $product_type_id";
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

    public function GetProductsByManufacturer($manufacturer_id)
    {
        $sql = "select id, name, receipt_date, total_sale_count, product_type_id, manufacturer_id, image, price, view_count, description, product_source from products WHERE manufacturer_id = $manufacturer_id";
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
}