<?php
require "db.php";
$msg = "";
$msgClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name   = htmlspecialchars($_POST['emp_name']);
    $job    = htmlspecialchars($_POST['job_name']);
    $salary = $_POST['salary'];
    $h_date = $_POST['hire_date'];

    $stmt = $conn->prepare("INSERT INTO employees (emp_name, job_name, salary, hire_date) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $job, $salary, $h_date);

    if ($stmt->execute()) {
        $msg = "Success! New Employee ID: " . $conn->insert_id;
        $msgClass = "success";
    } else {
        $msg = "Error: Could not save record.";
        $msgClass = "error";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Management</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="demo-page">
    <div class="demo-shell">
        <div class="demo-card">
            <h1 class="demo-title">Add New Employee</h1>
            <p class="demo-subtitle">CW-06 Professional Mini-Build</p>

            <form method="POST" class="demo-grid">
                <div class="demo-field">
                    <label>Full Name</label>
                    <input type="text" name="emp_name" class="demo-input" required>
                </div>
                <div class="demo-field">
                    <label>Job Title</label>
                    <input type="text" name="job_name" class="demo-input" required>
                </div>
                <div class="demo-field">
                    <label>Salary</label>
                    <input type="number" step="0.01" name="salary" class="demo-input" required>
                </div>
                <div class="demo-field">
                    <label>Hire Date</label>
                    <input type="date" name="hire_date" class="demo-input" required>
                </div>
                
                <div class="demo-actions">
                    <button type="submit" class="demo-btn">Save Employee</button>
                    <a href="read_employees.php" class="demo-link">View All Records →</a>
                </div>
            </form>

            <?php if ($msg): ?>
                <div class="demo-msg <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>