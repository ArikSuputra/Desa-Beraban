<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CPay extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mstat');
        $this->load->model('Mtransaksi');
        $this->load->model('Mtiket');
        $this->load->model('Mindex');
        $this->load->model('Mobjekwisata');
    }

    public function info()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }

        // Inisialisasi variabel $data
        $data = array();

        // Misalkan, menambahkan judul halaman
        $data['title'] = "Verifikasi Pembayaran";

        // Mengambil data verifikasi dari database
        $data['verifikasi'] = $this->Mstat->get_all_verification_data();

        $this->load->view('Dashboard/header', $data);
        $this->load->view('Admin/pay', $data);
        $this->load->view('Dashboard/footer');
    }

    // public function verify_payment($idtransaksi)
    // {
    //     // Check if user is an admin
    //     if ($this->session->userdata('role') != 1) {
    //         $this->session->set_flashdata('message', 'Anda tidak memiliki akses untuk halaman ini.');
    //         redirect('Auth');
    //     }

    //     // Load models
    //     $this->load->model('Mtransaksi');
    //     $this->load->model('Mstat');

    //     // Get transaction and stat details
    //     $transaksi = $this->Mtransaksi->get_transaksi_by_id($idtransaksi);
    //     $stat = $this->Mstat->get_stat_by_idtransaksi($idtransaksi);

    //     if (!$transaksi || !$stat) {
    //         $this->session->set_flashdata('message', 'Data transaksi atau stat tidak ditemukan.');
    //         redirect('Cadmin/dashboard');
    //     }

    //     // Update verification status
    //     $status = $this->input->post('status');
    //     $this->Mstat->update_status($stat['idstat'], $status);

    //     // Redirect based on status
    //     if ($status == 'accept') {
    //         $this->session->set_flashdata('message', 'Pembayaran telah diterima dan diverifikasi.');
    //     } else {
    //         $this->session->set_flashdata('message', 'Status pembayaran diperbarui.');
    //     }

    //     redirect('Cadmin/dashboard');
    // }
    public function verify_payment($idtransaksi = NULL)
    {
        // Check if user is an admin
        if ($this->session->userdata('role') != 1) {
            $this->session->set_flashdata('message', 'Anda tidak memiliki akses untuk halaman ini.');
            redirect('Auth');
        }

        // Load models
        $this->load->model('Mtransaksi');
        $this->load->model('Mstat');

        // Get transaction and stat details
        $transaksi = $this->Mtransaksi->get_transaksi_by_id($idtransaksi);
        $stat = $this->Mstat->get_stat_by_idtransaksi($idtransaksi);

        if (!$transaksi || !$stat) {
            $this->session->set_flashdata('message', 'Data transaksi atau stat tidak ditemukan.');
            redirect('Cadmin/dashboard');
        }

        // Get status from POST data
        $status = $this->input->post('status');

        // Validate the status value
        if (!in_array($status, ['accept', 'reject'])) {
            $this->session->set_flashdata('message', 'Status yang diberikan tidak valid.');
            redirect('Cadmin/dashboard');
        }

        // Update verification status
        $this->Mstat->update_status($stat['idstat'], $status);

        // Redirect based on status
        if ($status == 'accept') {
            $this->session->set_flashdata('message', 'Pembayaran telah diterima dan diverifikasi.');
        } else {
            $this->session->set_flashdata('message', 'Pembayaran ditolak.');
        }

        redirect('CPay/info');
    }
}

/* End of file CPay.php */
