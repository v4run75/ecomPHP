<?php


class ProductModel extends CI_Model
{
    public function getCategoriesFromTable()
    {
        $this->db->select('*');
        $this->db->from('productCategories');

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getSubCategoriesFromTable($catId)
    {
        $this->db->select('subcatId,name,image');
        $this->db->from('productSubcategories');
        $this->db->where('catId', $catId);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getProductsFromTable($subcatId)
    {
        $this->db->select('*');
        $this->db->from('products');
        $this->db->where('subcatId', $subcatId);

        $query = $this->db->get();

        return $query->result_array();
    }

    public function getAllProductsFromTable()
    {
        $this->db->select('*');
        $this->db->from('products');

        $query = $this->db->get();

        return $query->result_array();
    }
}