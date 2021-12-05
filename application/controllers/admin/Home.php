<?php
class Home extends MY_Controller
{
    function index()
    {
        $this->data['temp'] = 'admin/home/index';
        $this->load->view('admin/main', $this->data);
    }
    // thuc hien dang xuat
    function logout()
    {
        if ($this->session->userdata('login')) {
            $this->session->unset_userdata('login');
        }
        redirect(admin_url('login'));
    }
}
