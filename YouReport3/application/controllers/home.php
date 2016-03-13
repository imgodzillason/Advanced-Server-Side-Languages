<?php
/**
 * Created by IntelliJ IDEA.
 * User: JacobCollins
 * Date: 3/12/16
 * Time: 1:10 PM
 */

class Home extends CI_Controller{

    public function index(){

        $data['main_view'] = "home_view";

        $this->load->view('layouts/main', $data);
    }
}