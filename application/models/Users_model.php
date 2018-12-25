<?php

class Users_Model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function chkUserLogin($creds)
    {
        $this->db->select('*')
                ->from('users')
                ->where('email', $creds['email'])
                ->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $user =  $query->row();

            // Check if password input is correct
            if (password_verify($creds['password'], $user->password)) {
                return $user;
            } 
        }

        return false;
    }

    public function getUsers()
    {
        return $this->db->get("users");
    }

    public function saveUser()
    {
        $data = array(
            'email' => $this->input->post('email'),
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'user_type' => $this->input->post('user_type'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        );

        $res = $this->db->insert('users', $data);
        if ($res) {
            return $res;
        }

        return [];
    }

    public function getUser($id)
    {
        $this->db->select('*')
                ->from('users')
                ->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }

        return [];
    }

    public function updateUser($id)
    {
        $data = array(
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'user_type' => $this->input->post('user_type'),
        );

        $this->db->where('id', $id);
        $res = $this->db->update('users', $data);
        if ($res) {
            
            if ($this->input->post('password')) {
                
                $passData = array(
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                );

                $this->db->where('id', $id);
                $pass = $this->db->update('users', $passData);

                return $pass;

            }else{
                return $res;
            }

        }
        
        return [];
    }
    

    public function deleteUser($id){
        $this->db->where('id', $id);
        $res = $this->db->delete('users');
        if ($res) {
            return $res;
        }

        return [];
    }

    public function validatePassword($password, $id)
    {

        $this->db->select('password')
                ->where('id', $id);
        $query = $this->db->get('users')->row();

        if ($query) {
            if (password_verify($password, $query->password)) {
                return TRUE;
            }else{
                return FALSE;
            }
        }
          
        return[];
    }

    public function updatePassword($id)
    {
        $passData = array(
            'password' => password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT)
        );

        $this->db->where('id', $id);
        $pass = $this->db->update('users', $passData);

        return $pass;
    }

}

?>
