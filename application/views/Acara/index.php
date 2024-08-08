<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center py-3 shadow-sm fixed-top" style="background: #fdffff">
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
                    <li><a href="<?= base_url('Cakomodasi'); ?>" style="color: black;">Akomodasi</a></li>
                    <li><a href="<?= base_url('Cacara'); ?>" class="active" style="color: black;">Acara</a></li>
                    <li><a href="<?= base_url('Auth'); ?>" style="color: black;">Login</a></li>
                </ul>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->

    <center>
        <form action="<?= base_url('Cacara') ?>" method="GET" class="d-flex col-md-5 mt-5">
            <div class="input-group mb-3" style="margin-top: 6rem;">
                <input type="text" name="keyword" class="form-control" placeholder="Cari Acara..." autocomplete="off">
                <button class="btn btn-secondary" type="submit"><i class="fa-solid fa-magnifying-glass mx-1 ms-1"></i>Cari</button>
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

    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Acara</h2>
                <p>Jangan sampai ketinggalan! Dibawah ini merupakan acara-acara menarik yang dapat kamu saksikan!</p>
            </div>
            <div class="row gy-5">
                <?php foreach ($acara as $key => $acr) : $date = date('d-M-Y ', strtotime($acr['waktu_acr'])) ?>
                    <div class="col-xl-4 col-md-8" data-aos="fade-up" data-aos-delay="100">
                        <div class="post-item position-relative h-100">

                            <div class="post-img position-relative overflow-hidden text-center">
                                <img src="<?= base_url('Acara/' . $acr['foto_acr']); ?>" class="img-fluid" alt="Foto" style="width: 516px; height: 277px;">
                                <span class="post-date"><?= $date ?></span>
                            </div>
                            <div class="post-content d-flex flex-column">
                                <h3 class="post-title"><?= $acr['nama_acr']; ?></h3>
                                <div class="meta d-flex align-items-center">
                                    <!-- <div class="d-flex align-items-center">
                                            Rating:
                                            <div class="rating" data-rateyo-rating="<?= $rata[$key]; ?>"></div>
                                        </div> -->
                                    <div class="d-flex align-items-center">
                                        <i class="fa-solid fa-star" style="color: orange;"></i> <span class="ps-2"><?= $rata[$key]; ?></span>
                                    </div>
                                </div>
                                <hr>
                                <a href="<?= base_url('Cdetailsacr/acara/' . $acr['idacara']); ?>" class="readmore stretched-link"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End post item -->
                <?php endforeach; ?>
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
                                Jl. Tanah Lot, Beraban, <br>
                                Kec. Kediri, Kabupaten Tabanan, Bali<br><br>
                                <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> beraban@gmail.com<br>
                            </p>
                            <div class="social-links d-flex mt-3">
                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="d-flex align-items-center justify-content-center"><i class="bi bi-youtube"></i></a>
                            </div>
                        </div>
                    </div><!-- End footer info column-->

                    <div id="map" style="width: 50%; height: 300px; margin: 0 auto;" class="mb-5"></div>
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