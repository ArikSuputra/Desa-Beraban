<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(-225deg, #7085B6 0%, #87A7D9 50%);">
            <!-- <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-image: linear-gradient(-225deg, #7085B6 0%, #87A7D9 50%, #DEF3F8 100%);"> -->

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Cdashboard/admin'); ?>">
                <!-- <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt=""> -->
                <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt="logo" style="width: 60px; height: auto;">
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
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('Cdashboard/admin') ?>">
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
                        <a class="collapse-item" href="<?= base_url('Cpengguna/info'); ?>">Data Pengguna</a>
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
                        <a class="collapse-item" href="<?= base_url('Ctransaksi/info'); ?>">Data Transaksi</a>

                    </div>
                </div>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li> -->

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <div class="sidebar-heading">
                Opsi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="<?= base_url('Auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <!-- <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div> -->
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
                        Dashboard
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
                            <a class="nav-link dropdown-toggle" href="<?= base_url('Cindex') ?>" id="homeButton">
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-chart-line"></i> <b>Dashboard Admin</b></h1>
                        <div>
                            <p class="text-gray-800">Selamat datang, <?php echo $username; ?></p>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                <i class="fas fa-download fa-sm text-white-50"></i> Generate Report
                            </a>
                        </div>
                    </div>

                    <hr>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <a class="card-body" href="<?= base_url('Cinformasiumum/info'); ?>">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Informasi Umum</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_info; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                                            <i class="fa-solid fa-circle-info fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <a class="card-body" href="<?= base_url('Cobjekwisata/info'); ?>">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Objek Wisata</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_objek; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                                            <i class="fa-regular fa-object-group fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <a class="card-body" href="<?= base_url('Cakomodasi/info'); ?>">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Penginapan
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_ako; ?></div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                                            <i class="fa-solid fa-shop fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <a class="card-body" href="<?= base_url('Ctiket/info'); ?>">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Tiket
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_tiket; ?></div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                                            <i class="fa-solid fa-ticket fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <a class="card-body" href="<?= base_url('Charga/info'); ?>">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Harga
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_harga; ?></div>
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                                            <i class="fa-solid fa-tags fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Users Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <a class="card-body" href="<?= base_url('Cpengguna/info'); ?>">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pengguna</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_user; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Transaction Data Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <a class="card-body" href="<?= base_url('Ctransaksi/info'); ?>">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Transaksi</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_transaksi; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-exchange-alt fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <a class="card-body" href="<?= base_url('Cpay/info'); ?>">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Verifikasi Pembayaran
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <!-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $total_ako; ?></div> -->
                                                </div>
                                                <!-- <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                                            <i class="fa-solid fa-shop fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Transaction Chart -->
                        <div class="col-xl-8 col-lg-8">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Statistik Transaksi</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="tahun">Pilih Tahun:</label>
                                            <select id="tahun" class="form-control">
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="bulan">Pilih Bulan:</label>
                                            <select id="bulan" class="form-control" disabled>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="periode">Pilih Periode:</label>
                                            <div class="btn-group" role="group" aria-label="Periode">
                                                <button type="button" class="btn btn-secondary" id="harian">Harian</button>
                                                <button type="button" class="btn btn-secondary" id="mingguan">Mingguan</button>
                                                <button type="button" class="btn btn-secondary" id="bulanan">Bulanan</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chart-area mt-4">
                                        <canvas id="transaksiChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Chart.js library -->
                        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

                        <!-- jQuery library -->
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                        <!-- Script to create the chart -->
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var ctx = document.getElementById("transaksiChart").getContext('2d');
                                var transaksiChart;

                                function updateChart(labels, data) {
                                    if (transaksiChart) {
                                        transaksiChart.destroy();
                                    }

                                    transaksiChart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: labels,
                                            datasets: [{
                                                label: 'Total Pembayaran',
                                                data: data,
                                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                borderColor: 'rgba(54, 162, 235, 1)',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            scales: {
                                                y: {
                                                    beginAtZero: true
                                                }
                                            }
                                        }
                                    });
                                }

                                function fetchData(tahun, bulan, periode) {
                                    $.ajax({
                                        url: '<?= base_url("Cdashboard/getDataTransaksi") ?>',
                                        type: 'POST',
                                        data: {
                                            tahun: tahun,
                                            bulan: bulan,
                                            periode: periode
                                        },
                                        dataType: 'json',
                                        success: function(response) {
                                            updateChart(response.labels, response.data_pembayaran);
                                        }
                                    });
                                }

                                function toggleBulanDropdown(enable) {
                                    document.getElementById('bulan').disabled = !enable;
                                }

                                document.getElementById('tahun').addEventListener('change', function() {
                                    var tahun = this.value;
                                    var bulan = document.getElementById('bulan').value;
                                    var periode = document.querySelector('.btn-group .btn-secondary.active').id;
                                    fetchData(tahun, bulan, periode);
                                });

                                document.getElementById('bulan').addEventListener('change', function() {
                                    var tahun = document.getElementById('tahun').value;
                                    var bulan = this.value;
                                    var periode = document.querySelector('.btn-group .btn-secondary.active').id;
                                    fetchData(tahun, bulan, periode);
                                });

                                document.querySelectorAll('.btn-group .btn-secondary').forEach(function(button) {
                                    button.addEventListener('click', function() {
                                        document.querySelectorAll('.btn-group .btn-secondary').forEach(function(btn) {
                                            btn.classList.remove('active');
                                        });
                                        this.classList.add('active');
                                        var tahun = document.getElementById('tahun').value;
                                        var bulan = document.getElementById('bulan').value;
                                        var periode = this.id;
                                        toggleBulanDropdown(periode !== 'bulanan');
                                        fetchData(tahun, bulan, periode);
                                    });
                                });

                                // Set default values and fetch initial data
                                document.getElementById('tahun').value = new Date().getFullYear();
                                document.getElementById('bulan').value = ("0" + (new Date().getMonth() + 1)).slice(-2);
                                document.getElementById('bulanan').classList.add('active');
                                toggleBulanDropdown(false);
                                fetchData(new Date().getFullYear(), document.getElementById('bulan').value, 'bulanan');
                            });
                        </script>
                        <!-- Pending Requests Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <a class="card-body" href="<?= base_url('Cacara/info'); ?>">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Acara</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_acr; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fa-regular fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div> -->
                    </div>



                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <!-- <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2021</span>
                        </div>
                    </div>
                </footer> -->
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
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