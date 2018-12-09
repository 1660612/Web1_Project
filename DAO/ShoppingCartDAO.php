<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 11:40 AM
 */

class ShoppingCartDAO extends DB
{

    public function GetAll()
    {
        $sql = "select id, product_id, amount, total_price from shopping_carts";
        $result = $this->ExecuteQuery($sql);
        $shopping_carts = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $shopping_cart = new ShoppingCart();
            $shopping_cart->id = $id;
            $shopping_cart->product_id = $product_id;
            $shopping_cart->amount = $amount;
            $shopping_cart->total_price = $total_price;
            $shopping_carts[] = $shopping_cart;
        }

        return $shopping_carts;
    }

    public function GetByID($shopping_cart_id)
    {
        $sql = "select id, product_id, amount, total_price from shopping_carts WHERE id = $shopping_cart_id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        extract($row);
        $shopping_cart = new ShoppingCart();
        $shopping_cart->id = $id;
        $shopping_cart->product_id = $product_id;
        $shopping_cart->amount = $amount;
        $shopping_cart->total_price = $total_price;
        return $shopping_cart;
    }

    public function Insert($shopping_cart)
    {
        $sql = "INSERT INTO shopping_carts(product_id, amount, total_price) VALUES ($shopping_cart->product_id, $shopping_cart->amount, $shopping_cart->total_price)";
        $this->ExecuteQuery($sql);
    }

    public function Delete($shopping_cart)
    {
        $sql = "DELETE FROM shopping_carts WHERE id = $shopping_cart->id";
        $this->ExecuteQuery($sql);
    }

    public function Update($shopping_cart)
    {
        $sql = "UPDATE shopping_carts SET product_id = $shopping_cart->product_id, amount = $shopping_cart->amount, total_price = $shopping_cart->total_price WHERE id = $shopping_cart->id";
        $this->ExecuteQuery($sql);
    }
}