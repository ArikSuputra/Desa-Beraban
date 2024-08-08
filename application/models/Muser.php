<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Muser extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_user_by_id($user_id)
    {
        $this->db->where('idusers', $user_id);
        $query = $this->db->get('tbusers');
        return $query->row();
    }
}
