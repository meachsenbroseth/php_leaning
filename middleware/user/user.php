<?php
require '../conn.php';
include '../pages/header.php';
?>
<h1>Hello user</h1>
<?php
if (isset($_COOKIE['is_admin'])) {
    echo '<a href="../auth/logout.php"><button name="btnLogin" class="btn btn-primary ms-1">Logout</button></a>';
} else {
    echo '<a href="../auth/login.php"><button name="btnLogin" class="btn btn-primary ms-1">Login</button></a>';
}
?>
<?php include '../pages/footer.php'; ?>