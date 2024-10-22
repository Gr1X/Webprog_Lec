<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/registeruser.css">
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
                            <h3 class="card-title fw-bold mt-5">Register Account</h3>
                            <p class="card-text text-muted">Hello, Enter set your account for registration</p>
                        </div>

                        <form action="registerproses.php" method="post">
                            <div class="d-flex border rounded mb-3">
                                <i class='bx bx-user text-center align-self-center fs-4 p-2'></i>
                                <input type="text" required class="form-control border-0" name="username" placeholder="Username">
                            </div>
                            <div class="d-flex border rounded mb-3">
                                <i class='bx bx-envelope-open text-center align-self-center fs-4 p-2'></i>
                                <input type="email" required class="form-control border-0" name="email" placeholder="Email">
                            </div>
                            <div class="d-flex border rounded mb-4">
                                <i class='bx bx-lock text-center align-self-center fs-4 p-2'></i>
                                <input type="password" required class="form-control border-0" name="password_akun" placeholder="Password">
                            </div>
                            <div class="d-grid mb-3">
                                <input type="hidden" name="akses_akun" value="user">
                                <button type="submit" class="btn button_login">Register</button>
                            </div>
                        </form>

                        <p class="text-muted">Already have an Account? <a href="login.php" class="text-decoration-none">Login</a></p>
                        <p class="m-0">
                            <button type="button" class="btn bg-transparent border border-0 text-dark p-0 mt-2" data-bs-toggle="modal" data-bs-target="#adminModal">
                                Register as Admin
                            </button>
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade border border-0" id="adminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
                <div class="modal-content border border-0 text-center p-3">
                    <div class="mx-3">
                        <i class='bx bxs-buildings fw-bold text-start bg-light border border-0 rounded-3 p-3 shadow-sm fs-1' ></i>
                    </div>

                    <p class="fw-semibold mt-3 fs-4">Enter Company Password</p>

                    <form action="cekpasswordadmin.php"  method="post">
                        <div class="text-center fs-6">
                            <p class="">Please Enter the passkey to register as admin.</p>
                            <div class="input-group flex-nowrap mb-2">
                                <!-- Edit Nama -->
                                <input type="text" class="form-control" name="adminPass" placeholder="Enter the passkey" aria-label="Username" aria-describedby="addon-wrapping">
                            </div>
                        </div>
                            
                        <div class="d-grid gap-2 py-3">
                            <button type="submit" class="btn tombol_custom text-center m-0 p-0 py-2 shadow-sm" style="background-color: #ff0059; color: white; border: none;">Confirm</button>
                            <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
