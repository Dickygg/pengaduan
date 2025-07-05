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
        $judul['judul'] = 'Dashbroad';
        $this->load->view('Home', $judul);
    }
}
