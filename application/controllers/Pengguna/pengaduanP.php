<?php
defined('BASEPATH') or exit('No direct script access allowed');


class pengaduanP extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usermodel');
        $this->load->model('PengaduanM');
        $this->cek_login();
        $this->cek_pengguna();
    }

    public function index()
    {
        $title['judul'] = 'Pengaduan';
        $user['user'] = $this->Usermodel->cekData(['email' => $this->session->userdata('email')])->row_array();
        $pengaduan['pengaduan'] = $this->PengaduanM->getPengaduanWithUser(['id_user' => $this->session->userdata('id_user')])->result_array();
        $this->load->view('tamplate-pengguna/view-header-P', $title);
        $this->load->view('tamplate-pengguna/view-sidebar-P');
        $this->load->view('tamplate-pengguna/view-topbar-P', $user);
        $this->load->view('pengguna/pengaduanP', $pengaduan);
        $this->load->view('tamplate-pengguna/view-footer-P');
    }
}
