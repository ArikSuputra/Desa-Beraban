<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mreviewobjek extends CI_Model
{
    // Mendapatkan data ulasan berdasarkan idobjekwisata
    public function getDataReview()
    {
        $this->db->select('tbusers.idusers, tbusers.username, tbulasan.idobjekwisata, tbulasan.rating, tbulasan.ulasan');
        $this->db->from('tbulasan');
        $this->db->join('tbusers', 'tbusers.idusers = tbulasan.idusers');
        $this->db->where('tbulasan.idobjekwisata IS NOT NULL'); // Only data inserted to objekwisata

        // $query = $this->db->get();
        // return $query->result();

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalKomen()
    {
        $this->db->where('idobjekwisata IS NOT NULL');
        $total = $this->db->count_all_results('tbulasan');
        return $total;
    }

    public function deleteUlasan($id)
    {
        $this->db->where('idusers', $id);
        $this->db->delete('tbusers');
    }
}

/* End of file Mreviewobjek.php */
