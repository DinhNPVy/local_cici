<?php

class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        //load ra file model
        $this->load->model('product_model');
    }

    // su dung layout master
    function index()
    {
        // lay tong so luong tat ca san pham trong website
        $total_rows = $this->product_model->get_total();
        $this->data['total_rows'] = $total_rows;
        //load thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = ''; // tong tat ca san pham tren website
        $config['base_url'] = admin_url('product/index'); // link hiển thị ra danh sách sản phẩm
        $config['per_page'] = 3; // số lượng hiển thị trên 1 trang
        $config['uri_segment'] = 4; // lấy ra phân đoạn hiện trên link url
        $config['next_link'] = 'Next page';
        $config['pre_link'] = 'Previous page';

        $this->pagination->initialize($config);

        // lay dữ liệu phân trang
        $segment = $this->uri->segment(4);
        $segment = intval($segment);
        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        // lay ra đanh sách sản phẩm
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;

        //lay noi dung cua bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;


        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
    }
}
