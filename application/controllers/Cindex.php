<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cindex extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mobjekwisata');
		$this->load->model('Mdetails');
		$this->load->model('Makomodasi');
		$this->load->model('Mdetailsako');
		// $this->load->model('Macara');
		// $this->load->model('Mdetailsacr');
		$this->load->model('Mindex');
		$this->load->helper('url');
	}

	public function index()
	{
		$data['title'] = 'Desa Beraban';
		$data['objekwst'] = $this->Mindex->getDataObjek();
		$data['akomodasi'] = $this->Mindex->getDataAko();
		// $data['acara'] = $this->Mindex->getDataAcr();

		$keyword = $this->input->get('keyword');
		if ($keyword) {
			$data['objekwst'] = $this->Mobjekwisata->searchData($keyword);
		} else {
			$data['objekwst'] = $this->Mindex->getDataObjek();
		}

		// Mendapatkan total ulasan dan rata-rata rating untuk setiap objek wisata
		// $data['total_ulasan_objek'] = [];
		$data['rata_objek'] = [];
		foreach ($data['objekwst'] as $key => $objek) {
			// $data['total_ulasan_objek'][$key] = $this->Mdetails->getTotalKomen($objek['idobjekwisata']);
			$data['rata_objek'][$key] = $this->Mdetails->getRataRating($objek['idobjekwisata']);
			$data['totalrating_objek'][$key] = $this->Mdetails->getTotalRating($objek['idobjekwisata']);
		}

		// Mendapatkan rata-rata rating untuk setiap akomodasi
		$data['rata_akomodasi'] = [];
		foreach ($data['akomodasi'] as $key => $ako) {
			$data['rata_akomodasi'][$key] = $this->Mdetailsako->getRataRating($ako['idakomodasi']);
			$data['totalrating_akomodasi'][$key] = $this->Mdetailsako->getTotalRating($ako['idakomodasi']);
		}

		// Mendapatkan rata-rata rating untuk setiap acara
		// $data['rata_acara'] = [];
		// foreach ($data['acara'] as $key => $acr) {
		// 	$data['rata_acara'][$key] = $this->Mdetailsacr->getRataRating($acr['idacara']);
		// }

		$this->load->view('header', $data);
		$this->load->view('index', $data);
		$this->load->view('footer');
	}

	public function coba()
	{
		// $data['title'] = 'Coba Website';
		// $this->load->view('header', $data);
		$this->load->view('BizLand/index');
		// $this->load->view('footer');
	}

	public function about()
	{
		$data['title'] = 'About Website';
		$this->load->view('header', $data);
		$this->load->view('about');
		$this->load->view('footer');
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
