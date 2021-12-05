<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/** 
 * Ket noi cong thanh toan bao kim
 * @author 4501104282@student.hcmue.edu.vn
 * @version 20/08/2021
 */

class Baokim_payment
{

    var $CI = '';
    var $data = array();
    // thong so cai dat payment
    var $code = 'baokim';
    var $setting = array(
        'business'      => '4501104282@student.hcmue.edu.vn', // tai khoan cua nguoi nhan tien
        'merchant_id'   => '', // id cua website khi dang ky ben bao kim
        'secure_pass'   => '', // mat khau giao tiep
        'cost_constant' => 1700,
        'cost_percent'  => 1,
    );
    // cac bien giao tiep cua payment
    var $url  = 'https://www.baokim.vn/payment/customize_payment/order'; // url chay that

    var $ip = array('210.245.80.14', '210.245.83.89', '210.245.83.94', '42.112.21.10', '210.245.83.90', '210.245.80.104', '210.245.88.180', '210.245.83.82', '210.245.83.87');

    public function __construct()
    {
        // khoi tao 1 doi tuong moi
        $this->CI = &get_instance();
    }

    // checkout handle
    /**
     *  chuyen den payment
     * @tran_id : id cua bang transaction, cho biet thanh toan cho giao dich nao tren website
     * @amount: so tien khach can thanh toan, la cot amount trong bang transaction
     * @return_url: duogn link tra ve khi thanh toan xong hoac huy bo
     */
    function payment($tran_id, $amount, $return_url)
    {
        $tran_info = 'Payment for the order' . $tran_id;

        $url = array();
        $url['success'] = $return_url;
        $url['cancel'] = $return_url;
        $url['detail'] = $return_url;

        // $url = $this->_bk_create_url($tran_id, $this->setting['business'], $amount, '', '', $tran_info, $url);
        redirect($url);
    }

    // xu ly ket qua tra ve tu payment

    function result($tran_id, $amount)
    {
        // luu du lieu tra ve, luu vao cot payment_info trong bang transaction
        $result = $this->CI->input->post();
        $this->CI->load->model('transaction_model');
        $data = array();
        $data['payment_info'] = serialize($result);
        $this->CI->transaction_model->update($tran_id, $data);

        // neu là link user chuyen ve tu bao kim sau khi thanh toan xong
        if (!$this->CI->input->post('order_id')) {
            return NULL;
        }
        // kiem tra ip
        if ($this->ip != $this->CI->input->ip_address()) {
            return FALSE;
        }
        // kiem ta ma so giao dich
        if ($tran_id != $this->CI->input->post('order_id')) {
            return FALSE;
        }
        // kiem tra amount
        $amount_pay = floatval($this->CI->input->post('total_amount'));
        $amount = floatval($amount);
        if ($amount_pay < $amount) {
            return FALSE;
        }

        // kiem tra trang thai giao dich
        if ($this->CI->input->post('transaction_status') != 4) {
            return NULL;
        }
        return TRUE;
    }

    // lay tran_id tu ket qua tra ve cua bao kim
    function checkout_result_get_tran_id(&$security = '')
    {
        $tran_id = $this->CI->input->post('order_id');

        return $tran_id;
    }

    // bao kim function
    /**
     * ham xay dung url chuyen den Baokim.vn thuc hien thanh toan, trong do co tham so ma hoa
     * @param $order_id             Ma don hang
     * @param $business             Email tai khoan nguoi ban
     * @param $total_amount         Gia tri don hang
     * @param $shipping_fee         Phi van chuyen
     * @param $tax_fee              Thue
     * @param $order_description    Mo ta don hang
     * @param $url_success          url tra ve khi thanh toan thanh cong
     * @param $url_cancel           url tra ve khi huy thanh toan
     * @param $url_detail           url chi tiet don hang
     * @param url can tao          
     * 
     */

    private function _bk_create_url($order_id, $business, $total_amount, $shipping_fee, $tax_fee, $order_description, $url_success, $url_cancel, $url_detail)
    {
        // mang cac tham so chuyen toi bao kim
        $params = array(
            'merchant_id'       => strval($this->setting['merchant_id']),
            'order_id'          => strval($order_id),
            'business'          => strval($business),
            'total_amount'      => strval($total_amount),
            'shipping_fee'      => strval($shipping_fee),
            'tax_fee'           => strval($tax_fee),
            'order_description' => strval($order_description),
            'url_success'          => strtolower(urlencode($url_success)),
            'url_cancel'          => strtolower(urlencode($url_cancel)),
            'url_detail'          => strtolower(urlencode($url_detail)),

        );
        ksort($params);

        $str_combined = $this->setting['secure_pass'] . implode('', $params);
        $params['checksum'] = strtoupper(md5($str_combined));

        //kiem tra bien $redirect_url xem co ? khong , neu khong co thi bo sung vao
        $redirect_url = $this->url;
        if (strpos($redirect_url, '?') === FALSE) {
        }
    }
}
