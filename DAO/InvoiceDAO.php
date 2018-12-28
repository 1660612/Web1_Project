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
        $sql = "DELETE FROM invoice_items WHERE invoice_id = $invoice->id";
        $this->ExecuteQuery($sql);
        $sql = "DELETE FROM invoices WHERE id = $invoice->id";
        $this->ExecuteQuery($sql);
    }

    public function Update($invoice)
    {
        if($invoice->created_date != '' && $invoice->created_date != null)
        {
            $sql = "UPDATE invoices SET created_date = '$invoice->created_date' WHERE id = $invoice->id";
            $this->ExecuteQuery($sql);
        }
        if($invoice->total_price != 0 && $invoice->total_price != null)
        {
            $sql = "UPDATE invoices SET total_price = $invoice->total_price WHERE id = $invoice->id";
            $this->ExecuteQuery($sql);
        }
        if($invoice->user_id != '' && $invoice->user_id != null)
        {
            $sql = "UPDATE invoices SET user_id = $invoice->user_id WHERE id = $invoice->id";
            $this->ExecuteQuery($sql);
        }
    }

    public function getUserFullName($invoice_id)
    {
        $sql = "SELECT users.full_name FROM users, invoices WHERE users.id = invoices.user_id AND invoices.id = $invoice_id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        return $row[0];
    }

    public function GetTop10ByDate()
    {
        $sql = "select id, created_date, total_price, user_id from invoices ORDER BY created_date DESC LIMIT 10";
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

    public function SearchByUserName($name)
    {
        $sql = "SELECT invoices.id, invoices.created_date, invoices.total_price, invoices.user_id FROM users, invoices WHERE users.id = invoices.user_id AND users.full_name LIKE '%$name%'";
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
}