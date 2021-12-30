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

        if ($this->session->userdata('is_petugas') == FALSE) {
            redirect('/Petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Wisata';

        $data['wisata'] = $this->templates->query("SELECT * FROM wisata ORDER BY id_wisata DESC")->result_array();

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/datawisata/index', $data);
        $this->load->view('petugas/layout/footer');
        $this->load->view('petugas/datawisata/script');
    }

    public function create()
    {

        if ($this->session->userdata('is_petugas') == FALSE) {
            redirect('/Petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Wisata';

        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/datawisata/create', $data);
        $this->load->view('petugas/layout/footer');
    }

    private function _deleteImage($id_wisata)
    {
        $product = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->row();
        if ($product->thumbnail != "cta-1-368x420.jpg") {
            $filename = explode(".", $product->thumbnail)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/wisata/$filename.*"));
        }
    }

    private function _deleteImageHeader($id_wisata)
    {
        $product = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->row();
        if ($product->header != "breadcrumbs-bg.jpg") {
            $filename = explode(".", $product->header)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/wisata/header/$filename.*"));
        }
    }

    private function _deleteImageDestinasi1($id_wisata)
    {
        $product = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->row();
        if ($product->destinasi1 != "cta-1-368x420.jpg") {
            $filename = explode(".", $product->destinasi1)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/wisata/destinasi1/$filename.*"));
        }
    }

    private function _deleteImageDestinasi2($id_wisata)
    {
        $product = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->row();
        if ($product->destinasi2 != "cta-1-368x420.jpg") {
            $filename = explode(".", $product->destinasi2)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/wisata/destinasi2/$filename.*"));
        }
    }

    private function _deleteImageDestinasi3($id_wisata)
    {
        $product = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->row();
        if ($product->destinasi3 != "cta-1-368x420.jpg") {
            $filename = explode(".", $product->destinasi3)[0];
            return array_map('unlink', glob(FCPATH . "public/upload/image/wisata/destinasi3/$filename.*"));
        }
    }

    public function save()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == true) {
            $data['nama'] = $this->input->post('nama');
            $data['lokasi'] = $this->input->post('lokasi');
            $data['maps'] = $this->input->post('maps');
            $data['deskripsi'] = $this->input->post('deskripsi');
            $data['harga'] = $this->input->post('harga');
            $data['id_petugas'] = $this->session->userdata('id_petugas');

            //cek imange
            $upload_image = $_FILES['thumbnail']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/wisata/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('thumbnail')) {

                    /* $old_image = $data['wisata']['thumbnail'];

                    if ($old_image != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisata/' . $old_image);
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
                $config['upload_path'] = 'public/upload/image/wisata/header/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('header')) {

                    /* $old_image = $data['wisata']['header'];

                    if ($old_image != 'breadcrumbs-bg.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisata/header/' . $old_image);
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
            $upload_image = $_FILES['destinasi1']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/wisata/destinasi1/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('destinasi1')) {

                    /* $old_image = $data['wisata']['destinasi1'];

                    if ($old_image != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisata/destinasi1/' . $old_image);
                    } */
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('destinasi1', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $this->db->set('destinasi1', 'cta-1-368x420.jpg');
            }

            //cek imange
            $upload_image = $_FILES['destinasi2']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/wisata/destinasi2/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('destinasi2')) {

                    /* $old_image = $data['wisata']['destinasi2'];

                    if ($old_image != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisata/destinasi2/' . $old_image);
                    } */
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('destinasi2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $this->db->set('destinasi2', 'cta-1-368x420.jpg');
            }

            //cek imange
            $upload_image = $_FILES['destinasi3']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/wisata/destinasi3/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('destinasi3')) {

                    /* $old_image = $data['wisata']['destinasi3'];

                    if ($old_image != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisata/destinasi3/' . $old_image);
                    } */
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('destinasi3', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $this->db->set('destinasi3', 'cta-1-368x420.jpg');
            }

            $this->templates->insert('wisata', $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
            redirect('datawisata');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('datawisata');
        }
    }

    public function edit($id)
    {

        if ($this->session->userdata('is_petugas') == FALSE) {
            redirect('/petugas/login/', 'refresh');
        }

        $data['title'] = 'Data Wisata';

        $data['isi'] = $this->templates->view_where('wisata', ['id_wisata' => $id])->result_array();


        $this->load->view('petugas/layout/header', $data);
        $this->load->view('petugas/layout/sidebar');
        $this->load->view('petugas/datawisata/edit', $data);
        $this->load->view('petugas/layout/footer');
    }

    public function update()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
        $this->form_validation->set_rules('harga', 'Harga', 'required');

        if ($this->form_validation->run() == true) {

            $id_wisata = $this->input->post('id_wisata');
            $data['nama'] = $this->input->post('nama');
            $data['lokasi'] = $this->input->post('lokasi');
            $data['maps'] = $this->input->post('maps');
            $data['deskripsi'] = $this->input->post('deskripsi');
            $data['harga'] = $this->input->post('harga');

            //cek imange
            $upload_image = $_FILES['thumbnail']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/wisata/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('thumbnail')) {

                    $product = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->row();
                    $filename = $product->thumbnail[0];

                    if ($filename != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisata/' . $filename);
                        $this->_deleteImage($id_wisata);
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
                $config['upload_path'] = 'public/upload/image/wisata/header/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('header')) {

                    $product = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->row();
                    $filename = $product->header[0];

                    if ($filename != 'breadcrumbs-bg.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisata/header/' . $filename);
                        $this->_deleteImageHeader($id_wisata);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('header', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            //cek imange
            $upload_image = $_FILES['destinasi1']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/wisata/destinasi1/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('destinasi1')) {

                    $product = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->row();
                    $filename = $product->destinasi1[0];

                    if ($filename != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisata/destinasi1/' . $filename);
                        $this->_deleteImageDestinasi1($id_wisata);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('destinasi1', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            //cek imange
            $upload_image = $_FILES['destinasi2']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/wisata/destinasi2/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('destinasi2')) {

                    $product = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->row();
                    $filename = $product->destinasi2[0];

                    if ($filename != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisata/destinasi2/' . $filename);
                        $this->_deleteImageDestinasi2($id_wisata);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('destinasi2', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            //cek imange
            $upload_image = $_FILES['destinasi3']['name'];

            if ($upload_image) {

                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['upload_path'] = 'public/upload/image/wisata/destinasi3/';

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('destinasi3')) {

                    $product = $this->templates->view_where('wisata', ['id_wisata' => $id_wisata])->row();
                    $filename = $product->destinasi3[0];

                    if ($filename != 'cta-1-368x420.jpg') {
                        unlink(FCPATH . 'public/upload/image/wisata/destinasi3/' . $filename);
                        $this->_deleteImageDestinasi3($id_wisata);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('destinasi3', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->templates->update('wisata', ['id_wisata' => $id_wisata], $data);
            $this->session->set_flashdata('message', '
            <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
            redirect('DataWisata');
        } else {
            $this->session->set_flashdata('error', validation_errors());
            redirect('DataWisata');
        }
    }

    public function delete($id_wisata)
    {
        $this->_deleteImage($id_wisata);
        $this->_deleteImageHeader($id_wisata);
        $this->_deleteImageDestinasi1($id_wisata);
        $this->_deleteImageDestinasi2($id_wisata);
        $this->_deleteImageDestinasi3($id_wisata);
        $this->templates->delete('wisata', ['id_wisata' => $id_wisata]);
        $this->session->set_flashdata('message', '
        <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                <strong>Yes!</strong> Updated.
            </div>
        </div>');
        redirect('DataWisata');
    }

}
