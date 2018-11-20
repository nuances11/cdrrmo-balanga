<?php

class Announcement_model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function addPost($upload_data = array()){
        
        $user = ($this->session->userdata('id')) ? $this->session->userdata('id') : '' ;
        $path = (!empty($upload_data)) ? 'uploads/posts/' . $upload_data['file_name'] : '' ;
        $data = array(
            'user_id' => $user,
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'show_post' => $this->input->post('show_post'),
            'image' => $path
        );

        $res = $this->db->insert('announcement', $data);
        if ($res) {
            return $res;
        }
        return[];
    }

    public function updatePost($upload_data = array())
    {

        $path = (!empty($upload_data)) ? 'uploads/posts/' . $upload_data['file_name'] : $this->input->post('old_img') ;
        $data = array(
            'title' => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'show_post' => $this->input->post('show_post'),
            'image' => $path
        );

        $this->db->where('id', $this->input->post('id'));
        $res = $this->db->update('announcement', $data);
        if ($res) {
            return $res;
        }
        return[];
    }

    public function getAnnouncement()
    {
        return $this->db->get("announcement");
    }

    public function getPost($id=NULL)
    {
        if ($id) {
            $this->db->select('*')
                    ->where('id', $id);
            $query = $this->db->get('announcement');
            if ($query->num_rows() > 0) {
                return $query->row();
            }
        }
        return [];
    }

    public function deletePost($id=NULL)
    {
        if ($id) {
            $this->db->where('id', $id);
            return $this->db->delete('announcement');
        }

        return [];
    }

}

?>
