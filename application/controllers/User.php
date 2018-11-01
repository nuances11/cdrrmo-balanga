<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
	    parent::__construct();
		$this->load->model('users_model');

	    $styles = array(
			'assets/lib/datatables/jquery.dataTables.css',
			'assets/lib/highlightjs/github.css',
			'assets/lib/select2/css/select2.min.css'
        );

        $js = array(
			'assets/lib/highlightjs/highlight.pack.js',
			'assets/lib/datatables/jquery.dataTables.js',
			'assets/lib/datatables-responsive/dataTables.responsive.js',
			'assets/lib/select2/js/select2.min.js',
			'assets/js/user.js'
        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Admin - Users');
	    $this->template->set_template('admin');

  }

	public function index()
	{        
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


}
