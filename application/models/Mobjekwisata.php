<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mobjekwisata extends CI_Model
{

    public function getTotalObjek()
    {
        $total = $this->db->count_all_results('tbobjekwisata');
        return $total;
    }

    public function getData()
    {
        $result = $this->db->get('tbobjekwisata')->result_array();
        return $result;
    }

    public function getDataById($id)
    {

        return $this->db->get_where('tbobjekwisata', ['idobjekwisata' => $id])->row_array();
    }

    public function tambah_data($data)
    {
        $this->db->insert('tbobjekwisata', $data);
    }

    public function get_foto_by_id($id)
    {
        // Ambil foto dari tbobjekwisata berdasarkan id
        $this->db->select('foto_wst');
        $this->db->where('idobjekwisata', $id);
        $result = $this->db->get('tbobjekwisata')->row_array();

        return $result['foto_wst'];
    }

    public function update_data($id, $data)
    {
        // Update data tbobjekwisata berdasarkan id
        $this->db->where('idobjekwisata', $id);
        $this->db->update('tbobjekwisata', $data);
    }

    public function deleteData($del)
    {
        $this->db->where('idobjekwisata', $del);
        $result = $this->db->delete('tbobjekwisata');
        return $result;
    }

    public function searchData($keyword)
    {
        // Modify this method to search for data based on the keyword
        $this->db->like('nama_wst', $keyword); // Modify 'nama_wst' to the actual field you want to search
        $query = $this->db->get('tbobjekwisata'); // Modify 'objek_wisata' to your actual table name
        return $query->result_array();
    }

    public function getDataByCategory($category)
    {
        $this->db->where('kategori', $category);
        $query = $this->db->get('tbobjekwisata');
        return $query->result_array();
    }

    public function record_count($keyword = null, $category = null)
    {
        if ($keyword) {
            $this->db->like('nama_wst', $keyword);
        }

        if ($category) {
            $this->db->where('kategori', $category);
        }

        return $this->db->count_all_results("tbobjekwisata");
    }

    public function getDataPerPage($limit, $start, $keyword = null, $category = null)
    {
        if ($keyword) {
            $this->db->like('nama_wst', $keyword);
        }

        if ($category) {
            $this->db->where('kategori', $category);
        }

        $this->db->limit($limit, $start);
        $query = $this->db->get("tbobjekwisata");
        return $query->result_array();
    }
}

/* End of file Mobjekwisata.php */
