<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiWisata extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if ($this->session->userdata('is_petugas') == FALSE) {
            redirect('/petugas/login/', 'refresh');
        }

        $data['title'] = 'Transaksi Wisata';

        $data['transaksi'] = $this->templates->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
        tw.pdf_url, tw.status_code, tw.jumlah, tw.id_wisatawan, tw.nama, tw.alamat, tw.email, tw.no_hp,
        tw.id_wisata, w.nama nama_wisata, w.thumbnail thumbnail, w.harga harga
        FROM transaksi_wisata tw 
        JOIN wisata w 
        ON tw.id_wisata = w.id_wisata
        ORDER BY transaction_time DESC")->result_array();

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/transaksiwisata/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/transaksiwisata/script');
    }

}
