<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    public function index() {
        $data['error_message'] = ''; // Initialize error message

        // Check if there is POST data for signup
        if ($this->input->post()) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Check if the user already exists
            $existing_user = $this->user_model->get_user_by_email($email);
            if ($existing_user) {
                // User already exists, display error message
                $data['error_message'] = 'User with this email already exists.';
            } else {
                // Call the user model to save the user
                $this->user_model->create_user($name, $email, $password);

                // Redirect to login page or any other page after signup
                redirect('login');
                return; // Stop further execution
            }
        }

        // Load the signup view
        $this->load->view('admin/signup', $data);
    }
}
?>
