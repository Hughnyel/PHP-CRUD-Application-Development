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

if (!$id || $id < 1) {
    die("Invalid employee ID.");
}

try {

    $sql = "DELETE FROM employees WHERE employee_id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        header("Location: index.php?message=deleted");
    } else {
        header("Location: index.php");
    }

    exit;

} catch (PDOException $e) {
    die("Unable to delete employee record.");
}

?>