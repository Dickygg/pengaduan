<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller 
{
        public function __construct()
    {
        parent::__construct();
        $this->load->model('PengaduanM');
        $this->load->model('Usermodel');
        $this->cek_login();
        $this->cek_pengguna();

    }

    public function index() {
        echo "hallo pengguna";

    }
}
