<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_wisatawan');
    }

    public function index()
    {
        $data['title'] = 'Landing';

        $data['wisata'] = $this->templates->query("SELECT * FROM wisata ORDER BY id_wisata DESC LIMIT 3");

        $this->load->view('home/header', $data);
        $this->load->view('home/home', $data);
        $this->load->view('home/footer');
    }

    public function wisata()
    {
        $data['title'] = 'Wisata';

        $data['wisata'] = $this->templates->query("SELECT * FROM wisata ORDER BY id_wisata DESC");

        $this->load->view('home/header', $data);
        $this->load->view('home/wisata', $data);
        $this->load->view('home/footer');
    }

    public function login()
    {

        if ($this->session->userdata('is_login') == TRUE) {
            redirect('/', 'refresh');
        }

        $data['title'] = 'Login';

        $this->load->view('wisatawan/login/index', $data);
    }

    public function register()
    {

        if ($this->session->userdata('is_login') == TRUE) {
            redirect('/', 'refresh');
        }

        $data['title'] = 'Register';

        $this->load->view('wisatawan/register/index', $data);
    }

    public function register_proses()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[22]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]|is_unique[petugas.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->m_wisatawan->m_register()) {

                $this->session->set_flashdata('pesan', 'Register berhasil, silahkan  Sign In.');
                redirect('/home/login/', 'refresh');
            } else {

                $this->session->set_flashdata('pesan', 'Register user gagal!');
                redirect('/home/register/', 'refresh');
            }
        } else {

            $this->load->view('wisatawan/register/index');
        }
    }

    public function login_proses()
    {

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->m_wisatawan->m_cek_mail()->num_rows() == 1) {

                $db = $this->m_wisatawan->m_cek_mail()->row();
                if (hash_verified($this->input->post('password'), $db->password)) {
                    if ($db->status == 1) {

                        $data_login = array(
                            'is_login' => TRUE,
                            'email'  => $db->email,
                            'username'   => $db->username,
                            'nama'   => $db->nama,
                        );
                        $this->session->set_userdata($data_login);
                        redirect('/', 'refresh');
                    } else {
                        $this->session->set_flashdata('pesan', 'Login gagal: akun diblokir!');
                        redirect('home/login/index', 'refresh');
                    }
                } else {

                    $this->session->set_flashdata('pesan', 'Login gagal: password salah!');
                    redirect('home/login/index', 'refresh');
                }
            } else { // jika email tidak terdaftar!

                $this->session->set_flashdata('pesan', 'Login gagal: email salah!');
                redirect('home/login/index', 'refresh');
            }
        } else {

            $this->load->view('wisatawan/login/index');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('is_login');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');

        session_destroy();
        //$this->session->set_flashdata('pesan', 'Sign Out Berhasil!');
        redirect('home/login/index', 'refresh');
    }
}
