<?php
// My_Controller kiem tra login hay chua
class Admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('admin_model');
    }

    // lay danh sach admin
    function index()
    {
        $input = array();
        $list = $this->admin_model->get_list($input);
        $this->data['list'] = $list;
        $total = $this->admin_model->get_total();
        $this->data['total'] = $total;

        //lay noi dung cua bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        // // kiem tra xem thanh vien da dang nhap hay chua
        // $admin_id_login = $this->session->userdata('admin_id_login');
        // $this->data['admin_id_login'] = $admin_id_login;
        // // neu dang nhap thanh cong lay thong tin thanh vien
        // if ($admin_id_login) {
        //     $this->load->model('admin_model');
        //     $admin_info = $this->admin_model->get_info($admin_id_login);
        //     $this->data['admin_info'] = $admin_info;
        // }


        $this->data['temp'] = 'admin/admin/index';
        $this->load->view('admin/main', $this->data);
    }
    // function login()
    // {
    //     $this->load->library('form_validation');
    //     $this->load->helper('form');

    //     if ($this->input->post()) {
    //         $this->form_validation->set_rules('name', 'Username', 'required|valid_email');
    //         $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    //         $this->form_validation->set_rules('login', 'Sign in', 'callback_check_login');
    //         if ($this->form_validation->run()) {
    //             //lay thong tin thanh vien
    //             $admin = $this->_get_user_info();
    //             //gắn session id của thành viên đã đăng nhập
    //             $this->session->set_userdata('user_id_login', $admin->id);

    //             $this->session->set_flashdata('message', 'Successfully Logged In');
    //             redirect();
    //         }
    //     }

    //     //hiển thị ra view
    //     $this->data['temp'] = 'site/admin/login';
    //     $this->load->view('site/admin/login', $this->data);
    // }
    // function check_login()
    // {
    //     $admin = $this->_get_user_info();
    //     if ($admin) {
    //         return true;
    //     }
    //     $this->form_validation->set_message(__FUNCTION__, 'Failed Login');
    //     return false;
    // }

    // /*
    //  * Lay thong tin cua thanh vien
    //  */
    // private function _get_user_info()
    // {
    //     $username = $this->input->post('username');
    //     $password = $this->input->post('password');
    //     $password = md5($password);

    //     $where = array('username' => $username, 'password' => $password);
    //     $admin = $this->admin_model->get_info_rule($where);
    //     return $admin;
    // }




    // kiem tra ten dang nhap 
    function check_username()
    {
        $username = $this->input->post('username');

        $where = array('username' => $username);
        //kiem tra username da ton tai hay chua
        if ($this->admin_model->check_exists($where)) {

            // tra ve thong bao loi
            $this->form_validation->set_message(__FUNCTION__, 'Account already exists');
            return false;
        }
        return true;
    }

    function check_email()
    {
        $email = $this->input->post('email');

        $where = array('email' => $email);

        if ($this->admin_model->check_exists($where)) {

            // tra ve thong bao loi
            $this->form_validation->set_message(__FUNCTION__, 'Account already exists');
            return false;
        }
        return true;
    }


    // function isValidEmail()
    // {
    //     $email = $this->input->post('email');

    //     return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    // }

    // function check_phone()
    // {
    //     $phone = $this->input->post('phone');
    //     if (preg_match('/^[0-9]{3}-[0-9]{4}-[0-9]{3}$/', $phone)) {
    //         $this->form_validation->set_message(__FUNCTION__, 'Phone is valid');
    //     }
    // }
    // them moi thong tin quan tri vien
    function add()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        // neu ma co du lieu post lên thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'UserName', 'required|min_length[3]|max_length[20]|callback_check_username');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[255]');
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('email', 'Email', 'required|min_length[6]|max_length[50]|callback_check_email');
            $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|max_length[10]');

            // nhap lieu chinh xac
            if ($this->form_validation->run()) {
                // them vao csdl
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');


                $data = array(
                    'username' => $username,
                    'password' => md5($password),
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,


                );
                if ($this->admin_model->create($data)) {
                    $this->session->set_flashdata('message', 'Create success');
                } else {
                    $this->session->set_flashdata('message', 'Not Create success');
                }
                // chuyen sang trang danh sach quan tri vien
                redirect(admin_url('admin'));
            }
        }
        $this->data['temp'] = 'admin/admin/signup';
        $this->load->view('admin/admin/signup', $this->data);
    }
    /*
    * ham chinh sua thong tin admin
    */
    function edit()
    {
        $this->load->library('form_validation');
        $this->load->helper('form');
        // lay id can chinh sua
        $id = $this->uri->rsegment('3');
        $id - intval($id);

        // lay thong tin quan tri vien

        $info = $this->admin_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('message', 'Admin does not exist');
            redirect(admin_url('admin'));
        }
        $this->data['info'] = $info;

        if ($this->input->post()) {
            $this->form_validation->set_rules('username', 'UserName', 'required|min_length[3]|max_length[20]|callback_check_username');
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[255]');
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[20]');
            $this->form_validation->set_rules('email', 'Email', 'required|min_length[6]|max_length[50]');
            $this->form_validation->set_rules('phone', 'Phone', 'required|min_length[10]|max_length[10]');
            if ($this->form_validation->run()) {
                // them vao csdl
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $name = $this->input->post('name');
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');



                $data = array(
                    'username' => $username,
                    'password' => md5($password),
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,

                );


                if ($this->admin_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Update success');
                } else {
                    $this->session->set_flashdata('message', 'Not Update success');
                }
                // chuyen sang trang danh sach quan tri vien
                redirect(admin_url('admin'));
            }
        }
        $this->data['temp'] = 'admin/admin/edit';
        $this->load->view('admin/main', $this->data);
    }

    // ham xoa du lieu
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $info = $this->admin_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('message', 'Admin does not exist');
            redirect(admin_url('admin'));
        }
        // thuc hien xoa 

        $this->admin_model->delete($id);
        $this->session->set_flashdata('message', 'Delete success');
        redirect(admin_url('admin'));
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
