<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cobjekwisata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mobjekwisata');
        $this->load->model('Mdetails');
    }

    public function index()
    {
        $data['title'] = "Objek Wisata";

        // Mengambil kata kunci pencarian dari parameter GET ('keyword') dan kategori dari parameter GET ('kategori').
        $keyword = $this->input->get('keyword');
        $category = $this->input->get('kategori');

        // Jika terdapat kata kunci pencarian, maka data objek wisata akan diambil dengan menggunakan metode searchData dari model Mobjekwisata.
        if ($keyword) {
            $data['objekwst'] = $this->Mobjekwisata->searchData($keyword);
        } elseif ($category) {
            $data['objekwst'] = $this->Mobjekwisata->getDataByCategory($category);
        } else {
            $data['objekwst'] = $this->Mobjekwisata->getData();
        }

        // Load pagination library
        $this->load->library('pagination');

        // Menghitung total baris untuk pagination
        $config['base_url'] = base_url('Cobjekwisata/index');
        $config['total_rows'] = count($data['objekwst']);
        $config['per_page'] = 6;

        // Preserve GET parameters in pagination links
        if ($keyword) {
            $config['suffix'] = '?keyword=' . $keyword;
        } elseif ($category) {
            $config['suffix'] = '?kategori=' . $category;
        } else {
            $config['suffix'] = '';
        }

        // Initialize pagination
        $this->pagination->initialize($config);

        // Ambil data sesuai dengan halaman pagination yang dipilih
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['objekwst'] = array_slice($data['objekwst'], $page, $config['per_page']);

        // Mendapatkan total ulasan dan rata-rata rating untuk setiap objek wisata pada halaman yang dipilih
        foreach ($data['objekwst'] as $key => $objek) {
            $data['total_ulasan'][$key] = $this->Mdetails->getTotalKomen($objek['idobjekwisata']);
            $data['rata'][$key] = $this->Mdetails->getRataRating($objek['idobjekwisata']);
            $data['totalrating'][$key] = $this->Mdetails->getTotalRating($objek['idobjekwisata']);
        }

        $this->load->view('header', $data);
        $this->load->view('Objekwisata/index', $data);
        $this->load->view('footer');
    }


    ///////////////////////////////////////////////////////////
    ////////////////////////// ADMIN //////////////////////////
    ///////////////////////////////////////////////////////////
    public function info()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }

        $data['title'] = "Data Objek Wisata";
        $data['objekwst'] = $this->Mobjekwisata->getData();
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Admin/objekwisata', $data);
        $this->load->view('Dashboard/footer');
    }

    public function proses_tambah()
    {
        $config['upload_path']   = './Objekwisata/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
        $config['max_size']      = 10000;
        $config['max_width']     = 10000;
        $config['max_height']    = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_wst')) {
            // Flash message for failure
            $this->session->set_flashdata('message', 'Data gagal ditambahkan!');
            $this->session->set_flashdata('status', 'error');
        } else {
            $foto_wst = $this->upload->data();
            $foto_wst = $foto_wst['file_name'];
            $nama_wst = $this->input->post('nama_wst');
            $ket_wst  = $this->input->post('ket_wst');
            $peta_wst = $this->input->post('peta_wst');
            $kategori = $this->input->post('kategori');

            $data = array(
                'nama_wst' => $nama_wst,
                'foto_wst' => $foto_wst,
                'ket_wst'  => $ket_wst,
                'peta_wst' => $peta_wst,
                'kategori' => $kategori
            );
            $this->Mobjekwisata->tambah_data($data);

            // Flash message for success
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            $this->session->set_flashdata('status', 'success');
        }

        redirect('Cobjekwisata/info');
    }


    public function proses_edit()
    {
        $id = $this->input->post('idobjekwisata');
        $nama_wst = $this->input->post('nama_wst');
        $ket_wst = $this->input->post('ket_wst');
        $peta_wst = $this->input->post('peta_wst');
        $kategori = $this->input->post('kategori');

        $config['upload_path'] = './Objekwisata/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
        $config['max_size'] = 10000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;

        $this->load->library('upload', $config);

        // Check if there is a file uploaded
        if (!empty($_FILES['foto_wst']['name'])) {
            // Try to upload the file
            if ($this->upload->do_upload('foto_wst')) {
                // File uploaded successfully, get the file name
                $foto_wst = $this->upload->data('file_name');
            } else {
                // Failed to upload file, show error message
                $this->session->set_flashdata('message', 'Data gagal diedit!');
                $this->session->set_flashdata('status', 'error');
                redirect('Cobjekwisata/info');
            }
        } else {
            // No file uploaded, use the existing photo
            $foto_wst = $this->Mobjekwisata->get_foto_by_id($id);
        }

        $data = array(
            'nama_wst' => $nama_wst,
            'foto_wst' => $foto_wst,
            'ket_wst' => $ket_wst,
            'peta_wst' => $peta_wst,
            'kategori' => $kategori
        );


        $this->Mobjekwisata->update_data($id, $data);

        $this->session->set_flashdata('message', 'Data berhasil diedit!');
        $this->session->set_flashdata('status', 'success');

        redirect('Cobjekwisata/info');
    }



    public function hapus($del)
    {
        // Setelah data anak dihapus, kita dapat menghapus data di tabel utama
        $result = $this->Mobjekwisata->deleteData($del);

        if ($result) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus!');
            $this->session->set_flashdata('status', 'success');
        } else {
            $this->session->set_flashdata('message', 'Data gagal dihapus!');
            $this->session->set_flashdata('status', 'error');
        }

        redirect('Cobjekwisata/info');
    }



    public function add()
    {

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $ulasan = $this->input->post('ulasan');
        $idobjekwisata = $this->input->post('idobjekwisata');

        $data_user = array(
            'username' => $username,
            'email' => $email


        );
        $this->Mdetails->insertDataUser($data_user);
        $idusers = $this->db->insert_id();

        $data = array(
            'ulasan' => $ulasan,
            'waktu' => date('Y-m-d'),
            'idusers' => $idusers

        );

        $this->Mdetails->insertData($data);
        redirect('Cdetails/objek' . $idobjekwisata);
    }

    public function check_login_status()
    {
        // Periksa apakah admin sudah login atau belum
        if ($this->session->userdata('logged_in')) {
            echo "logged_in";
        } else {
            echo "not_logged_in";
        }
    }

    public function template()
    {
        $data['title'] = "Objek Wisata";
        $data['objekwst'] = $this->Mobjekwisata->getData();
        // Mendapatkan total ulasan untuk setiap objek wisata
        foreach ($data['objekwst'] as $key => $objek) {
            $data['total_ulasan'][$key] = $this->Mdetails->getTotalKomen($objek['idobjekwisata']);
            $data['rata'][$key] = $this->Mdetails->getRataRating($objek['idobjekwisata']);
        }
        $this->load->view('templateheader', $data);
        $this->load->view('template', $data);
        $this->load->view('templatefooter');
    }
}

/* End of file Cobjekwisata.php */
