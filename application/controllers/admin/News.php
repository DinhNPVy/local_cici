<?php

class News extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        //load ra file model
        $this->load->model('news_model');
    }

    // su dung layout master
    function index()
    {
        // lay tong so luong tat ca san pham trong website
        $total_rows = $this->news_model->get_total();
        $this->data['total_rows'] = $total_rows;
        //load thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows; // tong tat ca san pham tren website
        $config['base_url'] = admin_url('news/index'); // link hiển thị ra danh sách sản phẩm
        $config['per_page'] = 3; // số lượng hiển thị trên 1 trang
        $config['uri_segment'] = 4; // lấy ra phân đoạn hiện trên link url
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);

        // lay dữ liệu phân trang
        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        //kiem ra co thuc hien lọc kh 
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if ($id > 0) {
            $input['where']['id'] = $id;
        }
        $title = $this->input->get('title');
        if ($title) {
            $input['like'] = array('title', $title);
        }

        // lay ra danh sách bai viet
        $list = $this->news_model->get_list($input);
        $this->data['list'] = $list;


        //lay noi dung cua bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/news/index';
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
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');
            $this->form_validation->set_rules('link', 'Link', 'required');



            // nhap lieu chinh xac
            if ($this->form_validation->run()) {


                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/news';
                $upload_data = $this->upload_library->upload($upload_path, 'image');

                $image_link = '';


                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }

                // luu du lieu can them
                $data = array(
                    'title' => $this->input->post('title'),
                    'image_link' => $image_link,
                    'meta_desc' => $this->input->post('meta_desc'),
                    'meta_key' => $this->input->post('meta_key'),
                    'content' => $this->input->post('content'),
                    'link'   => $this->input->post('link'),
                    'created' => now(),

                );


                // them moi vao csdl
                if ($this->news_model->create($data)) {
                    $this->session->set_flashdata('message', 'Add news success');
                } else {
                    $this->session->set_flashdata('message', 'Not add news success');
                }
                // chuyen sang trang danh sach quan tri vien
                redirect(admin_url('news'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/news/add';
        $this->load->view('admin/main', $this->data);
    }
    // chinh sua bài viet
    function edit()
    {

        $id = $this->uri->rsegment('3');
        $news = $this->news_model->get_info($id);
        if (!$news) {

            $this->session->set_flashdata('message', 'Not post exists');
            redirect(admin_url('news'));
        }
        $this->data['news'] = $news;




        // load thu vien validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        // neu ma co du lieu post lên thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('content', 'Content', 'required');



            // nhap lieu chinh xac
            if ($this->form_validation->run()) {


                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/news';
                $upload_data = $this->upload_library->upload($upload_path, 'image');

                $image_link = '';


                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }


                // luu du lieu can them
                $data = array(
                    'title' => $this->input->post('title'),
                    'meta_desc' => $this->input->post('meta_desc'),
                    'meta_key' => $this->input->post('meta_key'),
                    'content' => $this->input->post('content'),
                    'link'   => $this->input->post('link'),

                );
                if ($image_link != '') {
                    $data['image_link'] = $image_link;
                }

                // them moi vao csdl
                if ($this->news_model->update($news->id, $data)) {
                    $this->session->set_flashdata('message', 'Update news success');
                } else {
                    $this->session->set_flashdata('message', 'Not update news success');
                }
                // chuyen sang trang danh sach quan tri vien
                redirect(admin_url('news'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/news/edit';
        $this->load->view('admin/main', $this->data);
    }

    // ham xoa
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $this->_del($id);

        $this->session->set_flashdata('message', 'Delete success');
        redirect(admin_url('news'));
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

        $news = $this->news_model->get_info($id);

        if (!$news) {
            $this->session->set_flashdata('message', 'news does not exist');
            redirect(admin_url('news'));
        }
        // thuc hien xoa 

        $this->news_model->delete($id);
        // xoa cac anh cua san pham
        $image_link = './upload/news/' . $news->image_link;
        if (file_exists($image_link)) {
            unlink($image_link);
        }
        // xoa cac anh kem theo cua san pham
        $image_list = json_decode($news->image_list);
        if (is_array($image_list)) {
            foreach ($image_list as  $img) {
                $image_list = './upload/news/' . $img;
                if (file_exists($image_list)) {
                    unlink($image_list);
                }
            }
        }
    }
}
