<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="blue" id="facebook" viewBox="0 0 24 24">
        <path fill="currentColor" d="M9.198 21.5h4v-8.01h3.604l.396-3.98h-4V7.5a1 1 0 0 1 1-1h3v-4h-3a5 5 0 0 0-5 5v2.01h-2l-.396 3.98h2.396v8.01Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="blue" id="youtube" viewBox="0 0 32 32">
        <path fill="currentColor" d="M29.41 9.26a3.5 3.5 0 0 0-2.47-2.47C24.76 6.2 16 6.2 16 6.2s-8.76 0-10.94.59a3.5 3.5 0 0 0-2.47 2.47A36.13 36.13 0 0 0 2 16a36.13 36.13 0 0 0 .59 6.74a3.5 3.5 0 0 0 2.47 2.47c2.18.59 10.94.59 10.94.59s8.76 0 10.94-.59a3.5 3.5 0 0 0 2.47-2.47A36.13 36.13 0 0 0 30 16a36.13 36.13 0 0 0-.59-6.74ZM13.2 20.2v-8.4l7.27 4.2Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="blue" id="twitter" viewBox="0 0 256 256">
        <path fill="currentColor" d="m245.66 77.66l-29.9 29.9C209.72 177.58 150.67 232 80 232c-14.52 0-26.49-2.3-35.58-6.84c-7.33-3.67-10.33-7.6-11.08-8.72a8 8 0 0 1 3.85-11.93c.26-.1 24.24-9.31 39.47-26.84a110.93 110.93 0 0 1-21.88-24.2c-12.4-18.41-26.28-50.39-22-98.18a8 8 0 0 1 13.65-4.92c.35.35 33.28 33.1 73.54 43.72V88a47.87 47.87 0 0 1 14.36-34.3A46.87 46.87 0 0 1 168.1 40a48.66 48.66 0 0 1 41.47 24H240a8 8 0 0 1 5.66 13.66Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="blue" id="instagram" viewBox="0 0 256 256">
        <path fill="currentColor" d="M128 80a48 48 0 1 0 48 48a48.05 48.05 0 0 0-48-48Zm0 80a32 32 0 1 1 32-32a32 32 0 0 1-32 32Zm48-136H80a56.06 56.06 0 0 0-56 56v96a56.06 56.06 0 0 0 56 56h96a56.06 56.06 0 0 0 56-56V80a56.06 56.06 0 0 0-56-56Zm40 152a40 40 0 0 1-40 40H80a40 40 0 0 1-40-40V80a40 40 0 0 1 40-40h96a40 40 0 0 1 40 40ZM192 76a12 12 0 1 1-12-12a12 12 0 0 1 12 12Z" />
    </symbol>
    <symbol xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="blue" id="linkedin" viewBox="0 0 24 24">
        <path fill="currentColor" d="M6.94 5a2 2 0 1 1-4-.002a2 2 0 0 1 4 .002zM7 8.48H3V21h4V8.48zm6.32 0H9.34V21h3.94v-6.57c0-3.66 4.77-4 4.77 0V21H22v-7.93c0-6.17-7.06-5.94-8.72-2.91l.04-1.68z" />
    </symbol>
</svg>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand" href="<?= BASEURL; ?>home">
            <img src="<?= BASEURL; ?>images/main-logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link me-4" href="<?= BASEURL; ?>home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-4" href="#company-services">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-4" href="#about-us">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-4" href="#mobile-products">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link me-4" href="<?= BASEURL; ?>shop">Shop</a>
                </li>
                <li class="nav-item">
                    <div class="user-items ps-2">
                        <ul class="d-flex justify-content-end list-unstyled">
                            <?php if (isset($_SESSION['login'])) : ?>
                                <li class="pe-3 mt-1">
                                    <div class="dropdown text-end">
                                        <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle fs-5" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= 'Hi, ' . $_SESSION['user']['name_user'] ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                            </svg>
                                        </a>
                                        <ul class="dropdown-menu text-small">
                                            <li>
                                                <a class="dropdown-item" href="<?= BASEURL; ?>cart">
                                                    My Cart <span class="badge text-bg-secondary float-end"><?= $data['countCart'] ?></span>
                                                </a>
                                            </li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="<?= BASEURL; ?>singleProduct/logout/<?= $data['product']['id_product'] ?>">
                                                    Log out
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            <?php else : ?>
                                <li class="pe-3">
                                    <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#login">Login</button>
                                </li>
                                <li>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#register">Sign Up</button>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5 pt-5">
    <?php Flasher::flash(); ?>
</div>

<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Login Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php Flasher::flash(); ?>
                    </div>
                </div>
                <form action="<?= BASEURL; ?>singleProduct/login/<?= $data['product']['id_product'] ?>" method="post">
                    <ul>
                        <li class="list-group-item mt-2">
                            <label for="email" class="form-label fs-5 d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                </svg>
                                Email :
                            </label>
                            <input type="email" name="email" class="form-control" placeholder="Enter a valid email address" required />
                        </li>
                        <li class="list-group-item mt-2">
                            <label for="password" class="form-label fs-5 d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path>
                                </svg>
                                Password :
                            </label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required />
                        </li>
                    </ul>
                    <div class="modal-footer">
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="register" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?php Flasher::flash(); ?>
                    </div>
                </div>
                <form action="<?= BASEURL; ?>singleProduct/signup/<?= $data['product']['id_product'] ?>" method="post">
                    <ul class="list-unstyled">
                        <li class="list-group-item mt-2">
                            <label for="Name" class="form-label fs-5 d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"></path>
                                </svg>
                                Name :
                            </label>
                            <input type="text" name="Name" class="form-control" placeholder="Enter your Name" required />
                        </li>
                        <li class="list-group-item mt-2">
                            <label for="email" class="form-label fs-5 d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                                </svg>
                                Email :
                            </label>
                            <input type="email" name="email" class="form-control" placeholder="Enter a valid email address" required />
                        </li>
                        <li class="list-group-item mt-2">
                            <label for="password" class="form-label fs-5 d-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path>
                                </svg>
                                Password :
                            </label>
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required />
                        </li>
                        <li class="list-group-item mt-2">
                            <label for="password2" class="form-label fs-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"></path>
                                </svg>
                                Konfirmasi Password :
                            </label>
                            <input type="password" name="password2" class="form-control" placeholder="Re-type your password" required />
                        </li>
                    </ul>
                    <div class="modal-footer">
                        <button type="submit" name="signup" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<section id="selling-product" class="single-product pt-3">
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-6">
                <div class="product-preview mb-3">
                    <img src="<?= BASEURL . 'images/product/' . $data['product']['image'] ?>" alt="single-product" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product-info">
                    <div class="element-header">
                        <h3 itemprop="name" class="display-7 text-uppercase"><?= $data['product']['name_product'] ?></h3>
                    </div>
                    <div class="product-price pt-3 pb-3">
                        <strong class="text-primary display-6 fw-bold"><?= "Rp" . number_format($data['product']['price'], 2, ",", ".");  ?></strong>
                    </div>
                    <p><?= $data['product']['description'] ?></p>
                    <div class="cart-wrap padding-small">
                        <div class="color-options product-select">
                            <div class="product-quantity">
                                <div class="stock-number text-dark"><?= $data['product']['qty'] ?> in stock</div>
                                <div class="stock-button-wrap pt-3">
                                    <form action="<?= BASEURL; ?>singleProduct/addToCart/ <?= $data['product']['id_product']  ?>" method="post">
                                        <div class="d-flex flex-row">
                                            <input id="form1" min="1" max="<?= $data['product']['qty'] ?>" name="quantity" value="1" type="number" class="form-control ms-3 form-control-sm" style="width: 70px;" />
                                        </div>
                                        <div class="qty-button d-flex flex-wrap pt-1">
                                            <button type="submit" name="addToCart" class="btn btn-primary btn-medium text-uppercase me-3 mt-3">Add to cart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="py-4">
                            <div class="d-flex align-items-baseline">
                                <h4 class="item-title no-margin pe-2">Category:</h4>
                                <ul class="select-list list-unstyled d-flex" style="margin-bottom: 0rem;">
                                    <p><?= $data['product']['category'] ?></p>
                                </ul>
                            </div>
                            <div class="d-flex align-items-baseline">
                                <h4 class="item-title no-margin pe-2">Brand:</h4>
                                <ul class="select-list list-unstyled d-flex">
                                    <p><?= $data['product']['brand'] ?></p>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<footer id="footer" class="container-fluid bg-transparent mt-5 pt-2">
  <hr>
  <div class="container">
    <div class="row">
      <div class="footer-top-area mt-3">
        <div class="row d-flex flex-wrap justify-content-between">
          <div class="col-lg-3 col-sm-6 pb-3">
            <div class="footer-menu">
              <img src="<?= BASEURL; ?>images/main-logo.png" alt="logo">
              <p>A World of Toys Full of Wonder!</p>
              <div class="social-links">
                <ul class="d-flex list-unstyled">
                  <li>
                    <a href="#">
                      <svg class="facebook">
                        <use xlink:href="#facebook" />
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <svg class="instagram">
                        <use xlink:href="#instagram" />
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <svg class="twitter">
                        <use xlink:href="#twitter" />
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <svg class="linkedin">
                        <use xlink:href="#linkedin" />
                      </svg>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <svg class="youtube">
                        <use xlink:href="#youtube" />
                      </svg>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-sm-6 pb-3">
            <div class="footer-menu text-uppercase">
              <h5 class="widget-title pb-2">Quick Links</h5>
              <ul class="menu-list list-unstyled text-uppercase ">
                <li class="menu-item pb-2">
                  <a href="<?= BASEURL; ?>home" class="text-dark text-decoration-none">Home</a>
                </li>
                <li class="menu-item pb-2">
                  <a href="<?= BASEURL; ?>shop" class="text-dark text-decoration-none">Shop</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-sm-6 pb-3">
            <div class="footer-menu contact-item">
              <h5 class="widget-title text-uppercase pb-2">Contact Us</h5>
              <p>Do you have any queries or suggestions? <a href="mailto:">noval.akbar.906@gmail.com</a>
              </p>
              <p>If you need support? Just give us a call. <a href="https://wa.me/6281359654483">+62 813 5965 4483</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <hr>
</footer>