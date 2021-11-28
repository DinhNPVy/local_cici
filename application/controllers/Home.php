<?php
class Home extends MY_Controller
{
    function index()
    {
        $this->load->model('slide_model');
        $slide_list = $this->slide_model->get_list();

        $this->data['slide_list'] = $slide_list;


        // lay danh sach bai viet moi
        $this->load->model('news_model');
        $input = array();
        $input['limit'] = array(6, 0);
        $news_list = $this->news_model->get_list($input);
        $this->data['news_list'] = $news_list;

        // lay danh sach san pham mơi
        $this->load->model('product_model');
        $input = array();
        $input['limit'] = array(5, 0);
        $product_newsest = $this->product_model->get_list($input);
        $this->data['product_newsest'] = $product_newsest;

        $this->load->model('product_model');
        $input = array();
        $input['limit'] = array(12, 0);
        $product_all = $this->product_model->get_list($input);
        $this->data['product_all'] = $product_all;

        $input['order'] = array('buyed', 'DESC');
        $product_buy = $this->product_model->get_list($input);
        $this->data['product_buy'] = $product_buy;

        //lay noi dung cua bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;


        $this->data['temp'] = 'site/home/index';
        $this->load->view('site/layout', $this->data);
    }
}
