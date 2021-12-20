<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_wisata extends CI_Model
{
    private $table = 'wisata';

    public function save_wisata()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'lokasi' => $this->input->post('lokasi'),
            'maps' => $this->input->post('maps'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
            'id_petugas' => $this->session->userdata('id_petugas'),
        ];

        $this->db->insert($this->table, $data);
        return $this->db->affected_rows();
    }

    public function update_wisata()
    {
        $data = [
            'nama' => $this->input->post('nama'),
            'lokasi' => $this->input->post('lokasi'),
            'maps' => $this->input->post('maps'),
            'deskripsi' => $this->input->post('deskripsi'),
            'harga' => $this->input->post('harga'),
            'id_petugas' => $this->session->userdata('id_petugas'),
        ];

        return $this->db->update($this->table, $data, [
            'id_wisata' => $this->input->post('id_wisata')
        ]);
    }

    public function delete_wisata()
    {
        return $this->db->delete($this->table, [
            'id_wisata' => $this->input->post('id_wisata')
        ]);
    }

    public function get_wisata_by_id()
    {
        $data = [
            'id_wisata' => $this->input->get('id_wisata')
        ];

        return $this->db->get_where($this->table, $data);
    }

    private function _get_datatables_query($table, $column_order, $column_search, $order)
    {
        $this->db->from($table);

        $i = 0;

        foreach ($column_search as $item) {
            if ($_POST['search']['value']) {

                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {


            $this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($order)) {
            $order = $order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables($table, $column_order, $column_search, $order, $data = null)
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $order);
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        if (!empty($data)) {
            $this->db->where($data);
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered($table, $column_order, $column_search, $order, $data = null)
    {
        $this->_get_datatables_query($table, $column_order, $column_search, $order);
        if (!empty($data)) {
            $this->db->where($data);
        }
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($table, $data = null)
    {
        if (!empty($data)) {
            $this->db->where($data);
        }

        $this->db->from($table);
        return $this->db->count_all_results();
    }
}