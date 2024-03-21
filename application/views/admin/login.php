<!-- application/views/admin/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_admin/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/assets_admin/fontsawesome/css/all.min.css'); ?>">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #0f2943e8; /* Set a light background color */
        }
        .card {
            margin-top: 100px; /* Center the card vertically */
        }
        .card-header {
            background-color: #28a745; /* Set header background color */
            color: #fff; /* Set header text color */
        }
        .btn-primary {
            background-color: #007bff; /* Set button background color */
            border-color: #007bff; /* Set button border color */
            position: relative; /* Position the icon relative to the button */
        }
        .btn-primary:hover {
            background-color: #28a745; /* Change button background color on hover to green */
            border-color: #28a745; /* Change button border color on hover */
        }
        .btn-primary .fas {
            transition: transform 0.3s ease; /* Add transition effect */
        }
        .btn-primary:hover .fas {
            transform: rotate(360deg); /* Rotate the icon 360 degrees on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header text-center">Login</div>
                    <div class="card-body">
                        <?php if ($this->session->flashdata('error')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $this->session->flashdata('error') ?>
                            </div>
                        <?php endif; ?>
                        <form id="login-form" action="<?= site_url('admin/login') ?>" method="post">
                            <div class="form-group">
                                <label for="username"><i class="fas fa-user"></i> Username:</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter your username" value="<?= isset($_COOKIE['remember_me']) ? $_COOKIE['remember_me'] : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="fas fa-lock"></i> Password:</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i id="togglePassword" class="fas fa-eye"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                                <label class="form-check-label" for="rememberMe">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>

    <script src="<?php echo base_url('assets/assets_admin/js/bootstrap.min.js'); ?>"></script>



    <script>
        $(document).ready(function() {
            // Toggle password visibility
            $('#togglePassword').click(function(){
                $(this).toggleClass('fa-eye fa-eye-slash');
                var type = $(this).hasClass('fa-eye') ? 'password' : 'text';
                $('#password').attr('type', type);
            });

            // Handle Remember Me checkbox
            $('#rememberMe').change(function(){
                if(this.checked){
                    // Set cookie with username
                    document.cookie = "remember_me=" + $('#username').val() + "; expires=Fri, 31 Dec 9999 23:59:59 GMT";
                } else {
                    // Clear cookie
                    document.cookie = "remember_me=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
                }
            });

            // Pre-fill username field if "Remember Me" cookie exists
            var rememberMeCookie = getCookie('remember_me');
            if(rememberMeCookie){
                $('#username').val(rememberMeCookie);
                $('#rememberMe').prop('checked', true);
            }

            // Function to get cookie value
            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for(var i=0;i < ca.length;i++) {
                    var c = ca[i];
                    while (c.charAt(0)==' ') c = c.substring(1,c.length);
                    if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
                }
                return null;
            }
        });
    </script>
</body>
</html>
