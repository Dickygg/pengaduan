<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Dompdf\Dompdf;

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Bisa load helper / library global di sini kalau mau
        // $this->load->helper('url');
        // $this->load->library('session');
    }

    // Function cek login global
    public function cek_login()
    {
        if (!$this->session->userdata('email')) {
            // Kalau belum login, redirect ke auth
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger" role="alert">
                Silakan login terlebih dahulu!
                </div>'
            );
            redirect('auth');
        }
    }

    // Function buat cek role, misal cek admin
    public function cek_admin()
    {
        if ($this->session->userdata('role') != 'admin') {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger" role="alert">
                Akses ditolak! Bukan admin.
                </div>'
            );
            redirect('auth');
        }
    }

    // Function buat cek pengguna biasa
    public function cek_pengguna()
    {
        if ($this->session->userdata('role') != 'pengguna') {
            $this->session->set_flashdata(
                'pesan',
                '<div class="alert alert-danger" role="alert">
                Akses ditolak! Bukan pengguna.
                </div>'
            );
            redirect('auth');
        }
    }

    // Function redirect otomatis sesuai role
    public function redirect_by_role()
    {
        if ($this->session->userdata('role') == 'admin') {
            redirect('admin/dashboard');
        } elseif ($this->session->userdata('role') == 'pengguna') {
            redirect('pengguna/user');
        } else {
            redirect('auth');
        }
    }


    public function upload($field_name)
    {
        $config['upload_path'] = './assets/img/uploads/'; //folder upload
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 3000; ///maksimal 2mb
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['encrypt_name'] = true; //nama dienkripsi agar unik


        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($field_name)) {
            return [
                'result' => 'failed',
                'file' => '',
                'error' => $this->upload->display_errors()
            ];
        } else {
            return [
                'result' => 'success',
                'file' => $this->upload->data('file_name'),
                'error' => ''
            ];
        }
    }


    public function export_pdf($view, $data = [], $filename = 'laporan', $paper = 'A4', $orientation = 'portrait')
    {
        $dompdf = new Dompdf();

        // Load view ke string HTML
        $html = $this->load->view($view, $data, true);

        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();

        // Download ke browser
        $dompdf->stream("$filename.pdf", array("Attachment" => 0));
    }

    // Function export ke Excel via HTML Table
    public function export_excel($filename, $header, $data)
    {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename={$filename}.xls");

        echo "<table border='1'>";
        echo "<tr>";
        foreach ($header as $head) {
            echo "<th>{$head}</th>";
        }
        echo "</tr>";

        foreach ($data as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>{$cell}</td>";
            }
            echo "</tr>";
        }

        echo "</table>";
    }
}
