<style>
    .pagination {
        display: flex;
        justify-content: center;
        padding-top: 1rem;
    }

    .pagination .page-item .page-link {
        color: #333;
        border: none;
        padding: 0.5rem 0.75rem;
        margin: 0 0.25rem;
        transition: background-color 0.2s, color 0.2s;
    }

    .pagination .page-item.active .page-link {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #fff;
    }

    .pagination .page-item .page-link:hover {
        background-color: #ffc107;
        color: #fff;
    }
</style>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center py-3 shadow-sm fixed-top" style="background:  #fdffff">
        <!-- <header id="header" class="d-flex align-items-center py-4" style="background-color: gainsboro;"> -->
        <div class="container d-flex align-items-center justify-content-between">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Cindex'); ?>">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <h1>Desa Beraban<span>.</span></h1> -->
                <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt="" style="width: 75px; height: auto;">
            </a>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="<?= base_url('Cindex'); ?>" style="color: black;">Home</a></li>
                    <li><a href="<?= base_url('Cindex/about'); ?>" style="color: black;">About</a></li>
                    <li><a href="<?= base_url('Cinformasiumum'); ?>" style="color: black;">Informasi Umum</a></li>
                    <li><a href="<?= base_url('Cobjekwisata'); ?>" style="color: black;">Objek Wisata</a></li>
                    <li><a href="<?= base_url('Cakomodasi'); ?>" class="active" style="color: black;">Penginapan</a></li>
                    <li><a href="<?= base_url('Cgaleri'); ?>" style="color: black;">Galeri</a></li>
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <?php if ($this->session->userdata('role') == '1') : ?>
                            <li><a href="<?= base_url('Cdashboard/admin'); ?>" style="color: black;">Dashboard Admin</a></li>
                        <?php elseif ($this->session->userdata('role') == '2') : ?>
                            <li><a href="<?= base_url('Cdashboard/kepaladesa'); ?>" style="color: black;">Dashboard Kades</a></li>
                        <?php endif; ?>
                        <li><a href="<?= base_url('Auth/logout'); ?>" style="color: black;">Logout</a></li>
                    <?php else : ?>
                        <li><a href="<?= base_url('Auth'); ?>" style="color: black;" id="loginButton">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->

    <center>
        <form action="<?= base_url('Cakomodasi') ?>" method="GET" class="d-flex col-md-5 mt-5">
            <div class="input-group mb-3" style="margin-top: 6rem;">
                <input type="text" name="keyword" class="form-control" placeholder="Cari Penginapan..." autocomplete="off">
                <button class="btn btn-warning" type="submit"><i class="fa-solid fa-magnifying-glass mx-1 ms-1"></i>Cari</button>
            </div>
        </form>
    </center>
    <center>
        <?php if ($this->input->get('keyword')) : ?>
            <div class="container mt-3">
                <p>Menampilkan hasil pencarian: <?= htmlspecialchars($this->input->get('keyword')) ?></p>
            </div>
        <?php endif; ?>
    </center>

    <section id="projects" class="projects">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Penginapan</h2>
                <p>Dibawah ini merupakan beberapa destinasi tempat menginap yang dapat Anda kunjungi!</p>
            </div>
            <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
                <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    <?php foreach ($akomodasi as $key => $ako) : ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                            <div class="portfolio-content h-100" style="border-radius: 11px;">
                                <img src="<?= base_url('Akomodasi/' . $ako['foto_ako']); ?>" class="img-fluid" alt="" style="width: 536px; height: 297px;">
                                <div class="portfolio-info">
                                    <h4 style="color: black;"><?= $ako['nama_ako'] ?></h4>
                                    <p> <i class="fa-solid fa-star" style="color: orange;"></i><span class="ps-2"><?= $rata[$key]; ?></span> <b>(<small><?= $totalrating[$key]; ?> reviews</small>)</b></p>
                                    <a href="<?= base_url('Akomodasi/' . $ako['foto_ako']); ?>" title="<?= $ako['ket_ako']; ?>" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                    <a href="<?= base_url('Cdetailsako/ako/' . $ako['idakomodasi']); ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="pagination mt-4">
                    <?php echo $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </section>


    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="footer-content position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>Desa Beraban</h3>
                            <p>
                                <i class="fa-solid fa-location-dot"></i><span> </span>Jl. Tanah Lot, Beraban, <br>
                                Kec. Kediri, Kabupaten Tabanan, Bali<br><br>
                                <i class="fa-solid fa-phone"></i><span> </span> +1 5589 55488 55<br>
                                <i class="fa-solid fa-envelope"></i><span> </span> beraban@gmail.com<br>
                            </p>
                            <div class="social-links d-flex mt-3">
                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                                <a href="https://www.instagram.com/berabanvillage/" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div><!-- End footer info column-->

                    <div id="map" style="border-radius: 10px; width: 50%; height: 300px; margin: 0 auto;" class="mb-5"></div>
                    <script>
                        const map = L.map('map').setView([-8.601305847787225, 115.10558470656855], 15);

                        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);

                        var marker = L.marker([-8.601305847787225, 115.10558470656855]).addTo(map);
                    </script>
                </div>
            </div>
        </div>

        <div class="footer-legal text-center position-relative">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>Desa Beraban</span></strong>. All Rights Reserved
                </div>
                <div class="credits">
                    <!-- All the links in the footer should remain intact. -->
                    <!-- You can delete the links only if you purchased the pro version. -->
                    <!-- Licensing information: https://bootstrapmade.com/license/ -->
                    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/ -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>