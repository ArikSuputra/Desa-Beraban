<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mlaporan extends CI_Model
{

    public function getInformasiUmum()
    {
        $query = $this->db->get('tbinformasiumum');
        return $query->result_array();
    }

    public function getObjekWisata()
    {
        $query = $this->db->get('tbobjekwisata');
        return $query->result_array();
    }

    public function getPenginapan()
    {
        $query = $this->db->get('tbakomodasi');
        return $query->result_array();
    }

    public function getPengguna()
    {
        $query = $this->db->get('tbusers');
        return $query->result_array();
    }

    public function getTransaksi()
    {
        $query = $this->db->get('tbtransaksi');
        return $query->result_array();
    }

    public function getHargaTiket()
    {
        $query = $this->db->get('tbharga');
        return $query->result_array();
    }

    public function getTiket()
    {
        $query = $this->db->get('tbtiket');
        return $query->result_array();
    }
}
