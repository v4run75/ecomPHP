<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('ProductModel'));
    }


//    --------------------------------------Getter Helper Functions------------------------------------------    //

    function getCategoriesHelper()
    {
        $data = $this->ProductModel->getCategoriesFromTable();

        foreach ($data as $list) {
            $list['subcategories'] = $this->ProductModel->getSubCategoriesFromTable($list['catId']);
            $newData[] = $list;
        }

        return ($newData);
    }


    public function getAllProductsHelper()
    {
        $data = $this->ProductModel->getAllProductsFromTable();
        return ($data);
    }

//    --------------------------------------API Functions------------------------------------------    //


    public function getProducts()
    {
        $jsonArray = json_decode(file_get_contents('php://input'), true);

        $data = $this->ProductModel->getProductsFromTable($jsonArray['subcatId']);


        if (sizeof($data) > 0) {
            $result = Array("message" => "Product Success", "data" => $data, "success" => true);
            echo json_encode($result);
        } else {
            $result = Array("message" => "Product Failure", "data" => Array(), "success" => false);
            echo json_encode($result);
        }


    }


    public function getCategories()
    {

        $categories = $this->getCategoriesHelper();
        if (sizeof($categories) > 0) {
            $result = Array("message" => "Success", "data" => $categories, "success" => true);
            echo json_encode($result);

        } else {
            $result = Array("message" => "Product Failure", "data" => Array(), "success" => false);
            echo json_encode($result);
        }
    }


    public function getPosts()
    {
        $categories = $this->getCategoriesHelper();
        $products = $this->getAllProductsHelper();

        $result = Array(
            "message" => "Success", "data" =>
                Array(
                    Array("type" => "1", "categories" => $categories, "banner" => Array(), "products" => Array())
                , Array("type" => "2", "categories" => $categories, "banner" => Array(), "products" => Array())
                , Array("type" => "3", "categories" => Array(), "banner" => Array(), "products" => $products)
                ), "success" => true);
        echo json_encode($result);
    }


}