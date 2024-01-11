<?php
class Admin extends Controller
{
    public function index()
    {
        $data['judul'] = 'Menu Admin';
        $data['users'] = $this->model('admin_model')->loadUser();
        $data['admins'] = $this->model('admin_model')->loadAdmin();
        $data['products'] = $this->model('admin_model')->loadProduct();
        $this->view('templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }

    public function signupUser()
    {
        if (isset($_POST['signupUser'])) {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if ($password !== $password2) {
                Flasher::setFlash('Passwords do not match. ', 'Please re-enter.', 'danger');
                header('Location: ' . BASEURL . 'admin');
                exit;
            }

            $emails = $this->model('admin_model')->checkEmailUser($_POST['email']);
            if ($emails) {
                Flasher::setFlash('email is already ', 'sign up', 'danger');
                header('Location: ' . BASEURL . 'admin');
                exit;
            }

            if ($this->model('admin_model')->signupUser($_POST) > 0) {
                Flasher::setFlash('have successfully', 'sign up', 'success');
                header('Location: ' . BASEURL . 'admin');
                exit;
            } else {
                Flasher::setFlash('Failed to', 'sign up', 'danger');
                header('Location: ' . BASEURL . 'admin');
                exit;
            }
        }
    }

    public function signupAdmin()
    {
        if (isset($_POST['signupAdmin'])) {
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if ($password !== $password2) {
                Flasher::setFlash('Passwords do not match. ', 'Please re-enter.', 'danger');
                header('Location: ' . BASEURL . 'admin');
                exit;
            }

            $emails = $this->model('admin_model')->checkEmailAdmin($_POST['email']);
            if ($emails) {
                Flasher::setFlash('email is already ', 'sign up', 'danger');
                header('Location: ' . BASEURL . 'admin');
                exit;
            }

            if ($this->model('admin_model')->signupAdmin($_POST) > 0) {
                Flasher::setFlash('have successfully', 'sign up', 'success');
                header('Location: ' . BASEURL . 'admin');
                exit;
            } else {
                Flasher::setFlash('Failed to', 'sign up', 'danger');
                header('Location: ' . BASEURL . 'admin');
                exit;
            }
        }
    }

    public function update()
    {
        if (isset($_POST['update'])) {
            if ($_POST['password'] === $_POST['passwordOld']) {
                unset($_POST['password']);
            }

            if ($this->model('admin_model')->update($_POST) > 0) {
                Flasher::setFlash('have successfully ', 'update user', 'success');
            } else {
                Flasher::setFlash('failed to ', 'update user', 'danger');
            }

            header('Location: ' . BASEURL . 'admin');
            exit;
        }
    }


    public function delete($params)
    {
        if ($this->model('admin_model')->delete($params) > 0) {
            Flasher::setFlash('have successfully ', 'delete', 'success');
            header('Location: ' . BASEURL . 'admin');
            exit;
        } else {
            Flasher::setFlash('failed to ', 'delete', 'danger');
            header('Location: ' . BASEURL . 'admin');
            exit;
        }
    }

    public function addProduct()
    {
        if (isset($_POST['add'])) {
            $_POST['image'] = $_FILES['image']['name'];

            if ($this->model('admin_model')->addProduct($_POST) > 0) {
                Flasher::setFlash('have successfully ', 'added product', 'success');
                header('Location: ' . BASEURL . 'admin');
                exit;
            } else {
                Flasher::setFlash('failed to ', 'added product', 'danger');
                header('Location: ' . BASEURL . 'admin');
                exit;
            }
        }
    }

    public function editProduct()
    {
        if (isset($_POST['edit'])) {
            if (empty($_FILES['image']['name'])) {
                unset($_POST['image']);
            }

            if ($this->model('admin_model')->editProduct($_POST) > 0) {
                Flasher::setFlash('have successfully ', 'edit product', 'success');
                header('Location: ' . BASEURL . 'admin');
                exit;
            } else {
                Flasher::setFlash('failed to ', 'edit product', 'danger');
                header('Location: ' . BASEURL . 'admin');
                exit;
            }
        }
    }

    public function deleteProduct($params)
    {
        if ($this->model('admin_model')->deleteProduct($params) > 0) {
            Flasher::setFlash('have successfully ', 'delete', 'success');
            header('Location: ' . BASEURL . 'admin');
            exit;
        } else {
            Flasher::setFlash('failed to ', 'delete', 'danger');
            header('Location: ' . BASEURL . 'admin');
            exit;
        }
    }
}
