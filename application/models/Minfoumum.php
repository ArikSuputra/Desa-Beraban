<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Minfoumum extends CI_Model
{
    // Fungsi untuk mendapatkan total data pada tbinformasiumum
    public function getTotalInfo()
    {
        $total = $this->db->count_all_results('tbinformasiumum');
        return $total;
    }
    public function getInfoById($id)
    {
        return $this->db->get_where('tbinformasiumum', ['idinfoumum' => $id])->row_array();
    }

    public function getData()
    {
        $result = $this->db->get('tbinformasiumum')->result_array();
        return $result;
    }

    public function getLastInfo()
    {
        // Mengurutkan berdasarkan kolom 'idinfoumum' secara menurun
        $this->db->order_by('idinfoumum', 'DESC');

        // Mengambil 3 data terbaru
        $this->db->limit(3);

        // Mengambil data dari tabel 'tbinformasiumum'
        $result = $this->db->get('tbinformasiumum')->result_array();

        return $result;
    }


    public function insertData($data)
    {
        $this->db->insert('tbinformasiumum', $data);
    }

    public function getDataById($id)
    {
        // mengambil data dari tbinformasiumum berdasarkan id
        $this->db->where('idinfoumum', $id);
        return $this->db->get('tbinformasiumum')->row_array();
    }


    public function editData($id, $judul, $foto, $ket)
    {
        // mengupdate data ke tbunformasiumum berdasarkan id
        $data = array(
            'judul' => $judul,
            'foto' => $foto,
            'ket' => $ket
        );

        $this->db->where('idinfoumum', $id);
        $this->db->update('tbinformasiumum', $data);
    }

    public function deleteData($id)
    {
        // Delete data from the 'tbinformasiumum' table based on the provided ID
        $this->db->where('idinfoumum', $id);
        $result = $this->db->delete('tbinformasiumum');
        return $result;
    }
}

/* End of file Minfoumum.php */
