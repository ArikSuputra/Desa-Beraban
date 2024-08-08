<!DOCTYPE html>
<html>

<head>
    <title>Pilih Metode Pembayaran</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .payment-method {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="radio"] {
            margin-right: 10px;
        }

        .submit-button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            border: none;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }

        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Metode Pembayaran</h1>

        <div class="payment-methods">
            <h2>Pilih Metode Pembayaran</h2>
            <form action="<?= base_url('Cdetails/process_payment'); ?>" method="post">
                <div class="form-group">
                    <label for="payment_method">Metode Pembayaran:</label>
                    <select name="payment_method" id="payment_method" required>
                        <option value="">Pilih Metode</option>
                        <option value="bank_transfer">Transfer Bank</option>
                        <option value="credit_card">Kartu Kredit</option>
                        <option value="ewallet">E-Wallet</option>
                    </select>
                </div>

                <input type="hidden" name="total_price" value="<?= $order_summary['total_price']; ?>">

                <button type="submit" class="btn btn-primary">Lanjutkan Pembayaran</button>
            </form>
        </div>
    </div>
</body>

</html>