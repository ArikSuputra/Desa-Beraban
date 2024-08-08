<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mdetailsacr extends CI_Model
{
    public function getRataRating($idacara)
    {
        $this->db->select('ROUND(AVG(rating), 1)as rata_rating', false);
        $this->db->where('idacara', $idacara);
        $query = $this->db->get('tbulasan');
        return $query->row()->rata_rating;
    }
    public function insertData($data)
    {
        $this->db->insert('tbulasan', $data);
    }

    public function insertDataUser($data_user)
    {
        $this->db->insert('tbusers', $data_user);
    }

    public function getDataKomen($idacara)
    {
        $this->db->select('tbulasan.ulasan, tbulasan.waktu, tbusers.username, tbusers.email');
        $this->db->from('tbulasan');
        $this->db->join('tbusers', 'tbulasan.idusers = tbusers.idusers');
        $this->db->where('tbulasan.idacara', $idacara);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalKomen($idacara)
    {
        $this->db->where('idacara', $idacara);
        $total = $this->db->count_all_results('tbulasan');
        return $total;
    }
}

/* End of file Mdetailsacr.php */
