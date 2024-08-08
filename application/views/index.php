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
</style>

<body class="index-page">
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
          <li><a href="<?= base_url('Cindex'); ?>" class="active" style="color: black;">Home</a></li>
          <li><a href="<?= base_url('Cindex/about'); ?>" style="color: black;">About</a></li>
          <li><a href="<?= base_url('Cinformasiumum'); ?>" style="color: black;">Informasi Umum</a></li>
          <li><a href="<?= base_url('Cobjekwisata'); ?>" style="color: black;">Objek Wisata</a></li>
          <li><a href="<?= base_url('Cakomodasi'); ?>" style="color: black;">Penginapan</a></li>
          <li><a href="<?= base_url('Cgaleri'); ?>" style="color: black;">Galeri</a></li>
          <!-- <li><a href="<?= base_url('Cacara'); ?>" style="color: black;">Acara</a></li> -->
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

  <main class="main">
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero">
      <div class="info d-flex align-items-center">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <h2 data-aos="fade-down">Welcome to <br><span>Desa Beraban</span></h2>
              <!-- <p data-aos="fade-up">Selamat datang di Desa Beraban, destinasi unik yang kaya sejarah dan keindahan alamnya.
                Nikmati kehangatan kehidupan lokal, objek wisata menarik, penginapan nyaman, dan acara budaya yang beragam.
                Mari bersama menciptakan kenangan tak terlupakan di Desa Beraban!</p> -->
              <p data-aos="fade-up">Selamat datang di Desa Beraban, destinasi unik yang kaya sejarah dan keindahan alamnya.
                Ayo pesan tiketmu sekarang!</p>
              <center>
                <form action="<?= base_url('Cobjekwisata/index') ?>" method="GET" class="col-md-10">
                  <div data-aos="fade-up" class="input-group">
                    <input type="text" name="keyword" class="form-control search-input" placeholder="Cari Objek Wisata..." autocomplete="off">
                    <button class="btn btn-warning" type="submit">
                      <i class="fa-solid fa-magnifying-glass mx-1 ms-1"></i>Cari
                    </button>
                  </div>
                </form>
              </center>
            </div>
          </div>
        </div>
      </div>
      <div id="hero-carousel" class="carousel slide mt-5" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-item active" style="background-image: url(assets/assets/img/tanahlot.jpg)"></div>
        <div class="carousel-item" style="background-image: url(assets/assets/img/pantainyanyi.jpg)"></div>
        <div class="carousel-item" style="background-image: url(assets/assets/img/pantaiberaban.jpg)"></div>
        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>
      </div>
    </section>
    <!-- Features Section -->
    <section id="features" class="features section bg-light">
      <div class="container">
        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">
          <div class="tab-pane fade active show" id="features-tab-1" role="tabpanel">
            <div class="row">
              <div class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0 d-flex flex-column justify-content-center">
                <h3 class="">Tentang Desa Beraban</h3>
                <p class="italic">
                  Desa Beraban terletak di Kecamatan Kediri, Kabupaten Tabanan, Bali. Desa ini merupakan desa
                  tradisional karena masih mempertahankan kearifan lokal dan budaya Bali. Terletak dekat Pura
                  Tanah Lot, salah satu objek wisata terkenal di Bali, Desa Beraban menawarkan pemandangan
                  sawah hijau, perbukitan kecil, dan pantai indah. Mayoritas penduduknya bekerja di sektor
                  pertanian dan perikanan. Selain itu, desa ini kaya akan kegiatan budaya, seperti upacara
                  adat dan festival keagamaan, termasuk perayaan piodalan di Pura Tanah Lot. Desa Beraban
                  menawarkan suasana tenang dan cocok bagi wisatawan yang ingin merasakan kehidupan desa
                  Bali yang autentik serta menikmati keindahan alam dan budaya Bali.
                  </ul><br><br>
                  <a type="button" class="btn btn-warning" href="<?= base_url('Cinformasiumum/pagedetail/3') ?>">More information<i class="fa-solid fa-arrow-right ps-2"></i></a>
              </div>
              <div class="col-lg-6 order-1 order-lg-2 text-center">
                <img src="<?= base_url(); ?>assets/assets/img/beraban.png" alt="" class="img-fluid" style="width: 450px; height: auto;">
              </div>
            </div>
          </div><!-- End tab content item -->
        </div>
      </div>
    </section><!-- /Features Section -->

    <section id="recent-blog-posts" class="recent-blog-posts">
      <div class="container" data-aos="fade-up">
        <div class=" section-header">
          <a href="<?= base_url('Cobjekwisata'); ?>">
            <h2>Objek Wisata</h2>
          </a>
          <p>Dibawah terdapat beberapa objek wisata yang menarik yang dapat kamu kunjungi!</p>
        </div>
        <div data-aos="fade-up" class="container mt-3">
          <div class="row">
            <?php foreach ($objekwst as $key => $objek) : ?>
              <div class="col-md-4 pt-4">
                <div class="card hover-zoom shadow-lg" onclick="window.location='<?= base_url('Cdetails/objek/' . $objek['idobjekwisata']); ?>'">
                  <img src="<?= base_url('Objekwisata/' . $objek['foto_wst']); ?>" class="card-img-top" alt="Card Image">
                  <div class="card-body">
                    <h5 class="post-title"><strong><?= $objek['nama_wst']; ?></strong></h5>

                    <div class="meta d-flex align-items-center mb-2">
                      <div class="d-flex align-items-center">
                        <i class="fa-solid fa-star" style="color: orange;"></i> <span class="ps-2"><?= $rata_objek[$key]; ?></span>
                      </div>
                      <span class="ps-2"> </span>
                      <div class="d-flex align-items-center" style="color: rgb(148 163 184);">
                        <a><b>(<small><?= $totalrating_objek[$key]; ?> reviews</small>)</b></a>
                      </div>
                      <!-- <span class="px-3 text-black-50">/</span>
                      <div class="d-flex align-items-center">
                        <i class="fas fa-comments fa-2x text-gray-300" style="color: gray; font-size: 1.3rem;"></i> <span class="ps-2"><?= $total_ulasan_objek[$key]; ?> <small>Komentar</small></span>
                      </div> -->
                    </div>

                    <div class="d-flex align-items-center">
                      <p class="text-multiline" style="color: gray;"><?= $objek['ket_wst']; ?></p>
                    </div>

                    <div class="mb-2">
                      <a style="color: #4681f4;"><strong>More Details</strong><i class="bi bi-arrow-right ps-2"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <div data-aos="fade-up" class="text-center mt-5 mb-5">
          <p>Ingin mengetahui lebih banyak mengenai Objek Wisata? klik tombol dibawah ini</p>
          <a href="<?= base_url('Cobjekwisata') ?>" class="btn btn-warning">More Information<i class="fa-solid fa-circle-info ps-2"></i></a>
        </div>
    </section>

    <!-- ======= Our Projects Section ======= -->
    <section id="projects" class="projects bg-light">
      <div class=" container" data-aos="fade-up">
        <div class="section-header">
          <a href="<?= base_url('Cakomodasi'); ?>">
            <h2>Penginapan</h2>
          </a>
          <p>Dibawah ini merupakan beberapa destinasi tempat menginap yang dapat Anda kunjungi!</p>
        </div>
        <div class="portfolio-isotope" data-portfolio-filter="*" data-portfolio-layout="masonry" data-portfolio-sort="original-order">
          <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php foreach ($akomodasi as $key => $ako) : ?>
              <div class="col-lg-4 col-md-6 portfolio-item filter-remodeling">
                <div class="portfolio-content h-100" style="border-radius: 11px;">
                  <img src="<?= base_url('Akomodasi/' . $ako['foto_ako']); ?>" class="img-fluid" alt="" style="width: 536px; height: 297px;">
                  <div class="portfolio-info">
                    <h4 style="color: black"><?= $ako['nama_ako'] ?></h4>
                    <p> <i class="fa-solid fa-star" style="color: orange;"></i><span class="ps-2"><?= $rata_akomodasi[$key]; ?></span> <b>(<small><?= $totalrating_akomodasi[$key]; ?> reviews</small>)</b></p>
                    <a href="<?= base_url('Akomodasi/' . $ako['foto_ako']); ?>" title="<?= $ako['ket_ako']; ?>" data-gallery="portfolio-gallery-remodeling" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                    <a href="<?= base_url('Cdetailsako/ako/' . $ako['idakomodasi']); ?>" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
        <!-- "More Info" section -->
        <div data-aos="fade-up" class="text-center mt-5 mb-5">
          <p>Ingin mengetahui lebih banyak mengenai Penginapan? klik tombol dibawah ini</p>
          <a href="<?= base_url('Cakomodasi') ?>" class="btn btn-warning">More Information<i class="fa-solid fa-circle-info ps-2"></i></a>
        </div>
      </div>
    </section><!-- End Our Projects Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id=" footer" class="footer">
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
</body>