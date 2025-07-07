<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends MY_Controller
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
        $user['user'] = $this->Usermodel->cekData(['id_user' => $this->session->userdata('id_user')])->row_array();
        $judul['judul'] = 'Profile User';


        $this->load->view('Tamplate/view-header', $judul);
        $this->load->view('Tamplate/view-sidebar');
        $this->load->view('Tamplate/view-topbar', $user);
        $this->load->view('admin/profile', $user);
        $this->load->view('Tamplate/view-footer');
    }


    public function editprofile()
    {
        $data['anggota'] = $this->Usermodel->cekData()->result_array();
        $user['user'] = $this->Usermodel->cekData(['id_user' => $this->session->userdata('id_user')])->row_array();
        $judul['judul'] = 'Edit Profile User';

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Harus DiIsi!'
        ]);
        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus DiIsi!',
            'valid_email' => 'Email Harus benar!',

        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Tamplate/view-header', $judul);
            $this->load->view('Tamplate/view-sidebar');
            $this->load->view('Tamplate/view-topbar', $user);
            $this->load->view('admin/editprofile', $user);
            $this->load->view('Tamplate/view-footer');
        } else {
            // $upload = $this->upload('gambar');
            $id = $this->input->post('id_user');

            if (!empty($_FILES['gambar']['name'])) {
                $upload = $this->upload('gambar');

                if ($upload['result'] == 'success') {
                    $foto = $upload['file'];
                } else {
                    //kalo gagal upload
                    $this->session->set_flashdata('error', $upload['error']);
                    redirect('admin/profile');
                    return;
                }
            } else {
                $foto = $this->input->post('gambarlama');
            }

            $data = [
                'nama' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                'gambar' => $foto,
            ];

            $this->Usermodel->updateUser($data, $id);
            $this->session->set_flashdata('success', 'Data pengaduan berhasil diupdate!');
            redirect('admin/profile');
        }
    }


    public function editprofileproses()
    {
        $email = trim(htmlspecialchars($this->input->post('email', true)));
    }
}
