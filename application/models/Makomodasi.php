<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Makomodasi extends CI_Model
{
    public function getTotalAko()
    {
        $total = $this->db->count_all_results('tbakomodasi');
        return $total;
    }

    public function getData()
    {
        $result = $this->db->get('tbakomodasi')->result_array();
        return $result;
    }

    public function getDataById($id)
    {
        return $this->db->get_where('tbakomodasi', ['idakomodasi' => $id])->row_array();
    }

    public function tambah_data($data)
    {
        $this->db->insert('tbakomodasi', $data);
    }

    public function get_foto_by_id($id)
    {
        // Ambil foto dari tbakomodasi berdasarkan id
        $this->db->select('foto_ako');
        $this->db->where('idakomodasi', $id);
        $result = $this->db->get('tbakomodasi')->row_array();

        return $result['foto_ako'];
    }

    public function update_data($id, $data)
    {
        $this->db->where('idakomodasi', $id);
        $this->db->update('tbakomodasi', $data);
    }

    public function deleteData($del)
    {
        $this->db->where('idakomodasi', $del);
        $result = $this->db->delete('tbakomodasi');
        return $result;
    }

    // Metode ini menerima parameter $keyword. Parameter ini akan digunakan sebagai kata kunci pencarian untuk mencari data di dalam tabel.
    public function searchData($keyword)
    {
        // melakukan operasi pencarian terhadap nama ako berdasarkan parameter $keyword yang cocok
        $this->db->like('nama_ako', $keyword);
        // mengeksekusi query dengan memanggil method get pada tabel akomodasi yang kemudian akan mengembalikan hasil dalam bentuk objek $query
        $query = $this->db->get('tbakomodasi');
        // hasil query dikembalikan dalam bentuk array dengan menggunakan metode result array
        return $query->result_array();
    }

    public function countAllData($keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_ako', $keyword);
        }
        return $this->db->count_all_results('tbakomodasi'); // Ganti 'tbakomodasi' dengan nama tabel yang sesuai
    }

    public function getDataPagination($limit, $offset, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_ako', $keyword);
        }
        $query = $this->db->get('tbakomodasi', $limit, $offset); // Ganti 'tbakomodasi' dengan nama tabel yang sesuai
        return $query->result_array();
    }
}

/* End of file Makomodasi.php */
