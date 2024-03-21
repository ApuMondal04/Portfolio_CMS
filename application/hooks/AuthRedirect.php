<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthRedirect {

    public function check_auth() {
        $CI =& get_instance();
        $controller = $CI->router->fetch_class();
        $method = $CI->router->fetch_method();

        // Check if user is not logged in and trying to access admin section
        if (!$CI->session->userdata('user_id') && ($controller === 'admin' && $method !== 'login')) {
            redirect('login');
        }
    }
}
