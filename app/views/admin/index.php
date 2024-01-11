<div class="container">
    <?php Flasher::flash(); ?>
</div>

<!-- Table User -->
<div class="container">
    <h1>Data User <a href="<?= BASEURL; ?>home/logout" class="float-end">Logout</a></h1>

    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#registerModal">
        Register User
    </button>

    <table border="1" cellpadding="10" cellspacing="10" class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Aksi</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data['users'] as $user) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#updateModal<?= $user['id_user']; ?>">Ubah</a> |
                        <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $user['id_user']; ?>">Hapus</a>
                    </td>
                    <td><?= $user['name_user'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['pass'] ?></td>
                </tr>

                <div class="modal fade" id="updateModal<?= $user['id_user']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="updateModalLabel">Update User</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= BASEURL; ?>admin/updateUser" method="post">
                                    <input type="text" name="id_user" value="<?= $user['id_user'] ?>" class="visually-hidden">
                                    <ul>
                                        <li class="list-group-item mt-2">
                                            <label for="name" class="form-label fs-5 d-block">Name :</label>
                                            <input type="text" name="name" class="form-control" value="<?= $user['name_user']; ?>" required />
                                        </li>
                                        <li class="list-group-item mt-2">
                                            <label for="email" class="form-label fs-5 d-block">Email :</label>
                                            <input type="email" name="email" class="form-control" value="<?= $user['email']; ?>" required />
                                        </li>
                                        <li class="list-group-item mt-2">
                                            <label for="password" class="form-label fs-5 d-block">Password :</label>
                                            <input type="text" name="password" class="form-control" value="<?= $user['pass']; ?>" required />
                                        </li>
                                        <input type="text" name="passwordOld" value="<?= $user['pass']; ?>" class="visually-hidden">
                                    </ul>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteModal<?= $user['id_user']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a id="deleteLink" href="<?= BASEURL; ?>admin/delete/<?= $user['id_user']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- modal register user -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerModalLabel">Sign Up Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>admin/signupUser" method="post">
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
                        <button type="submit" name="signupUser" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Table Admin -->
<div class="container">
    <h1>Data Admin </h1>

    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#registerAdminModal">
        Add Admin
    </button>

    <table border="1" cellpadding="10" cellspacing="10" class="table table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Aksi</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data['admins'] as $admin) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#updateModal<?= $admin['id_user']; ?>">Ubah</a> |
                        <a href="" data-bs-toggle="modal" data-bs-target="#deleteModalAdmin<?= $admin['id_user']; ?>">Hapus</a>
                    </td>
                    <td><?= $admin['name_user'] ?></td>
                    <td><?= $admin['email'] ?></td>
                    <td><?= $admin['pass'] ?></td>
                </tr>

                <div class="modal fade" id="updateModal<?= $admin['id_user']; ?>" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="updateModalLabel">Update Admin</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= BASEURL; ?>admin/update" method="post">
                                    <input type="text" name="id_user" value="<?= $admin['id_user'] ?>" class="visually-hidden">
                                    <ul>
                                        <li class="list-group-item mt-2">
                                            <label for="name" class="form-label fs-5 d-block">Name :</label>
                                            <input type="text" name="name" class="form-control" value="<?= $admin['name_user']; ?>" required />
                                        </li>
                                        <li class="list-group-item mt-2">
                                            <label for="email" class="form-label fs-5 d-block">Email :</label>
                                            <input type="email" name="email" class="form-control" value="<?= $admin['email']; ?>" required />
                                        </li>
                                        <li class="list-group-item mt-2">
                                            <label for="password" class="form-label fs-5 d-block">Password :</label>
                                            <input type="text" name="password" class="form-control" value="<?= $admin['pass']; ?>" required />
                                        </li>
                                        <input type="text" name="passwordOld" value="<?= $admin['pass']; ?>" class="visually-hidden">
                                    </ul>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="update">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteModalAdmin<?= $admin['id_user']; ?>" tabindex="-1" aria-labelledby="deleteModalAdminLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalAdminLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a id="deleteLink" href="<?= BASEURL; ?>admin/delete/<?= $admin['id_user']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal register admin -->
<div class="modal fade" id="registerAdminModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="registerModalLabel">Sign Up Admin Form</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>admin/signupAdmin" method="post">
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
                        <button type="submit" name="signupAdmin" class="btn btn-primary">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- table product -->
<div class="container">
    <h1>Data Product</h1>
    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#addProduct">
        Add Product
    </button>
    <table border="1" cellpadding="10" cellspacing="10" class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Aksi</th>
                <th scope="col">Nama Product</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Gambar</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col">Kategori</th>
                <th scope="col">Merek</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data['products'] as $product) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td>
                        <a href="" data-bs-toggle="modal" data-bs-target="#editProductModal<?= $product['id_product']; ?>">Ubah</a>
                        <a href="" data-bs-toggle="modal" data-bs-target="#deleteProduct<?= $product['id_product']; ?>">Hapus</a>
                    </td>
                    <td><?= $product['name_product'] ?></td>
                    <td><?= $product['description'] ?></td>
                    <td><img src="<?= BASEURL; ?>images/product/<?= $product['image'] ?>" alt="Gambar <?= $product['name_product'] ?>" style="width: 200px; height: 200px;"></td>
                    <td><?= "Rp" . number_format($product['price'], 2, ",", "."); ?></td>
                    <td><?= $product['qty'] ?></td>
                    <td><?= $product['category'] ?></td>
                    <td><?= $product['brand'] ?></td>
                </tr>

                <div class="modal fade" id="editProductModal<?= $product['id_product']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= BASEURL; ?>admin/editProduct" method="post" enctype="multipart/form-data">
                                    <input type="text" name="id_product" value="<?= $product['id_product'] ?>" class="visually-hidden">
                                    <ul>
                                        <li class=" list-group-item mt-2">
                                            <label for="name" class="form-label fs-5 d-block">
                                                Name Product :
                                            </label>
                                            <input type="text" name="name" class="form-control" value="<?= $product['name_product']; ?>" required />
                                        </li>
                                        <li class="list-group-item mt-2">
                                            <label for="description" class="form-label fs-5 d-block">
                                                Description :
                                            </label>
                                            <input type="text" name="description" class="form-control" value="<?= $product['description']; ?>" required />
                                        </li>
                                        <li class="list-group-item mt-2">
                                            <label for="image" class="form-label fs-5 d-block">
                                                Image Product :
                                            </label>
                                            <img src="<?= BASEURL; ?>images/product/<?= $product['image'] ?>" style="max-width: 200px; max-height: 200px; display: block;">
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" name="image">
                                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                            </div>
                                        </li>
                                        <li class="list-group-item mt-2">
                                            <label for="price" class="form-label fs-5 d-block">
                                                Price :
                                            </label>
                                            <input type="text" name="price" class="form-control" value="<?= $product['price']; ?>" required />
                                        </li>
                                        <li class="list-group-item mt-2">
                                            <label for="qty" class="form-label fs-5 d-block">
                                                Quantity :
                                            </label>
                                            <input type="text" name="qty" class="form-control" value="<?= $product['qty']; ?>" required />
                                        </li>
                                        <li class="list-group-item mt-2">
                                            <label for="category" class="form-label fs-5 d-block">
                                                Category :
                                            </label>
                                            <input type="text" name="category" class="form-control" value="<?= $product['category']; ?>" required />
                                        </li>
                                        <li class="list-group-item mt-2">
                                            <label for="brand" class="form-label fs-5 d-block">
                                                Brand :
                                            </label>
                                            <input type="text" name="brand" class="form-control" value="<?= $product['brand']; ?>" required />
                                        </li>
                                    </ul>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="edit" class="btn btn-primary">Edit Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="deleteProduct<?= $product['id_product']; ?>" tabindex="-1" aria-labelledby="deleteProductLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteProductLabel">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <a id="deleteLink" href="<?= BASEURL; ?>admin/deleteProduct/<?= $product['id_product'] ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- modal tambah product -->
<div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>admin/addProduct" method="post" enctype="multipart/form-data">
                    <ul>
                        <li class=" list-group-item mt-2">
                            <label for="name" class="form-label fs-5 d-block">
                                Name Product :
                            </label>
                            <input type="text" name="name" class="form-control" required />
                        </li>
                        <li class="list-group-item mt-2">
                            <label for="description" class="form-label fs-5 d-block">
                                Description :
                            </label>
                            <input type="text" name="description" class="form-control" required />
                        </li>
                        <li class="list-group-item mt-2">
                            <label for="image" class="form-label fs-5 d-block">
                                Image Product :
                            </label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image" id="inputGroupFile02" required>
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                        </li>
                        <li class="list-group-item mt-2">
                            <label for="price" class="form-label fs-5 d-block">
                                Price :
                            </label>
                            <input type="text" name="price" class="form-control" required />
                        </li>
                        <li class="list-group-item mt-2">
                            <label for="qty" class="form-label fs-5 d-block">
                                Quantity :
                            </label>
                            <input type="text" name="qty" class="form-control" required />
                        </li>
                        <li class="list-group-item mt-2">
                            <label for="category" class="form-label fs-5 d-block">
                                Category :
                            </label>
                            <input type="text" name="category" class="form-control" required />
                        </li>
                        <li class="list-group-item mt-2">
                            <label for="brand" class="form-label fs-5 d-block">
                                Brand :
                            </label>
                            <input type="text" name="brand" class="form-control" required />
                        </li>
                    </ul>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="add" class="btn btn-primary">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>