<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Utility extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('UserModel'));
    }

    public function changePassword()
    {
        $jsonArray = json_decode(file_get_contents('php://input'), true);

        $hashedPassword = sha1($jsonArray['password']);

        if ($this->UserModel->updatePassword($jsonArray['userId'], $hashedPassword)) {
            $result = Array("message" => "Update Success", "success" => true);

            echo json_encode($result);
        } else {
            $result = Array("message" => "Update Failure", "success" => false);
            echo json_encode($result);
        }

    }

}