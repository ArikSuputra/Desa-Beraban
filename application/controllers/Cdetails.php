<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cdetails extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mobjekwisata');
        $this->load->model('Mdetails');
        $this->load->model('Mindex');
        $this->load->model('Mtiket');
        $this->load->model('Mtransaksi');
        $this->load->model('Mstat');
        $this->load->library('upload');
    }


    public function objek($id)
    {
        $data['title'] = "Details Objek Wisata";
        $data['objekwst'] = $this->Mobjekwisata->getDataById($id);
        // $data['objekwisata'] = $this->Mindex->getDataObjek();
        $data['objekwisata'] = $this->Mindex->getTopRating();
        $data['komentar'] = $this->Mdetails->getDataKomen($id);
        $data['total_komen'] = $this->Mdetails->getTotalKomen($id);
        $data['harga'] = $this->Mdetails->getDataHarga($id);
        // Mengambil harga tiket menggunakan Mtiket
        $data['tiket'] = $this->Mtiket->getTicketPricesByObjekWisataId($id);
        // Mengambil kata kunci pencarian dari parameter GET ('keyword').
        $keyword = $this->input->get('keyword');
        if ($keyword) {
            $data['objekwst'] = $this->Mobjekwisata->searchData($keyword);
        }
        foreach ($data['objekwisata'] as $key => $objek) {
            // $data['total_ulasan'][$key] = $this->Mdetails->getTotalKomen($objek['idobjekwisata']);
            $data['rata'][$key] = $this->Mdetails->getRataRating($objek['idobjekwisata']);
        }
        $this->load->view('header', $data);
        $this->load->view('Details/objek', $data);
        $this->load->view('footer');
    }

    public function add()
    {
        // Cek apakah user sudah login dan memiliki role customer
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 3) {
            $this->session->set_flashdata('message', 'Anda harus login sebagai customer untuk memberikan ulasan.');
            $this->session->set_flashdata('status', 'error');
            redirect('Cdetails/objek/' . $this->input->post('idobjekwisata'));
        }

        $ulasan = $this->input->post('ulasan');
        $idobjekwisata = $this->input->post('idobjekwisata');
        $rating = $this->input->post('rating');
        $idusers = $this->session->userdata('idusers'); // Ambil ID user dari session

        // Mengatur timezone menjadi WITA
        date_default_timezone_set('Asia/Makassar');
        $data = array(
            'idobjekwisata' => $idobjekwisata,
            'ulasan' => $ulasan,
            'waktu' => date('Y-m-d H:i'),
            'idusers' => $idusers,
        );

        if (!empty($rating)) {
            $data['rating'] = $rating;
        }

        $this->Mdetails->insertData($data);

        $this->session->set_flashdata('message', 'Komentar berhasil ditambahkan!');
        $this->session->set_flashdata('status', 'success');

        redirect('Cdetails/objek/' . $idobjekwisata);
    }

    public function add_order()
    {
        // Pastikan user sudah login dan memiliki role 3 (customer)
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 3) {
            $this->session->set_flashdata('message', 'Anda harus login sebagai customer untuk melakukan pemesanan.');
            $this->session->set_flashdata('status', 'error');
            redirect('Auth');
        }

        // Ambil email dari database menggunakan model Mtiket
        $user_id = $this->session->userdata('idusers'); // Ambil idusers dari session
        $email_data = $this->Mtiket->getDataUser($user_id); // Perbaiki dengan memberikan idusers sebagai argumen
        $user_email = isset($email_data['email']) ? $email_data['email'] : '';
        $ticket_ids = json_decode($this->input->post('ticket_id'));
        $quantities = json_decode($this->input->post('quantity'));
        $total_price = $this->input->post('total_price'); // Mengambil total_price dari POST data
        $total_quantity = array_sum($quantities);
        $tiket = array();
        foreach ($ticket_ids as $index => $ticket_id) {
            $ticket_detail = $this->Mtiket->get_ticket_by_id($ticket_id); // Pastikan model dan metode sesuai
            if (!isset($ticket_detail['kategoriTiket'])) {
                $ticket_detail['kategoriTiket'] = 'Unknown Ticket'; // Default value
            }
            $ticket_detail['quantity'] = $quantities[$index];
            $ticket_detail['nama_tiket'] = $ticket_detail['kategoriTiket'];
            $tiket[] = $ticket_detail;
        }
        $order_summary = array(
            'user_name' => $this->session->userdata('username'),
            'user_email' => $user_email,
            'tiket' => $tiket,
            'total_price' => $total_price // Simpan total_price dari POST data
        );

        $this->session->set_userdata('order_summary', $order_summary);

        redirect('Cdetails/order_summary');
    }

    public function order_summary()
    {
        $order_summary = $this->session->userdata('order_summary');
        if (!$order_summary) {
            redirect('Cdetails/objek/' . $this->input->post('idobjekwisata'));
        }
        $data['order_summary'] = $order_summary;
        $this->load->view('Details/order_summary', $data);
    }

    public function payment_method()
    {
        // Retrieve order summary from session
        $order_summary = $this->session->userdata('order_summary');
        if (!$order_summary) {
            redirect('Cdetails/objek/' . $this->input->post('idobjekwisata'));
        }

        // Update order_summary with the new total price from the post data
        $total_price = $this->input->post('total_price_hidden');
        $order_summary['total_price'] = $total_price;
        $this->session->set_userdata('order_summary', $order_summary);

        $data['order_summary'] = $order_summary;
        $this->load->view('Details/payment_method', $data);
    }

    // public function process_payment()
    // {
    //     $user_id = $this->session->userdata('idusers');
    //     $order_summary = $this->session->userdata('order_summary');
    //     $total_price = isset($order_summary['total_price']) ? $order_summary['total_price'] : 0;

    //     if (!$order_summary) {
    //         $this->session->set_flashdata('message', 'Order summary tidak ditemukan.');
    //         redirect('Cdetails/order_summary');
    //         return;
    //     }

    //     $total_price = floatval(str_replace(',', '', $order_summary['total_price']));

    //     $transaksi_data = array(
    //         'idusers' => $user_id,
    //         'tgl_transaksi' => date('Y-m-d H:i:s'),
    //         'total_pembayaran' => $total_price
    //     );
    //     $this->db->insert('tbtransaksi', $transaksi_data);
    //     $idtransaksi = $this->db->insert_id();

    //     $this->load->model('Mtiket');

    //     foreach ($order_summary['tiket'] as $ticket) {
    //         if ($ticket['quantity'] > 0) {
    //             $kodeTiket = uniqid();
    //             $qrCode = $this->generateQRCode($kodeTiket);

    //             $tiket_data = array(
    //                 'idusers' => $user_id,
    //                 'idobjekwisata' => $ticket['idobjekwisata'],
    //                 'idharga' => $ticket['idharga'],
    //                 'idtransaksi' => $idtransaksi,
    //                 'kodeTiket' => $kodeTiket,
    //                 'qrcode' => $qrCode,
    //                 'create_at' => date('Y-m-d H:i:s')
    //             );
    //             $this->Mtiket->insertTicket($tiket_data);
    //         }
    //     }

    //     $this->session->unset_userdata('order_summary');

    //     $this->session->set_flashdata('message', 'Pembayaran berhasil diproses.');
    //     redirect('Cdetails/Pay_view');
    // }

    public function process_payment()
    {
        $user_id = $this->session->userdata('idusers');
        $order_summary = $this->session->userdata('order_summary');
        $total_price = isset($order_summary['total_price']) ? $order_summary['total_price'] : 0;

        if (!$order_summary) {
            $this->session->set_flashdata('message', 'Order summary tidak ditemukan.');
            redirect('Cdetails/order_summary');
            return;
        }

        $total_price = floatval(str_replace(',', '', $order_summary['total_price']));

        // Insert transaction data
        $transaksi_data = array(
            'idusers' => $user_id,
            'tgl_transaksi' => date('Y-m-d H:i:s'),
            'total_pembayaran' => $total_price
        );
        $this->db->insert('tbtransaksi', $transaksi_data);
        $idtransaksi = $this->db->insert_id(); // Get the inserted ID

        $this->load->model('Mtiket');

        foreach ($order_summary['tiket'] as $ticket) {
            if ($ticket['quantity'] > 0) {
                $kodeTiket = uniqid();
                $qrCode = $this->generateQRCode($kodeTiket);

                $tiket_data = array(
                    'idusers' => $user_id,
                    'idobjekwisata' => $ticket['idobjekwisata'],
                    'idharga' => $ticket['idharga'],
                    'kodeTiket' => $kodeTiket,
                    'qrcode' => $qrCode,
                    'create_at' => date('Y-m-d H:i:s')
                );
                $this->Mtiket->insertTicket($tiket_data);

                // Store idobjekwisata in session for later use
                $this->session->set_userdata('idobjekwisata', $ticket['idobjekwisata']);
            }
        }

        // Store idtransaksi in session for later use
        $this->session->set_userdata('idtransaksi', $idtransaksi);
        $this->session->unset_userdata('order_summary');

        $this->session->set_flashdata('message', 'Pembayaran berhasil diproses.');
        redirect('Cdetails/payment_confirmation'); // Redirect to the view for uploading payment proof
    }

    public function payment_confirmation()
    {
        $data['idtransaksi'] = $this->db->select('idtransaksi')->order_by('tgl_transaksi', 'DESC')->limit(1)->get('tbtransaksi')->row()->idtransaksi;
        $idtransaksi = $this->session->userdata('idtransaksi');
        $idobjekwisata = $this->session->userdata('idobjekwisata'); // Ambil idobjekwisata dari session atau sumber lainnya
        $data['idtransaksi'] = $idtransaksi;
        $data['idobjekwisata'] = $idobjekwisata;
        $this->load->view('Details/Pay_view', $data);
    }

    private function generateQRCode($data)
    {
        // Fungsi untuk menghasilkan QR code. Sesuaikan dengan library QR code yang Anda gunakan.
        // Misalnya, menggunakan library PHP QR Code:
        $this->load->library('ciqrcode');
        $params['data'] = $data;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . 'assets/qrcodes/' . $data . '.png';
        $this->ciqrcode->generate($params);
        return 'assets/qrcodes/' . $data . '.png'; // Return path gambar QR code
    }

    //     public function verify_payment()
    // {
    //     $user_id = $this->session->userdata('idusers');
    //     $idtransaksi = $this->input->post('idtransaksi');
    //     $total_price = $this->input->post('total_price');

    //     // Check if a file has been uploaded
    //     if (!empty($_FILES['payment_proof']['name'])) {
    //         $config['upload_path'] = './uploads/payment_proofs/';
    //         $config['allowed_types'] = 'jpg|jpeg|png|pdf';
    //         $config['max_size'] = 2048; // 2 MB

    //         $this->load->library('upload', $config);

    //         if (!$this->upload->do_upload('payment_proof')) {
    //             $error = $this->upload->display_errors();
    //             $this->session->set_flashdata('message', 'Gagal mengunggah bukti pembayaran: ' . $error);
    //             redirect('Cdetails/payment_method');
    //             return;
    //         }

    //         $upload_data = $this->upload->data();
    //         $bukti_pembayaran = $upload_data['file_name'];
    //     } else {
    //         $bukti_pembayaran = '';
    //     }

    //     // Insert data into tbstat for verification
    //     $verifikasi_data = array(
    //         'idusers' => $user_id,
    //         'idtransaksi' => $idtransaksi,
    //         'bukti' => $bukti_pembayaran,
    //         'status' => 'pending'
    //     );
    //     $this->load->model('Mstat');
    //     $this->Mstat->insertPaymentVerification($verifikasi_data);

    //     $this->session->set_flashdata('message', 'Bukti pembayaran telah diunggah dan menunggu verifikasi.');
    //     redirect('Cdetails/payment_method');
    // }
    public function verify_payment()
    {
        $user_id = $this->session->userdata('idusers');
        $idtransaksi = $this->input->post('idtransaksi');
        $idobjekwisata = $this->input->post('idobjekwisata');

        // Pastikan idtransaksi dan idobjekwisata ada dan valid
        if (empty($idtransaksi) || empty($idobjekwisata)) {
            $this->session->set_flashdata('message', 'ID transaksi atau ID objek wisata tidak valid.');
            redirect('Cdetails/payment_confirmation');
            return;
        }

        // Konfigurasi upload
        $config['upload_path'] = './uploads/payment_proofs/';
        $config['allowed_types'] = 'jpg|jpeg|png|pdf';
        $config['max_size'] = 2048; // 2 MB

        // Memuat library upload kustom
        $this->load->library('MyUpload');

        // Melakukan upload
        $upload_result = $this->myupload->do_upload('payment_proof', $config);

        if (isset($upload_result['error'])) {
            // Menangani error upload
            $this->session->set_flashdata('message', 'Gagal mengunggah bukti pembayaran: ' . $upload_result['error']);
            redirect('Cdetails/payment_confirmation');
            return;
        }

        // Mengambil informasi file yang diupload
        $upload_data = $upload_result['upload_data'];
        $full_path = $upload_data['full_path']; // Path lengkap dari file yang diupload
        $bukti_pembayaran = $upload_data['file_name']; // Nama file yang diupload

        // Menyimpan data ke database
        $verifikasi_data = array(
            'idusers' => $user_id,
            'idtransaksi' => $idtransaksi,
            'idobjekwisata' => $idobjekwisata,
            'bukti' => $bukti_pembayaran, // Menyimpan nama file, bukan path lengkap
            'status' => 'pending'
        );

        $this->load->model('Mstat');
        $this->Mstat->insertPaymentVerification($verifikasi_data);

        $this->session->set_flashdata('message', 'Bukti pembayaran telah diunggah dan menunggu verifikasi.');
        redirect('Cdetails/payment_confirmation');
    }




    // public function tambah()
    // {
    //     $guest_data = array(
    //         'username' => $this->input->post('username'),
    //         'email' => $this->input->post('email'),
    //     );

    //     $user_id = $this->Mdetails->tambah_guest($guest_data);

    //     $komentar = array(
    //         'ulasan' => $this->input->post('ulasan'),
    //         'idusers' => $user_id,
    //         'idobjekwisata' => $this->input->post('idobjekwisata')
    //     );

    //     $this->Mdetails->insertKomentar($komentar);
    //     redirect('Cdetails/objek');
    // }

    public function check_login_status()
    {
        // Periksa apakah admin sudah login atau belum
        if ($this->session->userdata('logged_in')) {
            echo "logged_in";
        } else {
            echo "not_logged_in";
        }
    }


    // public function buat_pesanan()
    // {
    //     if (!$this->session->userdata('logged_in')) {
    //         redirect('Auth');
    //     }

    //     // $this->load->model('PesananModel');

    //     $data = array(
    //         'username' => $this->session->userdata('username'),
    //         'email' => $this->session->userdata('email'),
    //         'tanggal_berkunjung' => $this->input->post('tanggal_berkunjung'),
    //         'metode_pembayaran' => $this->input->post('metode_pembayaran'),
    //         'total_harga' => $this->input->post('total_harga')
    //     );

    //     // Simpan pesanan
    //     $idPesanan = $this->Ctiket->simpanPesanan($data);

    //     // Simpan detail tiket
    //     $tiket = $this->input->post('tiket');
    //     foreach ($tiket as $t) {
    //         $detailData = array(
    //             'id_pesanan' => $idPesanan,
    //             'jenis_tiket' => $t['jenisTiket'],
    //             'kategori_tiket' => $t['kategoriTiket'],
    //             'jumlah_tiket' => $t['jumlah'],
    //             'harga' => $t['harga']
    //         );
    //         $this->Ctiket->simpanDetailPesanan($detailData);
    //     }

    //     // Redirect ke halaman rincian pesanan
    //     redirect('Cdetails/detail' . $idPesanan);
    // }
}

/* End of file Cdetails.php */
