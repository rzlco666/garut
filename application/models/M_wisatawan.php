<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_wisatawan extends CI_Model
{
    private $table = 'wisatawan';

    public function m_register()
    {

        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_hp' => $this->input->post('no_hp'),
            'status' => 1,
            'password' => get_hash($this->input->post('password'))
        );

        return $this->db->insert('wisatawan', $data);
    }

    public function m_cek_mail()
    {

        return $this->db->get_where('wisatawan', array('email' => $this->input->post('email')));
    }

}