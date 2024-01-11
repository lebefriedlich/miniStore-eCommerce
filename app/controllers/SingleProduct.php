<?php

class SingleProduct extends Controller
{
    public function index($params)
    {
        $data['judul'] = 'Product';
        $data['product'] = $this->model('singleProduct_model')->getAllProductById($params);
        if(isset($_SESSION['user'])){
            $data['countCart'] = $this->model('home_model')->countCart($_SESSION['user']['id_user']);
        }
        $this->view('templates/header', $data);
        $this->view('singleProduct/index', $data);
        $this->view('templates/footer');
    }

    public function signup($params)
    {
        if (isset($_POST['signup'])) {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if ($password !== $password2) {
                Flasher::setFlash('Passwords do not match. ', 'Please re-enter.', 'danger');
                header('Location: ' . BASEURL . 'singleProduct/index/' . $params);
                exit;
            }

            $emails = $this->model('singleProduct_model')->checkEmail($_POST['email']);
            if ($emails) {
                Flasher::setFlash('email is already ', 'sign up', 'danger');
                header('Location: ' . BASEURL . 'singleProduct/index/' . $params);
                exit;
            }

            if ($this->model('singleProduct_model')->signup($_POST) > 0) {
                Flasher::setFlash('have successfully', 'sign up', 'success');
                header('Location: ' . BASEURL . 'singleProduct/index/' . $params);
                exit;
            } else {
                Flasher::setFlash('Failed to', 'sign up', 'danger');
                header('Location: ' . BASEURL . 'singleProduct/index/' . $params);
                exit;
            }
        }
    }

    public function login($params)
    {
        if (isset($_POST['login'])) {
            if ($this->model('singleProduct_model')->login($_POST) > 0) {
                $_SESSION['login'] = true;
                $_SESSION['user'] = $this->model('singleProduct_model')->login($_POST);
                $role_id = $_SESSION['user']['id_role'];
                switch ($role_id) {
                    case 1:
                        header('Location: ' . BASEURL . 'admin');
                        exit();
                    case 2:
                        header('Location: ' . BASEURL . 'singleProduct/index/' . $params);
                        exit();
                    default:
                        break;
                }
            } else {
                Flasher::setFlash('Your username or password is incorrect. ', 'please try again', 'danger');
                header('Location: ' . BASEURL . 'singleProduct/index/' . $params);
                exit;
            }
        }
    }

    public function logout($params)
    {
        if (isset($_SESSION['login'])) {
            session_destroy();
            header('Location: ' . BASEURL . 'singleProduct/index/' . $params);
        }
    }

    public function addToCart($params)
    {
        if (!isset($_SESSION['login'])) {
            Flasher::setFlash('Please log in first', '', 'warning');
            header('Location: ' . BASEURL . 'singleProduct/index/' . $params);
            exit;
        }

        $qty = $_POST['quantity'];

        if ($this->model('singleProduct_model')->addToCart($params, $qty) > 0) {
            Flasher::setFlash('have successfully added the product', 'to your cart', 'success');
            header('Location: ' . BASEURL . 'singleProduct/index/' . $params);
            exit;
        } else {
            Flasher::setFlash('Failed to', 'sign up', 'danger');
            header('Location: ' . BASEURL . 'singleProduct/index/' . $params);
            exit;
        }

    }
}
