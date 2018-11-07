<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {

	function __construct(){
	    parent::__construct();
		$this->load->model('users_model');
		$this->load->model('announcement_model');

	    $styles = array(
			'assets/lib/datatables/jquery.dataTables.css',
			'assets/lib/highlightjs/github.css',
			'assets/lib/select2/css/select2.min.css',
			'assets/lib/summernote/summernote-bs4.css',
			'assets/css/toastr.min.css',
        );

        $js = array(
			'assets/lib/highlightjs/highlight.pack.js',
			'assets/lib/datatables/jquery.dataTables.js',
			'assets/lib/datatables-responsive/dataTables.responsive.js',
			'assets/lib/select2/js/select2.min.js',
			'assets/js/toastr.min.js',
			'assets/lib/summernote/summernote-bs4.min.js',
			'assets/js/announcement.js'
        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Admin - Announcement');
	    $this->template->set_template('admin');

  }

	public function index()
	{        
		$this->template->load('announcement/index');
    }
    
    public function all()
    {
        $this->template->load('announcement/all');
    }
	
	public function datatable()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->announcement_model->getAnnouncement();

        $data = [];
		$group = "";

        foreach($query->result() as $r) {

            $author = ($r->user_id) ? $r->user_id : 'N/A' ;
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

                $r->id,
                $author,
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

        $this->form_validation->set_rules('title','Post Title', 'required');
        $this->form_validation->set_rules('content','Post Content', 'required');

        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $file_name = md5(time() . '_' . $this->input->post('title'));
            $config['upload_path']          = './uploads/posts/';
            $config['allowed_types']        = 'jpeg|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $config['file_name']            = $file_name;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('post_img')){

                $response['validation_errors'] = $this->upload->display_errors();
                $response['success'] = FALSE;

            }else{

                $upload_data = $this->upload->data();
                $res = $this->announcement_model->addPost($upload_data);

                if ($res) {

                    $response['success'] = TRUE;
                    $response['message'] = 'User updated successfully';

                }else{

                    $response['success'] = FALSE;
                    $response['message'] = 'Error saving post';

                }

            }

        }
        echo json_encode($response);
        exit;
    }


}
