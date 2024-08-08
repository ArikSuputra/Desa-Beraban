<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Order Summary</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            width: 900px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .left-column,
        .right-column {
            width: 48%;
        }

        .left-column h2,
        .right-column h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .button-container {
            text-align: right;
            margin-top: 20px;
        }

        .button {
            background-color: #28a745;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
        }

        .button:hover {
            background-color: #218838;
        }

        .ticket-summary {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 5px;
        }

        .ticket-summary img {
            width: 100%;
            border-radius: 5px;
        }

        .ticket-summary .ticket-details {
            margin-top: 20px;
        }

        .ticket-summary .ticket-details p {
            margin: 0;
        }

        .ticket-summary .total {
            margin-top: 20px;
            font-weight: bold;
        }

        .ticket-summary .total p {
            margin: 0;
            display: flex;
            justify-content: space-between;
        }
    </style>
    <!-- <script>
        function updateTotal() {
            let total = 0;
            <php foreach ($order_summary['tiket'] as $ticket) : ?>
                if (<= $ticket['quantity']; ?> > 0) {
                    total += <= $ticket['quantity']; ?> * <= $ticket['harga']; ?>;
                }
            <php endforeach; ?>
            document.getElementById('total_price').textContent = 'Rp ' + total.toLocaleString();
        }

        window.onload = updateTotal;
    </script>
</head>

<body>
    <div class="container">
        <div class="left-column">
            <h2>Detail Pemesanan</h2>
            <div class="form-group">
                <label for="user_name">Nama:</label>
                <input type="text" id="user_name" name="user_name" class="form-control" value="<= $order_summary['user_name']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="user_email">Email:</label>
                <input type="email" id="user_email" name="user_email" class="form-control" value="<= $order_summary['user_email']; ?>" readonly>
            </div>
            <div class="button-container">
                <form action="<= base_url('Cdetails/process_payment'); ?>" method="post">
                    <button type="submit">Pilih Metode Pembayaran</button>
                </form>
            </div>
        </div>
        <div class="right-column">
            <h2>Rincian Tiket</h2>
            <div class="ticket-summary">
                <div class="ticket-details">
                    <php foreach ($order_summary['tiket'] as $ticket) : ?>
                        <php if ($ticket['quantity'] > 0) : ?>
                            <p><strong><= $ticket['nama_tiket']; ?></strong></p>
                            <p>Jumlah: <= $ticket['quantity']; ?></p>
                            <p class="price">Rp <= number_format($ticket['harga'], 0, ',', '.'); ?></p>
                        <php endif; ?>
                    <php endforeach; ?>
                    <div class="total">
                        <p>Total</p>
                        <p id="total_price">Rp 0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body> -->

<body>
    <div class="container">
        <div class="left-column">
            <h2>Detail Pemesanan</h2>
            <div class="form-group">
                <label for="user_name">Nama:</label>
                <input type="text" id="user_name" name="user_name" class="form-control" value="<?= $order_summary['user_name']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="user_email">Email:</label>
                <input type="email" id="user_email" name="user_email" class="form-control" value="<?= $order_summary['user_email']; ?>" readonly>
            </div>
            <div>
                <!-- Form to send data to payment_method -->
                <form action="<?= base_url('Cdetails/payment_method'); ?>" method="post">
                    <input type="hidden" name="total_price_hidden" id="total_price_hidden" value="0">
                    <button type="submit" class="btn btn-primary">Lanjutkan ke Metode Pembayaran</button>
                </form>
            </div>
        </div>
        <!-- <div class="right-column">
            <h2>Rincian Tiket</h2>
            <div class="ticket-summary">
                <div class="ticket-details">
                    <php foreach ($order_summary['tiket'] as $ticket) : ?>
                        <php if ($ticket['quantity'] > 0) : ?>
                            <p><strong><= $ticket['nama_tiket']; ?></strong></p>
                            <p>Jumlah: <= $ticket['quantity']; ?></p>
                            <p class="price">Rp <= number_format($ticket['harga'], 0, ',', '.'); ?></p>
                        <php endif; ?>
                    <php endforeach; ?>
                    <div class="total">
                        <p>Total</p>
                        <p id="total_price">Rp 0</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateTotal() {
            let total = 0;
            <php foreach ($order_summary['tiket'] as $ticket) : ?>
                if (<= $ticket['quantity']; ?> > 0) {
                    total += <= $ticket['quantity']; ?> * <= $ticket['harga']; ?>;
                }
            <php endforeach; ?>
            // Update the total price displayed
            document.getElementById('total_price').textContent = 'Rp ' + total.toLocaleString();

            // Update the hidden input value
            document.getElementById('total_price_hidden').value = total;
        }

        window.onload = updateTotal;
    </script> -->
        <div class="right-column">
            <h2>Rincian Tiket</h2>
            <div class="ticket-summary">
                <div class="ticket-details">
                    <?php foreach ($order_summary['tiket'] as $ticket) : ?>
                        <?php if ($ticket['quantity'] > 0) : ?>
                            <p><strong><?= $ticket['nama_tiket']; ?></strong></p>
                            <p>Jumlah: <?= $ticket['quantity']; ?></p>
                            <p class="price">Rp <?= number_format($ticket['harga'], 0, ',', '.'); ?></p>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="total">
                        <p>Total</p>
                        <p id="total_price">Rp 0</p>
                    </div>
                </div>
            </div>
        </div>



        <script>
            function updateTotal() {
                let total = 0;
                <?php foreach ($order_summary['tiket'] as $ticket) : ?>
                    if (<?= $ticket['quantity']; ?> > 0) {
                        total += <?= $ticket['quantity']; ?> * <?= $ticket['harga']; ?>;
                    }
                <?php endforeach; ?>
                document.getElementById('total_price').textContent = 'Rp ' + total.toLocaleString();
                document.getElementById('total_price_hidden').value = total;
            }

            window.onload = updateTotal;
        </script>

</body>

</html>