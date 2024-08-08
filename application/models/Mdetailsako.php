<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mdetailsako extends CI_Model
{
    public function getTotalKomen($idakomodasi)
    {
        $this->db->where('idakomodasi', $idakomodasi);
        $total = $this->db->count_all_results('tbulasan');
        return $total;
    }

    public function getRataRating($idakomodasi)
    {
        $this->db->select('ROUND(AVG(rating),1)as average_rating', false);
        $this->db->where('idakomodasi', $idakomodasi);
        $query = $this->db->get('tbulasan');
        return $query->row()->average_rating;
    }

    public function getTotalRating($idakomodasi)
    {
        $this->db->select('COUNT(rating) as total_ratings');
        $this->db->where('idakomodasi', $idakomodasi);
        $query = $this->db->get('tbulasan');

        if ($query->num_rows() > 0) {
            return $query->row()->total_ratings;
        } else {
            return 0;
        }
    }

    public function getData()
    {
        $result = $this->db->get('tbulasan')->result_array();
        return $result;
    }

    public function insertData($data)
    {
        $this->db->insert('tbulasan', $data);
    }

    public function insertDataUser($data_user)
    {
        $this->db->insert('tbusers', $data_user);
    }

    public function getDataKomen($idakomodasi)
    {
        $this->db->select('tbulasan.ulasan, tbulasan.waktu, tbusers.username, tbusers.email');
        $this->db->from('tbulasan');
        $this->db->join('tbusers', 'tbulasan.idusers = tbusers.idusers');
        $this->db->where('tbulasan.idakomodasi', $idakomodasi);

        $query = $this->db->get();
        return $query->result_array();
    }


    // public function tambah_guest($guest_data)
    // {
    //     // Simpan guest_data$guest_data user ke tbusers
    //     $this->db->insert('tbusers', $guest_data);

    //     // Ambil ID user yang baru saja ditambahkan
    //     return $this->db->insert_id();
    // }

    // public function insertKomentar($komentar)
    // {
    //     // Simpan komentar$komentar komentar ke tbulasan
    //     $this->db->insert('tbulasan', $komentar);
    // }
}
// $this->db->select('*');
// $this->db->from('tbulasan');
// $this->db->join('tbusers', 'tbusers.idusers = tbulasan.tbusers_idusers');
// $query = $this->db->get();
// return $query;

/* End of file Mdetails.php */

// public function getDataKomen()
// {
//     $this->db->select('tbusers.username, tbusers.email, tbulasan.waktu, tbulasan.ulasan');
//     $this->db->from('tbusers');
//     $this->db->join('tbulasan', 'tbusers.idusers = tbulasan.idusers', 'left');
//     $query = $this->db->get();
//     return $query->result();
// }

// public function getDataWithJoin()
// {
//     $this->db->select('tbusers.username, tbusers.email, tbulasan.waktu_uls, tbulasan.ulasan');
//     $this->db->from('tbusers');
//     $this->db->join('tbulasan', 'tbusers.idusers = tbulasan.idusers', 'left');
//     $query = $this->db->get();
//     return $query->result();
// }