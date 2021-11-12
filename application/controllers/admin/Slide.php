<?php

class Slide extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        //load ra file model
        $this->load->model('slide_model');
    }

    // su dung layout master
    function index()
    {
        // lay tong so luong tat ca san pham trong website
        $total_rows = $this->slide_model->get_total();
        $this->data['total_rows'] = $total_rows;


        $input = array();

        // lay ra danh sách bai viet
        $list = $this->slide_model->get_list($input);
        $this->data['list'] = $list;


        //lay noi dung cua bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/slide/index';
        $this->load->view('admin/main', $this->data);
    }

    // them bai viet moi
    function add()
    {

        // load thu vien validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        // neu ma co du lieu post lên thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');



            // nhap lieu chinh xac
            if ($this->form_validation->run()) {


                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/slide';
                $upload_data = $this->upload_library->upload($upload_path, 'image');

                $image_link = '';


                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }

                // luu du lieu can them
                $data = array(
                    'name'      => $this->input->post('name'),
                    'image_link' => $image_link,
                    'link'       => $this->input->post('link'),
                    'info'       => $this->input->post('info'),
                    'sort_order' => $this->input->post('sort_order'),


                );


                // them moi vao csdl
                if ($this->slide_model->create($data)) {
                    $this->session->set_flashdata('message', 'Add slide success');
                } else {
                    $this->session->set_flashdata('message', 'Not add slide success');
                }
                // chuyen sang trang danh sach quan tri vien
                redirect(admin_url('slide'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/slide/add';
        $this->load->view('admin/main', $this->data);
    }
    // chinh sua bài viet
    function edit()
    {

        $id = $this->uri->rsegment('3');
        $slide = $this->slide_model->get_info($id);
        if (!$slide) {

            $this->session->set_flashdata('message', 'Not post exists');
            redirect(admin_url('slide'));
        }
        $this->data['slide'] = $slide;




        // load thu vien validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        // neu ma co du lieu post lên thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');


            // nhap lieu chinh xac
            if ($this->form_validation->run()) {


                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/slide';
                $upload_data = $this->upload_library->upload($upload_path, 'image');

                $image_link = '';


                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }


                // luu du lieu can them
                $data = array(
                    'name'      => $this->input->post('name'),
                    'link'       => $this->input->post('link'),
                    'info'       => $this->input->post('info'),
                    'sort_order' => $this->input->post('sort_order'),


                );
                if ($image_link != '') {
                    $data['image_link'] = $image_link;
                }

                // them moi vao csdl
                if ($this->slide_model->update($slide->id, $data)) {
                    $this->session->set_flashdata('message', 'Update slide success');
                } else {
                    $this->session->set_flashdata('message', 'Not update slide success');
                }
                // chuyen sang trang danh sach quan tri vien
                redirect(admin_url('slide'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/slide/edit';
        $this->load->view('admin/main', $this->data);
    }

    // ham xoa
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $this->_del($id);

        $this->session->set_flashdata('message', 'Delete success');
        redirect(admin_url('slide'));
    }
    // xoa nhieu san pham
    function delete_all()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id) {
            $this->_del($id);
        }
    }
    // xoa san pham
    private function _del($id)
    {
        $id = intval($id);

        $slide = $this->slide_model->get_info($id);

        if (!$slide) {
            $this->session->set_flashdata('message', 'slide does not exist');
            redirect(admin_url('slide'));
        }
        // thuc hien xoa 

        $this->slide_model->delete($id);
        // xoa cac anh cua san pham
        $image_link = './upload/slide/' . $slide->image_link;
        if (file_exists($image_link)) {
            unlink($image_link);
        }
        // xoa cac anh kem theo cua san pham
        $image_list = json_decode($slide->image_list);
        if (is_array($image_list)) {
            foreach ($image_list as  $img) {
                $image_list = './upload/slide/' . $img;
                if (file_exists($image_list)) {
                    unlink($image_list);
                }
            }
        }
    }
}
