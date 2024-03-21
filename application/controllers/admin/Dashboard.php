<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('user_model'); // Load the User_model
    }

    public function index() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        // Fetch total number of projects
        $data['total_projects'] = $this->user_model->get_total_projects();
        $data['total_experience'] = $this->user_model->get_total_experience();


        $this->load->view('admin/dashboard', $data);
    }
    

    public function portfolio() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        // Fetch portfolio items from the database
        $data['portfolio_items'] = $this->user_model->get_portfolio_items();
        $this->load->view('admin/portfolio_view', $data);
    }

    public function add_portfolio_form() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $this->load->view('admin/add_portfolio');
    }

    public function save_portfolio() {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        // Get form data
        $project_name = $this->input->post('project_name');
        $category = $this->input->post('category');
        $heading = $this->input->post('heading');
        $project_link = $this->input->post('project_link');
        
        // Retrieve description content from the hidden input field
        $description = $this->input->post('description');
    
        // Handle file upload
        $config['upload_path'] = './uploads/portfolio/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = 1024 * 10; // 10MB max size
        $this->load->library('upload', $config);
    
        if (!$this->upload->do_upload('image')) {
            // Handle upload failure
            $error = array('error' => $this->upload->display_errors());
            print_r($error); // Modify this to handle errors appropriately
        } else {
            // Upload successful, retrieve uploaded file data
            $data = $this->upload->data();
            $image_url = 'uploads/portfolio/' . $data['file_name'];
            
            // Insert portfolio data into the database
            $this->user_model->insert_portfolio($project_name, $image_url, $category, $heading, $description, $project_link);
            
            // Redirect to view portfolio page with success message
            $this->session->set_flashdata('success', 'Project added successfully.');
            redirect('admin/project');
        }
    }
    

    public function delete_portfolio($id) {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        // Fetch the portfolio item from the database to get the image URL
        $portfolio_item = $this->user_model->get_portfolio_item($id);
        
        if (!$portfolio_item) {
            // If the portfolio item doesn't exist, redirect with an error message
            $this->session->set_flashdata('error', 'Portfolio item not found.');
            redirect('admin/dashboard/portfolio');
        }
        
        // Delete the portfolio item
        $this->user_model->delete_portfolio($id);
        
        // Delete the associated image file from the local directory
        $image_path = FCPATH . $portfolio_item->image_url;
        if (file_exists($image_path)) {
            unlink($image_path); // Delete the file
        }
        
        // Redirect back to the view portfolio page
        $this->session->set_flashdata('success', 'Project deleted successfully.');
        redirect('admin/project');
    }
    
    
    public function edit_portfolio($id) {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        // Fetch the portfolio item from the database
        $data['portfolio_item'] = $this->user_model->get_portfolio_item($id);
        
        if (!$data['portfolio_item']) {
            // If the portfolio item doesn't exist, redirect with an error message
            $this->session->set_flashdata('error', 'Portfolio item not found.');
            redirect('admin/dashboard/portfolio');
        }
        
        // Load the edit portfolio form view
        $this->load->view('admin/edit_portfolio', $data);
    }
    
    public function update_portfolio($id) {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        // Get form data
        $project_name = $this->input->post('project_name');
        $category = $this->input->post('category');
        $heading = $this->input->post('heading');
        $description = $this->input->post('description');
        $project_link = $this->input->post('project_link');

        // Handle file upload
        $config['upload_path'] = './uploads/portfolio/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024 * 10; // 10MB max size
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            // Handle upload failure or no new image selected
            $image_url = $this->input->post('old_image_url'); // Keep the existing image
        } else {
            // Upload successful, retrieve uploaded file data
            $data = $this->upload->data();
            $image_url = 'uploads/portfolio/' . $data['file_name'];
        }

        // Update portfolio data in the database
        $this->user_model->update_portfolio($id, $project_name, $image_url, $category, $heading, $description, $project_link);

        // Redirect to view portfolio page with success message
        $this->session->set_flashdata('success', 'Project updated successfully.');
        redirect('admin/project');
    }


//----------------------------------------------------


    public function education() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        // Load the User_model
        $this->load->model('user_model');

        // Fetch all education data
        $data['educations'] = $this->user_model->get_all_education();

        // Load the view with the fetched data
        $this->load->view('admin/education_view', $data);
    }


    public function add_education_form() {
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        $this->load->view('admin/add_education');
    }

    

    public function save_education() {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    
        // Get form data
        $duration_from = $this->input->post('duration_from');
        $duration_to = $this->input->post('duration_to');
        $qualification = $this->input->post('qualification');
        $university = $this->input->post('university');
        $marks = $this->input->post('marks');
        $status = $this->input->post('status');
    
        // Insert education data into the database
        $this->user_model->insert_education($duration_from, $duration_to, $qualification, $university, $marks, $status);
    
        // Redirect to the education view page with success message
        $this->session->set_flashdata('success', 'Education added successfully.');
        redirect('admin/education');
    }

    public function edit_education($id) {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        // Fetch the education item from the database
        $data['education_item'] = $this->user_model->get_education_item($id);
        
        if (!$data['education_item']) {
            // If the education item doesn't exist, redirect with an error message
            $this->session->set_flashdata('error', 'Education detail not found.');
            redirect('admin/education');
        }
        
        // Load the edit education form view
        $this->load->view('admin/edit_education', $data);
    }
    

    public function update_education($id) {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        // Get form data
        $duration_from = $this->input->post('duration_from');
        $duration_to = $this->input->post('duration_to');
        $qualification = $this->input->post('qualification');
        $university = $this->input->post('university');
        $marks = $this->input->post('marks');
        $status = $this->input->post('status');

       
       // Insert education data into the database
       $this->user_model->insert_education($duration_from, $duration_to, $qualification, $university, $marks, $status);

        // Redirect to view portfolio page with success message
        $this->session->set_flashdata('success', 'Education details updated successfully.');
        redirect('admin/education');
    }


    public function delete_edu($id) {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        // Delete the education item
        $this->user_model->delete_education($id);
        
        // Redirect back to the education view page
        $this->session->set_flashdata('success', 'Education deleted successfully.');
            // Redirect back to the education view page
            redirect('admin/education');
    }
    

//----------------------------------------------------

    public function experience(){
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }

        // Fetch all education data
        $data['experiences'] = $this->user_model->get_all_experience();
        
        $this->load->view('admin/experience_view', $data);
    }

    public function experience_add(){
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        $this->load->view('admin/add_experience');
    }

    public function save_experience() {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    
        // Get form data
        $duration_from = $this->input->post('duration_from');
        $duration_to = $this->input->post('duration_to');
        $job_title = $this->input->post('job_title');
        $organization = $this->input->post('organization');
        $job_description = $this->input->post('description');
        $status = $this->input->post('status');
    
        // Insert experience data into the database
        $this->user_model->insert_experience($duration_from, $duration_to, $job_title, $organization, $job_description, $status);
    
        $this->session->set_flashdata('success', 'Experience details added successfully.');
        // Redirect to experience method
        redirect('admin/experience');
    }
    
    public function edit_experience($id) {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        // Fetch the education item from the database
        $data['experience_item'] = $this->user_model->get_experience_item($id);
        
        if (!$data['experience_item']) {
            // If the education item doesn't exist, redirect with an error message
            $this->session->set_flashdata('error', 'Experience detail not found.');
            redirect('admin/experience');
        }
        
        // Load the edit education form view
        $this->load->view('admin/edit_experience', $data);
    }

    public function update_experience($id) {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        // Get form data
        $duration_from = $this->input->post('duration_from');
        $duration_to = $this->input->post('duration_to');
        $job_title = $this->input->post('job_title');
        $organization = $this->input->post('organization');
        $job_description = $this->input->post('description');
        $status = $this->input->post('status');
       
        $this->user_model->insert_experience($duration_from, $duration_to, $job_title, $organization, $job_description, $status);

        // Redirect to view portfolio page with success message
        $this->session->set_flashdata('success', 'Experiece details updated successfully.');
        redirect('admin/experience');
    }


    public function delete_exp($id) {
        // Check if the user is logged in
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
        
        $this->user_model->delete_experience($id);
        $this->session->set_flashdata('success', 'Your record deleted successfully.');
         
        redirect('admin/experience');
    }

    // public function logout() {
    //     $this->session->sess_destroy(); 
    //     redirect('login');
    // }
}
