<?php
class Profile extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('profile_model');
    }

    // lay danh sach profile
    function index()
    {
        $input = array();
        $list = $this->profile_model->get_list($input);
        $this->data['list'] = $list;
        $total = $this->profile_model->get_total();
        $this->data['total'] = $total;

        $this->load->library('form_validation');
        $this->load->helper('form');







        //lay noi dung cua bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // $controller = $this->uri->rsegment('1');
        // $controller = strtolower($controller);

        // $login = $this->session->userdata('login');
        // if (!$login && $controller != 'login') {
        //     redirect(admin_url('login'));
        // }
        // // neu ma dang nhap roi thi kh vao login nua
        // if ($login && $controller == 'login') {
        //     $id = $this->uri->segment('1');
        //     $id - intval($id);

        //     // lay thong tin quan tri vien

        //     $info = $this->profile_model->get_info($id);

        //     if (!$info) {
        //         $this->session->set_flashdata('message', 'Admin does not exist');
        //         redirect(admin_url('profile'));
        //     }
        //     $this->data['info'] = $info;
        // }



        $this->data['temp'] = 'admin/profile/index';
        $this->load->view('admin/main', $this->data);
    }

    public function show($id)
    {

        $profile = $this->profile_model->get_reviews($id);
        $data['name'] = $profile['name'];
        // $data['grade'] = $profile['grade'];
        $this->data['temp'] = 'admin/profile/index';
        $this->load->view('admin/main', $this->data);
    }
    
}
