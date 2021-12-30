<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransaksiEvent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if ($this->session->userdata('is_petugas') == FALSE) {
            redirect('/Petugas/login/', 'refresh');
        }

        $data['title'] = 'Transaksi Event';

        $data['transaksi'] = $this->templates->query("SELECT tw.order_id, tw.gross_amount, tw.payment_type, tw.transaction_time, tw.bank, tw.va_number,
        tw.pdf_url, tw.status_code, tw.jumlah, tw.id_wisatawan, tw.nama, tw.alamat, tw.email, tw.no_hp,
        tw.id_event, w.nama nama_event, w.thumbnail thumbnail, w.harga harga
        FROM transaksi_event tw 
        JOIN event w 
        ON tw.id_event = w.id_event
        ORDER BY transaction_time DESC")->result_array();

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/transaksievent/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/transaksievent/script');
    }

}
