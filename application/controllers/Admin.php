<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
	    parent::__construct();
			

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
		$this->template->load('admin/index');
    }


}
