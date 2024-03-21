<?php include INCLUDES_PATH_ADMIN . "header.php"; ?>

<style>

    .form-group label {
        margin-bottom: 2px; 
    }

    .form-group {
    margin-bottom: 6px;
}
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h4 class="mb-4">Edit Project:</h4>

            <form id="edit_portfolio_form" enctype="multipart/form-data" method="POST" action="<?= base_url('admin/dashboard/update_portfolio/'.$portfolio_item->id) ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" class="form-control" id="project_name" name="project_name" value="<?= $portfolio_item->project_name ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            <img src="<?= base_url($portfolio_item->image_url) ?>" alt="<?= $portfolio_item->project_name ?>" style="max-width: 100px;">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category" value="<?= $portfolio_item->category ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="heading">Heading</label>
                            <input type="text" class="form-control" id="heading" name="heading" value="<?= $portfolio_item->heading ?>">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <div class="description-editor" style="color: black; background-color: white;"><?= $portfolio_item->description ?></div>
                    <input type="hidden" name="description">
                    <label for="text_color">Text Color</label>
                    <input type="color" id="text_color" name="text_color" onchange="changeTextColor(this)">
                </div>
                <div class="form-group">
                    <label for="project_link">Project Link</label>
                    <input type="text" class="form-control" id="project_link" name="project_link" value="<?= $portfolio_item->project_link ?>">
                </div>

                <div class="d-flex justify-content-between mb-4"> <!-- Flex container to align buttons -->
                    <a href="<?= base_url('admin/project') ?>" class="btn btn-secondary">Back</a> <!-- Back button -->
                    <button type="submit" class="btn btn-primary">Update</button> <!-- Update button -->
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

    function changeTextColor(input) {
        var color = input.value;
        quill.format('color', color);
    }
</script>



<?php include INCLUDES_PATH_ADMIN . "footer.php"; ?>
