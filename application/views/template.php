<body class="blog-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('Cindex'); ?>">
                <img src="<?= base_url('assets/assets/img/beraban.png'); ?>" alt="" style="width: 75px; height: auto;">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="<?= base_url('Cindex'); ?>">Home</a></li>
                    <li><a href="<?= base_url('Cindex/about'); ?>">About</a></li>
                    <li><a href="<?= base_url('Cinformasiumum'); ?>">Informasi Umum</a></li>
                    <li><a href="<?= base_url('Cobjekwisata'); ?>" class="active">Objek Wisata</a></li>
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
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

        </div>
    </header>

    <main class="main">

        <!-- Page Title -->
        <div class="page-title" data-aos="fade" style="background-image: url(<?= base_url('assets/assets/img/nature.jpg') ?>)">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <form action="<?= base_url('Cobjekwisata/index') ?>" method="GET" class="col-md-4">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control search-input" placeholder="Cari Objek Wisata..." autocomplete="off">
                            <button class="btn btn-warning" type="submit">
                                <i class="fa-solid fa-magnifying-glass mx-1 ms-1"></i>Cari
                            </button>
                        </div>
                    </form>
                    <form action="<?= base_url('Cobjekwisata/index') ?>" method="GET" class="col-md-4">
                        <div class="input-group">
                            <select class="form-control search-input" name="kategori" id="kategori">
                                <option value="">-- Pilih Kategori --</option>
                                <option value="wisata_alam" <?php echo set_select('kategori', 'wisata_alam', (isset($_GET['kategori']) && $_GET['kategori'] == 'wisata_alam')); ?>>Wisata Alam</option>
                                <option value="wisata_religi" <?php echo set_select('kategori', 'wisata_religi', (isset($_GET['kategori']) && $_GET['kategori'] == 'wisata_religi')); ?>>Wisata Religi</option>
                                <option value="wisata_kuliner" <?php echo set_select('kategori', 'wisata_kuliner', (isset($_GET['kategori']) && $_GET['kategori'] == 'wisata_kuliner')); ?>>Wisata Kuliner</option>
                            </select>
                            <button class="btn btn-warning" type="submit">Filter</button>
                        </div>
                    </form>
                    <center>
                        <?php if ($this->input->get('keyword')) : ?>
                            <div class="container mt-3">
                                <p>Menampilkan hasil pencarian: <strong><?= htmlspecialchars($this->input->get('keyword')) ?></strong></p>
                            </div>
                        <?php endif; ?>
                    </center>
                </div>
                <nav class="breadcrumbs pt-3">
                    <ol>
                        <li><a href="<?= base_url('Cindex') ?>">Home</a></li>
                        <li class="current">Objek Wisata</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Blog Posts Section -->
        <section id="blog-posts" class="blog-posts section">

            <div class="container">
                <div class="row gy-4">

                    <style>
                        .card {
                            border-radius: 11px;
                            /* Menjadikan sudut kartu melengkung */
                            overflow: hidden;
                            /* Memastikan overflow diatur agar border-radius berfungsi */
                            color: #52565e;
                            cursor: pointer;
                            /* Mengubah kursor menjadi pointer saat diarahkan */
                        }

                        .card-img-top {
                            width: 100%;
                            height: 250px;
                            /* Sesuaikan tinggi gambar sesuai kebutuhan Anda */
                            object-fit: cover;
                            transition: transform 0.3s;
                        }

                        .hover-zoom {
                            transition: transform 0.3s, box-shadow 0.3s;
                        }

                        .hover-zoom:hover {
                            transform: scale(1.05);
                            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                        }

                        .text-multiline {
                            display: -webkit-box;
                            -webkit-box-orient: vertical;
                            -webkit-line-clamp: 2;
                            overflow: hidden;
                            text-overflow: ellipsis;
                            height: 3em;
                            /* Adjust based on font-size and line-height */
                        }

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
                    <div class="container">
                        <div class="row">
                            <?php foreach ($objekwst as $key => $objek) : ?>
                                <div class="col-md-4 pt-4">
                                    <div class="card hover-zoom shadow-lg" onclick="window.location='<?= base_url('Cdetails/objek/' . $objek['idobjekwisata']); ?>'">
                                        <img src="<?= base_url('Objekwisata/' . $objek['foto_wst']); ?>" class="card-img-top" alt="Card Image">
                                        <div class="card-body">
                                            <h5 class="post-title"><strong><?= $objek['nama_wst']; ?></strong></h5>

                                            <div class="meta d-flex align-items-center mb-2">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-star" style="color: orange;"></i> <span class="ps-2"><?= $rata[$key]; ?></span>
                                                </div>
                                                <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-comments fa-2x text-gray-300" style="color: gray; font-size: 1.3rem;"></i> <span class="ps-2"><?= $total_ulasan[$key]; ?> <small>Komentar</small></span>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center">
                                                <p class="text-multiline" style="color: gray;"><?= $objek['ket_wst']; ?></p>
                                            </div>

                                            <!-- <div class="meta d-flex align-items-center mb-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="fa-solid fa-star" style="color: orange;"></i> <span class="ps-2"><?= $rata[$key]; ?></span>
                                                </div>
                                                <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-comments fa-2x text-gray-300" style="color: gray; font-size: 1.3rem;"></i> <span class="ps-2"><?= $total_ulasan[$key]; ?> <small>Komentar</small></span>
                                                </div>
                                            </div> -->
                                            <!-- <a href="<?= base_url('Cdetails/objek/' . $objek['idobjekwisata']); ?>" class="btn btn-warning">More Details<i class="bi bi-arrow-right ps-2"></i></a> -->
                                            <!-- <hr> -->
                                            <div class="mb-2">
                                                <a style="color: #4681f4;"><strong>More Details</strong><i class="bi bi-arrow-right ps-2"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <!-- Pagination -->
                        <div class="pagination mt-4">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
                    </div>

                </div>
            </div>

        </section><!-- /Blog Posts Section -->

        <!-- Pagination 2 Section -->
        <section id="pagination-2" class="pagination-2 section">
            <div class="row">
                <div class="container">
                    <div class="d-flex justify-content-center">
                        <ul>
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section><!-- /Pagination 2 Section -->

    </main>

    <footer id="footer" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <span class="sitename">UpConstruction</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>A108 Adam Street</p>
                        <p>New York, NY 535022</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
                        <p><strong>Email:</strong> <span>info@example.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Services</a></li>
                        <li><a href="#">Terms of service</a></li>
                        <li><a href="#">Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Our Services</h4>
                    <ul>
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Product Management</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Hic solutasetp</h4>
                    <ul>
                        <li><a href="#">Molestiae accusamus iure</a></li>
                        <li><a href="#">Excepturi dignissimos</a></li>
                        <li><a href="#">Suscipit distinctio</a></li>
                        <li><a href="#">Dilecta</a></li>
                        <li><a href="#">Sit quas consectetur</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Nobis illum</h4>
                    <ul>
                        <li><a href="#">Ipsam</a></li>
                        <li><a href="#">Laudantium dolorum</a></li>
                        <li><a href="#">Dinera</a></li>
                        <li><a href="#">Trodelas</a></li>
                        <li><a href="#">Flexo</a></li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">UpConstruction</strong> <span>All Rights Reserved</span>
            </p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>

    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>



</body>