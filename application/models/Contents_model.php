<?php

class Contents_model extends CI_Model
{
    function __construct(){
        parent::__construct();
            $this->load->database();
    }

    public function getFloodData()
    {
        return $this->db->get("flood");
    }

    public function getAffectedPopulationData()
    {
        return $this->db->get("affected_population");
    }

    public function addFloodData()
    {
        $data = array(
            'barangay' => $this->input->post('barangay'),
            'risk' => $this->input->post('risk_level'),
        );

        $res = $this->db->insert('flood', $data);
        if ($res) {
            return $res;
        }
        return[];
    }

    public function addAffectedPopulationData()
    {
        $data = array(
            'barangay' => $this->input->post('barangay'),
            'persons_affected' => $this->input->post('persons_affected'),
            'families' => $this->input->post('families_affected'),
            'high_risk' => ($this->input->post('high_risk')) ? $this->input->post('high_risk') : NULL,
        );

        $res = $this->db->insert('affected_population', $data);
        if ($res) {
            return $res;
        }
        return[];
    }

    public function floodData($id)
    {
        $this->db->select('*')
                ->from('flood')
                ->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }

        return [];
    }

    public function affectedPopulationData($id)
    {
        $this->db->select('*')
                ->from('affected_population')
                ->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }

        return [];
    }

    public function updateFloodData($id)
    {
        $data = array(
            'barangay' => $this->input->post('barangay'),
            'risk' => $this->input->post('risk_level')
        );

        $this->db->where('id', $id);
        $res = $this->db->update('flood', $data);
        if ($res) {
            return $res;
        }

        return [];
    }

    public function updateAffectedPopulationData($id)
    {
        $data = array(
            'barangay' => $this->input->post('barangay'),
            'persons_affected' => $this->input->post('persons_affected'),
            'families' => $this->input->post('families_affected'),
            'high_risk' => ($this->input->post('high_risk')) ? $this->input->post('high_risk') : NULL,
        );

        $this->db->where('id', $id);
        $res = $this->db->update('affected_population', $data);
        if ($res) {
            return $res;
        }

        return [];
    }

    public function deleteFloodData($id)
    {
        $this->db->where('id', $id);
        $res = $this->db->delete('flood');
        if ($res) {
            return $res;
        }

        return [];
    }

    public function deleteAffectedPopulationData($id)
    {
        $this->db->where('id', $id);
        $res = $this->db->delete('affected_population');
        if ($res) {
            return $res;
        }

        return [];
    }

    public function getVehicleAndDriver()
    {
        return $this->db->get("vehicle_and_driver");
    }

    public function addVehicleAndDriver()
    {
        $data = array(
            'vehicle' => $this->input->post('vehicle'),
            'driver' => $this->input->post('driver')
        );

        $res = $this->db->insert('vehicle_and_driver', $data);
        if ($res) {
            return $res;
        }
        return[];
    }

    public function deleteVehicleAndDriver($id)
    {
        $this->db->where('id', $id);
        $res = $this->db->delete('vehicle_and_driver');
        if ($res) {
            return $res;
        }

        return [];
    }

    public function updateVehicleAndDriver($id)
    {
        $data = array(
            'vehicle' => $this->input->post('vehicle'),
            'driver' => $this->input->post('driver')
        );

        $this->db->where('id', $id);
        $res = $this->db->update('vehicle_and_driver', $data);
        if ($res) {
            return $res;
        }

        return [];
    }

    public function vehicleAndDriverData($id)
    {
        $this->db->select('*')
                ->from('vehicle_and_driver')
                ->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }

        return [];
    }

    // Evacuation Area

    public function getEvacuationCenters()
    {
        return $this->db->get("evacuation_centers");
    }

    public function addEvacuationCenters()
    {
        $data = array(
            'evacuation_center' => $this->input->post('evacuation_center')
        );

        $res = $this->db->insert('evacuation_centers', $data);
        if ($res) {
            return $res;
        }
        return[];
    }

    public function deleteEvacuationCenters($id)
    {
        $this->db->where('id', $id);
        $res = $this->db->delete('evacuation_centers');
        if ($res) {
            return $res;
        }

        return [];
    }

    public function updateEvacuationCenters($id)
    {
        $data = array(
            'evacuation_center' => $this->input->post('evacuation_center')
        );

        $this->db->where('id', $id);
        $res = $this->db->update('evacuation_centers', $data);
        if ($res) {
            return $res;
        }

        return [];
    }

    public function EvacuationCentersData($id)
    {
        $this->db->select('*')
                ->from('evacuation_centers')
                ->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        }

        return [];
    }

}

?>