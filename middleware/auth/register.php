<?php include '../pages/header.php'; ?>
<div class="container p-5 mt-4 w-50 shadow-lg">
    <form action="insert.php" method="post">
        <h2 class="text-center">Register</h2>
        <label class="form-label" for="username">Username</label>
        <input class="form-control" type="text" name="username" id="username">
        <label class="form-label" for="email">Email</label>
        <input class="form-control" name="email" type="email" id="email" uniqid>
        <label class="form-label" for="password">Password</label>
        <input class="form-control" type="password" name="password" id="password">
        <p>Already have an account?<a href="./login.php">Login</a></p>
        <div class=" d-flex justify-content-end mt-2">
            <a href="../index.php"><button class="btn btn-secondary">Back</button></a>
            <button name="btnRegister" class="btn btn-primary ms-1">Register</button>
        </div>
    </form>
</div>
<?php include '../pages/footer.php'; ?>
