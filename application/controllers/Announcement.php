<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Announcement extends CI_Controller {

	function __construct(){
        parent::__construct();
        is_logged_in($this->session->userdata('id'));
		$this->load->model('users_model');
		$this->load->model('announcement_model');

	    $styles = array(
			'assets/lib/datatables/jquery.dataTables.css',
			'assets/lib/highlightjs/github.css',
			'assets/lib/select2/css/select2.min.css',
			'assets/lib/summernote/summernote-bs4.css',
            'assets/css/toastr.min.css',
            'assets/css/bootstrap-tagsinput.css',
        );

        $js = array(
			'assets/lib/highlightjs/highlight.pack.js',
			'assets/lib/datatables/jquery.dataTables.js',
			'assets/lib/datatables-responsive/dataTables.responsive.js',
			'assets/lib/select2/js/select2.min.js',
			'assets/js/toastr.min.js',
            'assets/lib/summernote/summernote-bs4.min.js',
            'assets/js/bootstrap-tagsinput.js',
            'assets/js/announcement.js'
            
        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Admin - Announcement');
	    $this->template->set_template('admin');

    }

	public function index()
	{        
        $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
		$this->template->load('announcement/index');
    }
    
    public function all()
    {
        $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
        $this->template->load('announcement/all');
    }
	
	public function datatable()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->announcement_model->getAnnouncement();

        $data = [];
        $content = '';

        foreach($query->result() as $r) {

            $author = ($r->user_id) ? $r->first_name . ' ' . $r->last_name : 'N/A' ;
			$created = date('F jS Y h:i:sa', strtotime($r->created_at));
			$edit_btn = '<a href="' . base_url() . 'admin/announcement/edit/' . $r->id . '" data-id="' . $r->id . '" class="btn btn-success btn-small btn-icon btnEdit"><div><i class="fa fa-fw fa-edit"></i></div></a>';
			$delete_btn = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-danger btn-small btn-icon mg-r-5 btnDelete"><div><i class="fa fa-fw fa-trash"></i></div></a>';
            $action = $edit_btn . ' ' . $delete_btn;
            $show_post = ($r->show_post) ? 'Active' : 'Inactive' ;
            $content = '<a href="' . base_url() . 'admin/announcement/show/' . $r->id . '" data-id="' . $r->id . '" class="btn btn-warning btnViewContent">View</a>';

            $data[] = array(

                $author,
				$content,
				$show_post,
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
        $action = trim($this->input->post('action'));

        if ($action) {
            if ($action == 'add') {

                $this->form_validation->set_rules('title','Post Title', 'required');
                $this->form_validation->set_rules('content','Post Content', 'required');

                if ($this->form_validation->run() == FALSE) {

                    $response['validation_errors'] = validation_errors();
                    $response['success'] = FALSE;

                }else{

                    if (!empty($_FILES['post_img']['name'])) {

                        $file_name = md5(time() . '_' . $this->input->post('title'));
                        $config['upload_path']          = './uploads/posts/';
                        $config['allowed_types']        = 'jpeg|jpg|png';
                        // $config['max_size']             = 100;
                        // $config['max_width']            = 1024;
                        // $config['max_height']           = 768;
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
                                $response['message'] = 'Error saving user';

                            }

                        }
                    }else{

                        $res = $this->announcement_model->addPost();

                        if ($res) {

                            $response['success'] = TRUE;
                            $response['message'] = 'User updated successfully';

                        }else{

                            $response['success'] = FALSE;
                            $response['message'] = 'Error saving post';

                        }
                    }

                }
            }elseif ($action == 'update') {

                $id = $this->input->post('id');

                $post = $this->announcement_model->getPost($id);

                $this->form_validation->set_rules('title','Post Title', 'required');
                $this->form_validation->set_rules('content','Post Content', 'required');

                if ($this->form_validation->run() == FALSE) {

                    $response['validation_errors'] = validation_errors();
                    $response['success'] = FALSE;

                }else{

                    if (!empty($_FILES['post_img']['name'])) {

                        $file_name = md5(time() . '_' . $this->input->post('title'));
                        $config['upload_path']          = './uploads/posts/';
                        $config['allowed_types']        = 'jpeg|jpg|png';
                        // $config['max_size']             = 100;
                        // $config['max_width']            = 1024;
                        // $config['max_height']           = 768;
                        $config['file_name']            = $file_name;

                        $this->load->library('upload', $config);

                        if ( ! $this->upload->do_upload('post_img')){

                            $response['validation_errors'] = $this->upload->display_errors();
                            $response['success'] = FALSE;

                        }else{

                            $upload_data = $this->upload->data();
                            $res = $this->announcement_model->updatePost($upload_data);

                            if ($res) {

                                $response['success'] = TRUE;
                                $response['message'] = 'User updated successfully';

                            }else{

                                $response['success'] = FALSE;
                                $response['message'] = 'Error saving post';

                            }

                        }
                    }else{
                        
                        $res = $this->announcement_model->updatePost();

                        if ($res) {

                            $response['success'] = TRUE;
                            $response['message'] = 'Post updated successfully';

                        }else{

                            $response['success'] = FALSE;
                            $response['message'] = 'Error updating post';

                        }
                    }

                }
            }elseif ($action == 'delete') {

                $id = $this->input->post('id');
                $res = $this->announcement_model->deletePost($id);

                if ($res) {

                    $response['success'] = TRUE;
                    $response['message'] = 'Post deleted successfully';

                }else{

                    $response['success'] = FALSE;
                    $response['message'] = 'Error deleting post';

                }
            }
        }

        
        echo json_encode($response);
        exit;
    }

    public function show_post($id)
    {
        if ($id) {
            $post = $this->announcement_model->getPost($id);
            if ($post) {
                $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
                $this->template->load_sub('post', $post);
                $this->template->load('announcement/single-post');
            }else{
                redirect('404_override');
            }
        }else{
            redirect('404_override');
        }
        
    }

    public function edit_post($id)
    {
        if ($id) {
            $post = $this->announcement_model->getPost($id);
            if ($post) {
                $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
                $this->template->load_sub('post', $post);
                $this->template->load('announcement/edit-post');
            }else{
                redirect('404_override');
            }
        }else{
            redirect('404_override');
        }
    }

    public function send_text()
    {
        $this->template->set_title('Admin - Text Messages');
        $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
		$this->template->load('announcement/send-text');
    }

    public function send_text_submit()
    {
        $response = array();
        
        $this->form_validation->set_rules('numbers[]','Number', 'required|regex_match[^(09|\+639)\d{9}$^]',
            array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));
        $this->form_validation->set_rules('content','Content', 'required');

        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $numbers = $this->input->post('numbers'); 
            $content = $this->input->post('content');
            $num_arr = explode (",", $numbers);
            $_isGoodNumber = TRUE;

            if (!empty($num_arr)) {
            
                foreach ($num_arr as $num) {
                    if(!preg_match('^(09|\+639)\d{9}$^', $num)) {
                        $_isGoodNumber = FALSE;
                    }
                }
            }
    
            if ($_isGoodNumber) {
                foreach ($num_arr as $num) {
                    $result = $this->itexmo($num, $content);
                }
            }
            
            if ($result == ""){
                $response['success'] = FALSE;
                $response['message'] = 'No response from server';	
            }else if ($result == 0){
                $response['success'] = TRUE;
                $response['message'] = 'Message Sent!';	
            }
            else{	
                $response['success'] = FALSE;
                $response['message'] = "Error Num ". $result . " was encountered!";
            }

        }

        echo json_encode($response);
        exit;
    }

    public function test(){
        $result = $this->itexmo('09171576436', 'sample message');
        if ($result == ""){
            echo "iTexMo: No response from server!!!
            Please check the METHOD used (CURL or CURL-LESS). If you are using CURL then try CURL-LESS and vice versa.	
            Please CONTACT US for help. ";	
        }else if ($result == 0){
            echo "Message Sent!";
        }
        else{	
            echo "Error Num ". $result . " was encountered!";
        }
    }

    //##########################################################################
    // ITEXMO SEND SMS API - PHP - CURL METHOD
    // Visit www.itexmo.com/developers.php for more info about this API
    //##########################################################################
    function itexmo($number,$message,$apicode = ITEXTMO_API_CODE){
        $ch = curl_init();
        $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
        curl_setopt($ch, CURLOPT_URL,"https://www.itexmo.com/php_api/api.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, 
                http_build_query($itexmo));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        return curl_exec ($ch);
        curl_close ($ch);
    }
    //##########################################################################


}
