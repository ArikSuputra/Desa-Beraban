<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function register($username, $email, $password, $role)
    {
        // Mengatur timezone menjadi WITA
        date_default_timezone_set('Asia/Makassar');
        $data_user = array(
            'username' => $username,
            'email' => $email,
            'password' => md5($password),
            'role' => $role,
            'created' => date('Y-m-d H:i')
        );
        $this->db->insert('tbusers', $data_user);
    }
}

/* End of file Register.php */
