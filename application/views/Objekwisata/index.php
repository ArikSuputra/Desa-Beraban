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
                    <li><a href="<?= base_url('Cobjekwisata'); ?>" class="active" style="color: black;">Objek Wisata</a></li>
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

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero pt-5">
        <main id="main">
            <section id="recent-blog-posts" class="recent-blog-posts">
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
                <div class="container pt-5" data-aos="fade-up">
                    <div class="section-header">
                        <h2>Objek Wisata</h2>
                        <p>Dibawah terdapat beberapa objek wisata yang menarik yang dapat kamu kunjungi!</p><br>
                    </div>

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
                                                <span class="ps-2"> </span>
                                                <div class="d-flex align-items-center" style="color: rgb(148 163 184);">
                                                    <a><b>(<small><?= $totalrating[$key]; ?> reviews</small>)</b></a>
                                                </div>
                                                <!-- <span class="px-3 text-black-50">/</span>
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-comments fa-2x text-gray-300" style="color: gray; font-size: 1.3rem;"></i> <span class="ps-2"><?= $total_ulasan[$key]; ?> <small>Komentar</small></span>
                                                </div> -->
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
            </section>
        </main><!-- End #main -->
    </section>
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