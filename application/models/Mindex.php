<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Mindex extends CI_Model
{
    public function getDataObjek()
    {
        $this->db->select('*');
        $this->db->from('tbobjekwisata');
        $this->db->order_by('idobjekwisata', 'ASC');
        $this->db->limit(3);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTopRating($limit = 3)
    {
        $this->db->select('tbobjekwisata.*, AVG(tbulasan.rating) as rating_avg');
        $this->db->from('tbobjekwisata');
        $this->db->join('tbulasan', 'tbulasan.idobjekwisata = tbobjekwisata.idobjekwisata', 'left');
        $this->db->group_by('tbobjekwisata.idobjekwisata');
        $this->db->order_by('rating_avg', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getDataAko()
    {
        $this->db->select('*');
        $this->db->from('tbakomodasi');
        $this->db->order_by('idakomodasi', 'ASC');
        $this->db->limit(3);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTopRatingAko($limit = 3)
    {
        $this->db->select('tbakomodasi.*, AVG(tbulasan.rating) as rating_avg');
        $this->db->from('tbakomodasi');
        $this->db->join('tbulasan', 'tbulasan.idakomodasi = tbakomodasi.idakomodasi', 'left');
        $this->db->group_by('tbakomodasi.idakomodasi');
        $this->db->order_by('rating_avg', 'DESC');
        $this->db->limit($limit);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getDataAcr()
    {
        $this->db->select('*');
        $this->db->from('tbacara');
        $this->db->order_by('idacara', 'ASC');
        $this->db->limit(3);

        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file Mindex.php */
