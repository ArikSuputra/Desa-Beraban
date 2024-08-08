<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Creviewacara extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '2') {
            redirect('Auth');
        }
        $this->load->model('Mreviewacara');
    }

    public function index()
    {
        $data['title'] = "Data Review Acara";
        $data['review_acr'] = $this->Mreviewacara->getDataReview();
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Kades/reviewacara', $data);
        $this->load->view('Dashboard/footer');
    }

    public function hapus($del)
    {
        $this->Mreviewacara->deleteUlasan($del);
        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        $this->session->set_flashdata('status', 'success');
        redirect('Creviewacara');
    }
}

/* End of file Creviewacara.php */
