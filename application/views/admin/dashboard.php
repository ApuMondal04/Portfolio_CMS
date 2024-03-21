<?php include INCLUDES_PATH_ADMIN . "header.php"; ?>

<style>
    .total-projects-box {
        background-color: #007bff; /* Primary color */
        color: #ffffff; /* White text */
        padding: 15px; /* Padding */
        border-radius: 10px; /* Rounded corners */
        text-align: center; /* Center align text */
    }

    .total-projects-box h3 {
        font-size: 24px; /* Set font size for heading */
    }

    .total-projects-box p {
        font-size: 24px; /* Set font size for paragraph */
        color: white;
    }
</style>

<!-- Content Area -->
<div class="content">
    <!-- Total Projects Box -->
    <div class="">
        <div class="row">
            <div class="col-md-3">
                <div class="total-projects-box bg-primary text-white p-3 rounded">
                    <h3>Total</h3>
                    <p class="total-count"><?php echo $total_projects; ?></p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="total-projects-box bg-primary text-white p-3 rounded">
                    <h3>Total</h3>
                    <p class="total-count"><?php echo $total_experience; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include INCLUDES_PATH_ADMIN . "footer.php"; ?>
