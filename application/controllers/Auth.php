<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('Authmodel'); // Load the model
        $this->load->library('form_validation');
        $this->load->model('Authmodel');
        $this->load->model('Register');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('Auth/auth_header', $data);
            $this->load->view('auth/index');
            $this->load->view('Auth/auth_footer');
        } else {
            // validasinya success
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        // Panggil fungsi dari model untuk pengecekan login
        $user = $this->Authmodel->validasi($username, $password);

        if ($user) {
            // Jika login berhasil, atur session
            $this->session->set_userdata('logged_in', TRUE);
            $this->session->set_userdata('idusers', $user['idusers']);
            $this->session->set_userdata('username', $user['username']);
            $this->session->set_userdata('role', $user['role']);
            // Jika login berhasil, arahkan ke halaman dashboard sesuai peran
            if ($user['role'] == '1') {
                redirect('Cdashboard/admin');
            } elseif ($user['role'] == '2') {
                redirect('Cdashboard/kepaladesa');
            } elseif ($user['role'] == '3') {
                redirect('Cindex');
            }
        } else {
            // Jika login gagal, atur flashdata untuk pesan kesalahan
            $this->session->set_flashdata('error_login', '<div class="alert alert-danger text-center" role="alert">Username or password is incorrect!</div>');
            redirect('Auth');
        }
    }

    public function register()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required', [
            'required' => 'The username fields is required'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'The email fields is required',
            'valid_email' => 'Please provide a valid email address'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'The password fields is required'
        ]);
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]', [
            'required' => 'The password confirmation fields is required',
            'matches' => 'Password doesnt match!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration Page';
            $this->load->view('Auth/auth_header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('Auth/auth_footer');
        } else {
            // Validasi sukses
            $this->prosesRegis();
        }
    }

    public function prosesRegis()
    {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $role = '3';
        // $created = date('Y-m-d H:i');

        // Simpan data ke database
        $this->Register->register($username, $email, $password, $role, $created);

        // Set flashdata pesan sukses
        $this->session->set_flashdata('success_register', 'Account successfully created! <br> Please login!');
        redirect('Auth');
    }


    public function registrasi()
    {
        $data['title'] = 'Registration Page';
        $this->load->view('Auth/auth_header', $data);
        $this->load->view('auth/registrasi');
        $this->load->view('Auth/auth_footer');
    }

    public function logout()
    {
        // Destroy the session and redirect to the login page
        $this->session->sess_destroy();
        redirect('Cindex');
    }
    public function index2()
    {
        $this->load->view('Auth/auth_header');
        $this->load->view('Auth/loginpage');
        $this->load->view('Auth/auth_footer');
    }
}
