<?php 

class ProductModel extends CI_Model {

    public function getProducts()
    {
        $this->db->select('id, name, url_image, price, discount, category, brand');
        $this->db->from('product');
        $result = $this->db->get();
        $result = $result->result();
        return $result;
    }

    public function getBrands()
    {
        $this->db->select('brand');
        $this->db->from('product');
        $this->db->group_by('brand');
        $result = $this->db->get();
        $result = $result->result();
        return $result;
    }

    public function getCategories()
    {
        $this->db->select('category');
        $this->db->from('product');
        $this->db->group_by('category');
        $result = $this->db->get();
        $result = $result->result();
        return $result;
    }

}