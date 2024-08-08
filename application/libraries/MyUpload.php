<?php defined('BASEPATH') OR exit('No direct script access allowed');

class MyUpload {

    protected $CI;

    public function __construct()
    {
        // Mendapatkan instance dari CI
        $this->CI =& get_instance();
        $this->CI->load->library('upload'); // Memuat library upload bawaan CI
    }

    public function do_upload($field_name, $config)
    {
        // Mengatur konfigurasi upload
        $this->CI->upload->initialize($config);

        // Melakukan proses upload
        if (!$this->CI->upload->do_upload($field_name)) {
            // Mengembalikan error jika upload gagal
            return array('error' => $this->CI->upload->display_errors());
        } else {
            // Mengembalikan data file yang diupload jika berhasil
            return array('upload_data' => $this->CI->upload->data());
        }
    }
}
