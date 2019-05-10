<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('UserModel'));
    }

//     -------------------------------------- Helper Functions------------------------------------------    //

    function validate_mobile($mobile)
    {
        return preg_match('/^[0-9]{10}+$/', $mobile);
    }

    function validate_email($email)
    {
        return preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email);
    }


//    --------------------------------------API Functions------------------------------------------    //

    public function addUser()
    {

        $jsonArray = json_decode(file_get_contents('php://input'), true);

        $hashedPassword = sha1($jsonArray['password']);

        $data = Array("city" => $jsonArray['city'], "mobileNo" => $jsonArray['mobileNo'], "email" => $jsonArray['email'], "password" => $hashedPassword);

        if ($this->validate_email($jsonArray['email'])) {

            if ($this->validate_mobile($jsonArray['mobileNo'])) {

                if ($this->UserModel->addUserToTable($data)) {

                    $data = $this->UserModel->getUserFromTableWithEmail($jsonArray['email']);

                    $result = Array("message" => "Registered Successfully", "data" => $data, "success" => true);
                    echo json_encode($result);

                } else {

                    $result = Array("message" => "Registration Failed", "data" => Array(), "success" => false);
                    echo json_encode($result);

                }


            } else {
                $result = Array("message" => "Invalid Mobile Number", "data" => Array(), "success" => false);
                echo json_encode($result);
            }


        } else {
            $result = Array("message" => "Invalid Email", "data" => Array(), "success" => false);
            echo json_encode($result);
        }

    }

    public function getUser()
    {
        $jsonArray = json_decode(file_get_contents('php://input'), true);

        $data = $this->UserModel->getUserFromTableWithEmail($jsonArray['email']);


        if (sizeof($data) > 0) {
            if (sha1($jsonArray['password']) == $data[0]['password']) {
                $result = Array("message" => "Login Success", "data" => $data[0], "success" => true);
                echo json_encode($result);
            } else {
                $result = Array("message" => "Invalid Password", "data" => Array(), "success" => false);
                echo json_encode($result);
            }

        } else {
            $result = Array("message" => "Invalid Email", "data" => Array(), "success" => false);
            echo json_encode($result);
        }
    }

    public function addAddress()
    {
        $jsonArray = json_decode(file_get_contents('php://input'), true);

        $data = Array("userId" => $jsonArray['userId'], "name" => $jsonArray['name'], "house" => $jsonArray['house'], "street" => $jsonArray['street'], "locality" => $jsonArray['locality'], "city" => $jsonArray['city'], "pincode" => $jsonArray['pincode']);


        if ($this->UserModel->addAddressToTable($data)) {
            $result = Array("message" => "Register Success", "success" => true);
            echo json_encode($result);
        } else {
            $result = Array("message" => "Register Failure", "success" => false);
            echo json_encode($result);
        }
    }

    public function getAddress()
    {
        $jsonArray = json_decode(file_get_contents('php://input'), true);

        $data = $this->UserModel->getAddressesFromTable($jsonArray['userId']);

        if (sizeof($data) > 0) {
            $result = Array("message" => "Success", "data" => $data, "success" => true);
            echo json_encode($result);
        } else {
            $result = Array("message" => "Failure", "data" => Array(), "success" => false);
            echo json_encode($result);
        }
    }


}
