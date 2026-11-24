<?php
require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit;
}

$id = filter_var(
    $_POST["employee_id"] ?? "",
    FILTER_VALIDATE_INT
);

$employee_number = trim($_POST["employee_number"] ?? "");
$first_name      = trim($_POST["first_name"] ?? "");
$last_name       = trim($_POST["last_name"] ?? "");
$email           = trim($_POST["email"] ?? "");
$department      = trim($_POST["department"] ?? "");
$position        = trim($_POST["position"] ?? "");

if (
    !$id || $id < 1 ||
    $employee_number === "" ||
    $first_name === "" ||
    $last_name === "" ||
    !filter_var($email, FILTER_VALIDATE_EMAIL) ||
    $department === "" ||
    $position === ""
) {
    die("Invalid input. Please check the submitted information.");
}

try {

    $sql = "UPDATE employees SET
                employee_number = ?,
                first_name = ?,
                last_name = ?,
                email = ?,
                department = ?,
                position = ?
            WHERE employee_id = ?";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        $employee_number,
        $first_name,
        $last_name,
        $email,
        $department,
        $position,
        $id
    ]);

    header("Location: index.php?message=updated");
    exit;

} catch (PDOException $e) {

    if ($e->getCode() == "23000") {
        die("Employee number or email already exists.");
    }

    die("Unable to update employee record.");
}
?>