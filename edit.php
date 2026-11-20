<?php
require_once "db.php";

$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if (!$id || $id < 1) {
    die("Invalid employee ID.");
}

$stmt = $pdo->prepare(
    "SELECT * FROM employees WHERE employee_id = ?"
);

$stmt->execute([$id]);

$employee = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$employee) {
    die("Employee record not found.");
}

// Keep this list the same as the one in add.php
$departments = ["IT", "HR", "Finance", "Marketing", "Operations"];

// If the saved department isn't in the list, still show it
if (!in_array($employee["department"], $departments, true)) {
    $departments[] = $employee["department"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Employee</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header bg-warning">
            <h4>Edit Employee Information</h4>
        </div>

        <div class="card-body">

            <form action="update.php" method="POST">

                <input type="hidden"
                       name="employee_id"
                       value="<?= e($employee["employee_id"]) ?>">

                <div class="mb-3">
                    <label>Employee Number</label>
                    <input type="text"
                           name="employee_number"
                           class="form-control"
                           value="<?= e($employee["employee_number"]) ?>"
                           maxlength="30"
                           required>
                </div>

                <div class="mb-3">
                    <label>First Name</label>
                    <input type="text"
                           name="first_name"
                           class="form-control"
                           value="<?= e($employee["first_name"]) ?>"
                           maxlength="100"
                           required>
                </div>

                <div class="mb-3">
                    <label>Last Name</label>
                    <input type="text"
                           name="last_name"
                           class="form-control"
                           value="<?= e($employee["last_name"]) ?>"
                           maxlength="100"
                           required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="<?= e($employee["email"]) ?>"
                           maxlength="150"
                           required>
                </div>

                <div class="mb-3">
                    <label>Department</label>

                    <select name="department" class="form-select" required>
                        <?php foreach ($departments as $dept): ?>
                            <option value="<?= e($dept) ?>"
                                <?= $employee["department"] === $dept ? "selected" : "" ?>>
                                <?= e($dept) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Position</label>
                    <input type="text"
                           name="position"
                           class="form-control"
                           value="<?= e($employee["position"]) ?>"
                           maxlength="100"
                           required>
                </div>

                <button type="submit" class="btn btn-warning">
                    Update Employee
                </button>

                <a href="index.php" class="btn btn-secondary">
                    Cancel
                </a>

            </form>