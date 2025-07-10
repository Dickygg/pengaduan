<?php
defined('BASEPATH') or exit('No direct script access allowed');


class pengaduanP extends MY_Controller
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
        $title['judul'] = 'Pengaduan';
        $user['user'] = $this->Usermodel->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['pengaduan'] = $this->PengaduanM->getPengaduanWithUser(['id_user' => $this->session->userdata('id_user')])->result_array();
        $data['kategori'] = $this->kategoriM->getData()->result_array();

        $this->form_validation->set_rules('kategori', 'kategori', 'required', [
            'required' => 'kategori Harus diIsi!'
        ]);
        $this->form_validation->set_rules('isi_laporan', 'isi_laporan', 'required|min_length[3]', [
            'required' => 'Deskripsi Harus Diisi!',
            'min_length' => 'Deskripsi Terlalu Pendek'
        ]);
        $this->form_validation->set_rules('no_hp', 'no_hp', 'required|min_length[10]|numeric', [
            'required' => 'Nomer Handphone Harus Diisi!',
            'min_length' => 'Nomer Handphone Terlalu Pendek!',
            'numeric' => 'Yang anda Input bukan Angka'
        ]);
        // wajib foto
        if (empty($_FILES['gambar']['name'])) {
            $this->form_validation->set_rules('gambar', 'Foto', 'required', [
                'required' => 'Foto Harus Diupload!'
            ]);
        }


        if ($this->form_validation->run() == false) {
            $this->load->view('tamplate-pengguna/view-header-P', $title);
            $this->load->view('tamplate-pengguna/view-sidebar-P');
            $this->load->view('tamplate-pengguna/view-topbar-P', $user);
            $this->load->view('pengguna/pengaduanP', $data);
            $this->load->view('tamplate-pengguna/view-footer-P');
            // $this->session->set_flashdata('error', 'erornya disini brok');
        } else {
            $id = $this->session->userdata('id_user');




            $upload = $this->upload('gambar');

            if ($upload['result'] == 'success') {
                $foto = $upload['file'];
                $data = [
                    'id_user' => $id,
                    'id_kategori' => htmlspecialchars($this->input->post('kategori')),
                    'isi_laporan' => htmlspecialchars($this->input->post('isi_laporan')),
                    'no_hp' => htmlspecialchars($this->input->post('no_hp')),
                    'gambar' => htmlspecialchars($foto),
                    'catatan' => 'Petugas Belum Memberi Catatan',
                    'status' => 'Terkirim',
                    // 'status' => 'Terkirim',
                ];

                $this->PengaduanM->tambahdata($data);
                $this->session->set_flashdata('success', 'Data pengaduan berhasil ditambahkan');
                redirect('Pengguna/pengaduanP');
            } else {
                //kalo gagal upload
                $this->session->set_flashdata('error', $upload['error']);
                redirect('Pengguna/pengaduanP');
                return;
            }
        }
    }
}
