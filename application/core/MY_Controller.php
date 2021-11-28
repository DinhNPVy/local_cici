<?php
class MY_Controller extends CI_Controller
{
    #biến gửi dữ liệu sang view
    public $data = array();
    function __construct()
    {
        // ke thua tu CI_Controller
        parent::__construct();

        $controller = $this->uri->segment(1);

        switch ($controller) {
            case 'admin': {
                    // xu ly du lieu khi truy cap vao admin
                    $this->load->helper('admin');
                    $this->_check_login();

                    break;
                }
            default: {
                    // xu ly du lieu o trang ngoai
                    // lay danh sach danh muc san pham
                    $this->load->model('catalog_model');
                    $input = array();
                    $input['where'] = array('parent_id' => 0);
                    $catalog_list = $this->catalog_model->get_list($input);
                    foreach ($catalog_list as $row) {
                        $input['where'] = array('parent_id' => $row->id);
                        $subs = $this->catalog_model->get_list($input);
                        $row->subs = $subs;
                    }
                    $this->data['catalog_list'] = $catalog_list;
                    // pre($catalog_list);

                    // kiem tra xem thanh vien da dang nhap hay chua
                    $user_id_login = $this->session->userdata('user_id_login');
                    $this->data['user_id_login'] = $user_id_login;
                    // neu dang nhap thanh cong lay thong tin thanh vien
                    if ($user_id_login) {
                        $this->load->model('user_model');
                        $user_info = $this->user_model->get_info($user_id_login);
                        $this->data['user_info'] = $user_info;
                    }
                    // goi toi thu vien
                    $this->load->library('cart');
                    $this->data['total_items'] = $this->cart->total_items();
                }
        }
    }

    private function _check_login()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);

        $login = $this->session->userdata('login');
        // neu ma chua dang nhap , ma truy cap vao controller khac login
        if (!$login && $controller != 'login') {
            redirect(admin_url('login'));
        }
        // neu ma dang nhap roi thi kh vao login nua
        if ($login && $controller == 'login') {
            redirect(admin_url('home'));
        }
    }

}
