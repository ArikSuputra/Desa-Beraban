<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mreviewakomodasi extends CI_Model
{
    public function getDataReview()
    {
        $this->db->select('tbusers.idusers, tbusers.username, tbulasan.rating, tbulasan.ulasan');
        $this->db->from('tbulasan');
        $this->db->join('tbusers', 'tbusers.idusers = tbulasan.idusers');
        $this->db->where('tbulasan.idakomodasi IS NOT NULL'); // Only data inserted to objekwisata

        // $query = $this->db->get();
        // return $query->result();

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalKomen()
    {
        $this->db->where('idakomodasi IS NOT NULL');
        $total = $this->db->count_all_results('tbulasan');
        return $total;
    }

    public function deleteUlasan($del)
    {
        $this->db->where('idusers', $del);
        $this->db->delete('tbusers');
    }
}

/* End of file Mreviewakomodasi.php */
