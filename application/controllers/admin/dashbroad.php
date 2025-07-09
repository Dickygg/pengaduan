<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashbroad extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usermodel');
        $this->load->model('PengaduanM');
        $this->cek_login();
        $this->cek_admin();
    }

    public function index()
    {

        $judul['judul'] = 'Dashbroad Admin';
        $user['user'] = $this->Usermodel->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['anggota'] = $this->Usermodel->getUserWhere(['role' => 'pengguna'])->result_array();
        $data['pengaduan'] = $this->PengaduanM->getPengaduanWithUser()->result_array();
        date_default_timezone_set("Asia/Jakarta");

        $this->load->view('Tamplate/view-header', $judul);
        $this->load->view('Tamplate/view-sidebar',);
        $this->load->view('Tamplate/view-topbar', $user);
        $this->load->view('admin/dashbroad', $data);
        $this->load->view('Tamplate/view-footer', $judul);
    }
}
