<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Creviewakomodasi extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '2') {
            redirect('Auth');
        }
        $this->load->model('Mreviewakomodasi');
    }

    public function index()
    {
        $data['title'] = "Data Review Penginapan";
        $data['review_ako'] = $this->Mreviewakomodasi->getDataReview();
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Kades/reviewakomodasi', $data);
        $this->load->view('Dashboard/footer');
    }

    public function hapus($del)
    {
        $this->Mreviewakomodasi->deleteUlasan($del);
        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        $this->session->set_flashdata('status', 'success');
        redirect('Creviewakomodasi');
    }
}

/* End of file Creviewakomodasi.php */
