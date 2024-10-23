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
    <link rel="stylesheet" href="styling/login.css">
</head>

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
                            <h3 class="card-title fw-bold mt-5">Login Account</h3>
                            <p class="card-text text-muted">Hello, Enter your details to sign in to your account</p>
                        </div>

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
                        
                        <p class="text-muted">Don't have an account? <a href="registeruser.php" class="text-decoration-none">Sign Up now</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        
    <?php  if (isset($_SESSION['error'])): ?>
        <div class="alert bg-light border border-0 rounded-4 shadow-lg px-5 py-3 position-absolute top-0 start-50 translate-middle-x mt-3" data-bs-backdrop="static" role="alert">
            <div class="d-flex">
                <i class='bx bx-x bg-danger text-light border border-0 rounded-circle p-1 fs-4 fw-bold'></i>
                <h4 class="align-self-center fw-semibold m-0 p-0 ms-2 text-muted"><?= $_SESSION['error']; ?></h4>
            </div>
            <div class="text-start mt-3 ms-2">
                <p class="m-0 p-0 text-muted">Please try again and make sure your password was correct before submited.</p>
            </div>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
</body>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Cek apakah elemen alert ada di halaman
            var alertElement = document.querySelector('.alert');

            if (alertElement) {
                // Tambahkan kelas "show" untuk memunculkan alert
                alertElement.classList.add('show');

                // Sembunyikan alert setelah 3 detik
                setTimeout(function() {
                    alertElement.classList.add('hide');
                }, 3000); // 3 detik (3000 ms)

                // Hapus elemen alert dari DOM setelah animasi selesai
                setTimeout(function() {
                    alertElement.remove();
                }, 3500); // Tambahkan jeda untuk memastikan animasi selesai
            }
        });
    </script>

</html>
