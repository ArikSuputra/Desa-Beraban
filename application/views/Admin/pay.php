<!DOCTYPE html>
<html>

<head>
    <title>Detail Verifikasi Pembayaran</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(-225deg, #7085B6 0%, #87A7D9 50%);">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Cdashboard/admin'); ?>">
                <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt="" style="width: 60px; height: auto;">
                <div class="sidebar-brand-text mx-3">Desa <br> Beraban</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url(); ?>Cdashboard/admin">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Data
            </div>
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data Desa</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?= base_url('Cinformasiumum/info'); ?>">Data Informasi Umum</a>
                        <a class="collapse-item" href="<?= base_url('Cobjekwisata/info'); ?>">Data Objek Wisata</a>
                        <a class="collapse-item" href="<?= base_url('Cakomodasi/info') ?>">Data Penginapan</a>
                        <a class="collapse-item active" href="<?= base_url('CPay/info'); ?>">Data Verifikasi Pembayaran</a>
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
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar"></div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <span>Data Anda</span>
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
                    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
                    <p class="mb-4">Pada Halaman Ini Anda Dapat Memverifikasi Bukti Pembayaran dari Pengguna</p>

                    <?php if ($this->session->flashdata('message')) : ?>
                        <div class="alert alert-<?= $this->session->flashdata('status'); ?> alert-dismissible fade show<?= ($this->session->flashdata('status') == 'error') ? ' alert-danger text-black' : ''; ?>" role="alert">
                            <?= $this->session->flashdata('message'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between" style="background-color: #bae7dd;">
                            <h5 class="m-3 font-weight-bold text-dark">Tabel Verifikasi Pembayaran</h5>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">No</th>
                                            <th scope="col" class="text-center">Nama User</th>
                                            <th scope="col" class="text-center">Bukti Pembayaran</th>
                                            <th scope="col" class="text-center">Objek Wisata</th>
                                            <th scope="col" class="text-center">Total Pembayaran</th>
                                            <th scope="col" class="text-center">Status</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($verifikasi as $ver) : ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $ver['username']; ?></td>
                                                <td class="text-center">
                                                    <img src="<?= base_url('uploads/payment_proofs/' . $ver['bukti']); ?>" alt="Bukti Pembayaran" width="75">
                                                </td>
                                                <td class="text-center"><?= $ver['nama_wst']; ?></td>
                                                <td class="text-center">Rp. <?= number_format($ver['total_pembayaran'], 0, ',', '.'); ?></td>
                                                <td class="text-center"><?= ucfirst($ver['status']); ?></td>
                                                <td class="text-center">
                                                    <?php if ($ver['status'] === 'pending') : ?>
                                                        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#verifikasi<?= $ver['idtransaksi'] ?>">
                                                            <i class="fa fa-check"></i> Verifikasi
                                                        </button>
                                                    <?php else : ?>
                                                        <button class="btn btn-secondary" type="button" disabled>
                                                            <i class="fa fa-check"></i> Sudah Diverifikasi
                                                        </button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Detail Verifikasi Modal -->
                    <?php foreach ($verifikasi as $ver) : ?>
                        <div id="verifikasi<?= $ver['idtransaksi'] ?>" class="modal fade" tabindex="-1" aria-labelledby="verifikasiModalTitle" aria-modal="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="verifikasiModalTitle" class="modal-title">Detail Verifikasi Pembayaran</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="transaction-details">
                                            <h6><strong>Nama Pengguna:</strong> <?= $ver['username']; ?></h6>
                                            <h6><strong>ID Transaksi:</strong> <?= $ver['idtransaksi']; ?></h6>
                                            <h6><strong>Objek Wisata:</strong> <?= $ver['nama_wst']; ?></h6>
                                            <h6><strong>Total Pembayaran:</strong> Rp. <?= number_format($ver['total_pembayaran'], 0, ',', '.'); ?></h6>
                                            <h6><strong>Bukti Pembayaran:</strong></h6>
                                            <img src="<?= base_url('uploads/payment_proofs/' . $ver['bukti']); ?>" alt="Bukti Pembayaran" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="<?= base_url('CPay/verify_payment/' . $ver['idtransaksi']); ?>" method="post">
                                            <button type="submit" name="status" value="accept" class="btn btn-success">Terima</button>
                                            <button type="submit" name="status" value="reject" class="btn btn-danger">Tolak</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/sb-admin-2.min.js'); ?>"></script>
</body>

</html>