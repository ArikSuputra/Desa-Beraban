<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cinformasiumum extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Minfoumum');
        $this->load->model('Mobjekwisata');
        // $this->load->model('Macara');
        $this->load->model('Mdetails');
        $this->load->model('Mdetailsako');
        $this->load->model('Makomodasi');
        $this->load->model('Mindex');
    }


    // [Beranda Website]
    public function index()
    {
        $data['title'] = "Informasi Umum Desa Beraban";
        $data['informasi'] = $this->Minfoumum->getData();
        // $data['objekwisata'] = $this->Mindex->getDataObjek();
        $data['objekwisata'] = $this->Mindex->getTopRating();
        // $data['akomodasiwst'] = $this->Mindex->getDataAko();
        $data['akomodasiwst'] = $this->Mindex->getTopRatingAko();
        $data['rata_objek'] = [];
        $data['rata_akomodasi'] = [];

        foreach ($data['objekwisata'] as $key => $objek) {
            $data['rata_objek'][$key] = $this->Mdetails->getRataRating($objek['idobjekwisata']);
        }

        foreach ($data['akomodasiwst'] as $key => $ako) {
            $data['rata_akomodasi'][$key] = $this->Mdetailsako->getRataRating($ako['idakomodasi']);
        }
        $this->load->view('header', $data);
        $this->load->view('Infoumum/index', $data);
        $this->load->view('footer');
    }

    // Page Detail Informasi Umum
    public function pagedetail($id)
    {
        $data['title'] = "Blog Detail";
        $data['informasi'] = $this->Minfoumum->getInfoById($id);
        $data['info'] = $this->Minfoumum->getLastInfo();
        $this->load->view('header', $data);
        $this->load->view('Infoumum/blogdetail', $data);
        $this->load->view('footer');
    }

    // [Dashboard Admin]
    public function info()
    {
        // Periksa apakah pengguna sudah login dan memiliki peran admin
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            // Jika belum login atau bukan admin, arahkan kembali ke halaman login
            redirect('Auth');
        }
        $data['title'] = "Data Informasi Umum";
        $data['informasi'] = $this->Minfoumum->getData();
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Admin/infoumum', $data);
        $this->load->view('Dashboard/footer');
    }

    public function add()
    {
        $judul = $this->input->post('judul');
        $foto = $this->uploadImage();
        $ket = $this->input->post('ket');

        $data = array(
            'judul' => $judul,
            'foto' => $foto,
            'ket' => $ket
        );

        $this->Minfoumum->insertData($data);

        // Flash message for success
        $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
        $this->session->set_flashdata('status', 'success');


        redirect('Cinformasiumum/info');
    }

    private function uploadImage()
    {
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        } else {
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
            return false;
        }
    }

    public function prosesEdit()
    {
        // mengambil data dari form
        $id = $this->input->post('idinfoumum');
        $judul = $this->input->post('judul');
        $ket = $this->input->post('ket');

        // mengambil data file foto baru
        $config['upload_path'] = './uploads/'; // sesuaikan dengan path penyimpanan file di server
        $config['allowed_types'] = 'gif|jpg|png';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto_baru')) {
            $data = $this->upload->data();
            $fotoBaru = $data['file_name'];

            // hapus foto lama jika foto baru diupload
            $info = $this->Minfoumum->getDataById($id);
            unlink('./uploads/' . $info['foto']);
        } else {
            // gunakan foto lama jika foto baru tidak diupload
            $info = $this->Minfoumum->getDataById($id);
            $fotoBaru = $info['foto'];
        }

        // memanggil model Minfoumum untuk melakukan proses edit data
        $this->Minfoumum->editData($id, $judul, $fotoBaru, $ket);

        // redirect ke fungsi info untuk bisa melihat data yang sudah teredit
        redirect('Cinformasiumum/info');
    }


    public function Hapus($id)
    {
        // memanggil fungsi deleteData yang ada pada model Minfoumum
        $result = $this->Minfoumum->deleteData($id);

        if ($result) {
            $this->session->set_flashdata('message', 'Data berhasil dihapus!');
            $this->session->set_flashdata('status', 'success');
        } else {

            $this->session->set_flashdata('message', 'Data gagal dihapus!');
            $this->session->set_flashdata('status', 'error');
        }

        // redirect ke fungsi info untuk bisa melihat data yang sudah terhapus
        redirect('Cinformasiumum/info');
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
}

/* End of file Cinformasiumum.php */
