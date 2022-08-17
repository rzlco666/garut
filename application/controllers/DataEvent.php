<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataEvent extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_event');
    }

    public function index()
    {

        if ($this->session->userdata('is_petugas') == FALSE) {
            redirect('/Petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Event';

        $data['event'] = $this->templates->query("SELECT * FROM event ORDER BY id_event DESC")->result_array();

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/dataevent/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/dataevent/script');
    }

    public function create()
    {

        if ($this->session->userdata('is_petugas') == FALSE) {
            redirect('/Petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Event';

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/dataevent/create', $data);
        $this->load->view('petugas/layout/footer');
    }

    private function _deleteImage($id_event)
    {
        $product = $this->templates->view_where('event', ['id_event' => $id_event])->row();
        if ($product->thumbnail != "cta-1-368x420.jpg") {
            $filename = explode(".", $product->thumbnail)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/event/$filename.*"));
        }
    }

    private function _deleteImageHeader($id_event)
    {
        $product = $this->templates->view_where('event', ['id_event' => $id_event])->row();
        if ($product->header != "breadcrumbs-bg.jpg") {
            $filename = explode(".", $product->header)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/event/header/$filename.*"));
        }
    }

    private function _deleteImageEvent1($id_event)
    {
        $product = $this->templates->view_where('event', ['id_event' => $id_event])->row();
        if ($product->event1 != "cta-1-368x420.jpg") {
            $filename = explode(".", $product->event1)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/event/event1/$filename.*"));
        }
    }

    private function _deleteImageEvent2($id_event)
    {
        $product = $this->templates->view_where('event', ['id_event' => $id_event])->row();
        if ($product->event2 != "cta-1-368x420.jpg") {
            $filename = explode(".", $product->event2)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/event/event2/$filename.*"));
        }
    }

    private function _deleteImageEvent3($id_event)
    {
        $product = $this->templates->view_where('event', ['id_event' => $id_event])->row();
        if ($product->event3 != "cta-1-368x420.jpg") {
            $filename = explode(".", $product->event3)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/event/event3/$filename.*"));
        }
    }

    public function save()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');

        if ($this->form_validation->run() == true) {
            $data['nama'] = $this->input->post('nama');
            $data['lokasi'] = $this->input->post('lokasi');
            $data['maps'] = $this->input->post('maps');
            $data['deskripsi'] = $this->input->post('deskripsi');
            $data['harga'] = $this->input->post('harga');
            $data['durasi'] = $this->input->post('durasi');
            $data['tanggal'] = $this->input->post('tanggal');
            $data['slot'] = $this->input->post('slot');
            $data['id_petugas'] = $this->session->userdata('id_petugas');

            //cek imange
            $upload_image = $_FILES['thumbnail']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/event/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('thumbnail')) {

                   /*  $old_image = $data['event']['thumbnail'];

                    if ($old_image != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/event/' . $old_image);
                    } */
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('thumbnail', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $this->db->set('thumbnail', 'cta-1-368x420.jpg');
            }

            //cek imange header
            $upload_imageheader = $_FILES['header']['name'];

            if ($upload_imageheader) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/event/header/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('header')) {

                    /* $old_image = $data['event']['header'];

                    if ($old_image != 'breadcrumbs-bg.jpg') {
                        unlink(FCPATH . 'public/upload/image/event/header/' . $old_image);
                    } */
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('header', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $this->db->set('header', 'breadcrumbs-bg.jpg');
            }

            //cek imange
            $upload_image = $_FILES['event1']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/event/event1/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('event1')) {

                    /* $old_image = $data['event']['event1'];

                    if ($old_image != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/event/event1/' . $old_image);
                    } */
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('event1', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $this->db->set('event1', 'cta-1-368x420.jpg');
            }

            //cek imange
            $upload_image = $_FILES['event2']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/event/event2/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('event2')) {

                    /* $old_image = $data['event']['event2'];

                    if ($old_image != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/event/event2/' . $old_image);
                    } */
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('event2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $this->db->set('event2', 'cta-1-368x420.jpg');
            }

            //cek imange
            $upload_image = $_FILES['event3']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/event/event3/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('event3')) {

                    /* $old_image = $data['event']['event3'];

                    if ($old_image != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/event/event3/' . $old_image);
                    } */
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('event3', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $this->db->set('event3', 'cta-1-368x420.jpg');
            }

            $this->templates->insert('event', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
            redirect('DataEvent');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('DataEvent');
        }
    }

    public function edit($id)
    {

        if ($this->session->userdata('is_petugas') == FALSE) {
            redirect('/petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Event';

        $data['isi'] = $this->templates->view_where('event', ['id_event' => $id])->result_array();


        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/dataevent/edit', $data);
        $this->load->view('petugas/layout/footer');
		$this->load->view('petugas/dataevent/custom_script', $data);
    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == true) {

            $id_event = $this->input->post('id_event');

            $data['nama'] = $this->input->post('nama');
            $data['lokasi'] = $this->input->post('lokasi');
            $data['maps'] = $this->input->post('maps');
            $data['deskripsi'] = $this->input->post('deskripsi');
            $data['harga'] = $this->input->post('harga');
            $data['durasi'] = $this->input->post('durasi');
            $data['tanggal'] = $this->input->post('tanggal');
            $data['slot'] = $this->input->post('slot');

            //cek imange
            $upload_image = $_FILES['thumbnail']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/event/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('thumbnail')) {

                    $product = $this->templates->view_where('event', ['id_event' => $id_event])->row();
                    $filename = $product->thumbnail[0];

                    if ($filename != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/event/' . $filename);
                        $this->_deleteImage($id_event);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('thumbnail', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            //cek imange header
            $upload_imageheader = $_FILES['header']['name'];

            if ($upload_imageheader) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/event/header/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('header')) {

                    $product = $this->templates->view_where('event', ['id_event' => $id_event])->row();
                    $filename = $product->header[0];

                    if ($filename != 'breadcrumbs-bg.jpg') {
                        unlink(FCPATH . 'public/upload/image/event/header/' . $filename);
                        $this->_deleteImageHeader($id_event);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('header', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            //cek imange
            $upload_image = $_FILES['event1']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/event/event1/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('event1')) {

                    $product = $this->templates->view_where('event', ['id_event' => $id_event])->row();
                    $filename = $product->event1[0];

                    if ($filename != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/event/event1/' . $filename);
                        $this->_deleteImageEvent1($id_event);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('event1', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            //cek imange
            $upload_image = $_FILES['event2']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/event/event2/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('event2')) {

                    $product = $this->templates->view_where('event', ['id_event' => $id_event])->row();
                    $filename = $product->event2[0];

                    if ($filename != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/event/event2/' . $filename);
                        $this->_deleteImageEvent2($id_event);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('event2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            //cek imange
            $upload_image = $_FILES['event3']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/event/event3/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('event3')) {

                    $product = $this->templates->view_where('event', ['id_event' => $id_event])->row();
                    $filename = $product->event3[0];

                    if ($filename != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/event/event3/' . $filename);
                        $this->_deleteImageEvent3($id_event);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('event3', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->templates->update('event', ['id_event' => $id_event], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
            redirect('DataEvent');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('DataEvent');
        }
    }

    public function delete($id_event)
    {
        $this->_deleteImage($id_event);
        $this->_deleteImageHeader($id_event);
        $this->_deleteImageEvent1($id_event);
        $this->_deleteImageEvent2($id_event);
        $this->_deleteImageEvent3($id_event);
        $this->templates->delete('event', ['id_event' => $id_event]);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
        redirect('DataEvent');
    }
}
