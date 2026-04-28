<?php
require "db.php";
$result = $conn->query("SELECT * FROM employees ORDER BY emp_id DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/style.css">
    <title>View Employees</title>
</head>
<body class="demo-page">
    <div class="demo-shell">
        <div class="demo-card">
            <h2 class="demo-title">Employee Registry</h2>
            <table width="100%" style="border-collapse: collapse; margin-top: 1rem;">
                <thead>
                    <tr style="color: var(--demo-accent); text-align: left; border-bottom: 1px solid var(--demo-border);">
                        <th>ID</th><th>Name</th><th>Job</th><th>Salary</th><th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td><?php echo $row['emp_id']; ?></td>
                        <td><?php echo htmlspecialchars($row['emp_name']); ?></td>
                        <td><?php echo htmlspecialchars($row['job_name']); ?></td>
                        <td>$<?php echo number_format($row['salary'], 2); ?></td>
                       <td>
                            <a href="update_employee.php?id=<?php echo $row['emp_id']; ?>" class="demo-link">Update</a>
                            <span style="color: var(--demo-muted); margin: 0 5px;">|</span>
                            <a href="delete_employee.php?id=<?php echo $row['emp_id']; ?>" 
                                class="demo-link" 
                                style="color: var(--demo-danger);" 
                                onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br>
            <a href="employee_demo.php" class="demo-btn" style="text-decoration:none;">+ Add New</a>
        </div>
    </div>
</body>
</html>