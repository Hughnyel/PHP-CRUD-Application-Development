<?php

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: create.php");
    exit;
}

$employee_number = trim($_POST["employee_number"] ?? "");
$first_name = trim($_POST["first_name"] ?? "");
$last_name = trim($_POST["last_name"] ?? "");
$email = trim($_POST["email"] ?? "");
$department = trim($_POST["department"] ?? "");
$position = trim($_POST["position"] ?? "");

$allowed_departments = ["IT", "HR", "Finance"];

if (
    $employee_number === "" ||
    $first_name === "" ||
    $last_name === "" ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    !in_array($department, $allowed_departments, true) ||
    $position === ""
) {
    die("Invalid input. Please check the submitted information.");
}

try {

    $sql = "INSERT INTO employees
            (employee_number, first_name, last_name,
             email, department, position)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $employee_number,
        $first_name,
        $last_name,
        $email,
        $department,
        $position
    ]);

    header("Location: index.php?message=added");
    exit;

} catch (PDOException $e) {
    if ($e->getCode() == "23000") {
        die("Employee number or email already exists.");
    }

    die("Unable to save employee record.");
}
?>