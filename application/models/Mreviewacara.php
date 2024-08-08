<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mreviewacara extends CI_Model
{

    public function getDataReview()
    {
        $this->db->select('tbusers.idusers, tbusers.username, tbulasan.rating, tbulasan.ulasan');
        $this->db->from('tbulasan');
        $this->db->join('tbusers', 'tbusers.idusers = tbulasan.idusers');
        $this->db->where('tbulasan.idacara IS NOT NULL');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalKomen()
    {
        $this->db->where('idacara IS NOT NULL');
        $total = $this->db->count_all_results('tbulasan');
        return $total;
    }

    public function deleteUlasan($del)
    {
        $this->db->where('idusers', $del);
        $this->db->delete('tbusers');
    }
}

/* End of file Mreviewacara.php */
