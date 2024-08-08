<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Cdetailsacr extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('Macara');
        $this->load->model('Mdetailsacr');
    }


    public function acara($id)
    {
        $data['title'] = "Details Acara";
        $data['acarawst'] = $this->Macara->getDataById($id);
        $data['acarawisata'] = $this->Macara->getData();
        $data['komentar'] = $this->Mdetailsacr->getDataKomen($id);
        $data['total_komen'] = $this->Mdetailsacr->getTotalKomen($id);
        foreach ($data['acarawisata'] as $key => $ako) {
            $data['rata'][$key] = $this->Mdetailsacr->getRataRating($ako['idacara']);
        }
        $this->load->view('header', $data);
        $this->load->view('Details/acr', $data);
        $this->load->view('footer');
    }

    public function add()
    {
        $username = $this->input->post('username');
        // $email = $this->input->post('email');
        $ulasan = $this->input->post('ulasan');
        $idacara = $this->input->post('idacara');
        $rating = $this->input->post('rating');

        $data_user = array(
            'username' => $username,
            // 'email' => $email
        );

        $this->Mdetailsacr->insertDataUser($data_user);
        $idusers = $this->db->insert_id();

        $data = array(
            'idacara' => $idacara,
            'ulasan' => $ulasan,
            'waktu' => date('Y-m-d H:i'),
            'idusers' => $idusers,
            'rating' => $rating,
        );

        $this->Mdetailsacr->insertData($data);

        $this->session->set_flashdata('message', 'Komentar berhasil ditambahkan!');
        $this->session->set_flashdata('status', 'success');

        redirect('Cdetailsacr/acara/' . $idacara);
    }
}

/* End of file Cdetailsacr.php */
