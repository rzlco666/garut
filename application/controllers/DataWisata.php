<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataWisata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_wisata');
    }

    public function index()
    {

        if ($this->session->userdata('is_login') == FALSE) {
            redirect('/petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Wisata';

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/datawisata/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/datawisata/script');
    }

    public function get_wisata()
    {
        if (!$this->input->is_ajax_request()) {
            show_404(); // Jika tidak akses melalui ajax request
        } else {
            $column_order   = ['', 'id_wisata']; // Order berdasarkan columns pada table siswa
            $column_search  = ['nama', 'lokasi', 'deskripsi']; // Pencarian berdasarkan columns nama siswa
            $order          = ['id_wisata' => 'ASC']; // Sorting berdasarkan nama siswa menggunakan ASC
            $list           = $this->m_wisata->get_datatables('wisata', $column_order, $column_search, $order); // Memanggil siswa model untuk menampilkannya ke datatables
            $data           = [];
            $no             = $_POST['start'];
            foreach ($list as $key => $lists) {
                $no++;
                $data[$key][]  = $no;
                $data[$key][]  = $lists->nama;
                $data[$key][]  = $lists->lokasi;
                $data[$key][]  = $lists->deskripsi;
                $data[$key][]  = '<a href="javascript:;" class="btn btn-warning btn-sm" onclick="edit(' . $lists->id_wisata . ')">Edit</a> <a href="javascript:;" class="btn btn-danger btn-sm" onclick="hapus(' . $lists->id_wisata . ')">Hapus</a>';
            }

            // Output menggunakan JSON
            $output = [
                "draw"              => $_POST['draw'],
                "recordsTotal"      => $this->m_wisata->count_all('wisata'),
                "recordsFiltered"   => $this->m_wisata->count_filtered('wisata', $column_order, $column_search, $order),
                "data"              => $data,
            ];

            echo json_encode($output);
        }
    }

    public function save_wisata()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $simpan = $this->m_wisata->save_wisata();
            if ($simpan) {
                $this->outputs['status']    = true;
                $this->outputs['message']   = "Data berhasil disimpan !";
            }

            echo json_encode($this->outputs);
        }
    }

    public function edit_wisata()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $wisata = $this->m_wisata->get_wisata_by_id();
            if ($wisata->num_rows() > 0) {
                $this->outputs['data'] = $wisata->row();
                $this->outputs['status']  = true;
            }

            echo json_encode($this->outputs);
        }
    }

    public function update_wisata()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $update = $this->m_wisata->update_wisata();
            if ($update) {
                $this->outputs['status']  = true;
                $this->outputs['message'] = "Data berhasil diupdate !";
            }

            echo json_encode($this->outputs);
        }
    }

    public function delete_wisata()
    {
        if (!$this->input->is_ajax_request()) {
            show_404();
        } else {
            $delete = $this->m_wisata->delete_wisata();
            if ($delete) {
                $this->outputs['status']  = true;
                $this->outputs['message'] = "Data berhasil dihapus !";
            }

            echo json_encode($this->outputs);
        }
    }
}