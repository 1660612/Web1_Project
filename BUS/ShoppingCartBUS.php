<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 11:40 AM
 */

class ShoppingCartBUS
{
    var $shoppingCartDAO;

    public function __construct()
    {
        $this->shoppingCartDAO = new ShoppingCartDAO();
    }

    public function GetAll()
    {
        return $this->shoppingCartDAO->GetAll();
    }

    public function GetByID($shopping_cart_id)
    {
        return $this->shoppingCartDAO->GetByID($shopping_cart_id);
    }

    public function Insert($shopping_cart)
    {
        $this->shoppingCartDAO->Insert($shopping_cart);
    }

    public function Delete($shopping_cart_id)
    {
        $shopping_cart = new ShoppingCart();
        $shopping_cart->id = $shopping_cart_id;
        $this->shoppingCartDAO->Delete($shopping_cart);
    }

    public function Update($shopping_cart)
    {
        $this->shoppingCartDAO->Update($shopping_cart);
    }
}