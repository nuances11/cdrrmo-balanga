<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
	    parent::__construct();
		$this->load->model('users_model');

	    $styles = array(
			'assets/lib/datatables/jquery.dataTables.css',
			'assets/lib/highlightjs/github.css',
			'assets/lib/select2/css/select2.min.css',
			'assets/css/toastr.min.css'
        );

        $js = array(
			'assets/lib/highlightjs/highlight.pack.js',
			'assets/lib/datatables/jquery.dataTables.js',
			'assets/lib/datatables-responsive/dataTables.responsive.js',
			'assets/lib/select2/js/select2.min.js',
			'assets/js/toastr.min.js',
			'assets/js/user.js'
        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Admin - Users');
	    $this->template->set_template('admin');

  }

	public function index()
	{        
        $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
		$this->template->load('users/index');
	}
	
	public function datatable()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->users_model->getUsers();

        $data = [];
		$group = "";

        foreach($query->result() as $r) {

			$name = strtoupper($r->first_name . ' ' . $r->last_name);
			$created = date('F jS Y h:i:sa', strtotime($r->created_at));
			$edit_btn = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-success btn-icon mg-b-10 btnEdit"><div><i class="fa fa-fw fa-edit"></i></div></a>';
			$delete_btn = ($r->id != 1) ? '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-danger btn-icon mg-r-5 mg-b-10 btnDelete"><div><i class="fa fa-fw fa-trash"></i></div></a>' : '';
			$action = $edit_btn . ' ' . $delete_btn;

            if ($r->user_type == '1') {
                $group = '<strong>Admin</strong>';
            }elseif ($r->user_type == '2') {
                $group = 'Staff';
            }

            $data[] = array(

                $group,
				$name,
				$r->email,
                $created,
                $action

           );

      }

        $result = array(

            "draw" => $draw,
            "recordsTotal" => $query->num_rows(),
            "recordsFiltered" => $query->num_rows(),
            "data" => $data

        );

      echo json_encode($result);
      exit();

    }

    public function do_action()
    {
        $response = array();

        $action = ($this->input->post('action')) ? $this->input->post('action') : '' ;

        if ($action) {
            
            if ($action == 'add') {
                $this->form_validation->set_rules('firstname','First Name', 'required');
                $this->form_validation->set_rules('lastname','Last Name', 'required');
                $this->form_validation->set_rules('user_type','User Type', 'required');
                $this->form_validation->set_rules('password','Password', 'required|min_length[8]');
                $this->form_validation->set_rules('cpass','Confirm Password', 'required|matches[password]');
                $this->form_validation->set_rules('email','Email', 'trim|required|valid_email|is_unique[users.email]',
                    array('is_unique' => '%s already used. Please provide a unique one.'));
                if ($this->form_validation->run() == FALSE) {

                    $response['validation_errors'] = validation_errors();
                    $response['success'] = FALSE;

                }else{

                    $res = $this->users_model->saveUser();
                    if ($res) {
                        $response['success'] = TRUE;
                        $response['message'] = 'User added successfully';
                    }else{
                        $response['success'] = FALSE;
                        $response['message'] = 'Error adding user';
                    }

                }
            }elseif ($action == 'update') {

                $id = '';

                if($this->input->post('user_id')){
                    $id  = $this->input->post('user_id');
                }

                $this->form_validation->set_rules('firstname','First Name', 'required');
                $this->form_validation->set_rules('lastname','Last Name', 'required');
                $this->form_validation->set_rules('user_type','User Type', 'required');
                if($this->input->post('password')){
                    $this->form_validation->set_rules('password','Password', 'required|min_length[8]');
                    $this->form_validation->set_rules('cpass','Confirm Password', 'required|matches[password]');
                }

                if ($this->form_validation->run() == FALSE) {
                    $response['validation_errors'] = validation_errors();
                    $response['success'] = FALSE;
                }else{
                    if ($id) {
                        $res = $this->users_model->updateUser($id);    
                        if ($res) {
                            $response['success'] = TRUE;
                            $response['message'] = 'User updated successfully';
                        }else{
                            $response['success'] = FALSE;
                            $response['message'] = 'Error updating user';
                        }
                    }else{
                        $response['success'] = FALSE;
                        $response['message'] = 'Error retrieving data';
                    }
                }

            }elseif ($action == 'delete') {

                $id = $this->input->post('id');

                if ($id) {
                    $res = $this->users_model->deleteUser($id);    
                    if ($res) {
                        $response['success'] = TRUE;
                        $response['message'] = 'User deleted successfully';
                    }else{
                        $response['success'] = FALSE;
                        $response['message'] = 'Error updating user';
                    }
                }else{
                    $response['success'] = FALSE;
                        $response['message'] = 'Error retrieving data';
                }
            }else{
                $response['success'] = false;
                $response['message'] = 'Form Action Required';
            }

        }

        echo json_encode($response);
        exit;

    }

    public function get_user()
    {
        $response = array();

        $id = $this->input->get('id');

        if ($id) {
            $res = $this->users_model->getUser($id);
            if ($res) {
                $response['user'] = $res;
                $response['success'] = TRUE;
            }else{
                $response['message'] = 'Error retrieving data';
                $response['success'] = FALSE;
            }
        }


        echo json_encode($response);
        exit;
    }


}
