<!-- Bootstrap core JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>assets/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>assets/js/demo/chart-area-demo.js"></script>
<script src="<?= base_url(); ?>assets/js/demo/chart-pie-demo.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url(); ?>sb-admin2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>sb-admin2/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url(); ?>sb-admin2/js/demo/datatables-demo.js"></script>

<script>
    // Untuk mengupdate label setelah memilih file
    document.getElementById('customFile').addEventListener('change', function(e) {
        var fileName = e.target.files[0].name;
        document.querySelector('.custom-file-label').innerText = fileName;
    });
</script>

</body>

</html>