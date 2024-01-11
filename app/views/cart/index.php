<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
    <title>Search</title>
    <path fill="currentColor" d="M19 3C13.488 3 9 7.488 9 13c0 2.395.84 4.59 2.25 6.313L3.281 27.28l1.439 1.44l7.968-7.969A9.922 9.922 0 0 0 19 23c5.512 0 10-4.488 10-10S24.512 3 19 3zm0 2c4.43 0 8 3.57 8 8s-3.57 8-8 8s-8-3.57-8-8s3.57-8 8-8z" />
  </symbol>
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
                      <a class="dropdown-item" href="<?= BASEURL; ?>cart/logout">
                        Log out
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </li>
    </div>
  </div>
</nav>

<section class="hero-section position-relative padding-medium " style="background-color: #EDF1F3; height: 310px;">
  <div class="hero-content">
    <div class="container">
      <div class="text-center position-absolute top-50 start-50 translate-middle">
        <h1 class="display-2 text-uppercase text-dark">My Cart</h1>
        <div class="breadcrumbs">
          <span class="item">
            <a href="<?= BASEURL; ?>home" class="text-dark text-decoration-none">Home &gt;</a>
          </span>
          <span class="item">My Cart</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="flash mt-3">
  <div class="container">
    <?php Flasher::flash(); ?>
  </div>
</section>

<section class="h-100 h-custom">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <?php if (!empty($data['carts'])) : ?>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="h5">Shopping Bag</th>
                  <th scope="col">Quantity</th>
                  <th scope="col">Price</th>
                  <th scope="col"></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($data['carts'] as $cart) : ?>
                  <tr>
                    <th scope="row">
                      <div class="d-flex align-items-center">
                        <img src="<?= BASEURL; ?>images/product/<?= $cart['image'] ?>" class="img-fluid rounded-3" style="width: 120px;" alt="Book">
                        <div class="flex-column ms-4">
                          <p class="mb-2"><?= $cart['name_product'] ?></p>
                        </div>
                      </div>
                    </th>
                    <td class="align-middle">
                      <div class="d-flex flex-row">
                        <input id="form1" min="0" name="quantity" value="<?= $cart['qty'] ?>" style="width: 50px;" disabled />
                      </div>
                    </td>
                    <td class="align-middle">
                      <p class="mb-0" style="font-weight: 500;"><?= "Rp" . number_format($cart['price'], 2, ",", "."); ?></p>
                    </td>
                    <td class="align-middle">
                      <a class="btn btn-danger" href="#" role="button" data-bs-toggle="modal" data-bs-target="#deleteModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                        </svg>
                      </a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="card shadow-2-strong mb-5 mb-lg-0" style="border-radius: 16px;">
            <div class="card-body p-4">
              <form action="<?= BASEURL; ?>cart/checkout" method="post">
                <div class="row">
                  <div class="col-lg-4 col-xl-5">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Kontak</label>
                      <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Nama Lengkap" required>
                      <input type="tel" id="phone" name="phone" pattern="[0-9]{10,15}" class="form-control mt-3" placeholder="Nomor Telepon" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xl-4">
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">Alamat</label>
                      <input type="text" class="form-control h-auto" name="address" id="exampleFormControlInput1" placeholder="Alamat Lengkap" required>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xl-3 ">
                    <div class="d-flex justify-content-between mb-4" style="font-weight: 500;">
                      <p class="mb-2">Total (tax included)</p>
                      <p class="mb-2"><?= "Rp" . number_format($data['total']['total_price'], 2, ",", "."); ?></p>
                    </div>
                    <button type="submit" name="checkout" class="btn btn-primary btn-block btn-lg float-end">
                      <div class="d-flex justify-content-between">
                        <span>Checkout</span>
                      </div>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        <?php else : ?>
          <div class="text-center">
            <p class="h1 text-uppercase">Your cart is empty.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a id="deleteLink" href="<?= BASEURL; ?>cart/delete/<?= $cart['id_cart'] ?>" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>


<footer id="footer" class="container-fluid bg-transparent mt-5 pt-2">
  <hr>
  <div class="container">
    <div class="row">
      <div class="footer-top-area mt-3">
        <div class="row d-flex flex-wrap justify-content-between">
          <div class="col-lg-3 col-sm-6 pb-3">
            <div class="footer-menu">
              <img src="<?= BASEURL; ?>images/main-logo.png" alt="logo">
              <p>Nisi, purus vitae, ultrices nunc. Sit ac sit suscipit hendrerit. Gravida massa volutpat aenean odio erat nullam fringilla.</p>
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