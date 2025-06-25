<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usermodel');
        $this->cek_login();
        $this->cek_admin();
    }

    public function index()
    {

        $data['anggota'] = $this->Usermodel->cekData()->result_array();
        $user['user'] = $this->Usermodel->cekData(['email' => $this->session->userdata('email')])->row_array();
        $judul['judul'] = 'Data User';


        $this->load->view('Tamplate/view-header', $judul);
        $this->load->view('Tamplate/view-sidebar');
        $this->load->view('Tamplate/view-topbar', $user);
        $this->load->view('admin/datauser', $data);
        $this->load->view('Tamplate/view-footer', $data);
    }

    public function deletuser($id_user)
    {

        if ($this->Usermodel->deleteuser($id_user)) {
            $this->session->set_flashdata('success', "User berhasil di hapus");
            redirect('admin/user');
        } else {
            $this->session->set_flashdata('error', "gagal mengahpus data");
            redirect('admin/user');
        }
    }

    public function update()
    {
        $id = $this->input->post('id_user');
        $data = [
            'role' => $this->input->post('role')
        ];

        if ($this->Usermodel->updateUser($data, $id)) {
            $this->session->set_flashdata('success', 'Data user berhasil diupdate!');
        } else {
            $this->session->set_flashdata('error', 'Gagal update data user.');
        }

        redirect('admin/user');
    }

    public function cetak()
    {
        $data['user'] = $this->Usermodel->cekData()->result_array();

        $this->export_pdf('laporan/laporan_user', $data, 'Laporan User');
    }
}
