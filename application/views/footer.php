</footer>
<!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="<?= base_url(); ?>assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/aos/aos.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="<?= base_url(); ?>assets/assets/vendor/php-email-form/validate.js"></script>


<!-- Template Main JS File -->
<script src="<?= base_url(); ?>assets/assets/js/main.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script>
    // Periksa apakah admin sudah login setiap kali halaman dimuat
    $(document).ready(function() {
        checkLoginStatus();
    });

    // Fungsi untuk memeriksa status login admin
    function checkLoginStatus() {
        $.ajax({
            url: "<?php echo base_url('Cindex/check_login_status'); ?>",
            method: "GET",
            success: function(response) {
                if (response == "logged_in") {
                    // Jika admin sudah login, cek role untuk menentukan teks tombol
                    if ("<?= $this->session->userdata('role') ?>" == '1') {
                        $("#loginButton").text("Login Admin");
                    } else if ("<?= $this->session->userdata('role') ?>" == '2') {
                        $("#loginButton").text("Login Kepala Desa");
                    }
                } else {
                    // Jika admin belum login, tulisan tetap "Login"
                    $("#loginButton").text("Login");
                }
            }
        });
    }
</script>


</body>

</html>