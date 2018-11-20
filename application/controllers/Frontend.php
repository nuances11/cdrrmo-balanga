<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend extends CI_Controller {

	function __construct(){
	    parent::__construct();
			

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
		$this->load->view('welcome_message');
	}
}
