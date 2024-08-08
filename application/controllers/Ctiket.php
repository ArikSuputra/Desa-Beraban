<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Ctiket extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mtiket');
    }

    public function info()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }

        $data['title'] = "Data Tiket";
        $data['tiket'] = $this->Mtiket->getData();
        $data['id_users'] = $this->Mtiket->getIdUsers(); // Ambil data idusers dari tbusers
        $data['nama_wst'] = $this->Mtiket->getNamaWst(); // Ambil data nama_wst dari tbobjekwisata
        $data['kategori_tiket'] = $this->Mtiket->getKategoriTiket(); // Ambil data kategoriTiket dari tbharga
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Admin/tiket', $data);
        $this->load->view('Dashboard/footer');
    }

    public function proses_tambah()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }

        $idusers = $this->input->post('idusers');
        $idobjekwisata = $this->input->post('idobjekwisata');
        $idharga = $this->input->post('idharga');
        $kodeTiket = $this->input->post('kodeTiket');
        $qrcode = $this->input->post('qrcode');
        $create_at = $this->input->post('create_at');

        $data = array(
            'idusers' => $idusers,
            'idobjekwisata' => $idobjekwisata,
            'idharga' => $idharga,
            'kodeTiket' => $kodeTiket,
            'qrcode' => $qrcode,
            'create_at' => $create_at
        );

        $this->Mtiket->insertData($data);

        // Flash message for success
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
        $this->session->set_flashdata('status', 'success');

        redirect('Ctiket/info');
    }

    public function proses_edit()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }

        $id = $this->input->post('idtiket');
        $idusers = $this->input->post('idusers');
        $idobjekwisata = $this->input->post('idobjekwisata');
        $idharga = $this->input->post('idharga');
        $kodeTiket = $this->input->post('kodeTiket');
        $qrcode = $this->input->post('qrcode');
        $create_at = $this->input->post('create_at');

        $data = array(
            'idusers' => $idusers,
            'idobjekwisata' => $idobjekwisata,
            'idharga' => $idharga,
            'kodeTiket' => $kodeTiket,
            'qrcode' => $qrcode,
            'create_at' => $create_at
        );

        $this->Mtiket->update_data($id, $data);

        // Flash message for success
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
        $this->session->set_flashdata('status', 'success');

        redirect('Ctiket/info');
    }

    public function hapus($del)
    {
        // Setelah data anak dihapus, kita dapat menghapus data di tabel utama
        $result = $this->Mtiket->deleteData($del);

        if ($result) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus!');
            $this->session->set_flashdata('status', 'success');
        } else {
            $this->session->set_flashdata('message', 'Data gagal dihapus!');
            $this->session->set_flashdata('status', 'error');
        }

        redirect('Ctiket/info');
    }
}
