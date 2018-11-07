<?php

class Announcement_model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function addPost($upload_data){

        $user = ($this->session->userdata('id')) ? $this->session->userdata('id') : null ;
        $data = array(
            'user_id' => $user,
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'show_post' => $this->input->post('show_post'),
            'image' => 'uploads/posts/' . $upload_data['file_name']
        );

        $res = $this->db->insert('announcement', $data);
        if ($res) {
            return $res;
        }
        return[];
    }

}

?>
