<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('PengaduanM');
        $this->load->model('Usermodel');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role') == 'admin') {
                redirect('admin/dashbroad');
            } else {
                redirect('Pengguna/dashbroadP');
            }
        }

        $judul['judul'] = '';
        $this->load->view('Home', $judul);
    }
}
