<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 11:24 AM
 */

class RoleBUS
{
    var $roleDAO;

    public function __construct()
    {
        $this->roleDAO = new RoleDAO();
    }

    public function GetAll()
    {
        return $this->roleDAO->GetAll();
    }

    public function GetByID($role_id)
    {
        return $this->roleDAO->GetByID($role_id);
    }

    public function Insert($role)
    {
        $this->roleDAO->Insert($role);
    }

    public function Delete($role_id)
    {
        $role = new Role();
        $role->id = $role_id;
        $this->roleDAO->Delete($role);
    }

    public function Update($role)
    {
        $this->roleDAO->Update($role);
    }
}