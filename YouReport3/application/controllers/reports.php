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

           /*join phone and carrier*/

            $user_id = $this->session->userdata('user_id');

            $user_id  = $this->reports_model->show_user_details($user_id);

            $join_phone = $user_id->phone_number . $user_id->mobile_carrier;

           
            $data = array( //set array to pull in data

                'report_user_id' => $this->session->userdata('user_id'),
                'report_name' => $this->input->post('report_name'),
                'report_body' => $this->input->post('report_body'),
                'report_join_phone_carrier' => $join_phone

            );




            if($this->reports_model->create_report($data)){ //check for data and notify user report has been created

                $this->session->set_flashdata('report_created', "<span class=\"glyphicon glyphicon glyphicon-ok\" aria-hidden=\"true\"></span>" . 'Your report has been created.');

                $config = array(

                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_port' => 25,
                    'smtp_user' => 'imgodzillason@gmail.com',
                    'smtp_pass' => 'T08HRy64oL',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'wordwrap' => TRUE
                );

                $message = '';
                $this->load->library('email', $config);
                $this->email->set_newline("\r\n");
                $this->email->from('imgodzillason@gmail.com');
                $this->email->to($join_phone);
                $this->email->subject('report_name');
                $this->email->message('report_body');

                if($this->email->send()){

                    redirect('reports/index'); //redirect to index

                } else{

                    echo 'Your email did not send successfully';
                    redirect('reports/index');


                }


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

                $this->session->set_flashdata('report_updated', '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>' . 'Your report has been updated.');

                redirect('reports/index'); //redirect to index
            }

        }


    }


    public function delete($report_id){

        $this->reports_model->delete_report($report_id);

        $this->session->set_flashdata('report_deleted', '<span class="glyphicon glyphicon glyphicon-ok" aria-hidden="true"></span>' . 'Your report has been deleted.');

        redirect('reports/index'); //redirect to index

    }

}

