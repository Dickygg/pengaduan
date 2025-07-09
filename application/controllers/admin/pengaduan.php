<?php
defined('BASEPATH') or exit('No direct script access allowed');


class pengaduan extends MY_Controller
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
        $data['pengaduan'] = $this->PengaduanM->getPengaduanWithUser()->result_array();
        $user['user'] = $this->Usermodel->cekData(['email' => $this->session->userdata('email')])->row_array();
        $judul['judul'] = 'Data Pengaduan';


        $this->load->view('Tamplate/view-header', $judul);
        $this->load->view('Tamplate/view-sidebar');
        $this->load->view('Tamplate/view-topbar', $user);
        $this->load->view('admin/pengaduan', $data);
        $this->load->view('Tamplate/view-footer');
    }

    public function hapus($id_pengaduan)
    {
        if ($this->PengaduanM->hapus($id_pengaduan)) {
            $this->session->set_flashdata('success', "Pengaduan berhasil di hapus");
            redirect('admin/pengaduan');
        } else {
            $this->session->set_flashdata('error', "gagal mengahpus pengaduan");
            redirect('admin/pengaduan');
        }
    }

    public function edit()
    {
        $id = $this->input->post('id_pengaduan');
        $data = [
            'status' => $this->input->post('status')
        ];
        if ($this->PengaduanM->editdatapengaduan($data, $id)) {
            $this->session->set_flashdata('success', 'Data Pengaduan berhasil diupdate!');
        } else {
            $this->session->set_flashdata('error', 'Gagal update data Pengaduan.');
        }

        redirect('admin/pengaduan');
    }

    public function cetak($status = null)
    {

        if (!$status) {

            $data['pengaduan'] = $this->PengaduanM->getPengaduanWithUser()->result_array();
        } elseif ($status == 'selesai') {
            $data['pengaduan'] = $this->PengaduanM->getPengaduanWithUserbystatus(['status' => $status])->result_array();
        } elseif ($status == 'proses') {
            $data['pengaduan'] = $this->PengaduanM->getPengaduanWithUserbystatus(['status' => $status])->result_array();
        } elseif ($status == 'ditolak') {
            $data['pengaduan'] = $this->PengaduanM->getPengaduanWithUserbystatus(['status' => $status])->result_array();
        } else {
            $data['pengaduan'] = $this->PengaduanM->getPengaduanWithUserbystatus(['status' => $status])->result_array();
        }

        $this->export_pdf('laporan/laporan_pengaduan', $data, 'Laporan Pengaduan');
    }

    public function cetakexcel($status = null)
    {
        if (!$status) {

            $data = $this->PengaduanM->getPengaduanWithUser()->result_array();
            $filename = '';
        } elseif ($status == 'selesai') {
            $data = $this->PengaduanM->getPengaduanWithUserbystatus(['status' => $status])->result_array();
            $filename = 'SELESAI';
        } elseif ($status == 'ditolak') {
            $data = $this->PengaduanM->getPengaduanWithUserbystatus(['status' => $status])->result_array();
            $filename = 'DITOLAK';
        } elseif ($status == 'proses') {
            $data = $this->PengaduanM->getPengaduanWithUserbystatus(['status' => $status])->result_array();
            $filename = "PROSES";
        } else {
            $data = $this->PengaduanM->getPengaduanWithUserbystatus(['status' => $status])->result_array();
            $filename = 'TERKIRIM';
        }

        $header = ['No', 'NAMA', 'KATEGORI', 'ISI LAPORAN', 'STATUS', 'TANGGAL', 'BUKTI'];
        $rows = [];
        $no = 1;

        foreach ($data as $p) {
            $rows[] = [
                $no++,
                $p['nama'],
                $p['kategori'],
                $p['isi_laporan'],
                $p['status'],
                date('Y-m-d', strtotime($p['tanggal'])),
                $p['no_hp']
            ];
        }

        $this->export_excel('Pengaduan' . $filename, $header, $rows);
    }
}
