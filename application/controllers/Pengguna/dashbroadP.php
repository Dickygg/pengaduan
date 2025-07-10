<?php
defined('BASEPATH') or exit('No direct script access allowed');

class dashbroadP extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usermodel');
        $this->load->model('PengaduanM');
        $this->load->model('kategoriM');
        $this->cek_login();
        $this->cek_pengguna();
    }

    public function index()
    {

        $title['judul'] = 'Dashbroad';
        $user['user'] = $this->Usermodel->cekData(['email' => $this->session->userdata('email')])->row_array();
        $pengaduan['pengaduanrow'] = $this->PengaduanM->getpengaduanWhere(['id_user' => $this->session->userdata('id_user')])->num_rows();
        $pengaduan['pengaduan'] = $this->PengaduanM->getpengaduanWhere(['id_user' => $this->session->userdata('id_user')])->result_array();
        $this->load->view('tamplate-pengguna/view-header-P', $title);
        $this->load->view('tamplate-pengguna/view-sidebar-P');
        $this->load->view('tamplate-pengguna/view-topbar-P', $user);
        $this->load->view('pengguna/dashbroadP', $pengaduan);
        $this->load->view('tamplate-pengguna/view-footer-P');
    }
}
