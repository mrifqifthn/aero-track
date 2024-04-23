<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        // if ($this->session->userdata('email')) {
        //     redirect('frontend/home/index/1');
        // }

        $this->load->view('frontend/layouts/header');
        $this->load->view('frontend/auth');
        $this->load->view('frontend/layouts/footer');
    }

    public function cek_login()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $this->load->model('Model_auth');
        $database = $this->Model_auth->getAuth($email);

        if ($database) {
            if ($database['password'] === md5($password)) {
                $data = [
                    'email' => $database['email'],
                ];
                $this->session->set_userdata($data);
                redirect('frontend/home/index/1');
            } else {
                $this->session->set_flashdata('message', '<p style="color: #EC9292; text-align: center;">wrong username or password</p>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<p style="color: #EC9292; text-align: center;">wrong username or password</p>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        redirect('auth');
    }
}
