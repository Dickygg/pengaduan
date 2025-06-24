<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategoriM extends CI_Model
{

    public function getData()
    {
        return $this->db->get('kategori');
    }

    public function hapusdata($where = null)
    {
        $this->db->where('id_kategori', $where);
        return $this->db->delete('kategori');
    }

    public function tambahdata($data = null)
    {
        return $this->db->insert('kategori',$data);
    }
}
