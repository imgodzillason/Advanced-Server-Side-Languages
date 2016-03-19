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

    public function display($report_id){

        $data['report_data'] = $this->reports_model->get_report($report_id);


        $data['main_view'] = "reports/display"; //load reports
        $this->load->view('layouts/main',$data);

    }


    public function create(){

        $this->form_validation->set_rules('report_name', 'Report Name', 'trim|required'); //set up validation rules for report name
        $this->form_validation->set_rules('report_body', 'Description', 'trim|required'); //set up validation rules for report body

        if($this->form_validation->run() == FALSE){

            $data['main_view'] = 'reports/create_report';
            $this->load->view('layouts/main', $data);

        } else{

            $data = array( //set array to pull in data

                'report_user_id' => $this->session->userdata('user_id'),
                'report_name' => $this->input->post('report_name'),
                'report_body' => $this->input->post('report_body')

            );


            if($this->reports_model->edit_report($data)){ //check for data and notify user report has been created

                $this->session->set_flashdata('report_updated', 'Your report has been updated.');

                redirect('reports/index'); //redirect to index



            }

        }


    }


    public function edit($report_id){ //create edit function for report editing

        $this->form_validation->set_rules('report_name', 'Report Name', 'trim|required'); //set up validation rules for report name
        $this->form_validation->set_rules('report_body', 'Description', 'trim|required'); //set up validation rules for report body

        if($this->form_validation->run() == FALSE){

            $data['report_data'] = $this->reports_model->get_reports_info($report_id);

            $data['main_view'] = 'reports/edit_report';
            $this->load->view('layouts/main', $data);

        } else{

            $data = array( //set array to pull in data

                'report_user_id' => $this->session->userdata('user_id'),
                'report_name' => $this->input->post('report_name'),
                'report_body' => $this->input->post('report_body')

            );


            if($this->reports_model->edit_report($report_id, $data)){ //check for data and notify user report has been created

                $this->session->set_flashdata('report_updated', 'Your report has been updated.');

                redirect('reports/index'); //redirect to index



            }

        }


    }


    public function delete($report_id){

        $this->reports_model->delete_report($report_id);

        $this->session->set_flashdata('report_deleted', 'Your report has been deleted.');

        redirect('reports/index'); //redirect to index

    }

}

