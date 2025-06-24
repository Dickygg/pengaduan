<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usermodel extends CI_Model{

    public function simpanData($data = null){
        $this->db->insert('users',$data);
    }

    public function getUserWhere($where = null)
    {
        return $this->db->get_where('users', $where);
    }

    public function cekUseracces($where = null){
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }

    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->limit(10, 0);
        return $this->db->get();
    }
       
    public function cekData($where = null)
    {
        return $this->db->get_where('users', $where);
    }

    public function getUser(){
        return $this->db->get('users');
    }

    public function deleteuser($where = null){
        $this->db->where('id_user', $where);
        return $this->db->delete('users');
    }

       public function updateUser($data, $id) {
        $this->db->where('id_user', $id);
        return $this->db->update('users', $data);
    }

}