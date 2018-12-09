<?php
/**
 * Created by PhpStorm.
 * User: Tien
 * Date: 12/7/2018
 * Time: 12:44 AM
 */

class UserDAO extends DB
{
    public function GetAll()
    {
        $sql = "select id, username, avatar, fullname, address, phone_number, email, role_id from users";
        $result = $this->ExecuteQuery($sql);
        $users = array();
        while($row=mysqli_fetch_array($result))
        {
            extract($row);

            $user = new User();
            $user->id = $id;
            $user->username = $username;
            $user->avatar = $avatar;
            $user->fullname = $fullname;
            $user->address = $address;
            $user->phone_number = $phone_number;
            $user->email = $email;
            $user->role_id = $role_id;
            $users[] = $user;
        }

        return $users;
    }

    public function GetByID($user_id)
    {
        $sql = "select id, username, avatar, fullname, address, phone_number, email, role_id from users WHERE id = $user_id";
        $result = $this->ExecuteQuery($sql);
        $row=mysqli_fetch_array($result);
        extract($row);
        $user = new User();
        $user->id = $id;
        $user->username = $username;
        $user->avatar = $avatar;
        $user->fullname = $fullname;
        $user->address = $address;
        $user->phone_number = $phone_number;
        $user->email = $email;
        $user->role_id = $role_id;
        return $user;
    }

    public function Insert($user)
    {
        $sql = "INSERT INTO users(username, password, avatar, fullname, address, phone_number, email, role_id) 
                VALUES ('$user->username','$user->password','$user->avatar','$user->fullname', '$user->address', 
                        '$user->phone_number','$user->email',$user->role_id)";
        $this->ExecuteQuery($sql);
    }

    public function Delete($user)
    {
        $sql = "DELETE FROM users WHERE id = $user->id";
        $this->ExecuteQuery($sql);
    }

    public function Update($user)
    {
        $sql = "UPDATE users SET password = '$user->password', fullname = '$user->fullname', address = '$user->address', 
                phone_number = '$user->phone_number', email = '$user->email', role_id = $user->role_id
                WHERE id = $user->id";
        $this->ExecuteQuery($sql);
    }

    public static function is_admin($user_id)
    {
        $sql = "SELECT roles.name from roles, users WHERE users.role_id = roles.id AND users.id = $user_id";
        $result = self::ExecuteQuery($sql);
        $row = mysqli_fetch_row($result);
        if($row[0] == "Admin")
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}