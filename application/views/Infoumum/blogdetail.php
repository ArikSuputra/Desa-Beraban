<style>
    .fixed-size {
        width: 600px;
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
    <header id="header" class="header d-flex align-items-center">
        <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Cindex'); ?>">
                <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt="" style="width: 75px; height: auto;">
            </a>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a href="<?= base_url('Cindex'); ?>">Home</a></li>
                    <li><a href="<?= base_url('Cindex/about'); ?>">About</a></li>
                    <li><a href="<?= base_url('Cinformasiumum'); ?>">Informasi Umum</a></li>
                    <li><a href="<?= base_url('Cobjekwisata'); ?>">Objek Wisata</a></li>
                    <li><a href="<?= base_url('Cakomodasi'); ?>">Penginapan</a></li>
                    <li><a href="<?= base_url('Cgaleri'); ?>">Galeri</a></li>
                    <?php if ($this->session->userdata('logged_in')) : ?>
                        <?php if ($this->session->userdata('role') == '1') : ?>
                            <li><a href="<?= base_url('Cdashboard/admin'); ?>">Dashboard Admin</a></li>
                        <?php elseif ($this->session->userdata('role') == '2') : ?>
                            <li><a href="<?= base_url('Cdashboard/kepaladesa'); ?>">Dashboard Kades</a></li>
                        <?php endif; ?>
                        <li><a href="<?= base_url('Auth/logout'); ?>">Logout</a></li>
                    <?php else : ?>
                        <li><a href="<?= base_url('Auth'); ?>" id="loginButton">Login</a></li>
                    <?php endif; ?>
                </ul>
            </nav><!-- .navbar -->
        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
        <div class="breadcrumbs d-flex align-items-center bg-blur" style="background-image: url(<?= base_url('uploads/' . $informasi['foto']); ?>">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Detail Informasi Umum</h2>
                <ol>
                    <li><a href="<?= base_url('Cindex'); ?>"><i class="fa-solid fa-house-chimney me-1"></i>Home</a></li>
                    <li>Details Informasi Umum</li>
                </ol>
            </div>
        </div>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <article class="blog-details">
                            <input type="hidden" readonly name="idinfoumum" value="<?php echo $informasi['idinfoumum'] ?>" class="form-control">
                            <!-- judul -->
                            <h2 class="title"><?= $informasi['judul']; ?></h2>
                            <!-- foto -->
                            <div class="post-img text-center mt-4">
                                <img src="<?php echo base_url('uploads/' . $informasi['foto']); ?>" alt="" class="img-fluid fixed-size">
                            </div>
                            <!-- <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="fa-solid fa-map-location-dot" style="color: black;"></i> <a href="#peta">Peta</a></li>
                                </ul>
                            </div> -->
                            <hr>
                            <!-- Keterangan -->
                            <div class="content" style="text-align: justify; letter-spacing: 1px;">
                                <p>
                                    <?= $informasi['ket']; ?>
                                </p>
                            </div>
                            <div class="meta-bottom">
                                <ul class="cats">
                                    <li><a>Penulis : Admin</a></li>
                                </ul>
                            </div>
                        </article>

                    </div>
                    <div class="col-lg-4">
                        <!-- Artikel Informasi Umum -->
                        <div class="sidebar mb-3">
                            <div class="sidebar-item recent-posts">
                                <h3 class="sidebar-title">Artikel</h3>
                                <hr>
                                <small style="color: gray;">
                                    <p>Dibawah ini merupakan Informasi Umum yang ada di Desa Beraban</p>
                                </small>
                                <?php foreach ($info as $key => $inf) : ?>
                                    <div class="mt-3">
                                        <div class="post-item mt-3">
                                            <img src="<?= base_url('uploads/' . $inf['foto']); ?>" alt="foto">
                                            <div>
                                                <h4><a href="<?= base_url('Cinformasiumum/pagedetail/' . $inf['idinfoumum']); ?>"><?= $inf['judul']; ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div><!-- End Blog Sidebar -->
                    </div>

                </div>
        </section>
        </script>
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
                    </div>
                </div>
            </div>

            <div class="footer-legal text-center position-relative">
                <div class="container">
                    <div class="copyright">
                        &copy; Copyright <strong><span>Desa Beraban</span></strong>. All Rights Reserved
                    </div>
                    <div class="credits">
                        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                    </div>
                </div>
            </div>