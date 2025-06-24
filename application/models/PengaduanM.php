<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PengaduanM extends CI_Model{

    public function getData(){
        return $this->db->get('pengaduan');
    }

    public function getPengaduanWithUser()
    {
    $this->db->select('pengaduan.*, users.nama, users.email, users.role, kategori.kategori');
    $this->db->from('pengaduan');
    $this->db->join('users', 'pengaduan.id_user = users.id_user');
    $this->db->join('kategori', 'pengaduan.id_kategori = kategori.id_kategori');
    return $this->db->get();
    }

    public function editdatapengaduan($data,$id)
    {
        $this->db->where('id_pengaduan', $id);
        return $this->db->update('pengaduan' ,$data);
    }

    public function hapus($where= null){
        $this->db->where('id_pengaduan', $where);
        return $this->db->delete('pengaduan');
    }

        public function getpengaduanWhere($where = null)
    {
        return $this->db->get_where('pengaduan', $where);
    }

}