<?php
class Catalog extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('catalog_model');
    }

    function index()
    {
        $list = $this->catalog_model->get_list();
        $this->data['list'] = $list;


        //lay noi dung cua bien message
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $this->data['temp'] = 'admin/catalog/index';
        $this->load->view('admin/main', $this->data);
    }

    function add()
    {
        // load thu vien validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');
        // neu ma co du lieu post lên thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'CatalogName', 'required');


            // nhap lieu chinh xac
            if ($this->form_validation->run()) {
                // them vao csdl
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');


                // luu du lieu can them
                $data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)


                );
                if ($this->catalog_model->create($data)) {
                    $this->session->set_flashdata('message', 'Add success');
                } else {
                    $this->session->set_flashdata('message', 'Not Add success');
                }
                // chuyen sang trang danh sach quan tri vien
                redirect(admin_url('catalog'));
            }
        }

        // lay danh sach dnah muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list'] = $list;

        $this->data['temp'] = 'admin/catalog/add';
        $this->load->view('admin/main', $this->data);
    }
    // cap nhat du lieu
    function edit()
    {

        // load thu vien validate dữ liệu
        $this->load->library('form_validation');
        $this->load->helper('form');

        $id = $this->uri->rsegment(3);
        $info = $this->catalog_model->get_info($id);
        if (!$info) {
            // tọa ra nội dung thông báo
            $this->session->set_flashdata('message', 'Catalog does not exist');
            redirect(admin_url('catalog'));
        }
        // lay bien info su dung trong file edit
        $this->data['info'] = $info;
        // neu ma co du lieu post lên thi kiem tra
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'CatalogName', 'required');


            // nhap lieu chinh xac
            if ($this->form_validation->run()) {
                // them vao csdl
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $sort_order = $this->input->post('sort_order');


                // luu du lieu can them
                $data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'sort_order' => intval($sort_order)


                );
                if ($this->catalog_model->update($id, $data)) {
                    $this->session->set_flashdata('message', 'Edit success');
                } else {
                    $this->session->set_flashdata('message', 'Not Edit success');
                }
                // chuyen sang trang danh sach quan tri vien
                redirect(admin_url('catalog'));
            }
        }

        // lay danh sach dnah muc cha
        $input = array();
        $input['where'] = array('parent_id' => 0);
        $list = $this->catalog_model->get_list($input);
        $this->data['list'] = $list;

        $this->data['temp'] = 'admin/catalog/edit';
        $this->load->view('admin/main', $this->data);
    }

    // ham xoa
    function delete()
    {
        $id = $this->uri->rsegment('3');
        $id = intval($id);

        $info = $this->catalog_model->get_info($id);

        if (!$info) {
            $this->session->set_flashdata('message', 'Catalog does not exist');
            redirect(admin_url('catalog'));
        }

        // kiem tra xem danh muc nay co san pham khong
        $this->load->model('product_model');
        $product = $this->product_model->get_info_rule(array('catalog_id' => $id), 'id');
        if ($product) {
            $this->session->set_flashdata('message', 'This category contains products, please remove the product before deleting the category');
            redirect(admin_url('catalog'));
        }

        // thuc hien xoa 

        $this->catalog_model->delete($id);
        $this->session->set_flashdata('message', 'Delete success');
        redirect(admin_url('catalog'));
    }
}
