<?php
setcookie('is_admin', $row['is_admin'], time() + 60, '/');
header('location: ../index.php');
