<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body>
    <div class="container">
        <h1>Pesanan Anda Telah Dipesan</h1>
        <p>Mohon membayar sesuai dengan rincian berikut:</p>

        <div class="payment-details">
            <p><strong>Bank:</strong> Bank Mandiri</p>
            <p><strong>Rekening:</strong> 123-456-7890</p>
            <p><strong>Nama Pemilik Rekening:</strong> Desa Beraban</p>
        </div>

        <form action="<?php echo base_url('Cdetails/verify_payment'); ?>" method="post" enctype="multipart/form-data">
            <label for="bukti_transfer">Unggah Bukti Transfer:</label>
            <input type="file" id="bukti_transfer" name="payment_proof" required>

            <input type="hidden" name="idtransaksi" value="<?php echo $this->session->userdata('idtransaksi'); ?>">
            <input type="hidden" name="idobjekwisata" value="<?php echo $this->session->userdata('idobjekwisata'); ?>">

            <button type="submit">Verifikasi Pesanan</button>
        </form>

        <p><?php echo $this->session->flashdata('message'); ?></p>
    </div>
</body>

</html>