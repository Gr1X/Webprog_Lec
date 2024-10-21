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

                        <form action="..." method="post">
                            <div class="d-flex border rounded mb-3">
                                <i class='bx bx-user text-center align-self-center fs-4 p-2'></i>
                                <input type="text" class="form-control border-0" placeholder="Username">
                            </div>
                            <div class="d-flex border rounded mb-3">
                                <i class='bx bx-envelope-open text-center align-self-center fs-4 p-2'></i>
                                <input type="text" class="form-control border-0" placeholder="Email">
                            </div>
                            <div class="d-flex border rounded mb-4">
                                <i class='bx bx-lock text-center align-self-center fs-4 p-2'></i>
                                <input type="password" class="form-control border-0" placeholder="Password">
                            </div>
                            <div class="d-grid mb-3">
                                <button type="submit" class="btn button_login">Register</button>
                            </div>
                        </form>

                        <p class="text-muted">Already have an Account? <a href="#" class="text-decoration-none">Login</a></p>
                        <p class="m-0">
                            <button type="button" class="btn btn_admin p-0 pb-1" data-bs-toggle="modal" data-bs-target="#titleModal">
                                Register as Admin
                            </button>
                        </p>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade border border-0" id="titleModal" tabindex="-1" aria-labelledby="titleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered border border-0">
                <div class="modal-content">
                    <div class="modal-header modal_header shadow-sm">
                        <h1 class="modal-title fs-5 text-light" id="titleModalLabel">Register As Admin</h1>
                    </div>
                    
                    <!-- input judul -->
                    <form action="..." method="post">
                        <div class="modal-body">
                            <div class="input-group d-block">
                                <p>Please enter the company password to register.</p>
                                <div class="">
                                    <label class="form-label">Enter the Password</label>
                                    <input type="password" class="form-control bg-light" required name="judul_tabel" id="exampleDropdownFormEmail1" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger fw-semibold shadow-sm" data-bs-dismiss="modal" aria-label="Close"><i class='bx bx-x fw-bold fs-5'></i></button>
                            <button type="submit" class="btn btn-success fw-semibold shadow-sm"><i class='bx bx-check fw-bold fs-5'></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
