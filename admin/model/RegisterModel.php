<?php
require_once(__dir__ . '/Db.php');
class RegisterModel extends Db
{

    /**
     * @param array
     * @return array
     * @desc Creates and returns a user record....
     **/
    public function createUser(array $data): array
    {
        $this->query("INSERT INTO `user` (name, email, phone_no, password) VALUES (:name, :email, :phone_no, :password)");
        $this->bind('name', $data['name']);
        $this->bind('email', $data['email']);
        $this->bind('phone_no', $data['phone']);
        $this->bind('password', $data['password']);

        if ($this->execute()) {
            $Response = array(
                'status' => true,
            );
            return $Response;
        } else {
            $Response = array(
                'status' => false
            );
            return $Response;
        }
    }

    /**
     * @param string
     * @return array
     * @desc Returns a user record based on the method parameter....
     **/
    public function fetchUser(string $email): array
    {
        $this->query("SELECT * FROM `user` WHERE `email` = :email");
        $this->bind('email', $email);
        $this->execute();

        $User = $this->fetch();
        if (!empty($User)) {
            $Response = array(
                'status' => true,
                'data' => $User
            );
            return $Response;
        }
        return array(
            'status' => false,
            'data' => []
        );
    }
}

