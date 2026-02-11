<?php
require '../conn.php';
include '../pages/header.php';
?>
<h1>Hello admin</h1>
<?php
if (!isset($_COOKIE['is_admin']) || $_COOKIE['is_admin'] != 1) {
    header('location: ../auth/login.php');
    exit();
} else {
        echo '<a href="../auth/logout.php"><button name="btnLogin" class="btn btn-primary ms-1">Logout</button></a>';
}
?>
<?php include '../pages/footer.php'; ?>