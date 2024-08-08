<body>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center py-3 shadow-sm fixed-top" style="background:  #fdffff">
        <div class="container d-flex align-items-center justify-content-between">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Cindex'); ?>">
                <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt="" style="width: 75px; height: auto;">
            </a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="<?= base_url('Cindex'); ?>" style="color: black;">Home</a></li>
                    <li><a href="<?= base_url('Cindex/about'); ?>" style="color: black;">About</a></li>
                    <li><a href="<?= base_url('Cinformasiumum'); ?>" style="color: black;">Informasi Umum</a></li>
                    <li><a href="<?= base_url('Cobjekwisata'); ?>" style="color: black;">Objek Wisata</a></li>
                    <li><a href="<?= base_url('Cakomodasi'); ?>" style="color: black;">Penginapan</a></li>
                    <li><a href="<?= base_url('Cgaleri'); ?>" class="active" style="color: black;">Galeri</a></li>
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
    <section id="hero" class="hero">
        <main id="main">
            <section id="projects" class="projects">
                <div class="container">
                    <div data-aos="fade-down" class="section-header mt-5">
                        <h2>Galeri</h2>
                        <p>Berikut adalah beberapa koleksi foto dan video menarik yang patut Anda nikmati!</p>
                    </div>

                    <!-- Display the username and image once -->
                    <a href="https://www.instagram.com/berabanvillage/">
                        <?php if (!empty($posts)) : ?>
                            <div data-aos="fade-up" class="d-flex align-items-center mb-3">
                                <img src="assets/assets/img/ig.png" alt="" style="width: 50px; margin-right: 10px;">
                                <p class="card-text mb-0" style="color: black;"><strong><?= $posts[0]['username']; ?></strong></p>
                            </div>
                        <?php endif; ?>
                    </a>

                    <div data-aos="fade-up" class="row">
                        <?php if (!empty($posts)) : ?>
                            <?php foreach ($posts as $post) : ?>
                                <div class="col-lg-3 col-md-6 mb-3">
                                    <div class="card shadow card-hover">
                                        <a href="<?= $post['permalink']; ?>" class="d-block">
                                            <?php if ($post['media_type'] == 'IMAGE') : ?>
                                                <img src="<?= $post['media_url']; ?>" class="card-img-top img-fluid" alt="Instagram Post">
                                            <?php elseif ($post['media_type'] == 'VIDEO') : ?>
                                                <video controls class="card-video-top img-fluid">
                                                    <source src="<?= $post['media_url']; ?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <div class="col">
                                <p>No posts available.</p>
                            </div>
                        <?php endif; ?>
                    </div><!-- End row -->

                    <div data-aos="fade-up" class="text-center pt-3">
                        <a type="button" href="https://www.instagram.com/berabanvillage/" class="btn btn-warning">
                            <i class="fa-brands fa-instagram"></i> More Information
                        </a>
                    </div>
                </div><!-- End Container -->
            </section><!-- End Projects Section -->
        </main><!-- End Main -->
    </section><!-- End Hero Section -->

    <!-- Custom CSS -->
    <style>
        .card-hover {
            transition: transform 0.2s;
            height: 100%;
        }

        .card-hover:hover {
            transform: scale(1.05);
            filter: brightness(65%);
        }

        .card {
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-img-top,
        .card-video-top {
            object-fit: cover;
            height: 300px;
            width: 100%;
            margin: 0;
            padding: 0;
            display: block;
        }

        .card-body {
            flex: 1 1 auto;
        }

        .col-lg-3,
        .col-md-6 {
            padding-left: 6px;
            padding-right: 6px;
        }

        .mb-3 {
            margin-bottom: 13px !important;
        }

        .btn-warning {
            transition: transform 0.5s;
        }

        .btn-warning:hover {
            transform: scale(1.05);
            filter: brightness(75%);
        }
    </style>

    <!-- <div class="row">
            <?php if (!empty($posts)) : ?>
                <?php foreach ($posts as $post) : ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card shadow" style="max-width: 200px;">
                            <a href="<?= $post['permalink']; ?>">
                                <img src="<?= $post['media_url']; ?>" class="card-img-top" alt="Instagram Post" style="height: auto; width: 100%;">
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col">
                    <p>No posts available.</p>
                </div>
            <?php endif; ?>
        </div> -->

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