<?php

require_once "db.php";

$search = trim($_GET["search"] ?? "");

if ($search !== "") {

    $sql = "SELECT * FROM employees
            WHERE employee_number LIKE ?
            OR first_name LIKE ?
            OR last_name LIKE ?
            OR department LIKE ?
            ORDER BY employee_id DESC";

    $stmt = $pdo->prepare($sql);
    $keyword = "%$search%";

    $stmt->execute([
        $keyword,
        $keyword,
        $keyword,
        $keyword
    ]);

} else {

    $sql = "SELECT * FROM employees
            ORDER BY employee_id DESC";

    $stmt = $pdo->query($sql);
}

$employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Information System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="d-flex justify-content-between mb-3">
        <h2>Employee Information System</h2>

        <a href="create.php" class="btn btn-primary">
            + Add Employee
        </a>
    </div>

    <?php if (isset($_GET["message"])): ?>
        <div class="alert alert-success">
            <?php
            $messages = [
                "added" => "Employee successfully added.",
                "updated" => "Employee successfully updated.",
                "deleted" => "Employee successfully deleted."
            ];

            echo e(
                $messages[$_GET["message"]]
                ?? "Operation completed."
            );
            ?>
        </div>
    <?php endif; ?>

    <div class="card shadow">

        <div class="card-body">

            <form method="GET" class="mb-3">
                <div class="input-group">

                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Search employee..."
                           value="<?= e($search) ?>">

                    <button class="btn btn-dark">
                        Search
                    </button>

                    <a href="index.php"
                       class="btn btn-secondary">
                        Reset
                    </a>

                </div>
            </form>

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Employee Number</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Position</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    <?php if (count($employees) > 0): ?>

                        <?php foreach ($employees as $employee): ?>

                            <tr>
                                <td><?= e($employee["employee_id"]) ?></td>

                                <td><?= e($employee["employee_number"]) ?></td>

                                <td>
                                    <?= e($employee["first_name"]) ?>
                                    <?= e($employee["last_name"]) ?>
                                </td>

                                <td><?= e($employee["email"]) ?></td>

                                <td><?= e($employee["department"]) ?></td>

                                <td><?= e($employee["position"]) ?></td>

                                <td>
                                    <a href="edit.php?id=<?= e($employee["employee_id"]) ?>"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="delete.php"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Delete this employee?');">

                                        <input type="hidden"
                                               name="employee_id"
                                               value="<?= e($employee["employee_id"]) ?>">

                                        <button type="submit"
                                                class="btn btn-danger btn-sm">
                                            Delete
                                        </button>

                                    </form>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                    <?php else: ?>

                        <tr>
                            <td colspan="7" class="text-center">
                                No employee records found.
                            </td>
                        </tr>

                    <?php endif; ?>

                    </tbody>

                </table>

            </div>

            <p class="text-muted">
                Total records: <?= count($employees) ?>
            </p>

        </div>
    </div>

</div>

</body>
</html>
