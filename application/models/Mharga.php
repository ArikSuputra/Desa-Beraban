<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mharga extends CI_Model
{
    public function getTotalHarga()
    {
        $total = $this->db->count_all_results('tbharga');
        return $total;
    }

    public function getData()
    {
        $this->db->select('tbharga.*, tbobjekwisata.nama_wst');
        $this->db->from('tbharga');
        $this->db->join('tbobjekwisata', 'tbharga.idobjekwisata = tbobjekwisata.idobjekwisata');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getNamaWst()
    {
        $this->db->select('idobjekwisata, nama_wst'); // Mengambil idobjekwisata dan nama_wst
        $result = $this->db->get('tbobjekwisata')->result_array();
        return $result;
    }

    public function insertData($data)
    {
        $this->db->insert('tbharga', $data);
    }

    public function updateData($idharga, $data)
    {
        $this->db->where('idharga', $idharga);
        $this->db->update('tbharga', $data);
    }

    public function deleteData($del)
    {
        $this->db->where('idharga', $del);
        $result = $this->db->delete('tbharga');
        return $result;
    }
}

/* End of file Minfoumum.php */
