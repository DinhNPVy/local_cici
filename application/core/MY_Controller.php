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

                    $input['order'] = array('buyed', 'DESC');
                    $product_buy = $this->product_model->get_list($input);
                    $this->data['product_buy'] = $product_buy;
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
