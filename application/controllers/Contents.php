<?php 
class Contents extends CI_Controller 
{
    function __construct(){
	    parent::__construct();
		$this->load->model('users_model');
		$this->load->model('announcement_model');
        $this->load->model('contents_model');
        
        is_logged_in($this->session->userdata('id'));        

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
			'assets/js/contents.js'
        );

        $this->template->set_additional_css($styles);
        $this->template->set_additional_js($js);

	    $this->template->set_title('Admin - Contents');
        $this->template->set_template('admin');
    }

    public function flood()
    {
        $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
        $this->template->load('contents/flood');
    }

    public function flood_dataTable()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->contents_model->getFloodData();

        $data = [];
        $risk ='';

        foreach($query->result() as $r) {

			$edit_btn = '<a href="' . base_url() . 'admin/flood/data/edit/' . $r->id . '" data-id="' . $r->id . '" class="btn btn-success btn-small btn-icon btnEdit"><div><i class="fa fa-fw fa-edit"></i></div></a>';
			$delete_btn = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-danger btn-small btn-icon mg-r-5 btnDelete"><div><i class="fa fa-fw fa-trash"></i></div></a>';
            $action = $edit_btn . ' ' . $delete_btn;
            if ($r->risk == 'High') {
                $risk = '<span style="color:red;font-weight:bold;">High</span>';
            }elseif ($r->risk == 'Medium') {
                $risk = '<span style="color:green;font-weight:bold;">Medium</span>';
            }elseif ($r->risk == 'Low') {
                $risk = '<span style="color:yellow;font-weight:bold;">Low</span>';
            }


            $data[] = array(

                $r->id,
                $r->barangay,
				$risk,
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

    public function flood_do_action()
    {
        $response = array();
        $action = $this->input->post('action');

        if ($action) {
            if ($action == 'add') {
                
                $this->form_validation->set_rules('barangay','Barangay', 'required');
                $this->form_validation->set_rules('risk_level','Risk Level', 'required');

                if ($this->form_validation->run() == FALSE) {

                    $response['validation_errors'] = validation_errors();
                    $response['success'] = FALSE;

                }else{

                    $res = $this->contents_model->addFloodData();

                    if ($res) {

                        $response['success'] = TRUE;
                        $response['message'] = 'Flood Data added successfully';

                    }else{

                        $response['success'] = FALSE;
                        $response['message'] = 'Error adding flood data';

                    }

                }

            }elseif ($action == 'update') {

                $id = $this->input->post('data_id');

                if ($id) {
                    $this->form_validation->set_rules('barangay','Barangay', 'required');
                    $this->form_validation->set_rules('risk_level','Risk Level', 'required');

                    if ($this->form_validation->run() == FALSE) {

                        $response['validation_errors'] = validation_errors();
                        $response['success'] = FALSE;

                    }else{

                        $res = $this->contents_model->updateFloodData($id);

                        if ($res) {

                            $response['success'] = TRUE;
                            $response['message'] = 'Flood Data updated successfully';

                        }else{

                            $response['success'] = FALSE;
                            $response['message'] = 'Error updating flood data';

                        }

                    }
                }
            }elseif ($action == 'delete') {

                $id = $this->input->post('id');
                $res = $this->contents_model->deleteFloodData($id);

                if ($res) {

                    $response['success'] = TRUE;
                    $response['message'] = 'Data deleted successfully';

                }else{

                    $response['success'] = FALSE;
                    $response['message'] = 'Error deleting data';

                }
            }
        }
        
        echo json_encode($response);
        exit;
    }

    public function flood_data_get()
    {
        $response = array();

        $id = $this->input->get('id');

        if ($id) {
            $res = $this->contents_model->floodData($id);
            if ($res) {
                $response['flood'] = $res;
                $response['success'] = TRUE;
            }else{
                $response['message'] = 'Error retrieving data';
                $response['success'] = FALSE;
            }
        }


        echo json_encode($response);
        exit;
    }

    public function affected_population()
    {
        $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
        $this->template->load('contents/affected-population');
    }

    public function affected_population_dataTable(){
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->contents_model->getAffectedPopulationData();

        $data = [];
        $risk ='';

        foreach($query->result() as $r) {

			$edit_btn = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-success btn-small btn-icon btnEdit"><div><i class="fa fa-fw fa-edit"></i></div></a>';
			$delete_btn = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-danger btn-small btn-icon mg-r-5 btnDelete"><div><i class="fa fa-fw fa-trash"></i></div></a>';
            $action = $edit_btn . ' ' . $delete_btn;
            if ($r->high_risk) {
                $risk = '<span style="color:red;font-weight:bold;">High</span>';
            }


            $data[] = array(

                $r->id,
                $r->barangay,
                $r->persons_affected,
                $r->families,
				$risk,
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

    public function affected_population_do_action()
    {
        $response = array();
        $action = $this->input->post('action');

        if ($action) {
            if ($action == 'add') {
                
                $this->form_validation->set_rules('barangay','Barangay', 'required');
                $this->form_validation->set_rules('persons_affected','Persons Affected', 'required|numeric');
                $this->form_validation->set_rules('families_affected','Families Affected', 'required|numeric');

                if ($this->form_validation->run() == FALSE) {

                    $response['validation_errors'] = validation_errors();
                    $response['success'] = FALSE;

                }else{

                    $res = $this->contents_model->addAffectedPopulationData();

                    if ($res) {

                        $response['success'] = TRUE;
                        $response['message'] = 'Data added successfully';

                    }else{

                        $response['success'] = FALSE;
                        $response['message'] = 'Error adding data';

                    }

                }

            }elseif ($action == 'update') {
                $id = $this->input->post('data_id');

                if ($id) {
                    $this->form_validation->set_rules('barangay','Barangay', 'required');
                    $this->form_validation->set_rules('persons_affected','Persons Affected', 'required|numeric');
                    $this->form_validation->set_rules('families_affected','Families Affected', 'required|numeric');

                    if ($this->form_validation->run() == FALSE) {

                        $response['validation_errors'] = validation_errors();
                        $response['success'] = FALSE;

                    }else{

                        $res = $this->contents_model->updateAffectedPopulationData($id);

                        if ($res) {

                            $response['success'] = TRUE;
                            $response['message'] = 'Data updated successfully';

                        }else{

                            $response['success'] = FALSE;
                            $response['message'] = 'Error updating data';

                        }

                    }
                }
            }elseif ($action == 'delete') {
                $id = $this->input->post('id');
                $res = $this->contents_model->deleteAffectedPopulationData($id);

                if ($res) {

                    $response['success'] = TRUE;
                    $response['message'] = 'Data deleted successfully';

                }else{

                    $response['success'] = FALSE;
                    $response['message'] = 'Error deleting data';

                }
            }
        }

        echo json_encode($response);
        exit();
    }

    public function affected_population_data_get()
    {
        $response = array();

        $id = $this->input->get('id');

        if ($id) {
            $res = $this->contents_model->affectedPopulationData($id);
            if ($res) {
                $response['affected'] = $res;
                $response['success'] = TRUE;
            }else{
                $response['message'] = 'Error retrieving data';
                $response['success'] = FALSE;
            }
        }


        echo json_encode($response);
        exit;
    }

    public function vehicles_and_drivers()
    {
        $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
        $this->template->load('contents/vehicles-and-drivers');
    }

    public function vehicles_and_drivers_dataTable(){
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->contents_model->getVehicleAndDriver();

        $data = [];
        $risk ='';

        foreach($query->result() as $r) {

			$edit_btn = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-success btn-small btn-icon btnEdit"><div><i class="fa fa-fw fa-edit"></i></div></a>';
			$delete_btn = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-danger btn-small btn-icon mg-r-5 btnDelete"><div><i class="fa fa-fw fa-trash"></i></div></a>';
            $action = $edit_btn . ' ' . $delete_btn;


            $data[] = array(

                $r->id,
                $r->vehicle,
                $r->driver,
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

    public function vehicles_and_drivers_do_action()
    {
        $response = array();
        $action = $this->input->post('action');

        if ($action) {
            if ($action == 'add') {
                
                $this->form_validation->set_rules('vehicle','Vehicle', 'required');
                $this->form_validation->set_rules('driver','Driver', 'required');

                if ($this->form_validation->run() == FALSE) {

                    $response['validation_errors'] = validation_errors();
                    $response['success'] = FALSE;

                }else{

                    $res = $this->contents_model->addVehicleAndDriver();

                    if ($res) {

                        $response['success'] = TRUE;
                        $response['message'] = 'Data added successfully';

                    }else{

                        $response['success'] = FALSE;
                        $response['message'] = 'Error adding data';

                    }

                }

            }elseif ($action == 'update') {
                $id = $this->input->post('data_id');

                if ($id) {
                    $this->form_validation->set_rules('vehicle','Vehicle', 'required');
                    $this->form_validation->set_rules('driver','Driver', 'required');

                    if ($this->form_validation->run() == FALSE) {

                        $response['validation_errors'] = validation_errors();
                        $response['success'] = FALSE;

                    }else{

                        $res = $this->contents_model->updateVehicleAndDriver($id);

                        if ($res) {

                            $response['success'] = TRUE;
                            $response['message'] = 'Data updated successfully';

                        }else{

                            $response['success'] = FALSE;
                            $response['message'] = 'Error updating data';

                        }

                    }
                }
            }elseif ($action == 'delete') {
                $id = $this->input->post('id');
                $res = $this->contents_model->deleteVehicleAndDriver($id);

                if ($res) {

                    $response['success'] = TRUE;
                    $response['message'] = 'Data deleted successfully';

                }else{

                    $response['success'] = FALSE;
                    $response['message'] = 'Error deleting data';

                }
            }
        }

        echo json_encode($response);
        exit();
    }

    public function vehicles_and_drivers_data_get()
    {
        $response = array();

        $id = $this->input->get('id');

        if ($id) {
            $res = $this->contents_model->vehicleAndDriverData($id);
            if ($res) {
                $response['data_details'] = $res;
                $response['success'] = TRUE;
            }else{
                $response['message'] = 'Error retrieving data';
                $response['success'] = FALSE;
            }
        }


        echo json_encode($response);
        exit;
    }

    // Evacuation Area

    public function evacuation_centers()
    {
        $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
        $this->template->load('contents/evacuation-centers');
    }

    public function evacuation_centers_dataTable(){
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->contents_model->getEvacuationCenters();

        $data = [];
        $risk ='';

        foreach($query->result() as $r) {

			$edit_btn = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-success btn-small btn-icon btnEdit"><div><i class="fa fa-fw fa-edit"></i></div></a>';
			$delete_btn = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-danger btn-small btn-icon mg-r-5 btnDelete"><div><i class="fa fa-fw fa-trash"></i></div></a>';
            $action = $edit_btn . ' ' . $delete_btn;


            $data[] = array(

                $r->id,
                $r->evacuation_center,
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

    public function evacuation_centers_do_action()
    {
        $response = array();
        $action = $this->input->post('action');

        if ($action) {
            if ($action == 'add') {
                
                $this->form_validation->set_rules('evacuation_center','Evacuation Center', 'required');

                if ($this->form_validation->run() == FALSE) {

                    $response['validation_errors'] = validation_errors();
                    $response['success'] = FALSE;

                }else{

                    $res = $this->contents_model->addEvacuationCenters();

                    if ($res) {

                        $response['success'] = TRUE;
                        $response['message'] = 'Data added successfully';

                    }else{

                        $response['success'] = FALSE;
                        $response['message'] = 'Error adding data';

                    }

                }

            }elseif ($action == 'update') {
                $id = $this->input->post('data_id');

                if ($id) {

                    $this->form_validation->set_rules('evacuation_center','Evacuation Center', 'required');

                    if ($this->form_validation->run() == FALSE) {

                        $response['validation_errors'] = validation_errors();
                        $response['success'] = FALSE;

                    }else{

                        $res = $this->contents_model->updateEvacuationCenters($id);

                        if ($res) {

                            $response['success'] = TRUE;
                            $response['message'] = 'Data updated successfully';

                        }else{

                            $response['success'] = FALSE;
                            $response['message'] = 'Error updating data';

                        }

                    }
                }
            }elseif ($action == 'delete') {
                $id = $this->input->post('id');
                $res = $this->contents_model->deleteEvacuationCenters($id);

                if ($res) {

                    $response['success'] = TRUE;
                    $response['message'] = 'Data deleted successfully';

                }else{

                    $response['success'] = FALSE;
                    $response['message'] = 'Error deleting data';

                }
            }
        }

        echo json_encode($response);
        exit();
    }

    public function evacuation_centers_data_get()
    {
        $response = array();

        $id = $this->input->get('id');

        if ($id) {
            $res = $this->contents_model->EvacuationCentersData($id);
            if ($res) {
                $response['data_details'] = $res;
                $response['success'] = TRUE;
            }else{
                $response['message'] = 'Error retrieving data';
                $response['success'] = FALSE;
            }
        }


        echo json_encode($response);
        exit;
    }

    public function contact_message()
    {
        $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
        $this->template->load('message/index');
    }

    public function show_message($id)
    {
        if ($id) {
            $message = $this->contents_model->getMessage($id);
            if ($message) {
                $this->template->load_sub('user', $this->users_model->getUser($this->session->userdata['id']));
                $this->template->load_sub('message', $message);
                $this->template->load('message/single-message');
            }else{
                redirect('404_override');
            }
        }else{
            redirect('404_override');
        }
    }

    public function contact_message_dataTable()
    {
        $draw = intval($this->input->get("draw"));
        $start = intval($this->input->get("start"));
        $length = intval($this->input->get("length"));

        $query = $this->contents_model->getMessagesData();

        $data = [];
        $risk ='';

        foreach($query->result() as $r) {

		
			$author = ($r->first_name) ? $r->first_name . ' ' . $r->last_name : 'N/A' ;
			$created = date('F jS Y h:i:sa', strtotime($r->created_at));
			$delete_btn = '<a href="javascript:void(0);" data-id="' . $r->id . '" class="btn btn-danger btn-small btn-icon mg-r-5 btnDelete"><div><i class="fa fa-fw fa-trash"></i></div></a>';
            $action = $delete_btn;
            $content = '<a href="' . base_url() . 'admin/message/show/' . $r->id . '" data-id="' . $r->id . '" class="btn btn-warning btnViewContent">View</a>';

            $data[] = array(

                $r->id,
                $author,
                $r->phone_number,
				$content,
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