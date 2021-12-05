<?php
class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    // lay thong tin cua khach hang
    function checkout()
    {
        // thong tin gio hang
        $carts = $this->cart->contents();

        $total_items = $this->cart->total_items();
        if ($total_items <= 0) {
            redirect();
        }
        $this->data['carts'] = $carts;


        // tong so tien can thanh toan
        $total_amount = 0;
        foreach ($carts as $row) {
            $total_amount = $total_amount + $row['subtotal'];
        }
        $this->data['total_amount'] = $total_amount;

        $user_id = 0;
        $user = "";
        // neu thanh vien da dang nhap thi lay thong tin thanh vien
        if ($this->session->userdata('user_id_login')) {
            // lay thong tin cua thanh vien
            $user_id = $this->session->userdata('user_id_login');
            $user = $this->user_model->get_info($user_id);
        }
        $this->data['user'] = $user;

        $this->load->library('form_validation');
        $this->load->helper('form');

        //neu ma co du lieu post len thi kiem tra
        if ($this->input->post()) {



            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('name', 'Name', 'required|min_length[8]');
            $this->form_validation->set_rules('phone', 'Phone', 'required');
            $this->form_validation->set_rules('message', 'Order Note', 'required');
            $this->form_validation->set_rules('payment', 'Select a payment method', 'required');



            //nhập liệu chính xác
            if ($this->form_validation->run()) {
                //them vao csdl

                $payment = $this->input->post('payment');
                $data = array(
                    'status'         => 0, // trang thai chua thanh toan
                    'user_id'        => $user_id,
                    'user_email'     => $this->input->post('email'),
                    'user_name'      => $this->input->post('name'),
                    'user_phone'     => $this->input->post('phone'),
                    'message'        => $this->input->post('message'), // ghi chu mua hang 
                    'amount'         =>  $total_amount, // tong so tien thanh toan
                    'payment'        =>  $payment,
                    'created'        => now(),

                );
                // them du lieu voa bang transaction 
                $this->load->model('transaction_model');
                $this->transaction_model->create($data);

                $transaction_id = $this->db->insert_id(); // lấy ra id giao dịch vừa thêm vào

                // them vao bang order
                $this->load->model('order_model');
                foreach ($carts as $row) {
                    $data = array(
                        'transaction_id' => $transaction_id,
                        'product_id'     => $row['id'],
                        'qty'            => $row['qty'],
                        'amount'         => $row['subtotal'],
                        'status'         => '0',
                    );
                    $this->order_model->create($data);
                }
                // xoa toan bo
                $this->cart->destroy();
                if ($payment == 'cash') {
                    $this->session->set_flashdata('message', ' A Successful Transaction - We will inspect the goods and send them to you as soon as feasible. ');

                    redirect(site_url());
                } elseif (in_array($payment, array('card', 'baokim'))) {
                    // load thu vien thanh toan
                    $this->load->library('payment/' . $payment . '_payment');

                    // chuyen sang cong thanh toan
                    $this->{$payment . '_payment'}->payment($transaction_id, $total_amount);
                }
            }
        }

        $this->data['temp'] = 'site/order/checkout';
        $this->load->view('site/layout', $this->data);
    }
    // nhan ket qua tra ve tu cong thanh toan
    function result()
    {
        // load thu vien thanh toan
        $this->load->library('payment/baokim_payment');
        $this->load->model('transaction_model');
        // id cu agiao dich
        $transaction_id = $this->input->post('order_id');

        $transaction = $this->model->transaction_model->get_info($transaction_id);
        if (!$transaction) {
            redirect();
        }

        // goi toi ham kiem tra giam gia thanh toan tren bao kim
        $status = $this->baokim_payment->result($transaction_id, $transaction->amount);
        if ($status == true) {
            // cap nhat lai trang thai don hang ma da thanh toan
            $data = array();
            $data['status'] = 1;
            $this->model->transaction_model->update($transaction_id, $data);
        } elseif ($status == false) {
            // cap nhat lai trang thai don hang ma khong thanh toan
            $data = array();
            $data['status'] = 2;
            $this->model->transaction_model->update($transaction_id, $data);
        }
    }
}
