<?php
/**
 * Created by IntelliJ IDEA.
 * User: JacobCollins
 * Date: 3/16/16
 * Time: 6:14 PM
 */

class Reports_model extends CI_Model{

    public function get_reports(){

        $query = $this->db->get('reports');

        return $query->result();


    }




}


?>