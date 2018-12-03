<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
	    parent::__construct();
		$this->load->model('announcement_model');
		$this->load->model('users_model');

	    $styles = array(

        );

        $js = array(

        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Admin - Dashboard');
	    $this->template->set_template('admin');

  	}

	public function index()
	{   
        $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
		$this->template->load_sub('announcements', $this->announcement_model->getIndexPost(5));
		$this->template->load('admin/index');
	}
	
	public function login()
	{
		$this->template->set_title('Admin - Login');
	    $this->template->set_template('login');
		$this->template->load('admin/login');
	}

	public function user_login()
	{
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
		$this->form_validation->set_rules('email','Email', 'required|valid_email');
		$this->form_validation->set_rules('password','Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('login_error', validation_errors());
			redirect('admin/login', 'refresh');

		}else{

			$creds = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
			);

			$res = $this->users_model->chkUserLogin($creds);

			if ($res) {

				$session_data = array(
					'id' => $res->id,
					'email' => $res->email,
					'fullname' => $res->first_name . ' ' . $res->last_name,
					'user_type' => $res->user_type
				);
				// Add user data in session
				$this->session->set_userdata($session_data);
				redirect('admin', 'refresh');
			}else{
				$this->session->set_flashdata('login_error', '<div class="alert alert-danger">Username or Password Incorrect</div>');
				redirect('admin/login', 'refresh');
			}

		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		$this->session->set_flashdata('login_error', '<div class="alert alert-danger">You have been looged out.</div>');
		redirect('admin/login', 'refresh');
	}


}
