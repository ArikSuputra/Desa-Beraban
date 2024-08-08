<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cakomodasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Makomodasi');
        $this->load->model('Mdetailsako');
        $this->load->library('form_validation');
    }


    public function index()
    {
        $data['title'] = "Penginapan";

        // Mengambil kata kunci pencarian yang diinput menggunakan parameter GET
        $keyword = $this->input->get('keyword');

        // Jika terdapat kata kunci pencarian yang diinput, maka data akomodasi yang sesuai akan diambil menggunakan method searchData, kemudian dikirimkan kedalam array akomodasi untuk dikirimkan ke view
        if ($keyword) {
            $data['akomodasi'] = $this->Makomodasi->searchData($keyword);
            // Jika tidak terdapat kata kunci pencarian yang diinput maka akan mengambil semua data akomodasi dengan method getData dari model Makomodasi    
        } else {
            $data['akomodasi'] = $this->Makomodasi->getData();
        }

        // Load pagination library
        $this->load->library('pagination');

        // Menghitung total baris untuk pagination
        $config['base_url'] = base_url('Cakomodasi/index');
        $config['total_rows'] = count($data['akomodasi']);
        $config['per_page'] = 6;

        // Preserve GET parameters in pagination links
        if ($keyword) {
            $config['suffix'] = '?keyword=' . $keyword;
        } else {
            $config['suffix'] = '';
        }

        // Initialize pagination
        $this->pagination->initialize($config);

        // Ambil data sesuai dengan halaman pagination yang dipilih
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['akomodasi'] = array_slice($data['akomodasi'], $page, $config['per_page']);

        // foreach untuk mendapatkan rata rata rating
        foreach ($data['akomodasi'] as $key => $ako) {
            $data['rata'][$key] = $this->Mdetailsako->getRataRating($ako['idakomodasi']);
            $data['totalrating'][$key] = $this->Mdetailsako->getTotalRating($ako['idakomodasi']);
        }
        $this->load->view('header', $data);
        $this->load->view('Akomodasi/index', $data);
        $this->load->view('footer');
    }

    public function info()
    {
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '1') {
            redirect('Auth');
        }
        $data['title'] = "Data Penginapan";
        $data['akomodasi'] = $this->Makomodasi->getData();;
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Admin/akomodasi', $data);
        $this->load->view('Dashboard/footer');
    }

    public function proses_tambah()
    {
        $config['upload_path']   = './Akomodasi/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
        $config['max_size']      = 10000;
        $config['max_width']     = 10000;
        $config['max_height']    = 10000;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto_ako')) {
            // Flash message for failure
            $this->session->set_flashdata('message', 'Data gagal ditambahkan!');
            $this->session->set_flashdata('status', 'error');
        } else {
            $foto_ako = $this->upload->data();
            $foto_ako = $foto_ako['file_name'];
            $nama_ako = $this->input->post('nama_ako');
            $ket_ako  = $this->input->post('ket_ako');
            $peta_ako = $this->input->post('peta_ako');

            $data = array(
                'nama_ako' => $nama_ako,
                'foto_ako' => $foto_ako,
                'ket_ako'  => $ket_ako,
                'peta_ako' => $peta_ako
            );
            $this->Makomodasi->tambah_data($data);

            // Flash message for success
            $this->session->set_flashdata('message', 'Data berhasil ditambahkan!');
            $this->session->set_flashdata('status', 'success');
        }

        redirect('Cakomodasi/info');
    }


    public function proses_edit()
    {
        $id = $this->input->post('idakomodasi');
        $nama_ako = $this->input->post('nama_ako');
        $ket_ako = $this->input->post('ket_ako');
        $peta_ako = $this->input->post('peta_ako');

        $config['upload_path'] = './Akomodasi/';
        $config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
        $config['max_size'] = 10000;
        $config['max_width'] = 10000;
        $config['max_height'] = 10000;

        $this->load->library('upload', $config);

        // Check if there is a file uploaded
        if (!empty($_FILES['foto_ako']['name'])) {
            // Try to upload the file
            if ($this->upload->do_upload('foto_ako')) {
                // File uploaded successfully, get the file name
                $foto_ako = $this->upload->data('file_name');
            } else {
                // Failed to upload file, show error message
                $this->session->set_flashdata('message', 'Data gagal diedit!');
                $this->session->set_flashdata('status', 'error');
                redirect('Cakomodasi/info');
            }
        } else {
            // No file uploaded, use the existing photo
            $foto_ako = $this->Makomodasi->get_foto_by_id($id);
        }

        $data = array(
            'nama_ako' => $nama_ako,
            'foto_ako' => $foto_ako,
            'ket_ako' => $ket_ako,
            'peta_ako' => $peta_ako
        );


        $this->Makomodasi->update_data($id, $data);

        $this->session->set_flashdata('message', 'Data berhasil diedit!');
        $this->session->set_flashdata('status', 'success');

        redirect('Cakomodasi/info');
    }



    public function hapus($del)
    {
        $result = $this->Makomodasi->deleteData($del);

        if ($result) {
            // Flash message for success
            $this->session->set_flashdata('message', 'Data berhasil dihapus!');
            $this->session->set_flashdata('status', 'success');
        } else {
            // Flash message for failure
            $this->session->set_flashdata('message', 'Data gagal dihapus!');
            $this->session->set_flashdata('status', 'error');
        }

        redirect('Cakomodasi/info');
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

/* End of file Cakomodasi.php */
