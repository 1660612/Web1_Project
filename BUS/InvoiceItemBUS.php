<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 2:46 AM
 */

class InvoiceItemBUS
{
    public function GetAll()
    {
        $sql = "select id, quantity, price, product_id, invoice_id from invoice_items";
        $result = $this->ExecuteQuery($sql);
        $invoice_items = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $invoice_item = new InvoiceItem();
            $invoice_item->id = $id;
            $invoice_item->quantity = $quantity;
            $invoice_item->price = $price;
            $invoice_item->product_id = $product_id;
            $invoice_item->invoice_id = $invoice_id;
            $invoice_items[] = $invoice_item;
        }

        return $invoice_items;
    }

    public function GetByID($invoice_item_id)
    {
        $sql = "select id, quantity, price, product_id, invoice_id from invoice_items WHERE id = $invoice_item_id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        extract($row);
        $invoice_item = new InvoiceItem();
        $invoice_item->id = $id;
        $invoice_item->quantity = $quantity;
        $invoice_item->price = $price;
        $invoice_item->product_id = $product_id;
        $invoice_item->invoice_id = $invoice_id;
        return $invoice_item;
    }

    public function Insert($invoice_item)
    {
        $sql = "INSERT INTO invoice_items(quantity, price, product_id, invoice_id) 
                VALUES ($invoice_item->quantity,$invoice_item->price,$invoice_item->product_id,$invoice_item->invoice_id)";
        $this->ExecuteQuery($sql);
    }

    public function Delete($invoice_item)
    {
        $sql = "DELETE FROM invoice_items WHERE id = $invoice_item->id";
        $this->ExecuteQuery($sql);
    }

    public function Update($invoice_item)
    {
        $sql = "UPDATE invoice_items SET quantity = $invoice_item->quantity, price = $invoice_item->price, product_id = $invoice_item->product_id, invoice_id = $invoice_item->invoice_id
                WHERE id = $invoice_item->id";
        $this->ExecuteQuery($sql);
    }
}