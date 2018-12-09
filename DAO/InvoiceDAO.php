<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 2:37 AM
 */

class InvoiceDAO extends DB
{
    public function GetAll()
    {
        $sql = "select id, created_date, total_price, user_id from invoices";
        $result = $this->ExecuteQuery($sql);
        $invoices = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $invoice = new Invoice();
            $invoice->id = $id;
            $invoice->created_date = $created_date;
            $invoice->total_price = $total_price;
            $invoice->user_id = $user_id;
            $invoices[] = $invoice;
        }

        return $invoices;
    }

    public function GetByID($invoice_id)
    {
        $sql = "select id, created_date, total_price, user_id from invoices WHERE id = $invoice_id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        extract($row);
        $invoice = new Invoice();
        $invoice->id = $id;
        $invoice->created_date = $created_date;
        $invoice->total_price = $total_price;
        $invoice->user_id = $user_id;
        return $invoice;
    }

    public function Insert($invoice)
    {
        $sql = "INSERT INTO invoices(created_date, total_price, user_id) 
                VALUES ('$invoice->created_date',$invoice->total_price,$invoice->user_id)";
        $this->ExecuteQuery($sql);
    }

    public function Delete($invoice)
    {
        $sql = "DELETE FROM invoices WHERE id = $invoice->id";
        $this->ExecuteQuery($sql);
    }

    public function Update($invoice)
    {
        $sql = "UPDATE invoices SET created_date = '$invoice->created_date', total_price = $invoice->total_price, user_id = $invoice->user_id
                WHERE id = $invoice->id";
        $this->ExecuteQuery($sql);
    }
}