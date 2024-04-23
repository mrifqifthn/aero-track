<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_auth extends CI_model
{
    public function getAuth($email)
    {
        $query = "SELECT * FROM user WHERE email = '$email'                   
                ";
        return $this->db->query($query)->row_array();
    }
}
