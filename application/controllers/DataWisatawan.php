<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataWisatawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_wisatawan');
    }

    public function index()
    {

        if ($this->session->userdata('is_petugas') == FALSE) {
            redirect('/Petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Wisatawan';

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/datawisatawan/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/datawisatawan/script');
    }

    public function aktivasi()
    {

        $ID = $this->input->post('id_wisatawan', true);
        $this->m_wisatawan->aktivasi($ID);
        redirect('DataWisatawan/');
    }

    public function blokir()
    {

        $ID2 = $this->input->post('id_wisatawan', true);
        $this->m_wisatawan->blokir($ID2);
        redirect('DataWisatawan/');
    }

    public function get_wisatawan()
    {
        if (!$this->input->is_ajax_request()) {
            show_404(); // Jika tidak akses melalui ajax request
        } else {
            $column_order   = ['', 'id_wisatawan']; // Order berdasarkan columns pada table siswa
            $column_search  = ['nama', 'username', 'email', 'alamat', 'no_hp']; // Pencarian berdasarkan columns nama siswa
            $order          = ['id_wisatawan' => 'ASC']; // Sorting berdasarkan nama siswa menggunakan ASC
            $list           = $this->m_wisatawan->get_datatables('wisatawan', $column_order, $column_search, $order); // Memanggil siswa model untuk menampilkannya ke datatables
            $data           = [];
            $no             = $_POST['start'];
            foreach ($list as $key => $lists) {
                $no++;
                $data[$key][]  = $no;
                $data[$key][]  = $lists->nama;
                $data[$key][]  = $lists->username;
                $data[$key][]  = $lists->email;
                $data[$key][]  = $lists->alamat;
                $data[$key][]  = $lists->no_hp;
                if ($lists->status == 0) {
                    $data[$key][]  = 'Nonaktif';
                    $data[$key][]  = '<form action="' . base_URL("DataWisatawan/aktivasi/") . '" method="POST">
                <input type="hidden" name="id_wisatawan" value="' . $lists->id_wisatawan . '">
                <button type="submit" name="edit_btn" class="btn btn-success btn-sm">Aktif</button>
            </form>';
                } else {
                    $data[$key][]  = 'Aktif';
                    $data[$key][]  = '<form action="' . base_URL("DataWisatawan/blokir") . '" method="POST">
                    <input type="hidden" name="id_wisatawan" value="' . $lists->id_wisatawan . '">
                </form>';
                    /*$data[$key][]  = '<form action="' . base_URL("DataWisatawan/blokir") . '" method="POST">
                    <input type="hidden" name="id_wisatawan" value="' . $lists->id_wisatawan . '">
                    <button type="submit" name="edit_btn" class="btn btn-danger btn-sm">BLOCK</button>
                </form>';*/
                }
                /* $data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm" onclick="edit(' . $lists->id_wisatawan . ')">Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onclick="hapus(' . $lists->id_wisatawan . ')">Hapus</a>'; */
            }

            // Output menggunakan JSON
            $output = [
                "draw"              => $_POST['draw'],
                "recordsTotal"      => $this->m_wisatawan->count_all('wisatawan'),
                "recordsFiltered"   => $this->m_wisatawan->count_filtered('wisatawan', $column_order, $column_search, $order),
                "data"              => $data,
            ];

            echo json_encode($output);
        }
    }

    public function save_wisatawan()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $simpan = $this->m_wisatawan->save_wisatawan();
            if ($simpan) {
                $this->outputs['status']    = true;
                $this->outputs['message']   = "Data berhasil disimpan !";
            }

            echo json_encode($this->outputs);
        }
    }

    public function edit_wisatawan()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $wisatawan = $this->m_wisatawan->get_wisatawan_by_id();
            if ($wisatawan->num_rows() > 0) {
                $this->outputs['data'] = $wisatawan->row();
                $this->outputs['status']  = true;
            }

            echo json_encode($this->outputs);
        }
    }

    public function update_wisatawan()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $update = $this->m_wisatawan->update_wisatawan();
            if ($update) {
                $this->outputs['status']  = true;
                $this->outputs['message'] = "Data berhasil diupdate !";
            }

            echo json_encode($this->outputs);
        }
    }

    public function delete_wisatawan()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $delete = $this->m_wisatawan->delete_wisatawan();
            if ($delete) {
                $this->outputs['status']  = true;
                $this->outputs['message'] = "Data berhasil dihapus !";
            }

            echo json_encode($this->outputs);
        }
    }
}
