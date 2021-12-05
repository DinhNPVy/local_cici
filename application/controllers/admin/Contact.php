<?php

class Contact extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        //load ra file model
        $this->load->model('contact_model');
        // $this->lang->load('admin/contact');
    }

    // su dung layout master
    function index()
    {
        //load thu vien phan trang
        $this->load->library('pagination');

        // lay tong so luong tat ca san pham trong website
        $total_rows = $this->contact_model->get_total();
        $config = array();
        $config['total_rows'] = $total_rows; // tong tat ca san pham tren website
        $config['base_url'] = admin_url('contact/index'); // link hiển thị ra danh sách sản phẩm
        $config['per_page'] = 11; // số lượng hiển thị trên 1 trang
        $config['uri_segment'] = 4; // lấy ra phân đoạn hiện trên link url
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);

        // lay dữ liệu phân trang
        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        // lay toan bo lien he
        $list = array();
        $list = $this->contact_model->get_list($input);
        $this->data['list'] = $list;
        $this->data['total_rows'] = $total_rows;


        //lay noi dung cua bien message
        $message = $this->session->flashdata('message');
        if ($message) {

            $this->data['message'] = $message;
        }
        //load view
        $this->data['temp'] = 'admin/contact/index';
        $this->load->view('admin/main', $this->data);
    }

    // ham xoa
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $this->_del($id);

        $this->session->set_flashdata('message', 'Delete success');
        redirect(admin_url('contact'));
    }
    // xoa san pham
    private function _del($id)
    {
        $id = intval($id);

        $contact = $this->contact_model->get_info($id);

        if (!$contact) {
            $this->session->set_flashdata('message', 'Contact does not exist');
            redirect(admin_url('contact'));
        }
    }
}
