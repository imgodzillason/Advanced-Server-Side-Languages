<?php
/**
 * Created by IntelliJ IDEA.
 * User: JacobCollins
 * Date: 3/12/16
 * Time: 4:12 PM
 */

class User_model extends CI_Model {

    /*public function get_users($user_id, $username){

        $this->db->where([

            'id' => $user_id,
            'username' => $username

        ]);

        //$this->db->where('id', $user_id);

        $query = $this->db->get('users');
        return $query->result();

        //$query = $this->db->query("SELECT * FROM users");

        //return $query->num_fields(); //this will give rows count

        //return $query->num_rows(); //this will give the columns count



        //$query = $this->db->get('users');

        return $query->result();

    }


    public function create_users($data){

        $this->db->insert('users', $data);

    }

    public function update_users($data, $id){

        $this->db->where(['id' => $id]);

        $this->db->update('users', $data);

    }

    public function delete_users($id){

        $this->db->where(['id' => $id]);
        $this->db->delete('users');

    }*/

    public function login_user($username, $password){

        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result = $this->db->get('users');

        if($result->num_rows() == 1){

            return $result->row(0)->id;

        } else{

            return false;

        }

    }


}