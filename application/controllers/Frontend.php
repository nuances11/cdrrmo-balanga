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
