<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mstat extends CI_Model
{
    public function get_stat_by_idtransaksi($idtransaksi)
    {
        return $this->db->get_where('tbstat', array('idtransaksi' => $idtransaksi))->row_array();
    }

    public function update_status($idstat, $status)
    {
        $data = array(
            'status' => $status
        );

        $this->db->where('idstat', $idstat);
        return $this->db->update('tbstat', $data);
    }

    public function update_stat_proof($idstat, $file_path)
    {
        $this->db->where('idstat', $idstat);
        $this->db->update('tbstat', array('bukti' => $file_path));
    }

    public function insert_stat($data)
    {
        $this->db->insert('tbstat', $data);
    }

    public function insertPaymentVerification($data)
    {
        $this->db->insert('tbstat', $data);
    }

    // New method to get all verification data
    public function get_all_verification_data()
    {
        $this->db->select('tbstat.*, tbusers.username, tbtransaksi.total_pembayaran ,tbobjekwisata.nama_wst');
        $this->db->from('tbstat');
        $this->db->join('tbusers', 'tbstat.idusers = tbusers.idusers');
        $this->db->join('tbtransaksi', 'tbstat.idtransaksi = tbtransaksi.idtransaksi');
        $this->db->join('tbobjekwisata', 'tbstat.idobjekwisata = tbobjekwisata.idobjekwisata');
        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file Mstat.php */
