<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styling/login.css">
</head>

<body class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="container-fluid d-flex justify-content-center">
        <div class="row justify-content-center align-items-center w-100">
            <div class="col-lg-8 col-md-10 col-sm-12">
                <div class="card login-card border-0 shadow-lg">
                    <div class="row g-0">
                        <div class="col-lg-5 d-none d-lg-block">
                            <div class="background-card h-100">
                                <div class="z-1 mt-auto">
                                    <p class="fs-1 m-0">Welcome to Waravent</p>
                                    <p class="fs-6">Group Pandawara</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-12 p-5">
                            <div class="card-body text-center">
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
                                        <button type="submit" class="btn button_login">Log In</button>
                                    </div>
                                </form>

                                <p class="text-muted">Don't have an account? <a href="registeruser.php" class="text-decoration-none">Sign Up now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Section -->
    <?php  if (isset($_SESSION['error'])): ?>
        <div class="alert bg-light border border-0 rounded-4 shadow-lg px-5 py-3 position-absolute top-0 start-50 translate-middle-x mt-3">
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

    <?php  if (isset($_SESSION['registered'])): ?>
        <div class="alert bg-light border border-0 rounded-4 shadow-lg px-5 py-3 position-absolute top-0 start-50 translate-middle-x mt-3">
            <div class="d-flex">
                <i class='bx bxs-megaphone bg-primary text-light border border-0 rounded-circle p-2 fs-4 fw-bold'></i>
                <h4 class="align-self-center fw-semibold m-0 p-0 ms-2 text-muted"><?= $_SESSION['registered']; ?></h4>
            </div>
            <div class="text-start mt-3 ms-2">
                <p class="m-0 p-0 text-muted">Your account has succesfully created, now input to login.</p>
            </div>
        </div>
        <?php unset($_SESSION['registered']); ?>
    <?php endif; ?>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var alertElement = document.querySelector('.alert');
        if (alertElement) {
            alertElement.classList.add('show');
            setTimeout(function() {
                alertElement.classList.add('hide');
            }, 3000);
            setTimeout(function() {
                alertElement.remove();
            }, 3500);
        }
    });
</script>

</html>
