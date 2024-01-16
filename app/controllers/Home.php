<?php
class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'MiniStore';
        $data['products'] = $this->model('home_model')->getAllProduct();
        if (isset($_SESSION['user'])) {
            $data['countCart'] = $this->model('home_model')->countCart($_SESSION['user']['id_user']);
        }
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function signup()
    {
        if (isset($_POST['signup'])) {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if ($password !== $password2) {
                Flasher::setFlash('Passwords do not match. ', 'Please re-enter.', 'danger');
                header('Location: ' . BASEURL . 'home');
                exit;
            }

            $emails = $this->model('home_model')->checkEmail($_POST['email']);
            if ($emails) {
                Flasher::setFlash('email is already ', 'sign up', 'danger');
                header('Location: ' . BASEURL . 'home');
                exit;
            }

            if ($this->model('home_model')->signup($_POST) > 0) {
                Flasher::setFlash('have successfully', 'sign up', 'success');
                header('Location: ' . BASEURL . 'home');
                exit;
            } else {
                Flasher::setFlash('Failed to', 'sign up', 'danger');
                header('Location: ' . BASEURL . 'home');
                exit;
            }
        }
    }

    public function login()
    {
        if (isset($_POST['login'])) {
            if ($this->model('home_model')->login($_POST) > 0) {
                $_SESSION['login'] = true;
                $_SESSION['user'] = $this->model('home_model')->login($_POST);
                header('Location: ' . BASEURL . 'home');
                exit();
            } else {
                Flasher::setFlash('Your username or password is incorrect. ', 'please try again', 'danger');
                header('Location: ' . BASEURL . 'home');
                exit;
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['login'])) {
            session_destroy();
            header('Location: ' . BASEURL . 'home');
        }
    }
}
