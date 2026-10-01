<?php
   
    session_start();
    include "../config/database.php";

    // only admin can access this page.
    if(!isset($_SESSION ["role"]) || $_SESSION["role"] != "admin"){
        header("Location: ../index.php");
        exit();

    }
    //Get all students
   $sql = "SELECT * FROM users
   WHERE role= 'student' ORDER BY id DESC";
   $result = mysqli_query($conn,$sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Student Portal</title>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <div class="login-box">
        <div class="card"><div class="card-body p-4">
            <h2 class="text-center">Student Portal</h2>
            <p class="text-center text-muted">Admin and Student Login</p>
            <?php if($error != ""){?>
                <div class="aler alert-danger"><?php echo $error; ?></div>
           <?php } ?>
            <form method="POST">
                <div class="mb-3"><label class="form-label">Username</label><input type="text" name="username" class="form-control"></div>
                <div class="mb-3"><label class="form-label">Password</label><input type="password" name="password" class="form-control"></div>
                <button class="btn btn-primary w-100" type="submit" name="login">Login</button>
            </form>
        </div></div>
    </div>
</div>
</body>
</html>
