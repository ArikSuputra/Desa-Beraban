<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(-225deg, #7085B6 0%, #87A7D9 50%);">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Cdashboard/admin'); ?>">
                <!-- <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt=""> -->
                <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt="" style="width: 60px; height: auto;">
                <div class="sidebar-brand-text mx-3">Desa <br> Beraban</div>
            </a>

            <!-- <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                    <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt="">
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
                <div class="sidebar-brand-text mx-3">Desa <br> Beraban</div>
            </a> -->
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
            <li class="nav-item active">
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
                        <a class="collapse-item" href="<?= base_url('Cakomodasi/info') ?>">Data Akomodasi</a>
                        <a class="collapse-item active" href="<?= base_url('Cacara/info'); ?>">Data Acara</a>
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
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


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
                        Data Anda
                    </span>

                    <!-- Topbar Search -->
                    <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="<?= base_url('Cindex'); ?>">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Home</span>
                            </a>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="<?= base_url(); ?>assets/img/iconprofile.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
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
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
                    <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>

                    <p class="mb-4">
                        Pada Halaman Ini Anda Dapat Menginputkan Acara Yang Ada di Desa Beraban
                    </p>
                    <!-- </div> -->
                    <!-- Content Row -->
                    <!-- <div class="row"> -->
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
                            <h5 class="m-3 font-weight-bold text-dark">Tabel Acara</h5>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
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
                                            <th scope="col" class="text-center">Foto</th>
                                            <th scope="col" class="text-center">Waktu</th>
                                            <th scope="col" class="text-center">Keterangan</th>
                                            <th scope="col" class="text-center">Koordinat</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($acara as $acr) : $date = date('h:i, d-M-Y', strtotime($acr['waktu_acr'])) ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td class="text-center"><?= $acr['nama_acr']; ?></td>
                                                <td class="text-center">
                                                    <img src="<?= base_url('Acara/' . $acr['foto_acr']); ?>" alt="Foto" width="75">
                                                    <br>
                                                </td>
                                                <td class="text-center"><?= $date ?></td>
                                                <td class="text-center"><?= $acr['ket_acr']; ?></td>
                                                <td class="text-center"><?= $acr['peta_acr']; ?></td>
                                                <td class="text-center">
                                                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#edit<?= $acr['idacara'] ?>">
                                                        <i class="fa fa-solid fa-pen-to-square"></i>
                                                        Edit
                                                    </button>
                                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#delete<?= $acr['idacara'] ?>">
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

                    <!-- Modal Untuk Melakukan Tambah Data Acara -->
                    <div id="tambah" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLongTitle" aria-modal="true" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 id="exampleModalLongTitle" class="modal-title">Tambah Data Acara</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= base_url('Cacara/proses_tambah'); ?>" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="Judul">Nama</label>
                                            <input type="text" name="nama_acr" class="form-control" placeholder="Masukkan Nama Acara" required>
                                        </div>
                                        <div class=" form-group">
                                            <label for="Foto">Foto </label>
                                            <input type="file" name="foto_acr" class="form-control-file" required>
                                        </div>
                                        <div class=" form-group">
                                            <label for="Foto">Waktu</label>
                                            <input type="datetime-local" name="waktu_acr" class="form-control-file" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="Ket">Keterangan</label>
                                            <textarea cols="30" rows="10" type="text" name="ket_acr" class="form-control" placeholder="Masukkan keterangan" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Judul">Koordinat</label>
                                            <input type="text" name="peta_acr" class="form-control" placeholder="Masukkan Koordinat Peta" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                            <button class="btn btn-primary" type="submit">Tambah Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Untuk Melakukan Tambah Data Acara -->


                    <!-- Modal Edit Data Acara -->
                    <?php foreach ($acara as $acr) : ?>
                        <div id="edit<?= $acr['idacara'] ?>" class="modal fade" tabindex="-1" aria-labelledby="editModalTitle" aria-modal="true" role="dialog">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 id="editModalTitle" class="modal-title">Edit Data Akomodasi</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url('Cacara/proses_edit'); ?>" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="idacara" value="<?= $acr['idacara'] ?>">
                                            <div class="form-group">
                                                <label for="Nama">Nama</label>
                                                <input type="text" name="nama_acr" class="form-control" value="<?= $acr['nama_acr'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Foto">Foto</label>
                                                <input type="file" name="foto_acr" class="form-control-file" size="20">
                                                <small>foto saat ini: <?= $acr['foto_acr'] ?></small>
                                            </div>
                                            <div class="form-group">
                                                <label for="Waktu">Waktu</label>
                                                <input type="datetime-local" name="waktu_acr" class="form-control" value="<?= $acr['waktu_acr'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="Ket">Keterangan</label>
                                                <textarea cols="30" rows="10" name="ket_acr" class="form-control"><?= $acr['ket_acr'] ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="Koordinat">Koordinat</label>
                                                <input type="text" name="peta_acr" class="form-control" value="<?= $acr['peta_acr'] ?>">
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
                    <!-- Akhir Modal Edit Data Acara -->

                    <!-- Modal Hapus Data acara -->
                    <?php foreach ($acara as $acr) : ?>
                        <div class="modal fade" id="delete<?= $acr['idacara'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Apakah anda yakin ingin menghapus data?</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                        <a class="btn btn-primary" href="<?= base_url() ?>Cacara/hapus/<?= $acr['idacara']; ?>">Iya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Akhir Modal Hapus Data Acara -->


                    <!-- Modal Untuk Melakukan Logout -->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="<?= base_url('Auth/logout'); ?>">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Modal Untuk Melakukan Logout -->