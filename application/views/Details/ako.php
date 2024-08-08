<style>
    .fixed-size {
        width: 800px;
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
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <h1>Desa Beraban<span>.</span></h1> -->
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
        <div class="breadcrumbs d-flex align-items-center" style="background-image: url(<?= base_url('Akomodasi/' . $akomodasi['foto_ako']); ?>">
            <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">
                <h2>Details Penginapan</h2>
                <ol>
                    <li><a href="<?= base_url('Cindex'); ?>"><i class="fa-solid fa-house-chimney me-1"></i>Home</a></li>
                    <li>Details Penginapan</li>
                </ol>
                <form action="<?= base_url('Cakomodasi') ?>" method="GET" class="col-md-5">
                    <div data-aos="fade-up" class="input-group">
                        <input type="text" name="keyword" class="form-control search-input" placeholder="Cari Penginapan..." autocomplete="off">
                        <button class="btn btn-warning" type="submit">
                            <i class="fa-solid fa-magnifying-glass mx-1 ms-1"></i>Cari
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-5">
                    <div class="col-lg-8">
                        <article class="blog-details">
                            <!-- <div class="col-md-5"> -->
                            <input type="hidden" readonly name="idakomodasi" value="<?php echo $akomodasi['idakomodasi'] ?>" class="form-control">
                            <!-- </div> -->
                            <!-- judul -->
                            <h2 class="title"><?= $akomodasi['nama_ako']; ?></h2>
                            <!-- foto -->
                            <div class="post-img text-center mt-4">
                                <img src="<?php echo base_url('Akomodasi/' . $akomodasi['foto_ako']); ?>" alt="" class="img-fluid fixed-size">
                            </div>
                            <div class="meta-top">
                                <ul>
                                    <li class="d-flex align-items-center"><i class="fa-solid fa-map-location-dot" style="color: black;"></i> <a href="#peta">Peta</a></li>
                                    <!-- <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01">Jan 1, 2022</time></a></li> -->
                                    <li class="d-flex align-items-center"><i class="bi bi-chat-dots" style="color: black;"></i> <a href="#komen"><?= $total_komen; ?> comments</a></li>
                                </ul>
                            </div><!-- End meta top -->
                            <hr>
                            <!-- Keterangan -->
                            <div class="content" style="text-align: justify; letter-spacing: 1px;">
                                <p>
                                    <?= $akomodasi['ket_ako']; ?>
                                </p>
                            </div><!-- End post content -->
                            <div class="meta-bottom">
                                <!-- <i class="bi bi-folder"></i> -->
                                <ul class="cats">
                                    <li><a>Penulis : Admin</a></li>
                                </ul>
                            </div>
                            <!-- End meta bottom -->
                        </article><!-- End blog post -->

                        <div class="comments">
                            <div class="reply-form">
                                <?php if ($this->session->flashdata('message')) : ?>
                                    <div class="alert alert-<?= $this->session->flashdata('status'); ?> alert-dismissible fade show<?= ($this->session->flashdata('status') == 'error') ? ' alert-danger text-black' : ''; ?>" role="alert">
                                        <?= $this->session->flashdata('message'); ?>
                                    </div>
                                <?php endif; ?>
                                <h4>Komentar</h4>
                                <p>Dibawah ini Anda dapat memberikan komentar dan rating dengan memasukkan rating dan komentar</p>
                                <form id="commentForm" action="<?= base_url('Cdetailsako/add_ako'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="idakomodasi" value="<?= $akomodasi['idakomodasi'] ?>">
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="">Rating</label>
                                            <div id="rating" data-rateyo-rating="0"></div>
                                            <input type="hidden" name="rating" id="rating_input">
                                            <small id="ratingError" class="text-danger" style="display: none;">Rating tidak boleh kosong</small>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col form-group">
                                            <label for="">Komentar</label>
                                            <textarea name="ulasan" id="ulasan" class="form-control" placeholder="Masukkan komentar" required></textarea>
                                            <small id="commentError" class="text-danger" style="display: none;">Komentar tidak boleh kosong</small>
                                        </div>
                                    </div>
                                    <button type="button" id="submitComment" class="btn btn-primary">Post Comment</button>
                                </form>
                            </div>

                            <script>
                                $(function() {
                                    $("#rating").rateYo({
                                        rating: 0,
                                        fullStar: true,
                                        onChange: function(rating, rateYoInstance) {
                                            $("#rating_input").val(rating);
                                        },
                                        onSet: function(rating, rateYoInstance) {
                                            $("#rating_input").val(rating);
                                        }
                                    });

                                    $("#submitComment").click(function() {
                                        var rating = $("#rating_input").val();
                                        var ulasan = $("#ulasan").val();
                                        var isValid = true;

                                        if (!rating) {
                                            $("#ratingError").show();
                                            isValid = false;
                                        } else {
                                            $("#ratingError").hide();
                                        }

                                        if (!ulasan) {
                                            $("#commentError").show();
                                            isValid = false;
                                        } else {
                                            $("#commentError").hide();
                                        }

                                        if (isValid) {
                                            var loggedIn = <?= $this->session->userdata('logged_in') ? 'true' : 'false'; ?>;
                                            var userRole = <?= $this->session->userdata('role') ? $this->session->userdata('role') : 'null'; ?>;

                                            if (!loggedIn || userRole != 3) {
                                                window.location.href = "<?= base_url('Auth'); ?>";
                                            } else {
                                                $("#commentForm").submit();
                                            }
                                        }
                                    });
                                });
                            </script>

                            <h5 id="komen" class="comments-count mt-5"><?= $total_komen; ?> Comments</h5>
                            <hr>
                            <div id="comment-1" class="comment">
                                <?php foreach ($komentar as $komen) : $date = date('h:i | d-M-Y ', strtotime($komen['waktu'])) ?>
                                    <div class="d-flex">
                                        <div class="comment-img"><img src=<?= base_url('assets/img/iconuser.png'); ?> alt="" style="width: 45px; height: auto;"></div>
                                        <div>
                                            <h6><a><?= $komen['username']; ?></a>.<small style="color: #c9c9c9"> <?= $date ?></small></h6>
                                            <!-- <small><?= $komen['email']; ?></a></small> -->
                                            <p>
                                                <?= $komen['ulasan']; ?>
                                                <!-- <small><time datetime="2020-01-01"><?= $date ?></time></small> -->
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <!-- End blog comments -->
                    </div>
                    <div class="col-lg-4">
                        <!-- Peta -->
                        <div class="sidebar mb-3">
                            <div class="sidebar-item recent-posts">
                                <h3 id="peta" class="sidebar-title"><i class="fa-solid fa-map-location-dot" style="color: black;"></i><span> </span>Peta</h3>
                                <hr>
                                <input type="hidden" readonly name="idakomodasi" value="<?php echo $akomodasi['idakomodasi'] ?>" class="form-control">
                                <small style="color: gray;">
                                    <p>Dibawah ini merupakan lokasi dari penginapan <strong><?= $akomodasi['nama_ako']; ?></strong></p>
                                </small>
                                <div id="map" style="border-radius: 10px; width: 95%; height: 400px; margin: 0 auto;" class="mb-5"></div>
                                <script>
                                    <?php echo $akomodasi['idakomodasi'] ?>

                                    const map = L.map('map').setView([<?= $akomodasi['peta_ako']; ?>], 15);
                                    const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        maxZoom: 19,
                                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                                    }).addTo(map);

                                    var marker = L.marker([<?= $akomodasi['peta_ako']; ?>]).addTo(map);
                                </script>
                            </div>
                        </div>
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
                                                <time datetime="2020-01-01"><i class="fa-solid fa-star" style="color:orange;"></i> <span class="ps-1"><?= $rata[$key]; ?></span></time>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </script>

        <!-- <script>
            $(document).ready(function() {
                $(".rating-star").click(function() {
                    var rating = $(this).data("rating");
                    $("#selected-rating").val(rating);

                    // Toggle class between "far" and "fas"
                    $(".rating-star").removeClass("fa-star").addClass("far fa-star"); // Reset all stars to empty
                    $(this).removeClass("far").addClass("fas"); // Fill selected stars and before
                    $(this).prevAll(".rating-star").removeClass("far").addClass("fas"); // Fill stars before the selected one
                });
            });
        </script> -->


        <!-- ... (sebelumnya kode HTML) ... -->

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