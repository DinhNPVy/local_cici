<?php
class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        // load model san pham
        $this->load->model('product_model');
    }

    function catalog()
    {
        // lay id cua the loai
        $id = intval($this->uri->rsegment(3));
        // lay ra thong tin cua the loai
        $this->load->model('catalog_model');
        $input_list = array();
        $input_list['where'] = array('parent_id' => 0);
        $catalog_list_id = $this->catalog_model->get_list($input_list);
        $this->data['catalog_list_id'] = $catalog_list_id;
        $catalog = $this->catalog_model->get_info($id);
        if (!$catalog) {
            redirect();
        }
        $this->data['catalog'] = $catalog;
        $input = array();

        //kiêm tra xem đây là danh con hay danh mục cha
        if ($catalog->parent_id == 0) {
            $input_catalog = array();
            $input_catalog['where']  = array('parent_id' => $id);
            $catalog_subs = $this->catalog_model->get_list($input_catalog);
            if (!empty($catalog_subs)) //neu danh muc hien tai co danh muc con
            {
                $catalog_subs_id = array();
                foreach ($catalog_subs as $sub) {
                    $catalog_subs_id[] = $sub->id;
                }
                //lay tat ca san pham thuoc cac danh mục con do
                $this->db->where_in('catalog_id', $catalog_subs_id);
            } else {
                $input['where'] = array('catalog_id' => $id);
            }
        } else {
            $input['where'] = array('catalog_id' => $id);
        }

        //lấy ra danh sách sản phẩm thuộc danh mục đó
        //lay tong so luong ta ca cac san pham trong websit
        $total_rows = $this->product_model->get_total($input);
        $this->data['total_rows'] = $total_rows;

        //load thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows; // tong tat ca san pham tren website
        $config['base_url'] = base_url('product/catalog/' . $id); // link hiển thị ra danh sách sản phẩm
        $config['per_page'] = 6; // số lượng hiển thị trên 1 trang
        $config['uri_segment'] = 4; // lấy ra phân đoạn hiện trên link url
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);




        // lay dữ liệu phân trang
        $segment = $this->uri->segment(4);
        $segment = intval($segment);


        $input['limit'] = array($config['per_page'], $segment);

        // lay danh sach san pham

        if (isset($catalog_subs_id)) {
            $this->db->where_in('catalog_id', $catalog_subs_id);
        }
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;

        // hien thi ra view
        $this->data['temp'] = 'site/product/catalog';
        $this->load->view('site/layout', $this->data);
    }

    // xem chi tiết sản phẩm
    function view()
    {
        // lay id san pham muon xem
        $id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if (!$product) redirect();
        $this->data['product'] = $product;
        // pre($product);
        // lay danh sach anh san pham
        $image_list = @json_decode($product->image_list);
        $this->data['image_list'] = $image_list;

        // cap nhat lai luot xem cua san pham
        $data = array();
        $data['view'] = $product->view + 1;
        $this->product_model->update($product->id, $data);

        // lay thong tin danh muc san pham
        $catalog = $this->catalog_model->get_info($product->catalog_id);
        $this->data['catalog'] = $catalog;

        // hien thi ra view
        $this->data['temp'] = 'site/product/view';
        $this->load->view('site/layout', $this->data);
    }
    // buy
    function buy()
    {
        // lay id san pham muon xem
        $id = $this->uri->rsegment(3);
        $product = $this->product_model->get_info($id);
        if (!$product) redirect();
        $this->data['product'] = $product;
        // pre($product);
        // lay danh sach anh san pham
        $image_list = @json_decode($product->image_list);
        $this->data['image_list'] = $image_list;

        // cap nhat lai luot xem cua san pham
        $data = array();
        $data['buyed'] = $product->buyed + 1;
        $this->product_model->update($product->id, $data);

        // lay thong tin danh muc san pham
        $catalog = $this->catalog_model->get_info($product->catalog_id);
        $this->data['catalog'] = $catalog;

        // hien thi ra view
        redirect();
    }

    function search()
    {
        if ($this->uri->rsegment('3') == 1) // neu tham so thu 3 bang 1
        {
            // lay du lieu tu autocomplete
            $key = $this->input->get('term');
        } else {
            $key = $this->input->get('s');
        }

        $this->data['key'] = trim($key);
        $input = array();
        $input['like'] = array('name', $key);
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;

        if ($this->uri->rsegment('3') == 1) // neu tham so thu 3 bang 1
        {
            // xu ly autocomplete
            $result = array();
            foreach ($list as $row) {
                $item = array();
                $item['id'] = $row->id;
                $item['label'] = $row->name;
                $item['value'] = $row->name;
                $result[] = $item;
            }
            // du lieu tra ve duoi dang json\
            die(json_encode($result));
        } else {
            // hien thi ra view
            $this->data['temp'] = 'site/product/search';
            $this->load->view('site/layout', $this->data);
        }
    }

    // tim kiem theo gia
    function search_price()
    {
        $price_from = intval($this->input->get('price_from'));
        $price_to = intval($this->input->get('price_to'));

        $this->data['price_from'] = $price_from;
        $this->data['price_to'] = $price_to;

        // loc theo gia
        $input = array();
        $input['where'] = array('price >= ' => $price_from, 'price <= ' => $price_to);
        $list = $this->product_model->get_list($input);
        $this->data['list'] = $list;

        $total_rows = $this->product_model->get_total();
        $this->data['total_rows'] = $total_rows;

        // lay tong so luong tat ca san pham trong website
        $total_rows = $this->product_model->get_total();
        $this->data['total_rows'] = $total_rows;
        //load thu vien phan trang
        $this->load->library('pagination');
        $config = array();
        $config['total_rows'] = $total_rows; // tong tat ca san pham tren website
        $config['base_url'] = base_url('product/search_price'); // link hiển thị ra danh sách sản phẩm
        $config['per_page'] = 6; // số lượng hiển thị trên 1 trang
        $config['uri_segment'] = 4; // lấy ra phân đoạn hiện trên link url
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';

        $this->pagination->initialize($config);

        // lay dữ liệu phân trang
        $segment = $this->uri->segment(4);
        $segment = intval($segment);

        $input = array();
        $input['limit'] = array($config['per_page'], $segment);

        // hien thi ra view
        $this->data['temp'] = 'site/product/search_price';
        $this->load->view('site/layout', $this->data);
    }

    function market()
    {
        // lay danh sach san pham 

        $input = array();
        $input = array(5, 0);
        $product_news = $this->product_model->get_list($input);
        $this->data['product_news'] = $product_news;


        // hien thi ra view
        $this->data['temp'] = 'site/product/market';
        $this->load->view('site/layout', $this->data);
    }
}
