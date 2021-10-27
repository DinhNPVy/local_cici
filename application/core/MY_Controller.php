<?php
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        // ke thua tu CI_Controller
        parent::__construct();

        $controller = $this->uri->segment(1);

        switch ($controller) {
            case 'admin': {
                    // xu ly du lieu khi truy cap vao admin


                    break;
                }
            default: {
                    // xu ly du lieu o trang ngoai
                }
        }
    }
}
