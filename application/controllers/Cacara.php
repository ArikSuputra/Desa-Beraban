<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cacara extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Macara');
        $this->load->model('Mdetailsacr');
    }

    public function index()
    {
        $data['title'] = "Acara";

        // Mengambil kata kunci pencarian yang diinput menggunakan parameter GET
        $keyword = $this->input->get('keyword');

        // Jika ada kata kunci yang diinput, maka akan mengambil data acara sesuai dengan kata kunci menggunakan method searchData, kemudian dikirimkan kedalam array acara untuk dikirim ke view
        if ($keyword) {
            $data['acara'] = $this->Macara->searchData($keyword);

            // Jika tidak ada kata kunci pencarian yang diinput, maka akan mengambil semua data acara dengan method getData 
        } else {
            $data['acara'] = $this->Macara->getData();
        }

        // foreach untuk mendapatkan rata rata rating
        foreach ($data['acara'] as $key => $acr) {
            $data['rata'][$key] = $this->Mdetailsacr->getRataRating($acr['idacara']);
        }
        $this->load->view('header', $data);
        $this->load->view('Acara/index', $data);
        $this->load->view('footer');
    }

    public function info()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {

            redirect('Auth');
        }

        $data['title'] = "Data Acara";
        $data['acara'] = $this->Macara->getData();
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Admin/acara');
        $this->load->view('Dashboard/footer');
    }

    public function proses_tambah()
    {
        $config['upload_path']   = './Acara/';
        $config['allowed_types'] = 'gif|jpg|png|PNG';
        $config['max_size']      = 10000;
        $config['max_width']     = 10000;
        $config['max_height']    = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_acr')) {
            $this->session->set_flashdata('message', 'Data gagal ditambahkan!');
            $this->session->set_flashdata('status', 'error');
        } else {
            $foto_acr = $this->upload->data();
            $foto_acr = $foto_acr['file_name'];
            $nama_acr = $this->input->post('nama_acr');
            $waktu_acr = $this->input->post('waktu_acr');
            $ket_acr = $this->input->post('ket_acr');
            $peta_acr = $this->input->post('peta_acr');

            $data = array(
                'nama_acr' => $nama_acr,
                'foto_acr' => $foto_acr,
                'waktu_acr' => $waktu_acr,
                'ket_acr' => $ket_acr,
                'peta_acr' => $peta_acr
            );

            $this->Macara->tambahData($data);
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            $this->session->set_flashdata('status', 'success');
        }

        redirect('Cacara/info');
    }

    public function proses_edit()
    {
        $id = $this->input->post('idacara');
        $nama_acr = $this->input->post('nama_acr');
        $waktu_acr = $this->input->post('waktu_acr');
        $ket_acr = $this->input->post('ket_acr');
        $peta_acr = $this->input->post('peta_acr');

        $config['upload_path'] = './Acara/';
        $config['allowed_types'] = 'gif|jpg|png|PNG';
        $config['max_size'] = 10000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;

        $this->load->library('upload', $config);

        // Check if there is a file uploaded
        if (!empty($_FILES['foto_acr']['name'])) {
            // Try to upload the file
            if ($this->upload->do_upload('foto_acr')) {
                // File uploaded successfully, get the file name
                $foto_acr = $this->upload->data('file_name');
            } else {
                // Failed to upload file, show error message
                $this->session->set_flashdata('message', 'Data gagal diedit!');
                $this->session->set_flashdata('status', 'error');
                redirect('Cacara/info');
            }
        } else {
            // No file uploaded, use the existing photo
            $foto_acr = $this->Macara->get_foto_by_id($id);
        }

        $data = array(
            'nama_acr' => $nama_acr,
            'foto_acr' => $foto_acr,
            'waktu_acr' => $waktu_acr,
            'ket_acr' => $ket_acr,
            'peta_acr' => $peta_acr
        );

        $this->Macara->update_data($id, $data);

        $this->session->set_flashdata('message', 'Data berhasil diedit!');
        $this->session->set_flashdata('status', 'success');

        redirect('Cacara/info');
    }


    public function hapus($del)
    {

        $result = $this->Macara->deleteData($del);

        if ($result) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus!');
            $this->session->set_flashdata('status', 'success');
        } else {

            $this->session->set_flashdata('message', 'Data gagal dihapus!');
            $this->session->set_flashdata('status', 'error');
        }

        redirect('Cacara/info');
    }
}

/* End of file Cacara.php */
