<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in</title>
    <link rel="stylesheet" href="../Bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="vh-100 background-gradient">

<div class="container py-3 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white border-2">
                <div class="card-body p-5 text-center">
                    <form action="register.php" method="post" class="mb-md-5 mt-md-4 pb-5">
                        <h2 class="fw-bold mb-2 text-uppercase">Register</h2>
                        <p class="text-white-50 mb-5">Please enter your email and password!</p>
                        <div class="invalid-feedback fs-5 fw-bold" <?php echo 'style="display:' . $_SESSION['display'] . '"' ?>>
                            User already exists!
                        </div>
                        <div class="form-outline form-white mt-4 mb-4">
                            <input class="form-control form-control-lg" id="email" name="email" type="email" required>
                            <label class="form-label" for="email">Email</label>
                        </div>
                        <div class="form-outline form-white mb-4">
                            <input class="form-control form-control-lg" id="password" name="password" type="password"
                                   required>
                            <label class="form-label" for="password">Password</label>
                        </div>
                        <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>
                    </form>
                    <div>
                        <p class="mb-0">Already have an account?
                            <a href="../Log_in/" class="text-white-50 fw-bold">Log in</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../Bootstrap/js/bootstrap.js"></script>
</body>
</html>
<?php
$_SESSION['display'] = "none";
?>
