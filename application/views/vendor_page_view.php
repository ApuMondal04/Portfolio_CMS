<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        /* Add your custom CSS styles here */
        .container {
            margin-top: 50px;
        }
        .form-control {
            margin-bottom: 20px;
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Vendor Page</h1>
        <p>This is a sample view for the vendor_page.</p>
        

        <form>
            <div class="form-group">
                <label for="vendor">Select Vendor</label>
                <select class="form-control" id="vendor">
                    <option value="">Select</option>
                    <option value="vendor1">Vendor 1</option>
                    <option value="vendor2">Vendor 2</option>
                    <option value="vendor3">Vendor 3</option>
                   
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3" placeholder="Enter your message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
