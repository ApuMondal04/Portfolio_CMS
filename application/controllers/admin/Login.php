<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->library('session');
    }

    public function index() {
        // Check if there is POST data
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Authenticate user
            $user = $this->user_model->authenticate($username, $password);

            if ($user) {
                // Set user data in session
                $this->session->set_userdata('user_id', $user->id);
                $this->session->set_userdata('username', $user->username);
                $this->session->set_userdata('name', $user->name);

                // Redirect to dashboard or any other page after successful login
                redirect('admin/dashboard');
            } else {
                // Authentication failed, set error message
                $this->session->set_flashdata('error', 'Invalid username or password');
            }
        }

        // Load the login view
        $this->load->view('admin/login');
    }

    public function logout() {
        // Destroy session and redirect to login page
        $this->session->sess_destroy();
        redirect('login');
    }

    
}
?>
