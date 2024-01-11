<?php

class Cart extends Controller
{
    public function index()
    {
        if (isset($_SESSION['login'])) {
            $data['judul'] = 'My Cart';
            $data['carts'] = $this->model('cart_model')->loadCart($_SESSION['user']);
            $data['total'] = $this->model('cart_model')->total($_SESSION['user']);
            $data['countCart'] = $this->model('home_model')->countCart($_SESSION['user']['id_user']);
            $this->view('templates/header', $data);
            $this->view('cart/index', $data);
            $this->view('templates/footer');
        } else {
            header('Location: ' . BASEURL . 'home');
        }
    }

    public function logout()
    {
        if (isset($_SESSION['login'])) {
            session_destroy();
            header('Location: ' . BASEURL . 'home');
        }
    }

    public function delete($id)
    {
        if ($this->model('cart_model')->delete($id) > 0) {
            Flasher::setFlash('have successfully deleted the product ', 'from your shopping bag', 'success');
            header('Location: ' . BASEURL . 'cart');
            exit;
        } else {
            Flasher::setFlash('Failed to deleted the product ', 'from your shopping bag', 'danger');
            header('Location: ' . BASEURL . 'cart');
            exit;
        }
    }

    public function checkout()
    {
        if (isset($_POST['checkout'])) {
            $data['name'] = $_POST['name'];
            $data['phone'] = $_POST['phone'];
            $data['address'] = $_POST['address'];

            $id_checkout = $this->model('cart_model')->createCheckout($data);
            $carts = $this->model('cart_model')->loadCart($_SESSION['user']);
            $itemsMoved = $this->model('cart_model')->moveToCheckoutItems($id_checkout, $carts);
            var_dump($itemsMoved);

            if ($itemsMoved > 0) {
                Flasher::setFlash('have successfully checkout. ', 'Thank You', 'success');
                $this->model('cart_model')->clearCart();
                header('Location: ' . BASEURL . 'cart');
                exit;
            } else {
                Flasher::setFlash('Failed to checkout. ', 'Sorry :)', 'danger');
                var_dump($itemsMoved);
                header('Location: ' . BASEURL . 'cart');
                exit;
            }
        }
    }
}
