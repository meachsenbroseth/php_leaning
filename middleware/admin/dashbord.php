<?php
require '../conn.php';
include '../pages/header.php';
session_start();
?>
<h1>Hello admin</h1>
<?php
session_start();
if (isset($_SESSION['is_admin']) || ($_SESSION['is_admin'])!=1) {
    header('location: ../auth/login.php');
    exit();
} else {
        echo '<a href="../auth/logout.php"><button name="btnLogin" class="btn btn-primary ms-1">Logout</button></a>';
}
?>
<?php include '../pages/footer.php'; ?>