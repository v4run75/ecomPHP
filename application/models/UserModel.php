<?php

class UserModel extends CI_Model
{


    public function addUserToTable($data)
    {
        $count = $this->db->insert('users', $data);
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserFromTable($email, $password)
    {
        $this->db->select('*');
        $this->db->from('users');

        $whereClause = Array('email' => $email, 'password' => $password);

        $this->db->where($whereClause);

        $query = $this->db->get();
        return $query->result_array();
    }

//    public function getHash($email)
//    {
//        $this->db->select('password');
//        $this->db->from('users');
//
//        $whereClause=Array('email'=>$email);
//
//        $this->db->where($whereClause);
//
//        $query = $this->db->get();
//        return $query->row('password');
//    }

    public function getUserFromTableWithEmail($email)
    {
        $this->db->select('*');
        $this->db->from('users');

        $whereClause=Array('email'=>$email);

        $this->db->where($whereClause);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function addAddressToTable($data)
    {
        $count=$this->db->insert('addresses',$data);
        if ($count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getAddressesFromTable($userId)
    {
        $this->db->select('*');
        $this->db->from('addresses');

        $whereClause = Array('userId' => $userId);

        $this->db->where($whereClause);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function updatePassword($userId,$password)
    {
        $this->db->set('password',$password);
        $this->db->where('userId',$userId);
        $this->db->update('users');

        return true;
    }

}