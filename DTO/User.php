<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:26 AM
 */

class User
{
    var $id;
    var $username;
    var $password;
    var $avatar;
    var $fullname;
    var $address;
    var $phone_number;
    var $email;
    var $role_id;

    public function __construct()
    {
        $this->id = 0;
        $this->username = "";
        $this->password = "";
        $this->avatar = "";
        $this->fullname = "";
        $this->address = "";
        $this->phone_number = "";
        $this->email = "";
        $this->role_id = 0;
    }
}