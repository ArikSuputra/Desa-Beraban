<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mtiket extends CI_Model
{
    public function getTotalTiket()
    {
        $total = $this->db->count_all_results('tbtiket');
        return $total;
    }

    public function getData()
    {
        $this->db->select('tbtiket.*, tbharga.kategoriTiket, tbobjekwisata.nama_wst, tbusers.idusers');
        $this->db->from('tbtiket');
        $this->db->join('tbharga', 'tbtiket.idharga = tbharga.idharga');
        $this->db->join('tbobjekwisata', 'tbtiket.idobjekwisata = tbobjekwisata.idobjekwisata');
        $this->db->join('tbusers', 'tbtiket.idusers = tbusers.idusers');
        $result = $this->db->get()->result_array();
        return $result;
    }

    public function getIdUsers()
    {
        $this->db->select('idusers'); // Mengambil idusers
        $result = $this->db->get('tbusers')->result_array();
        return $result;
    }

    public function getNamaWst()
    {
        $this->db->select('idobjekwisata, nama_wst'); // Mengambil idobjekwisata dan nama_wst
        $result = $this->db->get('tbobjekwisata')->result_array();
        return $result;
    }

    public function getKategoriTiket()
    {
        $this->db->select('idharga, kategoriTiket'); // Mengambil idharga dan kategoriTiket
        $result = $this->db->get('tbharga')->result_array();
        return $result;
    }

    public function insertData($data)
    {
        $this->db->insert('tbtiket', $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('idtiket', $id);
        $this->db->update('tbtiket', $data);
    }

    public function deleteData($del)
    {
        $this->db->where('idtiket', $del);
        $result = $this->db->delete('tbtiket');
        return $result;
    }

    //////

    // Metode untuk mengambil harga tiket berdasarkan ID objek wisata
    public function getTicketPricesByObjekWisataId($idobjekwisata)
    {
        $this->db->select('idharga, idobjekwisata, kategoriTiket, jenisTiket, harga');
        $this->db->from('tbharga');
        $this->db->where('idobjekwisata', $idobjekwisata);
        $query = $this->db->get();

        // Mengembalikan hasil query dalam bentuk array
        return $query->result_array();
    }

    public function getDataUser($idusers)
    {
        $this->db->select('email');
        $this->db->from('tbusers');
        $this->db->where('idusers', $idusers);
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan hasil sebagai array satu baris
    }

    // Metode untuk mengambil tiket berdasarkan ID tiket
    public function get_ticket_by_id($ticket_id)
    {
        $this->db->select('*');
        $this->db->from('tbharga'); // Ubah ke nama tabel yang benar
        $this->db->where('idharga', $ticket_id); // Sesuaikan kolom ID jika berbeda
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insertTicket($tiket_data)
    {
        $this->db->insert('tbtiket', $tiket_data);
    }
}

/* End of file Mtiket.php */
