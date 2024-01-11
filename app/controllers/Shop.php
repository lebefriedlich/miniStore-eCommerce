<?php
class Shop extends Controller
{
    public function index($params = 1)
    {
        $data['judul'] = 'Shop';
        $data['products'] = $this->model('shop_model')->getAllProduct($params);
        $data['pagination'] = $this->model('shop_model')->pagination();
        $data['prevPage'] = ($params > 1) ?  $params - 1 : 1;
        $data['nextPage'] = ($params > $data['pagination']) ?  $params + 1 : $data['pagination'];
        if(isset($_SESSION['user'])){
            $data['countCart'] = $this->model('home_model')->countCart($_SESSION['user']['id_user']);
        }
        $this->view('templates/header', $data);
        $this->view('shop/index', $data);
        $this->view('templates/footer');
    }

    public function page($params)
    {
        $data['judul'] = 'Shop';
        $data['products'] = $this->model('shop_model')->getAllProduct($params);
        $data['pagination'] = $this->model('shop_model')->pagination();
        $data['prevPage'] = ($params > 1) ?  $params - 1 : 1;
        $data['nextPage'] = ($params > $data['pagination']) ?  $params + 1 : $data['pagination'];
        $this->view('templates/header', $data);
        $this->view('shop/index', $data);
        $this->view('templates/footer');
    }

    public function signup()
    {
        if (isset($_POST['signup'])) {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if ($password !== $password2) {
                Flasher::setFlash('Passwords do not match. ', 'Please re-enter.', 'danger');
                header('Location: ' . BASEURL . 'shop');
                exit;
            }

            $emails = $this->model('home_model')->checkEmail($_POST['email']);
            if ($emails) {
                Flasher::setFlash('email is already ', 'sign up', 'danger');
                header('Location: ' . BASEURL . 'shop');
                exit;
            }

            if ($this->model('shop_model')->signup($_POST) > 0) {
                Flasher::setFlash('have successfully', 'sign up', 'success');
                header('Location: ' . BASEURL . 'shop');
                exit;
            } else {
                Flasher::setFlash('Failed to', 'sign up', 'danger');
                header('Location: ' . BASEURL . 'shop');
                exit;
            }
        }
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            if ($this->model('shop_model')->login($_POST) > 0) {
                $_SESSION['login'] = true;
                $_SESSION['user'] = $this->model('shop_model')->login($_POST);
                $role_id = $_SESSION['user']['id_role'];
                switch ($role_id) {
                    case 1:
                        header('Location: ' . BASEURL . 'admin');
                        exit();
                    case 2:
                        header('Location: ' . BASEURL . 'shop');
                        exit();
                    default:
                        break;
                }
            } else {
                Flasher::setFlash('Your username or password is incorrect. ', 'please try again', 'danger');
                header('Location: ' . BASEURL . 'shop');
                exit;
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['login'])) {
            session_destroy();
            header('Location: ' . BASEURL . 'shop');
        }
    }
}
