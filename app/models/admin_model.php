<?php

class admin_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function loadUser()
    {
        $query = "SELECT * FROM users WHERE id_role = '2'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function checkEmailUser($email)
    {
        $query = "SELECT email FROM users WHERE email = :email AND id_role = '2'";
        $this->db->query($query);
        $this->db->bind('email', $email);
        return $this->db->single();
    }
    public function signUpUser($data)
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

    public function checkEmailAdmin($email)
    {
        $query = "SELECT email FROM users WHERE email = :email AND id_role = '1'";
        $this->db->query($query);
        $this->db->bind('email', $email);
        return $this->db->single();
    }
    public function signUpAdmin($data)
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
                      ('', :name_user , :email, :pass, '1')";
            $this->db->query($query);
            $this->db->bind("name_user", $data['Name']);
            $this->db->bind("email", $data['email']);
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
            $this->db->bind("pass", $data['password']);
            $this->db->execute();
            return $this->db->Rowcount();
        }
    }

    public function update($data)
    {
        $query = "UPDATE users
              SET name_user = :name_user, email = :email";

        if (isset($data['password']) && !empty($data['password'])) {
            $query .= ", pass = :pass";
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }

        $query .= " WHERE id_user = :id_user";

        $this->db->query($query);
        $this->db->bind("name_user", $data['name']);
        $this->db->bind("email", $data['email']);

        if (isset($data['password']) && !empty($data['password'])) {
            $this->db->bind("pass", $data['password']);
        }

        $this->db->bind('id_user', $data['id_user']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function delete($params)
    {
        $query = "DELETE FROM users WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind("id_user", $params);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function loadAdmin()
    {
        $query = "SELECT * FROM users WHERE id_role = '1'";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function loadProduct()
    {
        $query = "SELECT * FROM products";
        $this->db->query($query);
        return $this->db->resultSet();
    }
    public function addProduct($data)
    {
        $query = "INSERT INTO products VALUES
                    ('', :name_product, :descr, :img, :price, :qty, :category, :brand)";
        $this->db->query($query);
        $this->db->bind("name_product", $data['name']);
        $this->db->bind("descr", $data['description']);
        $this->db->bind("img", $data['image']);
        $this->db->bind("price", $data['price']);
        $this->db->bind("qty", $data['qty']);
        $this->db->bind("category", $data['category']);
        $this->db->bind("brand", $data['brand']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editProduct($data)
    {
        $query = "UPDATE products
                    SET name_product = :name_product, description = :descr";
        if (isset($data['image']) && !empty($data['image'])) {
            $query .= ", 'image' = :img";
        }
        $query .= ", price = :price, qty = :qty, category = :category, brand = :brand
                    WHERE id_product = :id_product";

        $this->db->query($query);
        $this->db->bind("name_product", $data['name']);
        $this->db->bind("descr", $data['description']);
        if (isset($data['image']) && !empty($data['image'])) {
            $this->db->bind("img", $data['image']);
        }
        $this->db->bind("price", $data['price']);
        $this->db->bind("qty", $data['qty']);
        $this->db->bind("category", $data['category']);
        $this->db->bind("brand", $data['brand']);
        $this->db->bind("id_product", $data['id_product']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function deleteProduct($params){
        $query = "DELETE FROM products WHERE id_product = :id_product";
        $this->db->query($query);
        $this->db->bind("id_product", $params);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
