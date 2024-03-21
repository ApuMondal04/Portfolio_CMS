<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public function __construct() {
        parent::__construct();
    }

    public function authenticate($username, $password) {
        // Query the database to retrieve user data based on username
        $this->db->where('email', $username);
        $query = $this->db->get('users');
        $user = $query->row();

        if ($user) {
            // Verify the password
            if (password_verify($password, $user->password)) {
                // Password is correct, return user data
                return $user;
            }
        }
        // Username not found or password is incorrect
        return false;
    }

    public function create_user($name, $email, $password) {
        // Check if the user already exists
        $existing_user = $this->get_user_by_email($email);
        if ($existing_user) {
            // User already exists, return false
            return false;
        }

        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Create user data array
        $data = array(
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password
        );

        // Insert data into the users table
        $this->db->insert('users', $data);

        // Return the ID of the inserted user
        return $this->db->insert_id();
    }

    public function get_user_by_email($email) {
        // Query the database to retrieve user data based on email
        $this->db->where('email', $email);
        $query = $this->db->get('users');
        return $query->row(); // Return the user if found, or null if not found
    }


    public function get_total_projects() {
        // Query to get the total count of projects
        return $this->db->count_all('portfolios');
    }

    public function get_total_experience() {
        // Query to get the total count of projects
        return $this->db->count_all('experience');  
    }

    public function insert_portfolio($project_name, $image_url, $category, $heading, $description, $project_link) {
        $data = array(
            'project_name' => $project_name,
            'image_url' => $image_url,
            'category' => $category,
            'heading' => $heading,
            'description' => $description,
            'project_link' => $project_link
        );
    
        $this->db->insert('portfolios', $data);
    }

    public function update_portfolio($id, $project_name, $image_url, $category, $heading, $description, $project_link) {
        // Data to be updated
        $data = array(
            'project_name' => $project_name,
            'category' => $category,
            'heading' => $heading,
            'description' => $description,
            'project_link' => $project_link,
            'date_updated' => date('Y-m-d H:i:s') // Current date and time
        );

        // If a new image is provided, include it in the update data
        if ($image_url) {
            $data['image_url'] = $image_url;
        }

        // Update the portfolio item in the database
        $this->db->where('id', $id);
        $this->db->update('portfolios', $data);
    }

    public function get_portfolio_items() {
        // Fetch portfolio items from the database
        $query = $this->db->get('portfolios');
        return $query->result_array(); // Return the result as an array of arrays
    }


    public function get_portfolio_item($id) {
        // Query the database to retrieve a single portfolio item based on its ID
        $this->db->where('id', $id);
        $query = $this->db->get('portfolios');
        return $query->row(); // Return the portfolio item if found, or null if not found
    }
    

    public function delete_portfolio($id) {
        // Delete the portfolio item from the database
        $this->db->where('id', $id);
        $this->db->delete('portfolios');
    }


    public function insert_education($duration_from, $duration_to, $qualification, $university, $marks, $status) {
        // Data to be inserted
        $data = array(
            'duration_from' => $duration_from,
            'duration_to' => $duration_to,
            'qualification' => $qualification,
            'university' => $university,
            'marks' => $marks,
            'status' => $status
        );
    
        // Insert data into the education table
        $this->db->insert('education', $data);
    }
    
    public function get_all_education() {
        $query = $this->db->get('education');
        return $query->result();
    }
    
    public function get_education_item($id) {
        
        $this->db->where('id', $id);
        $query = $this->db->get('education');
        return $query->row();
    }
    
    
    public function delete_education($id) {

        $this->db->where('id', $id);
        $this->db->delete('education');
    }


    public function insert_experience($duration_from, $duration_to, $job_title, $organization, $job_description, $status) {
        // Data to be inserted
        $data = array(
            'duration_from' => $duration_from,
            'duration_to' => $duration_to,
            'title' => $job_title,
            'organization' => $organization,
            'description' => $job_description,
            'status' => $status
        );
    
        // Insert data into the experience table
        $this->db->insert('experience', $data);
    }

    public function get_all_experience() {
        $query = $this->db->get('experience');
        return $query->result();
    }
    
    public function get_experience_item($id) {
        
        $this->db->where('id', $id);
        $query = $this->db->get('experience');
        return $query->row();
    }
    
    public function delete_experience($id) {

        $this->db->where('id', $id);
        $this->db->delete('experience');
    }
    
    
}
?>
