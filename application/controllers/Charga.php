<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Charga extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mharga');
    }

    public function info()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }

        $data['title'] = "Data Harga";
        $data['harga'] = $this->Mharga->getData();
        $data['nama_wst'] = $this->Mharga->getNamaWst(); // Ambil data idobjekwisata dari tbobjekwisata
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Admin/harga', $data);
        $this->load->view('Dashboard/footer');
    }

    public function proses_tambah()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }

        $idobjekwisata = $this->input->post('idobjekwisata');
        $kategoriTiket = $this->input->post('kategoriTiket');
        $jenisTiket = $this->input->post('jenisTiket');
        $harga = $this->input->post('harga');

        $data = array(
            'idobjekwisata' => $idobjekwisata,
            'kategoriTiket' => $kategoriTiket,
            'jenisTiket' => $jenisTiket,
            'harga' => $harga
        );

        $this->Mharga->insertData($data);

        // Flash message for success
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
        $this->session->set_flashdata('status', 'success');

        redirect('Charga/info');
    }

    public function proses_edit()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }

        $idharga = $this->input->post('idharga');
        $idobjekwisata = $this->input->post('idobjekwisata');
        $kategoriTiket = $this->input->post('kategoriTiket');
        $jenisTiket = $this->input->post('jenisTiket');
        $harga = $this->input->post('harga');

        $data = array(
            'idharga' => $idharga,
            'idobjekwisata' => $idobjekwisata,
            'kategoriTiket' => $kategoriTiket,
            'jenisTiket' => $jenisTiket,
            'harga' => $harga
        );

        $this->Mharga->updateData($idharga, $data);

        // Flash message for success
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
        $this->session->set_flashdata('status', 'success');

        redirect('Charga/info');
    }

    public function hapus($del)
    {
        // Setelah data anak dihapus, kita dapat menghapus data di tabel utama
        $result = $this->Mharga->deleteData($del);

        if ($result) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus!');
            $this->session->set_flashdata('status', 'success');
        } else {
            $this->session->set_flashdata('message', 'Data gagal dihapus!');
            $this->session->set_flashdata('status', 'error');
        }

        redirect('Charga/info');
    }
}

/* End of file Charga.php */
