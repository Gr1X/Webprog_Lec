<?php
session_start();
if(isset($_SESSION['id_akun']) && isset($_SESSION['akses_akun'])){
  $akses = $_SESSION['akses_akun'];
  if($akses == 'user'){
    header('location: dashboarduser.php');
  }
  else if($akses == 'admin'){
    header('location: dashboardadmin.php');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<style>
    @import url('https://fonts.cdnfonts.com/css/coolvetica-2');

    body {
        font-family: 'Coolvetica', sans-serif;
        background-image: url('img/bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .background-card {
        background: url('img/bg.jpg') no-repeat center center;
        background-size: cover;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        padding: 20px;
        position: relative; /* Tambahkan ini untuk memungkinkan penggunaan ::after */
    }

    .background-card::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 50%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.85), rgba(0, 0, 0, 0));
        border-radius: 10px;
    }


    .button_login {
        background-color: #6f42c1;
        border-color: #6f42c1;
        color: white;
    }

    .button_login:hover {
        background-color: #5a3799;
        border-color: #5a3799;
    }

</style>

<body class="d-flex justify-content-center align-items-center min-vh-100 ">
    <div class="d-flex justify-content-center shadow">
        <div class="card login-card border-0 shadow-lg rounded-4" style="max-width: 1200px;">
            <div class="row g-0 border border-0 rounded-4">
                <div class="col-md-5 border border-0 rounded-4">
                    <div class="background-card border border-0 rounded-4 rounded-end-0">
                        <div class="z-1 mt-auto">
                            <p class="fs-1 m-0">Welcome to Waravent</p>
                            <p class="fs-6">Group Pandawara</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 p-5 shadow-xl">
                    <div class="card-body p-0 text-center">
                        <div class="overlay mb-4">
                            <h5 class="card-title fw-bold mt-5">Login</h5>
                            <p class="card-text text-muted">Hello, Enter your details to sign in to your account</p>
                        </div>

                        <!-- Alert buat login -->
                        <?php 
                        if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_SESSION['error']; ?>
                            </div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>

                        <form action="loginproses.php" method="post">
                            <div class="d-flex border rounded mb-3">
                                <i class='bx bx-user text-center align-self-center fs-4 p-2'></i>
                                <input type="email" required class="form-control border-0" name="email" placeholder="Email">
                            </div>
                            <div class="d-flex border rounded mb-4">
                                <i class='bx bx-lock text-center align-self-center fs-4 p-2'></i>
                                <input type="password" required class="form-control border-0" name="password_akun" placeholder="Password">
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn button_login">Login In</button>
                            </div>
                        </form>
                        
                        <p class="text-muted">Don't have an account? <a href="#" class="text-decoration-none">Sign Up now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
