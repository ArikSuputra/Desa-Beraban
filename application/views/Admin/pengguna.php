<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(-225deg, #7085B6 0%, #87A7D9 50%);">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Cdashboard/admin'); ?>">
                <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt="" style="width: 60px; height: auto;">
                <div class="sidebar-brand-text mx-3">Desa <br> Beraban</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>Cdashboard/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <!-- <i class="fas fa-fw fa-cog"></i> -->
                    <i class="fas fa-fw fa-folder"></i>

                    <span>Data Desa</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <!-- <h6 class="collapse-header">Custom Components:</h6> -->
                        <a class="collapse-item" href="<?= base_url('Cinformasiumum/info'); ?>">Data Informasi Umum</a>
                        <a class="collapse-item" href="<?= base_url('Cobjekwisata/info'); ?>">Data Objek Wisata</a>
                        <a class="collapse-item" href="<?= base_url('Cakomodasi/info'); ?>">Data Penginapan</a>
                        <a class="collapse-item" href="<?= base_url('Ctiket/info'); ?>">Data Tiket</a>
                        <a class="collapse-item" href="<?= base_url('Charga/info'); ?>">Data Harga</a>
                        <a class="collapse-item active" href="<?= base_url('Cpengguna/info'); ?>">Data Pengguna</a>
                        <a class="collapse-item" href="<?= base_url('Ctransaksi/info'); ?>">Data Transaksi</a>

                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports" aria-expanded="true" aria-controls="collapseReports">
                    <i class="fas fa-fw fa-file-alt"></i>
                    <span>Data Laporan</span>
                </a>
                <div id="collapseReports" class="collapse" aria-labelledby="headingReports" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('Claporan/informasiumum'); ?>">Laporan Informasi Umum</a>
                        <a class="collapse-item" href="<?= base_url('Claporan/objekwisata'); ?>">Laporan Objek Wisata</a>
                        <a class="collapse-item" href="<?= base_url('Claporan/penginapan'); ?>">Laporan Penginapan</a>
                        <a class="collapse-item" href="<?= base_url('Claporan/pengguna'); ?>">Laporan Pengguna</a>
                        <a class="collapse-item" href="<?= base_url('Claporan/transaksi'); ?>">Laporan Transaksi</a>
                        <a class="collapse-item" href="<?= base_url('Claporan/hargatiket'); ?>">Laporan Harga Tiket</a>
                        <a class="collapse-item" href="<?= base_url('Claporan/tiket'); ?>">Laporan Tiket</a>
                    </div>
                </div>
            </li>

            <div class="sidebar-heading">
                Opsi
            </div>

            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('Auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <span>
                        Data Pengguna
                    </span>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="<?= base_url('Cindex'); ?>">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Home</span>
                            </a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="<?= base_url(); ?>assets/img/iconprofile.png">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url('Auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                    <br>
                    <p class="mb-4">
                        Halaman Mengelola Data Pengguna
                    </p>
                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-<?= $this->session->flashdata('status'); ?> alert-dismissible fade show<?= ($this->session->flashdata('status') == 'error') ? ' alert-danger text-black' : ''; ?>" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between" style="background-color: #bae7dd;">
                            <h5 class="m-3 font-weight-bold text-dark">Tabel Pengguna</h5>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahPengguna">
                                <i class="fa fa-plus"></i>
                                Tambah Data
                            </button>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col" class="text-center">Nama</th>
                                            <th scope="col" class="text-center">Email</th>
                                            <th scope="col" class="text-center">Role</th>
                                            <th scope="col" class="text-center">Password</th>
                                            <th scope="col" class="text-center">Created At</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($pengguna as $user) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $user['username']; ?></td>
                                                <td class="text-center"><?= $user['email']; ?></td>
                                                <td class="text-center"><?= $user['role']; ?></td>
                                                <td class="text-center">**********</td>
                                                <td class="text-center"><?= $user['created']; ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#editPengguna<?= $user['idusers'] ?>">
                                                        <i class="fa fa-solid fa-pen-to-square"></i>
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deletePengguna<?= $user['idusers'] ?>">
                                                        <i class="fa fa-trash"></i>
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End of Page Wrapper -->

                    <!-- Scroll to Top Button-->
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>

                    <!-- Modal Tambah Pengguna -->
                    <div id="tambahPengguna" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="exampleModalLongTitle" class="modal-title">Tambah Data Pengguna</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('Cpengguna/tambah'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="Nama">Nama</label>
                                            <input type="text" name="username" class="form-control" placeholder="Masukkan Nama Pengguna" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Masukkan Email Pengguna" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan Password Pengguna" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Role">Role</label>
                                            <select name="role" class="form-control" required>
                                                <option value="" selected disabled hidden>-Pilih Role Pengguna-</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Kepala Desa</option>
                                                <option value="3">Customer</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Tambah Pengguna -->


                    <!-- Modal Edit Pengguna -->
                    <?php foreach ($pengguna as $user) : ?>
                        <div id="editPengguna<?= $user['idusers']; ?>" class="modal fade" tabindex="-1" aria-labelledby="editModalTitle" aria-modal="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="editModalTitle" class="modal-title">Edit Pengguna</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('Cpengguna/edit/' . $user['idusers']); ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="idusers" value="<?= $user['idusers'] ?>">
                                            <div class="form-group">
                                                <label for="Nama">Nama</label>
                                                <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email">Email</label>
                                                <input type="email" name="email" class="form-control" value="<?= $user['email']; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="Role">Role</label>
                                                <select name="role" class="form-control" required>
                                                    <option value="1" <?= $user['role'] == 1 ? 'selected' : ''; ?>>Admin</option>
                                                    <option value="2" <?= $user['role'] == 2 ? 'selected' : ''; ?>>Kepala Desa</option>
                                                    <option value="3" <?= $user['role'] == 3 ? 'selected' : ''; ?>>Customer</option>
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                <button class="btn btn-primary" type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Akhir Modal Edit Pengguna -->

                    <!-- Modal Hapus Pengguna -->
                    <?php foreach ($pengguna as $user) : ?>
                        <div id="deletePengguna<?= $user['idusers'] ?>" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-modal="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="exampleModalLongTitle" class="modal-title">Hapus Pengguna</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda yakin ingin menghapus pengguna ini?</p>
                                        <form action="<?= base_url('Cpengguna/hapus/' . $user['idusers']); ?>" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger btn-block">Hapus Pengguna</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>© Desa Beraban 2023</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
        </div>

    </div>
</body>