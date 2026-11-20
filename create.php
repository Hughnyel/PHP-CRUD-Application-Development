<?php require_once "db.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Employee</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>Add New Employee</h4>
        </div>

        <div class="card-body">

            <form action="add.php" method="POST">

                <div class="mb-3">
                    <label>Employee Number</label>
                    <input type="text"
                           name="employee_number"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text"
                           name="first_name"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text"
                           name="last_name"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Email Address</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Department</label>
                    <select name="department" class="form-select" required>
                        <option value="">Select Department</option>
                        <option value="IT">IT</option>
                        <option value="HR">HR</option>
                        <option value="Finance">Finance</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Position</label>
                    <input type="text"
                           name="position"
                           class="form-control"
                           required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Save Employee
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Cancel
                </a>

            </form>
        </div>
    </div>
</div>

</body>
</html>