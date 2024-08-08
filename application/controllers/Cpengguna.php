<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Cpengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpengguna');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function info()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }
        $data['title'] = "Data Pengguna";
        $data['pengguna'] = $this->Mpengguna->getAll();
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Admin/pengguna', $data);
        $this->load->view('Dashboard/footer');
    }

    public function tambah()
    {
        // Debug statement untuk memastikan fungsi dipanggil
        log_message('debug', 'Fungsi tambah dipanggil.');

        // Form validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Debug statement untuk validasi form gagal
            log_message('debug', 'Validasi form gagal.');

            // Jika validasi form gagal, kembali ke halaman tambah
            $this->load->view('header');
            $this->load->view('Admin/pengguna'); // Pastikan Anda mengarahkan kembali ke view yang benar
            $this->load->view('footer');
        } else {
            // Debug statement untuk validasi form berhasil
            log_message('debug', 'Validasi form berhasil.');

            // Ambil data dari form
            $data = array(
                'username' => $this->input->post('username'),
                'role' => $this->input->post('role'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')) // Hash password sebelum disimpan
            );

            // Panggil method untuk tambah data pengguna di model Mpengguna
            $this->Mpengguna->insert($data);

            // Debug statement untuk berhasil tambah data
            log_message('debug', 'Berhasil tambah data pengguna.');

            // Redirect ke halaman index setelah berhasil tambah data
            redirect('Cpengguna/info');
        }
    }

    public function edit($id)
    {
        // Form validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi form gagal, kembali ke halaman edit dengan membawa data pengguna yang akan diedit
            $data['title'] = "Edit Data Pengguna";
            $data['pengguna'] = $this->Mpengguna->getById($id);

            $this->load->view('Dashboard/header', $data);
            $this->load->view('Admin/pengguna', $data);
            $this->load->view('Dashboard/footer');
        } else {
            // Ambil data dari form
            $data = array(
                'username' => $this->input->post('username'),
                'role' => ($this->input->post('role')),
                'email' => $this->input->post('email')
            );

            // Panggil method untuk update data pengguna di model Mpengguna
            $this->Mpengguna->update($id, $data);

            // Redirect ke halaman index setelah berhasil edit data
            redirect('Cpengguna/info');
        }
    }

    public function hapus($id)
    {
        // Panggil method untuk hapus data pengguna di model Mpengguna
        $this->Mpengguna->delete($id);

        // Redirect ke halaman index setelah berhasil hapus data
        redirect('Cpengguna/info');
    }
}
