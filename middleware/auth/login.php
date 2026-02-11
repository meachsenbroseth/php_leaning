<?php include '../pages/header.php'; ?>
<div class="container p-5 mt-4 w-50 shadow-lg">
    <form action="checkLogin.php" method="post">
        <h2 class="text-center">Login</h2>
        <label class="form-label" for="email">Email</label>
        <input class="form-control" type="email" id="email" name="email" uniqid>
        <label class="form-label" for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password">
        <p>Don't have an account?<a href="./register.php">Register</a></p>
        <div class=" d-flex justify-content-end mt-2">
            <a href="../index.php"><button type="button" class="btn btn-secondary">Back</button></a>
            <button name="btnLogin" class="btn btn-primary ms-1">Login</button>
        </div>
    </form>
</div>
<?php include '../pages/footer.php'; ?>
