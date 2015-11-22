<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IncOne extends CI_Model {

    function __construct(){
        // Call the Model constructor
        parent::__construct();
    }
    
    //GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS
    //GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS
    //GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS GETTERS

    /*function getTravellerId(){
        return $this->$employee_id;
    }*/
    
    //SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS
    //SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS
    //SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS SETTERS
    
    /*function setTravellerId($employee_id){
        $this->employee_id = $employee_id;
    }*/
    
    //DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS
    //DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS
    //DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS DB FUNCTIONS
    
    function insertTravelItems($newTravelItems){
        //$newTravel = json_decode($this->input>post('newTravel'));
        /*$newTravel = array(
            'traveller_id' => '11318317' ,
            'purpose' => 'sample' ,
            'start_date' => date("2015/07/12") ,
            'end_date' => date("2015/08/13") ,
            'mode_of_transportation' => 'Air'
        );*/
        //print '<pre>';
        //print_r($this->input->post('newTravel'));
        //print '</pre>';
//        $this->db->insert_batch('travel_items', $newTravelItems);
    }
    
    function checkIncident1(){
        $query = $this->db->get_where('incident_lrt1', array('id' => (((int)$this->input->post('hour'))-3)) , 1000, 0);
        echo json_encode($query->result());
    }
    
    /*function insert_entry(){
        $this->title   = $_POST['title']; // please read the below note
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->insert('entries', $this);
    }

    function update_entry(){
        $this->title   = $_POST['title'];
        $this->content = $_POST['content'];
        $this->date    = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }*/

}


?>