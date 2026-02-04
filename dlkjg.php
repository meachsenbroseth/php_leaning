<?php
include('conn.php');

// Initialize variables
$ename = "";
$gender = "";
$email = "";
$position = "";
$sal = "";
$employees = [];

// Handle form submission
if (isset($_POST['btnSubmit'])) {
    $ename = $_POST['ename'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $position = $_POST['position'];
    $sal = $_POST['sal'];

    // Validate inputs
    if (!empty($ename) && !empty($gender) && !empty($email) && !empty($position) && !empty($sal)) {
        // Prepare the SQL statement with placeholders
        $sql = "INSERT INTO `tbl_employees`(`ename`, `gender`, `email`, `position`, `Salary`) 
                VALUES (?, ?, ?, ?, ?)";
        
        // Prepare statement
        $stmt = mysqli_prepare($conn, $sql);
        
        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sssss", $ename, $gender, $email, $position, $sal);
            
            // Execute the query
            if (mysqli_stmt_execute($stmt)) {
                echo "<script>alert('Record inserted successfully!')</script>";
                
                // Clear form fields after successful submission
                $ename = $gender = $email = $position = $sal = "";
                
                // Redirect to prevent form resubmission
                echo "<script>window.location.href = window.location.href;</script>";
            } else {
                echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
            }
            
            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            echo "<script>alert('Error preparing statement: " . mysqli_error($conn) . "')</script>";
        }
    } else {
        echo "<script>alert('Please fill in all fields!')</script>";
    }
}

// Fetch all employees from database
$sql_select = "SELECT * FROM tbl_employees ORDER BY id DESC";
$result = mysqli_query($conn, $sql_select);

if ($result) {
    $employees = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Employee Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous" />
</head>

<body>
    <div class="container mt-4">
        <!-- Button trigger modal -->
        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add Employee
            </button>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Employee List</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Email</th>
                                <th>Position</th>
                                <th>Salary</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($employees)): ?>
                                <tr>
                                    <td colspan="7" class="text-center">No employees found</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($employees as $employee): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($employee['id'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($employee['ename'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($employee['gender'] ?? '') ?></td>
                                        <td><?= htmlspecialchars($employee['email'] ?? '') ?></td>
                                        <td>
                                            <?php 
                                            $positions = [
                                                'cto' => 'Chief Technology Officer',
                                                'project_manager' => 'Project Manager',
                                                'frontend_dev' => 'Frontend Developer',
                                                'backend_dev' => 'Backend Developer',
                                                'it_support' => 'IT Support',
                                                'database_admin' => 'Database Administrator'
                                            ];
                                            echo $positions[$employee['position']] ?? htmlspecialchars($employee['position'] ?? '');
                                            ?>
                                        </td>
                                        <td>$<?= number_format($employee['Salary'] ?? 0, 2) ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-warning btn-sm">Edit</button>
                                                <button type="button" class="btn btn-danger btn-sm">Delete</button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Employee Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Employee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="ename" class="form-label">Employee Name *</label>
                            <input type="text" class="form-control" id="ename" name="ename" 
                                   value="<?= htmlspecialchars($ename) ?>" 
                                   placeholder="Enter Employee Name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender *</label>
                            <select class="form-select" name="gender" id="gender" required>
                                <option value="" disabled <?= empty($gender) ? 'selected' : '' ?>>Select Gender</option>
                                <option value="Male" <?= $gender == 'Male' ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= $gender == 'Female' ? 'selected' : '' ?>>Female</option>
                                <option value="Other" <?= $gender == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" 
                                   value="<?= htmlspecialchars($email) ?>" 
                                   placeholder="Enter Email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="sal" class="form-label">Salary *</label>
                            <input type="number" class="form-control" id="sal" name="sal" 
                                   value="<?= htmlspecialchars($sal) ?>" 
                                   placeholder="Enter Salary" min="0" step="0.01" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="position" class="form-label">Position *</label>
                            <select class="form-select" name="position" id="position" required>
                                <option value="" disabled <?= empty($position) ? 'selected' : '' ?>>Select Position</option>
                                <option value="cto" <?= $position == 'cto' ? 'selected' : '' ?>>Chief Technology Officer (CTO)</option>
                                <option value="project_manager" <?= $position == 'project_manager' ? 'selected' : '' ?>>Project Manager</option>
                                <option value="frontend_dev" <?= $position == 'frontend_dev' ? 'selected' : '' ?>>Frontend Developer</option>
                                <option value="backend_dev" <?= $position == 'backend_dev' ? 'selected' : '' ?>>Backend Developer</option>
                                <option value="it_support" <?= $position == 'it_support' ? 'selected' : '' ?>>IT Support Specialist</option>
                                <option value="database_admin" <?= $position == 'database_admin' ? 'selected' : '' ?>>Database Administrator</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="btnSubmit" class="btn btn-primary">Save Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>
</html>