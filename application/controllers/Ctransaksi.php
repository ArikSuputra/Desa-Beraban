<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ctransaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mtransaksi'); // Load model Mtransaksi untuk mengakses database
    }

    public function info()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }
        $data['title'] = "Data Transaksi";
        $data['transaksi'] = $this->Mtransaksi->getData();;
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Admin/transaksi', $data);
        $this->load->view('Dashboard/footer');
    }

    public function index()
    {
        $data['title'] = "Data Transaksi";
        $data['transaksi'] = $this->Mtransaksi->getAll(); // Ambil semua data transaksi dari model Mtransaksi
        $data['grafik'] = $this->Mtransaksi->grafikTransaksi();
        $this->load->view('vtransaksi', $data);
        $this->load->view('header', $data); // Load header view (ganti dengan nama view yang sesuai)
        $this->load->view('transaksi/index', $data); // Load view untuk menampilkan data transaksi
        $this->load->view('footer'); // Load footer view (ganti dengan nama view yang sesuai)
    }

    public function tambah()
    {
        // Form validation rules
        $this->form_validation->set_rules('idusers', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('idtiket', 'ID Tiket', 'required');
        $this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'required');
        $this->form_validation->set_rules('total_pembayaran', 'Total Pembayaran', 'required');
        $this->form_validation->set_rules('jumlah_tiket', 'Jumlah Tiket', 'required');
        $this->form_validation->set_rules('metode_pembayaran', 'Metode Pembayaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi form gagal, kembali ke halaman tambah
            $this->load->view('header');
            $this->load->view('transaksi/tambah');
            $this->load->view('footer');
        } else {
            // Ambil data dari form
            $data = array(
                'idusers' => $this->input->post('idusers'),
                'idtiket' => $this->input->post('idtiket'),
                'tgl_transaksi' => $this->input->post('tgl_transaksi'),
                'total_pembayaran' => $this->input->post('total_pembayaran'),
                'jumlah_tiket' => $this->input->post('jumlah_tiket'),
                'metode_pembayaran' => $this->input->post('metode_pembayaran')
            );

            // Panggil method untuk tambah data transaksi di model Mtransaksi
            $this->Mtransaksi->tambah($data);

            // Redirect ke halaman index setelah berhasil tambah data
            redirect('Ctranksaksi/index');
        }
    }

    public function edit($id)
    {
        // Form validation rules
        $this->form_validation->set_rules('idusers', 'ID Pengguna', 'required');
        $this->form_validation->set_rules('idtiket', 'ID Tiket', 'required');
        $this->form_validation->set_rules('tgl_transaksi', 'Tanggal Transaksi', 'required');
        $this->form_validation->set_rules('total_pembayaran', 'Total Pembayaran', 'required');
        $this->form_validation->set_rules('jumlah_tiket', 'Jumlah Tiket', 'required');
        $this->form_validation->set_rules('metode_pembayaran', 'Metode Pembayaran', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi form gagal, kembali ke halaman edit dengan membawa data transaksi yang akan diedit
            $data['title'] = "Edit Data Transaksi";
            $data['transaksi'] = $this->Mtransaksi->getById($id);

            $this->load->view('header', $data);
            $this->load->view('transaksi/edit', $data);
            $this->load->view('footer');
        } else {
            // Ambil data dari form
            $data = array(
                'idusers' => $this->input->post('idusers'),
                'idtiket' => $this->input->post('idtiket'),
                'tgl_transaksi' => $this->input->post('tgl_transaksi'),
                'total_pembayaran' => $this->input->post('total_pembayaran'),
                'jumlah_tiket' => $this->input->post('jumlah_tiket'),
                'metode_pembayaran' => $this->input->post('metode_pembayaran')
            );

            // Panggil method untuk update data transaksi di model Mtransaksi
            $this->Mtransaksi->edit($id, $data);

            // Redirect ke halaman index setelah berhasil edit data
            redirect('Ctranksaksi/index');
        }
    }

    public function hapus($id)
    {
        // Panggil method untuk hapus data transaksi di model Mtransaksi
        $this->Mtransaksi->hapus($id);

        // Redirect ke halaman index setelah berhasil hapus data
        redirect('Ctranksaksi/index');
    }
}
