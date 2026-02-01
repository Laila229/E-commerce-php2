<?php
require_once './config/database.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Employees</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="text-primary">Employee List</h3>
            <a href="add-employee.php" class="btn btn-success">
                + Add New Employee
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-hover text-center align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Salary</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Fetch data
                        $sql = "SELECT * FROM users";
                        $result = $db->query($sql);
                        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

                        if (count($rows) > 0):
                            foreach ($rows as $row): ?>
                                <tr>
                                    <td><?= $row['id']; ?></td>
                                    <td><?= htmlspecialchars($row['name']); ?></td>
                                    <td><?= htmlspecialchars($row['address']); ?></td>
                                    <td><?= htmlspecialchars($row['salary']); ?></td>
                                    <td>
                                        <a href="view-employee.php?id=<?= $row['id']; ?>"
                                            class="btn btn-sm btn-info text-white">
                                            View
                                        </a>

                                        <a href="update-employee.php?id=<?= $row['id']; ?>"
                                            class="btn btn-sm btn-warning">
                                            Edit
                                        </a>

                                        <button
                                            class="btn btn-sm btn-danger"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            data-id="<?= $row['id']; ?>">
                                            Delete
                                        </button>

                                    </td>
                                </tr>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form method="POST" action="data/delete-employee.php">

                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body text-center">
                        <input type="hidden" name="id" id="delete-id">
                        <p class="mb-0">Are you sure you want to delete this employee?</p>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-danger">
                            Yes, Delete
                        </button>
                    </div>

                </form>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const deleteModal = document.getElementById('deleteModal');

        deleteModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');

            document.getElementById('delete-id').value = id;
        });
    </script>

</body>

</html>