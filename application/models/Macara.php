<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Macara extends CI_Model
{

    public function getTotalAcr()
    {
        $total = $this->db->count_all_results('tbacara');
        return $total;
    }

    public function getData()
    {
        $result = $this->db->get('tbacara')->result_array();
        return $result;
    }

    public function getDataById($id)
    {
        return $this->db->get_where('tbacara', ['idacara' => $id])->row_array();
    }

    public function tambahData($data)
    {
        $this->db->insert('tbacara', $data);
    }

    public function get_foto_by_id($id)
    {
        $this->db->select('foto_acr');
        $this->db->where('idacara', $id);
        $result = $this->db->get('tbacara')->row_array();

        return $result['foto_acr'];
    }

    public function update_data($id, $data)
    {
        $this->db->where('idacara', $id);
        $this->db->update('tbacara', $data);
    }

    public function deleteData($del)
    {
        $this->db->where('idacara', $del);
        $result = $this->db->delete('tbacara');
        return $result;
    }

    public function searchData($keyword)
    {
        //  melakukan pencarian terhadap nama acr berdasarkan parameter $keyword yang cocok
        $this->db->like('nama_acr', $keyword);

        // eksekusi query dilakukan dengan memanggil method get pada tabel acara dan akan mengembalikan hasil dalam bentuk objek $query
        $query = $this->db->get('tbacara');

        // hasil query dikembalikan dalam bentuk array dengan method result array 
        return $query->result_array();
    }
}


/* End of file Macara.php */
