<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

        public function index(){


            $Title['judul'] = "Login";

            $this->load->view('auth/header', $Title);
            $this->load->view('auth/register');
            $this->load->view('auth/footer');
        }
}