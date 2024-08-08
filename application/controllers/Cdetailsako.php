<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cdetailsako extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Makomodasi');
        $this->load->model('Mdetailsako');
        $this->load->model('Mindex');
    }

    public function ako($id)
    {
        $data['title'] = "Details Akomodasi";
        $data['akomodasi'] = $this->Makomodasi->getDataById($id);
        // $data['akomodasiwst'] = $this->Mindex->getDataAko();
        $data['akomodasiwst'] = $this->Mindex->getTopRatingAko();
        $data['komentar'] = $this->Mdetailsako->getDataKomen($id);
        $data['total_komen'] = $this->Mdetailsako->getTotalKomen($id);
        // Mengambil kata kunci pencarian yang diinput menggunakan parameter GET
        $keyword = $this->input->get('keyword');

        // Jika terdapat kata kunci pencarian yang diinput, maka data akomodasi yang sesuai akan diambil menggunakan method searchData, kemudian dikirimkan kedalam array akomodasi untuk dikirimkan ke view
        if ($keyword) {
            $data['akomodasi'] = $this->Makomodasi->searchData($keyword);
            // Jika tidak terdapat kata kunci pencarian yang diinput maka akan mengambil semua data akomodasi dengan method getData dari model Makomodasi    
        }
        // foreach untuk mendapatkan rata rata rating
        foreach ($data['akomodasiwst'] as $key => $ako) {
            $data['rata'][$key] = $this->Mdetailsako->getRataRating($ako['idakomodasi']);
        }
        $this->load->view('header', $data);
        $this->load->view('Details/ako', $data);
        $this->load->view('footer');
    }

    public function add_ako()
    {

        // Mengecek apakah user sudah login dan memiliki role customer(3)
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 3) {
            $this->session->set_flashdata('message', 'Anda harus login sebagai customer untuk memberikan ulasan.');
            $this->session->set_flashdata('status', 'error');
            redirect('Cdetailsako/ako/' . $this->input->post('idakomodasi'));
        }

        $ulasan = $this->input->post('ulasan');
        $idakomodasi = $this->input->post('idakomodasi');
        $rating = $this->input->post('rating');
        $idusers = $this->session->userdata('idusers'); // Mengambil ID Users dari session

        $data = array(
            'idakomodasi' => $idakomodasi,
            'ulasan' => $ulasan,
            'waktu' => date('Y-m-d H:i'),
            'idusers' => $idusers,
        );

        if (!empty($rating)) {
            $data['rating'] = $rating;
        }

        $this->Mdetailsako->insertData($data);

        $this->session->set_flashdata('message', 'Komentar berhasil ditambahkan!');
        $this->session->set_flashdata('status', 'success');

        redirect('Cdetailsako/ako/' . $idakomodasi);
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

/* End of file Cdetails.php */
