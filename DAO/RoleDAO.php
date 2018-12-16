<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/9/2018
 * Time: 11:24 AM
 */

class RoleDAO extends DB
{
    public function GetAll()
    {
        $sql = "select id, name from roles";
        $result = $this->ExecuteQuery($sql);
        $roles = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $role = new Role();
            $role->id = $id;
            $role->name = $name;
            $roles[] = $role;
        }

        return $roles;
    }

    public function GetByID($role_id)
    {
        $sql = "select id, name from roles WHERE id = $role_id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        extract($row);
        $role = new Role();
        $role->id = $id;
        $role->name = $name;
        return $role;
    }

    public function Insert($role)
    {
        $sql = "INSERT INTO roles(name) VALUES ('$role->name')";
        $this->ExecuteQuery($sql);
    }

    public function Delete($role)
    {
        $sql = "DELETE FROM roles WHERE id = $role->id";
        $this->ExecuteQuery($sql);
    }

    public function Update($role)
    {
        $sql = "UPDATE roles SET name = '$role->name' WHERE id = $role->id";
        $this->ExecuteQuery($sql);
    }


}