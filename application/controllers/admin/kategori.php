<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kategoriM');
        $this->load->model('Usermodel');
        $this->cek_admin();
        $this->cek_login();
    }

    public function index()
    {
        $data['kategori'] = $this->kategoriM->getdata()->result_array();
        $judul['judul'] = 'Data Kategori';
        $user['user'] = $this->Usermodel->cekData(['id_user' => $this->session->userdata('id_user')])->row_array();

        $this->form_validation->set_rules('kategori', 'Kategori', 'required', [
            'required' => 'kategori harus diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Tamplate/view-header', $judul);
            $this->load->view('Tamplate/view-sidebar');
            $this->load->view('Tamplate/view-topbar', $user);
            $this->load->view('admin/kategori', $data);
            $this->load->view('Tamplate/view-footer');
        } else {
            $data = [
                'kategori' => htmlspecialchars($this->input->post('kategori'))
            ];

            if ($this->kategoriM->tambahdata($data)) {
                $this->session->set_flashdata('success', "kategori berhasil di Ditambah");
                redirect('admin/kategori');
            } else {
                $this->session->set_flashdata('error', "gagal menambah Kategori");
                redirect('admin/kategori');
            }
        }
    }

    public function hapusdata($id_kategori)
    {
        if ($this->kategoriM->hapusdata($id_kategori)) {
            $this->session->set_flashdata('success', "kategori berhasil di hapus");
            redirect('admin/kategori');
        } else {
            $this->session->set_flashdata('error', "gagal mengahpus Kategori");
            redirect('admin/kategori');
        }
    }


    public function cetak()
    {
        $data['kategori'] = $this->kategoriM->getdata()->result_array();

        $this->export_pdf('laporan/laporan_kategori', $data, 'Laporan Kategori');
    }
}
