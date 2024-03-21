<?php include INCLUDES_PATH_ADMIN . "header.php"; ?>

<style>
    .form-group label {
        font-weight: bold;
    }

    .btn-back {
        margin-top: 35px; 
    }
</style>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <h4 class="mb-4">Add Education:</h4>

            <!-- Add Education Form -->
            <form id="add_education_form" action="<?= base_url('admin/dashboard/save_education') ?>" method="POST">
            <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="duration">Duration:</label>
                        <div class="input-group">
                            <select class="form-control" id="duration_from" name="duration_from">
                                <?php for ($year = 2012; $year <= 2024; $year++): ?>
                                    <option value="<?= $year ?>"><?= $year ?></option>
                                <?php endfor; ?>
                            </select>
                            <div class="input-group-prepend">
                                <span class="input-group-text">to</span>
                            </div>
                            <select class="form-control" id="duration_to" name="duration_to">
                                <?php for ($year = 2014; $year <= 2024; $year++): ?>
                                    <option value="<?= $year ?>"><?= $year ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="marks">CGPA/Percentage:</label>
                        <input type="text" class="form-control" id="marks" name="marks" placeholder="E.g., 4.2">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="qualification">Qualification:</label>
                        <input type="text" class="form-control" id="qualification" name="qualification" placeholder="E.g., Bachelor's Degree">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="university">College/University:</label>
                        <input type="text" class="form-control" id="university" name="university" placeholder="E.g., ABC University">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Status:</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_active" value="1" checked>
                            <label class="form-check-label" for="status_active">
                                Active
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0">
                            <label class="form-check-label" for="status_inactive">
                                Inactive
                            </label>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between mb-4"> 
                    <a href="<?= base_url('admin/education') ?>" class="btn btn-secondary">Back</a> <!-- Back button -->
                    <button type="submit" class="btn btn-primary">Submit</button> 
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Bootstrap Datepicker -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>



<?php include INCLUDES_PATH_ADMIN . "footer.php"; ?>
