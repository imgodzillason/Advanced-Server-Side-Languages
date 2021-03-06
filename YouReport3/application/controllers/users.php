<?php
/**
 * Created by IntelliJ IDEA.
 * User: JacobCollins
 * Date: 3/12/16
 * Time: 2:26 PM
 */

class Users extends CI_Controller{

    public function show($user_id){
        /*$this->load->model('user_model'); */

        $data['results'] = $this->user_model->get_users($user_id, 'Jacob');

        $this->load->view('user_view', $data);

        // foreach ($result as $object) {
         //   echo $object->username . "<br/>";
        //}


    }

/*
    public function insert(){

        $username = 'Peter';
        $password = 'secret';

        $this->user_model->create_users([

            'username' => $username,
            'password' => $password

        ]);

    }

    public function update(){
        $id = 3;
        $username = 'William';
        $password = 'not so secret';

        $this->user_model->update_users([

            'username' => $username,
            'password' => $password

        ], $id);

    }

    public function delete(){

        $id = 3;
        $this->user_model->delete_users($id);
    }
*/

    public function register(){ //form validation rules for forms

        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|min_length[3]|valid_email');
        $this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|max_length[10]');
        $this->form_validation->set_rules('mobile_carrier', 'Mobile Carrier', 'required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');

        if($this->form_validation->run() == FALSE){ //redirect if info is not entered correctly, show errors

          

           $data['main_view'] = 'users/register_view';
           $this->load->view('layouts/main', $data);

        } else{

           
            If($this->user_model->create_user()){ //notify user they have registered

                $this->session->set_flashdata('user_registered', 'User has been registered. Please log in.');

                redirect('home/index');
            } else{

            }
        }
    }


    public function login(){ //set form validation rules for login form

      $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]');
      $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[3]');
      $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[3]|matches[password]');


        if($this->form_validation->run() == FALSE){

            $data = array( //show form validation errors

                'errors' => validation_errors()

            );

            $this->session->set_flashdata($data); //redirect home if login is successul

            redirect('home');

        } else{

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user_id = $this->user_model->login_user($username, $password);

            if($user_id){
                    //array for sessions
                $user_data = array(

                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true

                );

            $this->session->set_userdata($user_data); //begin user session

            $this->session->set_flashdata('login_success', 'You are now logged in'); //notify user they are logged in

            $data['main_view'] = "admin_view"; //load admin view

            $this->load->view('layouts/main', $data);

            //redirect('home/index');

            } else{ //notify of login failure

                $this->session->flashdata('login_failed', 'Sorry, you are not logged in');
                redirect('home/index');

            }

        }

    }

    public function logout(){ //session destroy upon logout

        $this->session->sess_destroy();
        redirect('home/index');

    }
    

}