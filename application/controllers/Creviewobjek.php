<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Creviewobjek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != '2') {
            redirect('Auth');
        }
        $this->load->model('Mreviewobjek');
    }


    public function index()
    {
        $data['title'] = "Data Review Objek Wisata";
        $data['review_objek'] = $this->Mreviewobjek->getDataReview();
        $this->load->view('Dashboard/header', $data);
        $this->load->view('Kades/reviewobjek', $data);
        $this->load->view('Dashboard/footer');
    }

    public function hapus($id)
    {
        $this->Mreviewobjek->deleteUlasan($id);
        $this->session->set_flashdata('message', 'Data berhasil dihapus!');
        $this->session->set_flashdata('status', 'success');
        redirect('Creviewobjek');
    }
}

/* End of file Creviewobjek.php */
