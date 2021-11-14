<?php
class Profile_model extends MY_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function get_reviews($id)
    {
        if ($id != FALSE) {
            $query = $this->db->get_where('profile', array('id' => $id));
            return $query->row_array();
        } else {
            return FALSE;
        }
    }
}
