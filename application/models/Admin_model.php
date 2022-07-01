<?php

class Admin_model extends CI_Model{

    function insert_user($data) {
        $signup = $this->db->insert('users',$data);
        if($signup){
           $user = $this->db->insert_id();
            return $user;
        }else{
            return false;
        }
    }

    function login($data){
        $user = $this->db->get_where('users', $data);
        if($user->num_rows() > 0){
            return $user->row();
        }else{
            return false;
        }
    }

    function check_existance($table, $data){
        $res = $this->db->get_where($table, $data);
        if($res->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function signup($data){
        $signup = $this->db->insert('users',$data);
        if($signup){
            $user = $this->db->get_where('users',['id' => $this->db->insert_id()])->row();
            return $user;
        }else{
            return false;
        }
    }


    function get_settings(){
        $res = $this->db->get('settings');
        if($res->num_rows() > 0){
            return $res->result();
        }else{
            return false;
        }
    }

    function save_settings($key,$value){
        $check = $this->check_existance("settings",array("setting_name"=>$key));
        if($check){
            $this->db->update("settings",array("setting_value"=>$value),array("setting_name"=>$key));
        }else{
            $this->db->insert("settings",array("setting_value"=>$value,"setting_name"=>$key));
        }
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    function get_user($where){
        $user = $this->db->get_where('users', $where);
        if($user->num_rows() > 0){
            return $user->row();
        }else{
            return false;
        }
    }

    function update_user($data, $where){
        $update = $this->db->update('users', $data, $where);
        if($update){
            $user = $this->db->get_where('users', $where)->row();
            return $user;
        }else{
            return false;
        }
    }

    function get_active_user_count($where){
       
        $user = $this->db->get_where('users', $where);
        if($user->num_rows() > 0){
            return $user->num_rows();
        }else{
            return false;
        }
    }

    function get_count_active_users_products($where) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->join('products', 'products.user_id = users.id');
        $this->db->where($where);
        $query = $this->db->get();
        if($query->num_rows() > 0){
            return $query->num_rows();
        }else{
            return false;
        }
    }

    function get_active_products_count($where){
       
        $user = $this->db->get_where('products', $where);
        if($user->num_rows() > 0){
            return $user->num_rows();
        }else{
            return false;
        }
    }    

    function get_count_products_without_user($where){
       
        $user = $this->db->get_where('products', $where);
        if($user->num_rows() > 0){
            return $user->num_rows();
        }else{
            return false;
        }
    }    

    function get_amount_active_products() {
        $query = $this->db->query("SELECT sum(quantity) as sum_active_products FROM products where status = 1 AND user_id IS NOT NULL");
        // $query = $this->db->query("SELECT sum(quantity) as sum_active_products FROM products where status = '1' AND user_id IS NOT NULL");
        if($query->num_rows() > 0) {
            return $query->result()[0]->sum_active_products;
        }else{
            return false;
        }
    }

    function get_price_active_products() {
        $query = $this->db->query("SELECT  sum(quantity*price) as sum_prod_active_products FROM products where status = 1 AND user_id IS NOT NULL");
        // $query = $this->db->query("SELECT sum(quantity) as sum_active_products FROM products where status = '1' AND user_id IS NOT NULL");
        if($query->num_rows() > 0) {
            return $query->result()[0]->sum_prod_active_products;
        }else{
            return false;
        }
    }

    function get_price_active_products_per_user() {
        $query = $this->db->query("SELECT user.first_name, sum(price) as sum_price_active_products FROM users as user INNER JOIN products as products ON user.id=products.user_id where products.status = 1 AND products.user_id IS NOT NULL group by user_id");
        // $query = $this->db->query("SELECT sum(quantity) as sum_active_products FROM products where status = '1' AND user_id IS NOT NULL");
        if($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

}