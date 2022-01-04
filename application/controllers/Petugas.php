<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Petugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_petugas');
    }

    public function index()
    {

        if ($this->session->userdata('is_petugas') == FALSE) {
            redirect('/Petugas/login/', 'refresh');
        }

        $data['title'] = 'Dashboard';

        $data['wisata'] = $this->templates->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
        tw.pdf_url, tw.status_code, tw.jumlah, tw.id_wisatawan, tw.nama, tw.alamat, tw.email, tw.no_hp,
        tw.id_wisata, w.nama nama_wisata, w.thumbnail thumbnail, w.harga harga
        FROM transaksi_wisata tw 
        JOIN wisata w 
        ON tw.id_wisata = w.id_wisata
        ORDER BY transaction_time DESC LIMIT 5")->result_array();
        $data['pendapatan_wisata'] = $this->templates->query("SELECT SUM(gross_amount) AS total, status_code FROM `transaksi_wisata` WHERE status_code = 200")->result();
        $data['transaksi_wisata'] = $this->templates->view('transaksi_wisata')->num_rows();
        $data['transaksi_wisata_pending'] = $this->templates->view_where('transaksi_wisata', ['status_code' => 201])->num_rows();
        $data['transaksi_wisata_acc'] = $this->templates->view_where('transaksi_wisata', ['status_code' => 200])->num_rows();
        $data['transaksi_wisata_cancel'] = $this->templates->view_where('transaksi_wisata', ['status_code' => 202])->num_rows();
        $data['grafik_wisata'] = $this->templates->query("SELECT
        SUM(gross_amount) as jumlah, DATE_FORMAT(transaction_time,'%d-%M-%Y') as bulan
        FROM
        transaksi_wisata
        WHERE status_code = 200
        GROUP BY DATE_FORMAT(transaction_time,'%d-%M-%Y')
        ORDER BY transaction_time ASC")->result();

        $data['event'] = $this->templates->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
        tw.pdf_url, tw.status_code, tw.jumlah, tw.id_wisatawan, tw.nama, tw.alamat, tw.email, tw.no_hp,
        tw.id_event, w.nama nama_event, w.thumbnail thumbnail, w.harga harga
        FROM transaksi_event tw 
        JOIN event w 
        ON tw.id_event = w.id_event
        ORDER BY transaction_time DESC LIMIT 5")->result_array();
        $data['pendapatan_event'] = $this->templates->query("SELECT SUM(gross_amount) AS total, status_code FROM `transaksi_event` WHERE status_code = 200")->result();
        $data['transaksi_event'] = $this->templates->view('transaksi_event')->num_rows();
        $data['transaksi_event_pending'] = $this->templates->view_where('transaksi_event', ['status_code' => 201])->num_rows();
        $data['transaksi_event_acc'] = $this->templates->view_where('transaksi_event', ['status_code' => 200])->num_rows();
        $data['transaksi_event_cancel'] = $this->templates->view_where('transaksi_event', ['status_code' => 202])->num_rows();
        $data['grafik_event'] = $this->templates->query("SELECT
        SUM(gross_amount) as jumlah, DATE_FORMAT(transaction_time,'%d-%M-%Y') as bulan
        FROM
        transaksi_event
        WHERE status_code = 200
        GROUP BY DATE_FORMAT(transaction_time,'%d-%M-%Y')
        ORDER BY transaction_time ASC")->result();

        $data['grafik_perbandingan'] = $this->templates->query("SELECT
        SUM(tw.gross_amount) as jumlah_wisata,
        IFNULL((SELECT SUM(gross_amount) as jumlah_event FROM transaksi_event WHERE status_code=200 AND DATE_FORMAT(transaction_time,'%M-%y') = DATE_FORMAT(tw.transaction_time,'%M-%y') GROUP BY DATE_FORMAT(transaction_time,'%M-%y')), 0) AS jumlah_event,
        DATE_FORMAT(tw.transaction_time,'%M-%y') as bulan
        FROM
        transaksi_wisata tw
        WHERE tw.status_code = 200
        GROUP BY DATE_FORMAT(tw.transaction_time,'%M-%y')
        ORDER BY tw.transaction_time ASC")->result();

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/script', $data);
    }

    public function login()
    {

        if ($this->session->userdata('is_petugas') == TRUE) {
            redirect('Petugas/index', 'refresh');
        }

        $data['title'] = 'Login';

        $this->load->view('petugas/login/index', $data);
    }

    public function register()
    {

        if ($this->session->userdata('is_petugas') == TRUE) {
            redirect('Petugas/index', 'refresh');
        }

        $data['title'] = 'Register';

        $this->load->view('petugas/register/index', $data);
    }

    public function register_proses()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[22]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]|is_unique[petugas.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->m_petugas->m_register()) {

                $this->session->set_flashdata('pesan', 'Register berhasil, silahkan  Sign In.');
                redirect('/Petugas/login/', 'refresh');
            } else {

                $this->session->set_flashdata('pesan', 'Register user gagal!');
                redirect('/Petugas/register/', 'refresh');
            }
        } else {

            $this->load->view('petugas/register/index');
        }
    }

    public function login_proses()
    {

        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->m_petugas->m_cek_mail()->num_rows() == 1) {

                $db = $this->m_petugas->m_cek_mail()->row();
                if (hash_verified($this->input->post('password'), $db->password)) {

                    $data_login = array(
                        'is_petugas' => TRUE,
                        'id_petugas' => $db->id_petugas,
                        'email'  => $db->email,
                        'username'   => $db->username,
                        'nama'   => $db->nama,
                    );

                    $this->session->set_userdata($data_login);
                    redirect('Petugas/index', 'refresh');
                } else {

                    $this->session->set_flashdata('pesan', 'Login gagal: password salah!');
                    redirect('Petugas/login/index', 'refresh');
                }
            } else { // jika email tidak terdaftar!

                $this->session->set_flashdata('pesan', 'Login gagal: email salah!');
                redirect('Petugas/login/index', 'refresh');
            }
        } else {

            $this->load->view('petugas/login/index');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('is_petugas');
        $this->session->unset_userdata('id_petugas');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');

        session_destroy();
        //$this->session->set_flashdata('pesan', 'Sign Out Berhasil!');
        redirect('Petugas/login/index', 'refresh');
    }
}

/* End of file Petugas.php */
/* Location: ./application/controllers/Petugas.php */