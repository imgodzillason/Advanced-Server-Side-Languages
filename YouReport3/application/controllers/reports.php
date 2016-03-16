<?php

class Reports extends CI_Controller{

    public function __construct()
    {
        parent::__construct(); //calls construct to use in function

        if (!$this->session->userdata('logged_in')){ //check for not logged in

            $this->session->set_flashdata('no_access', 'Sorry, you are not allowed to access this area without being logged in.');

            redirect('home/index'); //redirect home
        }

    }



    public function index(){

        $data['reports'] = $this->reports_model->get_reports(); //pull in model for reports

        $data['main_view'] = "reports/index";
        $this->load->view('layouts/main',$data);
    }

    public function display(){

        $data['main_view'] = "reports/display"; //load reports
        $this->load->view('layouts/main',$data);

    }

}

