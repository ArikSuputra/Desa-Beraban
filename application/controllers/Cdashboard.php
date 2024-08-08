<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cdashboard extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->library('session');
    }


    public function admin()
    {
        $this->check_login();
        // Periksa apakah pengguna sudah login dan memiliki peran admin
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            // Jika belum login atau bukan admin, arahkan kembali ke halaman login
            redirect('Auth');
        }

        // Meload model untuk mengambil total dari masing masing data
        $this->load->model('Minfoumum');
        $this->load->model('Mobjekwisata');
        $this->load->model('Makomodasi');
        // $this->load->model('Macara');
        $this->load->model('Mtiket');
        $this->load->model('Mharga');
        $this->load->model('Muser');
        $this->load->model('Mpengguna');
        $this->load->model('Mtransaksi');

        // Mendapatkan total data pada tbinformasiumum di fungsi getTotal data pada model Minfoumum
        $data['total_info'] = $this->Minfoumum->getTotalInfo();
        $data['total_objek'] = $this->Mobjekwisata->getTotalObjek();
        $data['total_ako'] = $this->Makomodasi->getTotalAko();
        $data['total_tiket'] = $this->Mtiket->getTotalTiket();
        $data['total_harga'] = $this->Mharga->getTotalHarga();
        $data['total_user'] = $this->Mpengguna->getTotalUser();
        // $data['total_acr'] = $this->Macara->getTotalAcr();
        $data['total_transaksi'] = $this->Mtransaksi->getTotalTransaksi();
        $data['total_verifikasi'] = $this->Mtransaksi->getTotalTransaksi();

        // Mengambil ID pengguna dari sesi
        $user_id = $this->session->userdata('idusers');
        // Mengambil data pengguna dari model berdasarkan ID
        $user = $this->Muser->get_user_by_id($user_id);

        // Periksa apakah data pengguna ditemukan
        if ($user === null) {
            // Handle ketika data pengguna tidak ditemukan (optional)
            echo "Data pengguna tidak ditemukan!";
            return;
        }

        // Mengisi data untuk ditampilkan pada view
        $data['username'] = $user->username;

        $data['title'] = 'Dashboard Admin';
        $this->load->view('Dashboard/header', $data);
        // $this->load->view('Dashboard/navbar');
        $this->load->view('Admin/index');
        $this->load->view('Dashboard/footer');
    }

    public function kepaladesa()
    {
        $this->check_login();
        // Periksa apakah pengguna sudah login dan memiliki peran kepala desa
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '2') {
            // Jika belum login atau bukan admin, arahkan kembali ke halaman login
            redirect('Auth');
        }

        $this->load->model('Mreviewobjek');
        $this->load->model('Mreviewakomodasi');
        // $this->load->model('Mreviewacara');

        $data['total_review_objek'] = $this->Mreviewobjek->getTotalKomen();
        $data['total_review_ako'] = $this->Mreviewakomodasi->getTotalKomen();
        // $data['total_review_acr'] = $this->Mreviewacara->getTotalKomen();
        $data['title'] = 'Dashboard Kepala Desa';
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Kades/index');
        $this->load->view('Dashboard/footer');
    }

    public function getDataTransaksi()
    {
        $tahun = $this->input->post('tahun');
        $bulan = $this->input->post('bulan');
        $periode = $this->input->post('periode');

        $this->load->model('Mtransaksi');
        $data = $this->Mtransaksi->getDataTransaksi($tahun, $bulan, $periode);

        $labels = [];
        $data_pembayaran = [];
        foreach ($data as $row) {
            $labels[] = $row->label;
            $data_pembayaran[] = $row->total;
        }

        echo json_encode([
            'labels' => $labels,
            'data_pembayaran' => $data_pembayaran
        ]);
    }

    private function check_login()
    {
        // Cek apakah admin sudah login
        if (!$this->session->userdata('logged_in')) {
            // Jika belum, redirect ke halaman login
            redirect('auth/login');
        }
    }
}
