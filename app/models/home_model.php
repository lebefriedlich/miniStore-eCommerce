<?php

class home_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProduct()
    {
        $query = 'SELECT * FROM products';
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function checkEmail($email)
    {
        $query = "SELECT email FROM users WHERE email = :email AND id_role = '2'";
        $this->db->query($query);
        $this->db->bind('email', $email);
        return $this->db->single();
    }

    public function countCart($id_user)
    {
        $query = "SELECT COUNT(DISTINCT id_product) AS total_products FROM carts WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind(':id_user', $id_user);
        $result = $this->db->single();

        return $result['total_products'];
    }

    public function signUp($data)
    {
        $password = $data['password'];
        $password2 = $data['password2'];

        if ($password !== $password2) {
            Flasher::setFlash('Passwords do not match. ', 'Please re-enter.', 'danger');
            header('Location: ' . BASEURL . 'home');
            return false;
        } else {
            $query = "INSERT INTO users
                        VALUES
                      ('', :name_user , :email, :pass, '2')";
            $this->db->query($query);
            $this->db->bind("name_user", $data['Name']);
            $this->db->bind("email", $data['email']);
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            $this->db->bind("pass", $data['password']);
            $this->db->execute();
            return $this->db->Rowcount();
        }
    }

    public function login($data)
    {
        $query = "SELECT * FROM users WHERE email = :email";
        $this->db->query($query);
        $this->db->bind('email', $data['email']);
        $result = $this->db->single();

        if ($result) {
            $hashedPassword = $result['pass'];
            $enteredPassword = $data['password'];

            if (password_verify($enteredPassword, $hashedPassword)) {
                return $result;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
