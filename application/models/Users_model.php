<?php

class Users_Model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function getUsers()
    {
        return $this->db->get("users");
    }

}

?>
