<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mpengguna extends CI_Model
{
    public function getTotalUser()
    {
        $total = $this->db->count_all_results('tbusers');
        return $total;
    }

    // Fungsi untuk mengambil semua data pengguna dari tabel 'users'
    public function getAll()
    {
        return $this->db->get('tbusers')->result_array();
    }

    // Fungsi untuk mengambil data pengguna berdasarkan ID pengguna
    public function getById($id)
    {
        return $this->db->get_where('tbusers', array('idusers' => $id))->row_array();
    }

    // Fungsi untuk menambahkan data pengguna baru ke dalam tabel 'users'
    public function insert($data)
    {
        $this->db->insert('tbusers', $data);
    }

    // Fungsi untuk memperbarui data pengguna yang sudah ada berdasarkan ID pengguna
    public function update($id, $data)
    {
        $this->db->where('idusers', $id);
        $this->db->update('tbusers', $data);
    }

    // Fungsi untuk menghapus data pengguna berdasarkan ID pengguna
    public function delete($id)
    {
        $this->db->where('idusers', $id);
        $this->db->delete('tbusers');
    }

    /* End of file Mpengguna.php */
}
