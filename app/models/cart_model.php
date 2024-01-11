<?php

class cart_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function loadCart($data)
    {
        $query = 'SELECT products.name_product, products.image, carts.qty, carts.price, carts.id_cart, carts.id_product FROM carts 
                    JOIN products ON products.id_product = carts.id_product WHERE id_user = :id_user';
        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        return $this->db->resultSet();
    }

    public function delete($id_cart)
    {
        $query = 'DELETE FROM carts WHERE id_cart = :id_cart';
        $this->db->query($query);
        $this->db->bind('id_cart', $id_cart);
        $this->db->execute();
        return $this->db->Rowcount();
    }

    public function total($data)
    {
        $query = 'SELECT SUM(price) AS total_price
                    FROM carts WHERE id_user = :id_user
                    GROUP BY id_user';
        $this->db->query($query);
        $this->db->bind('id_user', $data['id_user']);
        return $this->db->single();
    }

    public function createCheckout($data)
    {
        $total = $this->total($_SESSION['user']);
        $query = "INSERT INTO checkouts
                     VALUES ('', :id_user, NOW(), :nama, :phone, :addres, :total_price)";
        $this->db->query($query);
        $this->db->bind("id_user", $_SESSION['user']['id_user']);
        $this->db->bind("nama", $data['name']);
        $this->db->bind("phone", $data['phone']);
        $this->db->bind("addres", $data['address']);
        $this->db->bind("total_price", $total['total_price']);

        $this->db->execute();

        return $this->db->lastInsertId();
    }

    public function moveToCheckoutItems($checkoutId, $carts)
    {
        foreach ($carts as $cart) {
            $query = "INSERT INTO checkout_items 
                        VALUES ('', :id_checkout, :id_product, :qty, :price)";
            $this->db->query($query);
            $this->db->bind("id_checkout", $checkoutId);
            $this->db->bind("id_product", $cart['id_product']);
            $this->db->bind("qty", $cart['qty']);
            $this->db->bind("price", $cart['price']);

            $this->db->execute();
        }

        return $this->db->rowCount();
    }

    public function clearCart()
    {
        $query = "DELETE FROM carts WHERE id_user = :id_user";
        $this->db->query($query);
        $this->db->bind("id_user", $_SESSION['user']['id_user']);
        $this->db->execute();
    }
}
