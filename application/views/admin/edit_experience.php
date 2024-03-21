<?php include INCLUDES_PATH_ADMIN . "header.php"; ?>

<style>
    .form-group label {
        font-weight: bold;
    }

    .btn-back {
        margin-top: 35px; 
    }

    /* .text-warning {
    color: #d77e1e;
}

.text-success {
    color:  green;
} */

</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h3 class="mb-4">Edit Experience</h3>

            <!-- Edit Education Form -->
            <form id="edit_education_form" action="<?= base_url('admin/dashboard/update_experience/' . $experience_item->id) ?>" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="duration">Duration:</label>
                        <div class="input-group">
                            <select class="form-control" id="duration_from" name="duration_from">
                                <?php for ($year = 2012; $year <= 2024; $year++): ?>
                                    <option value="<?= $year ?>" <?= $year == $experience_item->duration_from ? 'selected' : '' ?>><?= $year ?></option>
                                <?php endfor; ?>
                            </select>
                            <div class="input-group-prepend">
                                <span class="input-group-text">to</span>
                            </div>
                            <select class="form-control" id="duration_to" name="duration_to">
                                <?php for ($year = 2014; $year <= 2024; $year++): ?>
                                    <option value="<?= $year ?>" <?= $year == $experience_item->duration_to ? 'selected' : '' ?>><?= $year ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="job_title">Job Role:</label>
                        <input type="text" class="form-control" id="job_title" name="job_title" placeholder="E.g., SDE" value="<?= $experience_item->title ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="organization">Organization:</label>
                        <input type="text" class="form-control" id="organization" name="organization" placeholder="E.g., ABC Company" value="<?= $experience_item->organization ?>">
                    </div>
                    <!-- <div class="form-group col-md-6">
                        <label for="university">College/University:</label>
                        <input type="text" class="form-control" id="university" name="university" placeholder="E.g., ABC University" value="<?= $experience_item->university ?>">
                    </div> -->
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <div class="description-editor" style="color: black; background-color: white;"><?= $experience_item->description ?></div>
                    <input type="hidden" name="description">
                    <label for="text_color">Text Color</label>
                    <input type="color" id="text_color" name="text_color" onchange="changeTextColor(this)">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Status:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_active" value="1" <?= $experience_item->status == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label <?= $experience_item->status == 1 ? 'text-success' : 'text-warning' ?>" for="status_active">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" <?= $experience_item->status == 0 ? 'checked' : '' ?>>
                            <label class="form-check-label <?= $experience_item->status == 0 ? 'text-success' : 'text-warning' ?>" for="status_inactive">
                                Inactive
                            </label>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4"> 
                    <a href="<?= base_url('admin/experience') ?>" class="btn btn-secondary">Back</a> <!-- Back button -->
                    <button type="submit" class="btn btn-primary">Update</button> 
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Bootstrap Datepicker -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>



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
