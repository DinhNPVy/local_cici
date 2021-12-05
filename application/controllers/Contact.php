<?php
class Contact extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->load->model('contact_model');
    }

    /*
     * Kiểm tra email đã tồn tại chưa
     */
    function check_email()
    {
        $email = $this->input->post('email');
        $where = array('email' => $email);
        //kiêm tra xem email đã tồn tại chưa
        if ($this->user_model->check_exists($where)) {
            //trả về thông báo lỗi
            $this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại');
            return false;
        }
        return true;
    }

    /*
     * Đăng ký thành viên
     */
    public function index()
    {

        //neu ma co du lieu post len thi kiem tra

        $this->form_validation->set_rules('name', 'First & Last name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('content', 'Content', 'required');
        $this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
        $this->form_validation->set_rules('address', 'Address', 'required');

        //nhập liệu chính xác
        if ($this->form_validation->run()) {
            $data = array();
            $data['name']    = $this->input->post('name');
            $data['email']   = $this->input->post('email');
            $data['address'] = $this->input->post('address');
            $data['title']   = $this->input->post('title');
            $data['content'] = $this->input->post('content');
            $data['phone']   = $this->input->post('phone');
            $data['created'] = now();
            $this->contact_model->create($data);
            $this->session->set_flashdata('message', 'Contact Success');
            redirect();
        }




        //hiển thị ra view
        $this->data['temp'] = 'site/contact/index';
        $this->load->view('site/layout', $this->data);
    }
}
