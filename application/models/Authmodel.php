<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authmodel extends CI_Model
{

    public function validasi($username, $password)
    {
        // Cek login berdasarkan username dan password
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('tbusers');

        if ($query->num_rows() == 1) {
            // Jika data ditemukan, kembalikan data user
            return $query->row_array();
        } else {
            // Jika data tidak ditemukan, kembalikan false
            return false;
        }
    }
}
