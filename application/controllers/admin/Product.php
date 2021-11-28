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
        $config['total_rows'] = $total_rows; // tong tat ca san pham tren website
        $config['base_url'] = admin_url('product/index'); // link hiển thị ra danh sách sản phẩm
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

        //kiem ra co thuc hien lọc kh 
        $id = $this->input->get('id');
        $id = intval($id);
        $input['where'] = array();
        if ($id > 0) {
            $input['where']['id'] = $id;
        }
        $name = $this->input->get('name');
        if ($name) {
            $input['like'] = array('name', $name);
        }
        $catalog_id = $this->input->get('catalog');
        $catalog_id = intval($catalog_id);
        if ($catalog_id > 0) {
            $input['where']['catalog_id'] = $catalog_id;
        }
        // lay ra danh sách sản phẩm
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;


        // lay danh sach danh muc san pham
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row) {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;


        //lay noi dung cua bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        //load view
        $this->data['temp'] = 'admin/product/index';
        $this->load->view('admin/main', $this->data);
    }

    // them san pham
    function add()
    {
        // lay danh sach danh muc san pham
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row) {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;

        // load thu vien validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        // neu ma co du lieu post lên thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('catalog', 'Types', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');


            // nhap lieu chinh xac
            if ($this->form_validation->run()) {
                // them vao csdl
                $name = $this->input->post('name');
                $catalog_id = $this->input->post('catalog');
                $price = $this->input->post('price');
                $price = str_replace(',', ',', $price);



                $discount = $this->input->post('discount');
                $discount = str_replace(',', '', $discount);

                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/product';
                $upload_data = $this->upload_library->upload($upload_path, 'image');

                $image_link = '';


                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }

                $this->load->library('upload_library');
                $upload_path = './upload/video';
                $upload_data_video = $this->upload_library->upload($upload_path, 'video');

                $video = '';
                if (isset($upload_data_video['file_name'])) {
                    $video = $upload_data_video['file_name'];
                }


                // upload các ảnh kèm theo
                $image_list = array();
                $upload_path = './upload/product';
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list = json_encode($image_list);
                // luu du lieu can them
                $data = array(
                    'name' => $name,
                    'catalog_id' => $catalog_id,
                    'price' => $price,
                    'image_link' => $image_link,
                    'image_list' => $image_list,
                    'discount' => $discount,
                    'warranty' => $this->input->post('warranty'),
                    'gifts'    => $this->input->post('gifts'),
                    'video'    => $video,
                    'site_title' => $this->input->post('site_title'),
                    'meta_desc' => $this->input->post('meta_desc'),
                    'meta_key' => $this->input->post('meta_key'),
                    'content' => $this->input->post('content'),
                    'created' => now(),

                );


                // them moi vao csdl
                if ($this->product_model->create($data)) {
                    $this->session->set_flashdata('message', 'Add product success');
                } else {
                    $this->session->set_flashdata('message', 'Not add product success');
                }
                // chuyen sang trang danh sach quan tri vien
                redirect(admin_url('product'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/product/add';
        $this->load->view('admin/main', $this->data);
    }
    // chinh sua san pham
    function edit()
    {

        $id = $this->uri->rsegment('3');
        $product = $this->product_model->get_info($id);
        if (!$product) {

            $this->session->set_flashdata('message', 'Not product exists');
            redirect(admin_url('product'));
        }
        $this->data['product'] = $product;


        // lay danh sach danh muc san pham
        $this->load->model('catalog_model');
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $catalogs = $this->catalog_model->get_list($input);
        foreach ($catalogs as $row) {
            $input['where'] = array('parent_id' => $row->id);
            $subs = $this->catalog_model->get_list($input);
            $row->subs = $subs;
        }
        $this->data['catalogs'] = $catalogs;

        // load thu vien validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        // neu ma co du lieu post lên thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('catalog', 'Types', 'required');
            $this->form_validation->set_rules('price', 'Price', 'required');


            // nhap lieu chinh xac
            if ($this->form_validation->run()) {
                // them vao csdl
                $name = $this->input->post('name');
                $catalog_id = $this->input->post('catalog');
                $price = $this->input->post('price');
                $price = str_replace(',', ',', $price);



                $discount = $this->input->post('discount');
                $discount = str_replace(',', '', $discount);

                //lay ten file anh minh hoa duoc update len
                $this->load->library('upload_library');
                $upload_path = './upload/product';
                $upload_data = $this->upload_library->upload($upload_path, 'image');

                $image_link = '';


                if (isset($upload_data['file_name'])) {
                    $image_link = $upload_data['file_name'];
                }
                $this->load->library('upload_library');
                $upload_path = './upload/video';
                $upload_data_video = $this->upload_library->upload($upload_path, 'filevideo');

                $video = '';


                if (isset($upload_data_video['file_name'])) {
                    $video = $upload_data_video['file_name'];
                }


                // upload các ảnh kèm theo
                $image_list = array();
                $upload_path = './upload/product';
                $image_list = $this->upload_library->upload_file($upload_path, 'image_list');
                $image_list_json = json_encode($image_list);
                // luu du lieu can them
                $data = array(
                    'name' => $name,
                    'catalog_id' => $catalog_id,
                    'price' => $price,
                    'discount' => $discount,
                    'warranty' => $this->input->post('warranty'),
                    'gifts'    => $this->input->post('gifts'),
                    'site_title' => $this->input->post('site_title'),
                    'meta_desc' => $this->input->post('meta_desc'),
                    'meta_key' => $this->input->post('meta_key'),
                    'content' => $this->input->post('content')

                );
                if ($image_link != '') {
                    $data['image_link'] = $image_link;
                }
                if ($video != '') {
                    $data['video'] = $video;
                }

                if (!empty($image_list)) {
                    $data['image_list'] = $image_list_json;
                }

                // them moi vao csdl
                if ($this->product_model->update($product->id, $data)) {
                    $this->session->set_flashdata('message', 'Update product success');
                } else {
                    $this->session->set_flashdata('message', 'Not update product success');
                }
                // chuyen sang trang danh sach quan tri vien
                redirect(admin_url('product'));
            }
        }

        //load view
        $this->data['temp'] = 'admin/product/edit';
        $this->load->view('admin/main', $this->data);
    }

    // ham xoa
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $this->_del($id);

        $this->session->set_flashdata('message', 'Delete success');
        redirect(admin_url('product'));
    }
    // xoa nhieu san pham
    function delete_all()
    {
        $ids = $this->input->post('ids');
        foreach ($ids as $id) {
        }
    }
    // xoa san pham
    private function _del($id)
    {
        $id = intval($id);

        $product = $this->product_model->get_info($id);

        if (!$product) {
            $this->session->set_flashdata('message', 'Product does not exist');
            redirect(admin_url('product'));
        }
        // thuc hien xoa 

        $this->product_model->delete($id);
        // xoa cac anh cua san pham
        $image_link = './upload/product/' . $product->image_link;
        if (file_exists($image_link)) {
            unlink($image_link);
        }
        // xoa cac anh kem theo cua san pham
        $image_list = json_decode($product->image_list);
        if (is_array($image_list)) {
            foreach ($image_list as  $img) {
                $image_list = './upload/product/' . $img;
                if (file_exists($image_list)) {
                    unlink($image_list);
                }
            }
        }
    }
}
