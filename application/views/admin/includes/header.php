<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> -->

    <link rel="stylesheet" href="<?php echo base_url('assets/assets_admin/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_admin/fontsawesome/css/all.min.css'); ?>">

    
    <!-- Include Quill.js for editor text area-->
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <style>
        /* Custom CSS */
        body {
            padding-top: 56px; /* Adjusted to account for the navbar height */
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden; /* Prevent horizontal scrollbar */
        }
        .sidebar {
            position: fixed;
            top: 56px;
            bottom: 0;
            left: 0;
            z-index: 99; /* Higher z-index to ensure it's above the content */
            padding-top: 3rem;
            width: 250px; /* Sidebar width */
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            background-color: #343a40;
            color: #ffffff;
            overflow-y: auto; /* Add vertical scrollbar if needed */
            overflow-y: hidden; /* Hide vertical scrollbar */
            transition: left 0.3s; /* Smooth transition for opening and closing */
        }
        .content {
            padding-top: 2rem;
            padding-bottom: 2rem; /* Added padding to prevent scrollbar */
            margin-left: 18%;
            margin-right: 0; /* Removed negative margin */
            width: 82%; /* Adjusted width */
            max-width: 82%; /* Adjusted max-width */
            overflow-x: hidden; /* Prevent horizontal scrollbar */
        }
        .admin-navbar {
            background-color: #343a40;
            color: #ffffff;
            padding: 0.5rem 1rem;
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 100; /* Higher z-index to ensure it's above everything else */
        }
        .admin-navbar .user-info {
            margin-right: 1rem;
            color: black !important; /* Black color for user info */
        }
        .admin-navbar .logout-btn {
            color: #f52828;
            transition: color 0.3s; /* Smooth transition for color change */
        }
        .admin-navbar .logout-btn:hover {
            color: #F1948A; /* Change color on hover to red */
        }

        .sidebar-sticky {
            overflow-y: auto;
            height: calc(100vh - 56px);
        }
        .nav-link {
            padding: 0.5rem 1rem;
            color: #ffffff !important;
            cursor: pointer; 
        }
        .nav-link:hover {
            background-color: #495057;
        }
        .container-fluid {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .container-fluid-new {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            color: #343a40;
        }
        p {
            color: #6c757d;
        }

        /* Hover effect for logout button */
        .logout-btn:hover {
            text-decoration: none; /* Remove default underline */
        }
        .form-wrapper {
            width: 100%;
        }
        .box {
            margin-bottom: 20px; /* Adjusted margin to prevent overlap */
        }

        /* Active sidebar link */
        .active-nav-link {
            background-color: #495057 !important;
        }

        /* Sidebar open class */
        .sidebar.open {
            left: 0; /* Move sidebar to the left to show it */
        }

        /* Hamburger icon */
        .hamburger-icon {
            color: green;
            cursor: pointer;
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 102; /* Higher z-index to ensure it's above the content and sidebar */
        }

        .fas-side {
    color: #24badd;
}


        @media (max-width: 767.98px) {
            /* Hide sidebar on mobile */
            .sidebar {
                left: -250px; /* Move sidebar off-screen */
            }

            /* Show hamburger icon on mobile */
            .hamburger-icon {
                display: block; /* Show on mobile */
            }

            /* Adjust content margin on mobile */
            .content {
                margin-left: 0;
            }
        }

        @media (min-width: 768px) {
            /* Hide hamburger icon on desktop */
            .hamburger-icon {
                display: none; /* Hide on desktop */
            }
        }
    </style>
</head>
<body>
    <!-- Hamburger icon for mobile -->
    <div class="hamburger-icon" id="sidebarToggle">
        <i class="fas fa-bars fa-2x"></i>
    </div>

    <!-- Admin Navbar -->
    <nav class="admin-navbar navbar navbar-expand-lg">
        <div class="container-fluid">
            <span class="text-white mr-auto user-info">Welcome, <span style="color: #311d97;"><?php echo $this->session->userdata('name') ?></span></span> <!-- Make username colorful -->
            <a href="<?php echo site_url('logout') ?>" class="logout-btn"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </nav>

<!-- Sidebar Option Area -->
<nav class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <!-- Existing sidebar options -->
                <a class="nav-link" href="<?php echo site_url('admin') ?>" data-content="dashboard">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
      
                <a class="nav-link" href="<?php echo site_url('admin/project') ?>" data-content="view-portfolio">
                    <i class="fas fa-folder fas-side"></i> Projects
                </a>
                <a class="nav-link" href="<?php echo site_url('admin/education') ?>" data-content="education">
                    <i class="fas fa-graduation-cap fas-side"></i> Educations
                </a>
                <!-- Add the Experiences option -->
                <a class="nav-link" href="<?php echo site_url('admin/experience') ?>" data-content="experiences">
                    <i class="fas fa-briefcase fas-side"></i> Experiences
                </a>
            </li>
            <!-- Add more sidebar options as needed -->
        </ul>
    </div>
</nav>



    <!-- JavaScript code for handling sidebar click event and redirection -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle click event for hamburger icon to toggle sidebar on mobile and tablet
            $('#sidebarToggle').click(function() {
                $('.sidebar').toggleClass('open'); // Toggle the open class on the sidebar
            });

            // Store the current URL
            var currentUrl = window.location.href;

            // Iterate through each nav-link
            $('.nav-link').each(function() {
                // Check if the href attribute matches the current URL
                if ($(this).attr('href') === currentUrl) {
                    // Add the active class to the matching nav-link
                    $(this).addClass('active-nav-link');
                }
            });

            // Handle click event for nav-links
            $('.nav-link').click(function(event) {
                // Prevent the default link behavior
                event.preventDefault();

                // Remove the active class from all nav-links
                $('.nav-link').removeClass('active-nav-link');

                // Add the active class to the clicked nav-link
                $(this).addClass('active-nav-link');

                // Get the URL to redirect to from the href attribute
                var redirectUrl = $(this).attr('href');

                // Redirect to the specified URL
                window.location.href = redirectUrl;
            });
        });
    </script>

