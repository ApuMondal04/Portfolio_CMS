<?php include INCLUDES_PATH_ADMIN . "header.php"; ?>

<style>
    #image_previews img {
        margin-right: 5px; /* Add some space between images */
    }

    .form-group label {
        margin-bottom: 2px; /* Add margin between label and input */
    }

    .form-group {
        margin-bottom: 6px;
    }

    /* Add red border for invalid inputs */
    .is-invalid {
        border-color: #dc3545 !important;
    }

    /* Change star color to red */
    .required-star {
        color: #dc3545;
    }
    .justify-content-center {
        margin-bottom: 5%;
    }
</style>

<div class="container mt-5 mb-4">
    <div class="row justify-content-center ">
        <div class="col-md-9">                         
            <h4 class="mb-4">Add New Work:</h4>

            <form id="add_portfolio_form" enctype="multipart/form-data" method="POST" action="<?= base_url('admin/dashboard/save_portfolio') ?>" onsubmit="return validateForm()">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="project_name">Project Name <span class="required-star">*</span></label>
                            <input type="text" class="form-control" id="project_name" name="project_name">
                            <div id="project_name_error" class="invalid-feedback">Please enter the project name.</div>
                        </div>
                        <div class="form-group">
                            <label for="image">Image <span class="required-star">*</span></label>
                            <input type="file" class="form-control" id="image" name="image" onchange="previewImages(event)">
                            <div id="image_previews"></div>
                            <div id="image_error" class="invalid-feedback">Please select an image.</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category">
                        </div>
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" class="form-control" id="heading" name="heading">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description <span class="required-star">*</span></label>
                    <div class="description-editor" style="color: black; background-color: white;" required></div>
                    <input type="hidden" name="description">
                    <label for="text_color">Text Color</label>
                    <input type="color" id="text_color" name="text_color" onchange="changeTextColor(this)">
                    <div id="description_error" class="invalid-feedback">Please enter a description.</div>
                </div>

                <div class="form-group">
                    <label for="project_link">Project Link</label>
                    <input type="text" class="form-control" id="project_link" name="project_link">
                </div>

                    <div class="d-flex justify-content-between mb-4"> 
                        <a href="<?= base_url('admin/project') ?>" class="btn btn-secondary">Back</a> <!-- Back button -->
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
               
            </form>
                
        </div>
    </div>
</div>

<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<script>
    var quill = new Quill('.description-editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                ['link', 'image'],
                [{ 'align': [] }],
                ['clean']
            ]
        }
    });

    // Set initial text color to black
    quill.format('color', '#000000');

    var form = document.querySelector('form');
    form.onsubmit = function() {
        var descriptionInput = document.querySelector('input[name=description]');
        descriptionInput.value = quill.root.innerHTML;
    };



    function validateForm() {
    var projectName = document.getElementById("project_name").value;
    var image = document.getElementById("image").value;
    var description = quill.root.innerHTML;

    var isValid = true;

    // Validate Project Name
    if (projectName.trim() === "") {
        document.getElementById("project_name").classList.add("is-invalid");
        document.getElementById("project_name_error").style.display = "block";
        isValid = false;
    } else {
        document.getElementById("project_name").classList.remove("is-invalid");
        document.getElementById("project_name_error").style.display = "none";
    }

    // Validate Image
    if (image.trim() === "") {
        document.getElementById("image").classList.add("is-invalid");
        document.getElementById("image_error").style.display = "block";
        document.getElementById("image_error").innerText = "Please select an image."; // Display custom error message
        isValid = false;
    } else {
        document.getElementById("image").classList.remove("is-invalid");
        document.getElementById("image_error").style.display = "none";
    }

    // Validate Description
    if (description.trim() === "<p><br></p>") { // Quill editor default empty value
        quill.root.classList.add("is-invalid");
        document.getElementById("description_error").style.display = "block";
        isValid = false;
    } else {
        quill.root.classList.remove("is-invalid");
        document.getElementById("description_error").style.display = "none";
    }

    return isValid;
}



    function previewImages(event) {
        var files = event.target.files;
        var previewContainer = document.getElementById('image_previews');
        previewContainer.innerHTML = ''; // Clear previous previews
        
        for (var i = 0; i < files.length; i++) {
            (function(file) {
                var reader = new FileReader();
                reader.onload = function() {
                    var image = new Image();
                    image.src = reader.result;
                    image.style.height = '50px'; // Set the height to 50 pixels
                    image.style.width = 'auto'; // Allow the width to adjust automatically based on the aspect ratio
                    image.style.marginTop = '25px'; // Add margin-top of 25 pixels
                    previewContainer.appendChild(image);
                }
                reader.readAsDataURL(file);
            })(files[i]);
        }
    }

    function changeTextColor(input) {
        var color = input.value;
        quill.format('color', color);
    }
</script>


<script>
    document.getElementById("add_portfolio_form").onsubmit = function(event) {
    // Prevent the default form submission
    event.preventDefault();
    
    // Validate the form
    var isValid = validateForm();

    // If the form is valid, submit it
    if (isValid) {
        this.submit();
    }
};

</script>
<?php include INCLUDES_PATH_ADMIN . "footer.php"; ?>