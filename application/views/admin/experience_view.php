<?php include INCLUDES_PATH_ADMIN . "header.php"; ?>

<style>
    .small-btn {
        font-size: 12px;
        padding: 0.1rem 0.2rem;
    }
    .action-icons {
        display: flex;
    }
    /* Adjust column width */
    .table-responsive {
        overflow-x: auto;
    }
    .table th, .table td {
        max-width: 100px; 
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        font-size: 12px; /* Set the font size for table data */
    }
    .search-box {
        width: 30%; /* Adjust the width as needed */
    }

    
</style>

<div class="content">
    <div class="container mt-2">
        
        <h4 class="mb-4">Experience Details</h4>

        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Search Box -->
            <input type="text" id="searchInput" class="form-control search-box" placeholder="Search by keyword..">

            <!-- Add Experience Button -->
            <a href="<?= base_url('admin/add-experience') ?>" class="btn btn-primary mb-2 float-right">
                <i class="fas fa-plus-circle mr-1"></i> Add Experience
            </a>
        </div>



        <?php if ($this->session->flashdata('success')) : ?>
            <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $this->session->flashdata('success') ?>
            </div>
            <script>                
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
                        <th class="small">Duration</th>
                        <th class="small">Job Title</th>
                        <th class="small">Organization</th>
                        <th class="small">Job Description</th>
                        
                        <th class="small">Status</th>
                        <th class="small">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $counter = 1; ?>
                    <?php foreach ($experiences as $experience) : ?>
                        <tr>
                            <td class="small"><?= $counter++ ?></td>
                            <td class="small"><?= $experience->duration_from . ' - ' . $experience->duration_to ?></td>
                            <td class="small"><?= $experience->title ?></td>
                            <td class="small"><?= $experience->organization ?></td>
                            <td class="small"><?= $experience->description ?></td>
                            <td class="small" style="color: <?= $experience->status == 1 ? 'green' : '#d77e1e' ?>">
                                <?= $experience->status == 1 ? 'Active' : 'Inactive' ?>
                            </td>
                            <td class="small">
                                <div class="action-icons">
                                    <a href="<?= site_url('admin/edit-experience/' . $experience->id) ?>" class="btn btn-primary btn-sm small-btn"><i class="fas fa-edit"></i> </a> &nbsp &nbsp
                                    <form id="delete-form" action="<?= site_url('admin/dashboard/delete_exp/' . $experience->id) ?>" method="POST" style="display: inline;">
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
