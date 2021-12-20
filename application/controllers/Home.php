<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $params = array('server_key' => 'SB-Mid-server-4GGgWYGkbqFkspMfW1r2DbcM', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        $this->load->helper('url');

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

    public function transaksi_wisata()
    {
        $data['title'] = 'Transaksi Wisata';

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/home/login/', 'refresh');
        } else {
            if ($this->session->userdata('roles') == 1) {

                $id_wisatawan = $this->session->userdata('id_wisatawan');

                $data['transaksi'] = $this->templates->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
                tw.pdf_url, tw.status_code, tw.jumlah, tw.id_wisatawan, tw.nama, tw.alamat, tw.email, tw.no_hp,
                tw.id_wisata, w.nama nama_wisata, w.thumbnail thumbnail, w.harga harga
                FROM transaksi_wisata tw 
                JOIN wisata w 
                ON tw.id_wisata = w.id_wisata 
                WHERE tw.id_wisatawan = $id_wisatawan 
                ORDER BY transaction_time DESC")->result();
                $data['profile'] = $this->templates->view_where('wisatawan', ['id_wisatawan' => $id_wisatawan])->result_array();

                $this->load->view('home/header', $data);
                $this->load->view('home/transaksi_wisata', $data);
                $this->load->view('home/footer');
            } else {
                redirect('/petugas', 'refresh');
            }
        }
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/home/login/', 'refresh');
        } else {
            if ($this->session->userdata('roles') == 1) {

                $id_wisatawan = $this->session->userdata('id_wisatawan');

                $data['profile'] = $this->templates->view_where('wisatawan', ['id_wisatawan' => $id_wisatawan])->result_array();

                $this->load->view('home/header', $data);
                $this->load->view('home/profile', $data);
                $this->load->view('home/footer');
                
            } else {
                redirect('/petugas', 'refresh');
            }
        }
    }

    public function update_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == true) {

            $id_wisatawan = $this->input->post('id_wisatawan');
            $data['nama'] = $this->input->post('nama');
            $data['username'] = $this->input->post('username');
            $data['password'] = get_hash($this->input->post('password'));
            $data['alamat'] = $this->input->post('alamat');
            $data['email'] = $this->input->post('email');
            $data['no_hp'] = $this->input->post('no_hp');

            $this->templates->update('wisatawan', ['id_wisatawan' => $id_wisatawan], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
            redirect('home/profile');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('home/profile');
        }
    }

    public function detail_wisata($id_wisata)
    {
        $data['title'] = 'Wisata';

        $data['wisata'] = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->result_array();

        $this->load->view('home/header', $data);
        $this->load->view('home/detail_wisata', $data);
        $this->load->view('home/footer');
    }

    public function invoice($order_id)
    {
        $data['title'] = 'Invoice';

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/home/login/', 'refresh');
        } else {

            if ($this->session->userdata('roles') == 1) {

                $data['wisata'] = $this->templates->query("
                SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
                tw.pdf_url, tw.status_code, tw.jumlah, tw.id_wisatawan, tw.nama, tw.alamat, tw.email, tw.no_hp,
                tw.id_wisata, w.nama nama_wisata
                FROM transaksi_wisata tw 
                JOIN wisata w 
                ON tw.id_wisata = w.id_wisata 
                WHERE order_id = $order_id 
                ORDER BY transaction_time DESC")->result_array();

                $this->load->view('home/invoice', $data);
            } else {
                redirect('/petugas', 'refresh');
            }
        }
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
                            'roles' => 1,
                            'id_wisatawan'  => $db->id_wisatawan,
                            'email'  => $db->email,
                            'username'   => $db->username,
                            'nama'   => $db->nama,
                            'alamat'   => $db->alamat,
                            'no_hp'   => $db->no_hp,
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
        $this->session->unset_userdata('id_wisatawan');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('alamat');
        $this->session->unset_userdata('no_hp');
        $this->session->unset_userdata('roles');

        session_destroy();
        //$this->session->set_flashdata('pesan', 'Sign Out Berhasil!');
        redirect('home/login/index', 'refresh');
    }

    //midtrans logic
    public function token()
    {
        $id_wisatawan = $this->input->post('id_wisatawan');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $id_wisata = $this->input->post('id_wisata');
        $nama_wisata = $this->input->post('nama_wisata');
        $gross_amount = $this->input->post('gross_amount');
        $jumlah = $this->input->post('jumlah');

        $gross_convert = (int)$gross_amount;
        $jumlah_convert = (int)$jumlah;
        $total = ($gross_convert * $jumlah_convert);

        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $total, // no decimal allowed for creditcard
        );

        // Optional
        $item1_details = array(
            'id' => 'a1',
            'price' => $gross_amount,
            'quantity' => $jumlah,
            'name' => "Pembayaran " . $nama_wisata
        );

        // Optional
        $item_details = array($item1_details);


        // Optional
        $customer_details = array(
            'first_name'    => $nama,
            //'last_name'     => "Litani",
            'email'         => $email,
            'phone'         => $no_hp,
            'billing_address'  => $alamat,
            'shipping_address' => $alamat
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'day',
            'duration'  => 1
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function finish()
    {
        $result = json_decode($this->input->post('result_data'), true);

        $id_wisatawan = $this->input->post('id_wisatawan');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $no_hp = $this->input->post('no_hp');
        $id_wisata = $this->input->post('id_wisata');
        $gross_amount = $this->input->post('gross_amount');
        $jumlah = $this->input->post('jumlah');

        $data = [
            'order_id' => $result['order_id'],
            'gross_amount' => $result['gross_amount'],
            'payment_type' => $result['payment_type'],
            'transaction_time' => $result['transaction_time'],
            'bank' => $result['va_numbers'][0]['bank'],
            'va_number' => $result['va_numbers'][0]['va_number'],
            'pdf_url' => $result['pdf_url'],
            'status_code' => $result['status_code'],
            'jumlah' => $jumlah,
            'id_wisatawan' => $id_wisatawan,
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'no_hp' => $no_hp,
            'id_wisata' => $id_wisata,

        ];

        $simpan = $this->db->insert('transaksi_wisata', $data);
        if ($simpan) {
            $this->session->set_flashdata('transaksi_wisata', 'Transaksi berhasil!');
            redirect('home/transaksi_wisata', 'refresh');
        } else {
            $this->session->set_flashdata('transaksi_wisata', 'Transaksi gagal!');
            redirect('home/transaksi_wisata', 'refresh');
        }
    }
}
