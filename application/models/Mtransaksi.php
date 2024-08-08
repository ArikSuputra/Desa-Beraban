<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mtransaksi extends CI_Model
{
    public function getTotalTransaksi()
    {
        $total = $this->db->count_all_results('tbtransaksi');
        return $total;
    }

    public function getData()
    {
        $this->db->select('tbtransaksi.*, tbusers.username');
        $this->db->from('tbtransaksi');
        $this->db->join('tbusers', 'tbtransaksi.idusers = tbusers.idusers');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getDataTransaksi($tahun, $bulan, $periode)
    {
        $this->db->select('DATE_FORMAT(tgl_transaksi, "%Y-%m-%d") AS label, SUM(total_pembayaran) AS total');
        $this->db->from('tbtransaksi');
        $this->db->where('YEAR(tgl_transaksi)', $tahun);

        if ($periode === 'harian' || $periode === 'mingguan') {
            $this->db->where('MONTH(tgl_transaksi)', $bulan);
        }

        if ($periode === 'harian') {
            $this->db->group_by('DATE(tgl_transaksi)');
        } elseif ($periode === 'mingguan') {
            $this->db->group_by('YEARWEEK(tgl_transaksi, 1)');
        } else { // bulanan
            $this->db->select('DATE_FORMAT(tgl_transaksi, "%Y-%m") AS label, SUM(total_pembayaran) AS total');
            $this->db->group_by('MONTH(tgl_transaksi)');
        }

        $this->db->order_by('tgl_transaksi', 'ASC');
        $query = $this->db->get();

        return $query->result();
    }

    // Method untuk mendapatkan data transaksi berdasarkan ID
    public function get_transaksi_by_id($transaksi_id)
    {
        $this->db->where('idtransaksi', $transaksi_id);
        $query = $this->db->get('tbtransaksi');
        return $query->row_array();
    }
}
