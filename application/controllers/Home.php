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

        $data['wisata'] = $this->templates->query("SELECT w.id_wisata, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
        w.thumbnail, w.header, w.destinasi1, w.destinasi2, w.destinasi3, w.id_petugas,
        IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS rating,
        IFNULL((SELECT COUNT(id_rating_wisata) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS jumlah
        FROM wisata w
        ORDER BY w.id_wisata DESC LIMIT 3");
        $data['event'] = $this->templates->query("SELECT w.id_event, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
        w.thumbnail, w.header, w.event1, w.event2, w.event3, w.id_petugas,
        IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS rating,
        IFNULL((SELECT COUNT(id_rating_event) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS jumlah
        FROM event w
        ORDER BY w.id_event DESC LIMIT 3");

        $this->load->view('home/header', $data);
        $this->load->view('home/home', $data);
        $this->load->view('home/footer');
    }

    public function wisata()
    {
        $data['title'] = 'Wisata';

        $data['wisata'] = $this->templates->query("SELECT w.id_wisata, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
        w.thumbnail, w.header, w.destinasi1, w.destinasi2, w.destinasi3, w.id_petugas,
        IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS rating,
        IFNULL((SELECT COUNT(id_rating_wisata) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS jumlah
        FROM wisata w
        ORDER BY w.id_wisata DESC");

        $this->load->view('home/header', $data);
        $this->load->view('home/wisata', $data);
        $this->load->view('home/footer');
    }

    public function event()
    {
        $data['title'] = 'Event';

        $data['event'] = $this->templates->query("SELECT w.id_event, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
        w.thumbnail, w.header, w.event1, w.event2, w.event3, w.id_petugas,
        IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS rating,
        IFNULL((SELECT COUNT(id_rating_event) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS jumlah
        FROM event w
        ORDER BY w.id_event DESC");

        $this->load->view('home/header', $data);
        $this->load->view('home/event', $data);
        $this->load->view('home/footer');
    }

    public function transaksi_wisata()
    {
        $data['title'] = 'Transaksi Wisata';

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/Home/login/', 'refresh');
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
                $this->load->view('home/beri_ulasan', $data);
                $this->load->view('home/footer');
            } else {
                redirect('/Petugas', 'refresh');
            }
        }
    }

    public function transaksi_event()
    {
        $data['title'] = 'Transaksi Event';

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/Home/login/', 'refresh');
        } else {
            if ($this->session->userdata('roles') == 1) {

                $id_wisatawan = $this->session->userdata('id_wisatawan');

                $data['transaksi'] = $this->templates->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
                tw.pdf_url, tw.status_code, tw.jumlah, tw.id_wisatawan, tw.nama, tw.alamat, tw.email, tw.no_hp,
                tw.id_event, w.nama nama_event, w.thumbnail thumbnail, w.harga harga
                FROM transaksi_event tw 
                JOIN event w 
                ON tw.id_event = w.id_event 
                WHERE tw.id_wisatawan = $id_wisatawan 
                ORDER BY transaction_time DESC")->result();
                $data['profile'] = $this->templates->view_where('wisatawan', ['id_wisatawan' => $id_wisatawan])->result_array();

                $this->load->view('home/header', $data);
                $this->load->view('home/transaksi_event', $data);
                $this->load->view('home/beri_ulasan_event', $data);
                $this->load->view('home/footer');
            } else {
                redirect('/Petugas', 'refresh');
            }
        }
    }

    public function rating_wisata()
    {
        $this->form_validation->set_rules('rating', 'Rating', 'required');

        if ($this->form_validation->run() == true) {

            $data['rating'] = $this->input->post('rating');
            $data['id_wisatawan'] = $this->input->post('id_wisatawan');
            $data['id_wisata'] = $this->input->post('id_wisata');
            $data['order_id'] = $this->input->post('order_id');
            $data['feedback'] = $this->input->post('feedback');

            $this->templates->insert('rating_wisata', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
            redirect('Home/transaksi_wisata');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Home/transaksi_wisata');
        }
    }

    public function rating_event()
    {
        $this->form_validation->set_rules('rating', 'Rating', 'required');

        if ($this->form_validation->run() == true) {

            $data['rating'] = $this->input->post('rating');
            $data['id_wisatawan'] = $this->input->post('id_wisatawan');
            $data['id_event'] = $this->input->post('id_event');
            $data['order_id'] = $this->input->post('order_id');
            $data['feedback'] = $this->input->post('feedback');

            $this->templates->insert('rating_event', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
            redirect('Home/transaksi_event');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Home/transaksi_event');
        }
    }

    public function edit_ulasan($order_id)
    {
        $data['title'] = 'Transaksi Wisata';

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

        $data['ulasan'] = $this->templates->query("SELECT * FROM rating_wisata WHERE order_id = $order_id;")->result();

        $this->load->view('home/header', $data);
        $this->load->view('home/edit_ulasan', $data);
        $this->load->view('home/footer');
    }

    public function edit_ulasan_event($order_id)
    {
        $data['title'] = 'Transaksi Event';

        $id_wisatawan = $this->session->userdata('id_wisatawan');

        $data['transaksi'] = $this->templates->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
                tw.pdf_url, tw.status_code, tw.jumlah, tw.id_wisatawan, tw.nama, tw.alamat, tw.email, tw.no_hp,
                tw.id_event, w.nama nama_event, w.thumbnail thumbnail, w.harga harga
                FROM transaksi_event tw 
                JOIN event w 
                ON tw.id_event = w.id_event 
                WHERE tw.id_wisatawan = $id_wisatawan 
                ORDER BY transaction_time DESC")->result();
        $data['profile'] = $this->templates->view_where('wisatawan', ['id_wisatawan' => $id_wisatawan])->result_array();

        $data['ulasan'] = $this->templates->query("SELECT * FROM rating_event WHERE order_id = $order_id;")->result();

        $this->load->view('home/header', $data);
        $this->load->view('home/edit_ulasan_event', $data);
        $this->load->view('home/footer');
    }

    public function update_ulasan()
    {
        $this->form_validation->set_rules('feedback', 'Feedback', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required');

        if ($this->form_validation->run() == true) {

            $id_rating_wisata = $this->input->post('id_rating_wisata');
            $data['rating'] = $this->input->post('rating');
            $data['feedback'] = $this->input->post('feedback');


            $this->templates->update('rating_wisata', ['id_rating_wisata' => $id_rating_wisata], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
            redirect('Home/transaksi_wisata');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Home/transaksi_wisata');
        }
    }

    public function update_ulasan_event()
    {
        $this->form_validation->set_rules('feedback', 'Feedback', 'required');
        $this->form_validation->set_rules('rating', 'Rating', 'required');

        if ($this->form_validation->run() == true) {

            $id_rating_event = $this->input->post('id_rating_event');
            $data['rating'] = $this->input->post('rating');
            $data['feedback'] = $this->input->post('feedback');


            $this->templates->update('rating_event', ['id_rating_event' => $id_rating_event], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
            redirect('Home/transaksi_event');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Home/transaksi_event');
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
                redirect('/Petugas', 'refresh');
            }
        }
    }

    private function _deleteImage($id_wisatawan)
    {
        $product = $this->templates->view_where('wisatawan', ['id_wisatawan' => $id_wisatawan])->row();
        if ($product->foto != "about-1-519x564.jpg") {
            $filename = explode(".", $product->foto)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/wisatawan/$filename.*"));
        }
    }

    public function update_profile()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');

        if ($this->form_validation->run() == true) {

            $id_wisatawan = $this->input->post('id_wisatawan');
            $data['nama'] = $this->input->post('nama');
            $data['username'] = $this->input->post('username');
            $data['alamat'] = $this->input->post('alamat');
            $data['email'] = $this->input->post('email');
            $data['no_hp'] = $this->input->post('no_hp');

            //cek imange
            $upload_image = $_FILES['foto']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/wisatawan/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {

                    $product = $this->templates->view_where('wisatawan', ['id_wisatawan' => $id_wisatawan])->row();
                    $filename = $product->foto[0];

                    if ($filename != 'about-1-519x564.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisatawan/' . $filename);
                        $this->_deleteImage($id_wisatawan);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

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
            redirect('Home/profile');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Home/profile');
        }
    }

    public function ubah_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == true) {

            $id_wisatawan = $this->input->post('id_wisatawan');
            $pass = $this->input->post('password');
            $data['password'] = get_hash($pass);

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
            redirect('Home/profile');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Home/profile');
        }
    }

    public function detail_wisata($id_wisata)
    {
        $data['title'] = 'Wisata';

        $data['wisata'] = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->result_array();
        $data['jumlah'] = $this->templates->query("SELECT count(id_rating_wisata) jumlah FROM rating_wisata WHERE id_wisata = $id_wisata")->result_array();
        $data['ratarata'] = $this->templates->query("SELECT id_wisata, FORMAT(AVG(rating),0) rating FROM rating_wisata WHERE id_wisata = $id_wisata")->result_array();
        $data['ulasan'] = $this->templates->query("SELECT rw.id_rating_wisata, rw.rating, rw.feedback, rw.id_wisatawan,
        w.nama nama, w.alamat alamat, w.foto foto,
        rw.id_wisata, rw.order_id, rw.tanggal
        FROM rating_wisata rw
        JOIN wisatawan w
        ON rw.id_wisatawan = w.id_wisatawan
        WHERE rw.id_wisata = $id_wisata")->result_array();
        $data['lainnya'] = $this->templates->query("SELECT w.id_wisata, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
        w.thumbnail, w.header, w.destinasi1, w.destinasi2, w.destinasi3, w.id_petugas,
        IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS rating,
        IFNULL((SELECT COUNT(id_rating_wisata) FROM rating_wisata WHERE id_wisata=w.id_wisata GROUP BY id_wisata), 0) AS jumlah
        FROM wisata w
        WHERE w.id_wisata <> $id_wisata ORDER BY rand() LIMIT 3");

        $this->load->view('home/header', $data);
        $this->load->view('home/detail_wisata', $data);
        $this->load->view('home/footer');
    }

    public function detail_event($id_event)
    {
        $data['title'] = 'Event';

        $data['event'] = $this->templates->view_where('event', ['id_event' => $id_event])->result_array();
        $data['jumlah'] = $this->templates->query("SELECT count(id_rating_event) jumlah FROM rating_event WHERE id_event = $id_event")->result_array();
        $data['ratarata'] = $this->templates->query("SELECT id_event, FORMAT(AVG(rating),0) rating FROM rating_event WHERE id_event = $id_event")->result_array();
        $data['ulasan'] = $this->templates->query("SELECT rw.id_rating_event, rw.rating, rw.feedback, rw.id_wisatawan,
        w.nama nama, w.alamat alamat, w.foto foto,
        rw.id_event, rw.order_id, rw.tanggal
        FROM rating_event rw
        JOIN wisatawan w
        ON rw.id_wisatawan = w.id_wisatawan
        WHERE rw.id_event = $id_event")->result_array();
        $data['lainnya'] = $this->templates->query("SELECT w.id_event, w.nama, w.lokasi, w.maps, w.harga, w.deskripsi,
        w.thumbnail, w.header, w.event1, w.event2, w.event3, w.id_petugas,
        IFNULL((SELECT FORMAT(AVG(rating),0) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS rating,
        IFNULL((SELECT COUNT(id_rating_event) FROM rating_event WHERE id_event=w.id_event GROUP BY id_event), 0) AS jumlah
        FROM event w
        WHERE w.id_event <> $id_event ORDER BY rand() LIMIT 3");

        $this->load->view('home/header', $data);
        $this->load->view('home/detail_event', $data);
        $this->load->view('home/footer');
    }

    public function invoice($order_id)
    {
        $data['title'] = 'Invoice';

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/Home/login/', 'refresh');
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
                redirect('/Petugas', 'refresh');
            }
        }
    }

    public function invoice_event($order_id)
    {
        $data['title'] = 'Invoice';

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/Home/login/', 'refresh');
        } else {

            if ($this->session->userdata('roles') == 1) {

                $data['wisata'] = $this->templates->query("
                SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
                tw.pdf_url, tw.status_code, tw.jumlah, tw.id_wisatawan, tw.nama, tw.alamat, tw.email, tw.no_hp,
                tw.id_event, w.nama nama_event
                FROM transaksi_event tw 
                JOIN event w 
                ON tw.id_event = w.id_event 
                WHERE order_id = $order_id 
                ORDER BY transaction_time DESC")->result_array();

                $this->load->view('home/invoice_event', $data);
            } else {
                redirect('/Petugas', 'refresh');
            }
        }
    }

    public function login()
    {

        if ($this->session->userdata('is_login') == TRUE) {
            redirect('/', 'refresh');
        }

        $data['title'] = 'Login';

        $this->load->view('home/header', $data);
        $this->load->view('wisatawan/login/index', $data);
        $this->load->view('home/footer');
    }

    public function register()
    {

        if ($this->session->userdata('is_login') == TRUE) {
            redirect('/', 'refresh');
        }

        $data['title'] = 'Register';

        $this->load->view('home/header', $data);
        $this->load->view('wisatawan/register/index', $data);
        $this->load->view('home/footer');
    }

    public function register_proses()
    {

        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[22]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|required|min_length[3]|max_length[45]|is_unique[petugas.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == TRUE) {

            if ($this->m_wisatawan->m_register()) {

                $this->session->set_flashdata('pesan', 'Register berhasil, silahkan  Sign In.');
                redirect('/Home/login/', 'refresh');
            } else {

                $this->session->set_flashdata('pesan', 'Register user gagal!');
                redirect('/Home/register/', 'refresh');
            }
        } else {

            redirect('/Home/register/', 'refresh');
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
                        redirect('Home/login/index', 'refresh');
                    }
                } else {

                    $this->session->set_flashdata('pesan', 'Login gagal: password salah!');
                    redirect('Home/login/index', 'refresh');
                }
            } else { // jika email tidak terdaftar!

                $this->session->set_flashdata('pesan', 'Login gagal: email salah!');
                redirect('Home/login/index', 'refresh');
            }
        } else {

            redirect('Home/login/index', 'refresh');
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
        redirect('Home/login/index', 'refresh');
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

        $id_event = $this->input->post('id_event');
        $nama_event = $this->input->post('nama_event');

        $gross_convert = (int)$gross_amount;
        $jumlah_convert = (int)$jumlah;
        $total = ($gross_convert * $jumlah_convert);

        // Required
        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => $total, // no decimal allowed for creditcard
        );

        // Optional
        if (!empty($nama_wisata)) {
            $item1_details = array(
                'id' => 'a1',
                'price' => $gross_amount,
                'quantity' => $jumlah,
                'name' => "Pembayaran " . $nama_wisata
            );
        } else {
            $item1_details = array(
                'id' => 'a1',
                'price' => $gross_amount,
                'quantity' => $jumlah,
                'name' => "Pembayaran " . $nama_event
            );
        }


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

        $id_event = $this->input->post('id_event');

        if (!empty($id_wisata)) {
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
                redirect('Home/transaksi_wisata', 'refresh');
            } else {
                $this->session->set_flashdata('transaksi_wisata', 'Transaksi gagal!');
                redirect('Home/transaksi_wisata', 'refresh');
            }
        } else {
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
                'id_event' => $id_event,
            ];

            $simpan = $this->db->insert('transaksi_event', $data);
            if ($simpan) {
                $this->session->set_flashdata('transaksi_event', 'Transaksi berhasil!');
                redirect('Home/transaksi_event', 'refresh');
            } else {
                $this->session->set_flashdata('transaksi_event', 'Transaksi gagal!');
                redirect('Home/transaksi_event', 'refresh');
            }
        }
    }
}
