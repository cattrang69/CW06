<?php
require "db.php";
$id = $_GET['id'] ?? null;
$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_salary = $_POST['salary'];
    $emp_id = $_POST['emp_id'];

    $stmt = $conn->prepare("UPDATE employees SET salary = ? WHERE emp_id = ?");
    $stmt->bind_param("di", $new_salary, $emp_id);
    
    if ($stmt->execute()) {
        header("Location: read_employees.php?msg=updated");
        exit();
    }
    $stmt->close();
}

$stmt = $conn->prepare("SELECT * FROM employees WHERE emp_id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$employee = $stmt->get_result()->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>Update Employee</title>
</head>
<body class="demo-page">
    <div class="demo-shell">
        <div class="demo-card">
            <h2 class="demo-title">Update Salary: <?php echo htmlspecialchars($employee['emp_name']); ?></h2>
            <form method="POST">
                <input type="hidden" name="emp_id" value="<?php echo $employee['emp_id']; ?>">
                <div class="demo-field">
                    <label>New Salary</label>
                    <input type="number" step="0.01" name="salary" class="demo-input" value="<?php echo $employee['salary']; ?>">
                </div>
                <div class="demo-actions">
                    <button type="submit" class="demo-btn">Save Changes</button>
                    <a href="read_employees.php" class="demo-link">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>