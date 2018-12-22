<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:44 AM
 */

class UserBUS
{
    var $userDAO;

    public function __construct()
    {
        $this->userDAO = new UserDAO();
    }

    public function GetAll()
    {
        return $this->userDAO->GetAll();
    }

    public function GetByID($user_id)
    {
        return $this->userDAO->GetByID($user_id);
    }

    public function Insert($user)
    {

        $this->userDAO->Insert($user);
    }

    public function Delete($user_id)
    {
        $user = new User();
        $user->id = $user_id;
        $this->userDAO->Delete($user);
    }

    public function Update($user)
    {
        $this->userDAO->Update($user);
    }

    public function is_admin($user_id)
    {
        return $this->userDAO->is_admin($user_id);
    }

    public function CheckUserNameExist($username)
    {
        return $this->userDAO->CheckUserNameExist($username);
    }

    public function getRoleName($user_id)
    {
        return $this->userDAO->getRoleName($user_id);
    }

    public function SearchByName($string_search)
    {
        return $this->userDAO->SearchByName($string_search);
    }
}