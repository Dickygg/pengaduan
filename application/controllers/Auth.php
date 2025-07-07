<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usermodel');
    }


    public function index()
    {
        //  jika status sudah login maka tidak bisa ke page login lagi alias balik ke page user
        if ($this->session->userdata('email')) {
            if ($this->session->userdata('role') == 'admin') {
                redirect('admin/dashbroad');
            } else {
                redirect('Pengguna/dashbroadP');
            }
        }

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email', [
            'required' => 'Email Harus DiIsi!',
            'valid_email' => 'Email Harus benar!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Harus diIsi!',

        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/header');
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        } else {
            $this->login();
        }
    }

    private function login()
    {
        $email = trim(htmlspecialchars($this->input->post('email', true)));
        $password = $this->input->post('password', true);
        $user = $this->db->get_where('users', ['email' => trim($email)])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'nama' => $user['nama'],
                    'id_user' => $user['id_user'],
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 'pengguna') {
                    redirect('Pengguna/dashbroadP');
                } else {
                    redirect('admin/dashbroad');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-massage" role="alert">Password anda salah</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-info alert-massage" role="alert">Email tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function register()
    {

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required', [
            'required' => 'Nama Harus DiIsi!'
        ]);

        $this->form_validation->set_rules('email', 'Alamat Email', 'required|trim|valid_email|is_unique[users.email]', [
            'required' => 'Email Harus DiIsi!',
            'valid_email' => 'Email Harus benar!',
            'is_unique' => 'Email Sudah Terdaftar!',
        ]);

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[2]|matches[password2]', [
            'required' => 'Password Harus diIsi!',
            'min_length' => 'Password Terlalu Pendek!',
            'matches' => 'Password Tidak Sama!',
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
            'required' => 'Password Harus diIsi!',
            'matches' => 'Password Tidak Sama!',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/header');
            $this->load->view('auth/register');
            $this->load->view('auth/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role' => 'pengguna',
                // 'dibuat' => time(),
                'gambar' => 'default.jpg'
            ];
            $this->Usermodel->simpanData($data);

            $this->session->set_flashdata('pesan', '<div 
                class="alert alert-success alert-message" role="alert">Selamat!! 
                akun member anda sudah dibuat. Silahkan Aktivasi Akun anda</div>');
            redirect('auth');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('nama');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-message" role="alert">Anda telah logout!</div>');
        redirect('User');
    }
}
