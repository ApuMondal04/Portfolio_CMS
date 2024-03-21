<?php include INCLUDES_PATH_ADMIN . "header.php"; ?>

<style>
    .table img {
        height: 40px;
        width: auto;
    }
    .small-btn {
        font-size: 12px;
        padding: 0.1rem 0.2rem;
    }
    .action-icons {
        display: flex;
        justify-content: space-between;
    }
    .search-box {
        width: 30%; /* Adjust the width as needed */
    }
</style>

<div class="content">
    <div class="container mt-2">
    
        <h4 class="mb-4">Portfolio Projects</h4>
        <!-- <a href="<?= base_url('admin/add-project') ?>" class="btn btn-primary mb-2">+ Add Project</a> -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Search Box -->
            <input type="text" id="searchInput" class="form-control search-box" placeholder="Search by keyword..">

        
            <a href="<?= base_url('admin/add-project') ?>" class="btn btn-primary mb-2 float-right">
                <i class="fas fa-plus-circle mr-1"></i> Add Project
            </a>
        </div>
        <?php if ($this->session->flashdata('success')) : ?>
            <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success') ?>
            </div>
            <script>
                // Automatically hide the success message after 2 seconds
                setTimeout(function() {
                    document.getElementById('success-message').style.display = 'none';
                }, 2000);
            </script>
        <?php endif; ?>


        
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th class="small">ID</th>
                        <th class="small">Project Name</th>
                        <th class="small">Category</th>
                        <th class="small">Heading</th>
                        <th class="small">Description</th>  
                        <th class="small">Project Link</th>
                        <th class="small">Image</th>
                        <th class="small">Date Added</th>
                        <th class="small">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($portfolio_items as $item): ?>
                        <tr>
                            <td class="small"><?= $item['id'] ?></td>
                            <td class="small"><?= $item['project_name'] ?></td>
                            <td class="small"><?= $item['category'] ?></td>
                            <td class="small"><?= $item['heading'] ?></td>
                            <td class="small"><?= $item['description'] ?></td>
                            <td class="small"><a href="<?= $item['project_link'] ?>" target="_blank"><?= $item['project_link'] ?></a></td>
                            <td class="small">
                                <a href="<?= base_url($item['image_url']) ?>" target="_blank">
                                    <img src="<?= base_url($item['image_url']) ?>" alt="<?= $item['project_name'] ?>">
                                </a>
                            </td>

                            <td class="small"><?= $item['date_added'] ?></td>
                            <td>
                                <!-- Edit and Delete icons side by side -->
                                <div class="action-icons">
                                    <a href="<?= site_url('admin/edit-project/'.$item['id']) ?>" class="btn btn-primary btn-sm small-btn"><i class="fas fa-edit"></i> </a> &nbsp 
                                    
                                    <form id="delete-form-<?= $item['id'] ?>" action="<?= site_url('admin/dashboard/delete_portfolio/'.$item['id']) ?>" method="POST" style="display: inline;">
                                        <button type="submit" class="btn btn-danger btn-sm small-btn" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fas fa-trash-alt"></i> </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- JavaScript code for handling sidebar click event and highlighting active link -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<script>
    $(document).ready(function() {
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
    });
</script>


<script>
    // JavaScript for filtering
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const tableRows = document.querySelectorAll('.table tbody tr');

        searchInput.addEventListener('input', function () {
            const searchText = searchInput.value.toLowerCase();

            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let found = false;

                cells.forEach(cell => {
                    const text = cell.textContent.toLowerCase();
                    if (text.includes(searchText)) {
                        found = true;
                    }
                });

                if (found) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    });
</script>

<?php include INCLUDES_PATH_ADMIN . "footer.php"; ?>
