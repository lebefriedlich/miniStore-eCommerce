<?php

class shop_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProduct($page = 1)
    {
        $limit = 12;
        $start = ($page - 1) * $limit;
        $query = "SELECT * FROM products LIMIT " . $start . "," . $limit;
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function pagination()
    {
        $limit = 12;
        $this->db->query("SELECT * FROM products");
        $this->db->execute();
        $total = $this->db->Rowcount();
        $totalPages = ceil($total / $limit);
        return $totalPages;
    }

    public function checkEmail($email)
    {
        $query = "SELECT email FROM users WHERE email = :email AND id_role = '2'";
        $this->db->query($query);
        $this->db->bind('email', $email);
        return $this->db->single();
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
        var_dump($result);

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
