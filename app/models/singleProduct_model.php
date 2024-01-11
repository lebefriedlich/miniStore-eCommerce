<?php

class SingleProduct_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllProductById($id)
    {
        $query = 'SELECT * FROM products WHERE id_product = :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
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

    public function addToCart($params, $qty)
    {
        $data = $this->getAllProductById($params);

        $query = "INSERT INTO carts
                        VALUES
                      ('', :id_user , :id_product, :qty, :price)";
        $this->db->query($query);
        $this->db->bind("id_user", $_SESSION['user']['id_user']);
        $this->db->bind("id_product", $params);
        $this->db->bind("qty", $qty);
        $data['price'] *= $qty;
        $this->db->bind("price", $data['price']);
        $this->db->execute();

        return $this->db->Rowcount();
    }
}
