<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('announcement_model');
		$this->load->model('contents_model');
			

	    $styles = array(

        );

        $js = array(
            'assets/frontend/js/frontend.js',
        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('CDRRMO - Balanga');
	    $this->template->set_template('frontend');

      }
      
	public function index()
	{
		$this->template->load_sub('announcements', $this->announcement_model->getIndexPost(5));
		$this->template->load('frontend/index');
	}

	public function show_post($id)
    {
        if ($id) {
            $post = $this->announcement_model->getPost($id);
            if ($post) {
                $styles = array(
                    'assets/frontend/css/blog.css',
                );
        
                $js = array(
        
                );
        
                $this->template->set_additional_css($styles);
                $this->template->set_additional_js($js);
                
                $data = [
                    'title' => $post->title
                ];
                $this->template->load_sub('header', $data);
                $this->template->load_sub('announcements', $this->announcement_model->getIndexPost(5));
                $this->template->load_sub('post', $post);
                
                $this->template->load('frontend/single-post');
            }else{
                redirect('404_override');
            }
        }else{
            redirect('404_override');
        }
        
    }

    public function contactus()
    {
        $data = [
            'title' => 'Contact Us'
        ];
        $this->template->load_sub('header', $data);
        $this->template->load('frontend/contact-us');
    }

    public function contactus_send()
    {   

        $count_uploaded_files = count( $_FILES['images']['name'] );

        if ($count_uploaded_files > 0) {

            $this->form_validation->set_rules('images[]','Upload image','callback_fileupload_check');

        }
        
        $response = array();

        $this->form_validation->set_rules('first_name','First Name', 'required');
        $this->form_validation->set_rules('last_name','Last Name', 'required');
        $this->form_validation->set_rules('address','Address', 'required');
        $this->form_validation->set_rules('phone_number','Phone Number', 'required|regex_match[^(09|\+639)\d{9}$^]',
            array('regex_match' => 'Please provide a valid %s <strong>ex: 09 or +639</strong>'));


        if ($this->form_validation->run() == FALSE) {

            $response['validation_errors'] = validation_errors();
            $response['success'] = FALSE;

        }else{

            $res = $this->contents_model->addContactDetails(serialize($this->_uploaded));

            if ($res) {

                $response['success'] = TRUE;
                $response['message'] = 'Message sent!';

            }else{

                $response['success'] = FALSE;
                $response['message'] = 'Error sending message';

            }

        }

        echo json_encode($response);
        exit;
    }

    // now the callback validation that deals with the upload of files
    public function fileupload_check()
    {
        
        // we retrieve the number of files that were uploaded
        $number_of_files = sizeof($_FILES['images']['tmp_name']);
    
        // considering that do_upload() accepts single files, we will have to do a small hack so that we can upload multiple files. For this we will have to keep the data of uploaded files in a variable, and redo the $_FILE.
        $files = $_FILES['images'];
    
        // first make sure that there is no error in uploading the files
        for($i=0;$i<$number_of_files;$i++)
        {
            if($_FILES['images']['error'][$i] != 0)
            {
                // save the error message and return false, the validation of uploaded files failed
                $this->form_validation->set_message('fileupload_check', 'Couldn\'t upload the file(s)');
                return FALSE;
            }
        }
        
        // we first load the upload library
        $this->load->library('upload');
        // next we pass the upload path for the images
        $config['upload_path'] = FCPATH . 'uploads/contact_messages/';
        // also, we make sure we allow only certain type of images
        $config['allowed_types'] = 'gif|jpg|png';
    
        // now, taking into account that there can be more than one file, for each file we will have to do the upload
        for ($i = 0; $i < $number_of_files; $i++)
        {
            $config['file_name'] = md5(time() . '_' . $i);
            $_FILES['images']['name'] = $files['name'][$i];
            $_FILES['images']['type'] = $files['type'][$i];
            $_FILES['images']['tmp_name'] = $files['tmp_name'][$i];
            $_FILES['images']['error'] = $files['error'][$i];
            $_FILES['images']['size'] = $files['size'][$i];

            
            //now we initialize the upload library
            $this->upload->initialize($config);
            if ($this->upload->do_upload('images'))
            {
                $this->_uploaded[$i] = $this->upload->data();
            }
            else
            {
                $this->form_validation->set_message('fileupload_check', $this->upload->display_errors());
                return FALSE;
            }
        }
        return TRUE;
    }

    public function hazard_map()
    {
        $data = [
            'title' => 'Hazard Map'
        ];
        $this->template->load_sub('header', $data);
        $this->template->load_sub('flood_data', $this->contents_model->getallFloodData());
        $this->template->load_sub('affected_population', $this->contents_model->getallAffectedPopulationData());
        $this->template->load_sub('announcements', $this->announcement_model->getIndexPost(5));
        $this->template->load('frontend/hazard-map');   
    }

    public function evacuation()
    {
        $data = [
            'title' => 'Evacuation'
        ];
        $this->template->load_sub('header', $data);
        $this->template->load_sub('announcements', $this->announcement_model->getIndexPost(5));
        $this->template->load_sub('vehicle_and_drivers', $this->contents_model->getallVehicleAndDriverData());
        $this->template->load_sub('evacuation_centers', $this->contents_model->getallEvacuationCentersData());
        $this->template->load('frontend/evacuation');   

    }

    public function without_disaster()
    {
        $data = [
            'title' => 'Without Disaster'
        ];
        $this->template->load_sub('header', $data);
        $this->template->load_sub('announcements', $this->announcement_model->getIndexPost(5));
        $this->template->load('frontend/without-disaster'); 
    }

    public function early_warning_risk()
    {
        $data = [
            'title' => 'Early Warning Risk'
        ];
        $this->template->load_sub('header', $data);
        $this->template->load_sub('announcements', $this->announcement_model->getIndexPost(5));
        $this->template->load('frontend/early-warning-risk'); 
    }

    public function history()
    {
        $data = [
            'title' => 'History'
        ];
        $this->template->load_sub('header', $data);
        $this->template->load_sub('announcements', $this->announcement_model->getIndexPost(5));
        $this->template->load('frontend/history'); 
    }    

    public function drmm(){
        $data = [
            'title' => 'Established DRRM Office Plan'
        ];
        $this->template->load_sub('header', $data);
        $this->template->load_sub('announcements', $this->announcement_model->getIndexPost(5));
        $this->template->load('frontend/ndrmm-office');
    }

    public function organizational_chart()
    {
        $data = [
            'title' => 'Organizational Chart'
        ];
        $this->template->load_sub('header', $data);
        $this->template->load_sub('announcements', $this->announcement_model->getIndexPost(5));
        $this->template->load('frontend/org-chart');
    }

	
}
