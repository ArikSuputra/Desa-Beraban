<style>
    .text-multiline {
        display: -webkit-box;
        -webkit-line-clamp: 7;
        /* Membatasi hingga 6 baris */
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .fixed-size {
        width: 700px;
        /* Atur lebar sesuai kebutuhan Anda */
        height: auto;
        /* Atur tinggi sesuai kebutuhan Anda */
        object-fit: cover;
        /* Untuk memastikan gambar terpotong dengan baik jika rasio tidak sesuai */
        border-radius: 11px;
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
                    <li><a href="<?= base_url('Cinformasiumum'); ?>" class="active" style="color: black;">Informasi Umum</a></li>
                    <li><a href="<?= base_url('Cobjekwisata'); ?>" style="color: black;">Objek Wisata</a></li>
                    <li><a href="<?= base_url('Cakomodasi'); ?>" style="color: black;">Penginapan</a></li>
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


    <section id="blog" class="blog mt-5">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <div class="col-lg-8">
                    <?php foreach ($informasi as $info) : ?>
                        <article class="blog-details">
                            <!-- foto -->
                            <div class="post-img text-center mt-4">
                                <img src="<?php echo base_url('uploads/' . $info['foto']); ?>" alt="" class="img-fluid fixed-size">
                            </div>
                            <!-- judul -->
                            <h2 class="title"><?= $info['judul']; ?></h2>
                            <hr>
                            <!-- Keterangan -->
                            <div class="text-multiline mb-3" style="text-align: justify; letter-spacing: 1px;">
                                <p>
                                    <?= $info['ket']; ?>
                                </p>
                            </div><!-- End post content -->
                            <a type="button" class="btn btn-warning" href="<?= base_url('Cinformasiumum/pagedetail/' . $info['idinfoumum']); ?>">Read More<i class="fa-solid fa-arrow-right ps-2"></i></a>
                        </article><!-- End blog post -->
                        <br>
                    <?php endforeach; ?>
                </div>

                <div class="col-lg-4">
                    <!-- Objek wisata -->
                    <div class="sidebar mb-3">
                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Objek Wisata</h3>
                            <hr>
                            <small style="color: gray;">
                                <p>Dibawah ini merupakan Objek-objek Wisata yang ada di Desa Beraban</p>
                            </small>
                            <?php foreach ($objekwisata as $key => $objek) : ?>
                                <div class="mt-3">
                                    <div class="post-item mt-3">
                                        <img src="<?= base_url('Objekwisata/' . $objek['foto_wst']); ?>" alt="foto">
                                        <div>
                                            <h4><a href="<?= base_url('Cdetails/objek/' . $objek['idobjekwisata']); ?>"><?= $objek['nama_wst']; ?></a></h4>
                                            <time datetime="2020-01-01"><i class="fa-solid fa-star" style="color:orange;"></i> <span class="ps-1"><?= $rata_objek[$key]; ?></span></time>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div><!-- End Blog Sidebar -->
                    <!-- Akomodasi -->
                    <div class="sidebar">
                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Penginapan</h3>
                            <hr>
                            <small style="color: gray;">
                                <p>Dibawah ini merupakan beberapa rekomendasi tempat menginap menarik yang ada di Desa Beraban!</p>
                            </small>
                            <?php foreach ($akomodasiwst as $key => $ako) : ?>
                                <div class="mt-3">
                                    <div class="post-item mt-3">
                                        <img src="<?= base_url('Akomodasi/' . $ako['foto_ako']); ?>" alt="">
                                        <div>
                                            <h4><a href="<?= base_url('Cdetailsako/ako/' . $ako['idakomodasi']); ?>"><?= $ako['nama_ako']; ?></a></h4>
                                            <time datetime="2020-01-01"><i class="fa-solid fa-star" style="color:orange;"></i> <span class="ps-1"><?= $rata_akomodasi[$key]; ?></span></time>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Blog Details Section -->

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
                    <!-- Peta -->
                    <div id="map" style="border-radius: 10px; width: 50%; height: 300px; margin: 0 auto;" class="mb-5"></div>
                    <script>
                        const map = L.map('map').setView([-8.601305847787225, 115.10558470656855], 15);
                        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                            maxZoom: 19,
                            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                        }).addTo(map);
                        var marker = L.marker([-8.601305847787225, 115.10558470656855]).addTo(map);
                    </script>
                    <!-- end peta -->
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