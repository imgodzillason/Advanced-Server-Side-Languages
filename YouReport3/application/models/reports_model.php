<?php
/**
 * Created by IntelliJ IDEA.
 * User: JacobCollins
 * Date: 3/16/16
 * Time: 6:14 PM
 */

class Reports_model extends CI_Model{
    //call database id in reports table...linked to reports.php display function
    public function get_report($id){

        $this->db->where('id', $id);

        $query = $this->db->get('reports'); //query report table

        return $query->row();
    }

    public function get_reports(){

        $query = $this->db->get('reports');

        return $query->result();


    }

    public function create_report($data){ //create report method

        $insert_query = $this->db->insert('reports', $data); //insert into database

        return $insert_query;

    }

    public function edit_report($report_id, $data){ //edit report function  and receive report id and data

        $this->db->where('id', $report_id);
        $this->db->update('reports', $data);

        return true;


    }

    public function get_reports_info($report_id){ //get report information for editing

        $this->db->where('id', $report_id); //search database and assign id to variable

        $get_data = $this->db->get('reports'); //get data set to get info from reports table

        return $get_data->row(); //return row in reports table


    }




}


?>