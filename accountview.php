<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/accountview.css"> <!-- Kode CSS yang ditambahkan -->
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg px-4 py-2 shadow">
        <div class="container-fluid d-flex justify-content-between py-2">
            <a class="navbar-brand fst-italic" href="#">Pandawara.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse untuk navigasi dan search bar -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">

                <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll">
                    <!-- Profile Icon -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="text-decoration-none align-self-center mt-auto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bxs-user-circle fs-1 text-white'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Account Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger d-flex justify-content-between" href="#">Log Out<i class='bx bx-log-out fs-4 align-self-center' ></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
        <div class="row">
            <!-- Kolom Kiri untuk Navigasi -->
            <div class="col-md-3 left-column">
                <a href="dashboard.php" class="d-flex align-items-center text-dark mb-3 text-decoration-none">
                    <i class='bx bx-left-arrow-alt align-self-center fs-4 text-decoration-none'></i>
                    <p class="mb-0">Back to dashboard</p>
                </a>
                <ul class="list-unstyled">
                    <li>
                        <a href="accountview.php" class="text-decoration-none">View Account</a>
                    </li>
                    <li>
                        <a href="accountinfo.php" class="text-decoration-none">Account Information</a>
                    </li>
                </ul>
            </div>

            <!-- Kolom Kanan untuk Detail Akun -->
            <div class="col-md-9 right-column">
                <!-- Judul Account -->
                <h1>Account</h1>
                <p class="text-muted mt-2 m-0">Account Details</p>

                <div class="ms-4">
                    <!-- Detail Akun -->
                    <div class="account-details">
                        <div class="">
                            <h2 class="fw-semibold pb-1">KayooH23</h2>
                            <h4 class="text-secondary pb-4 m-0">Calvin Jomok</h4>
                            <p class="fw-semibold">MarinirJawa23@gmail.com</p>
                        </div>
                    </div>
                </div>

                <!-- Change Details -->
                <div class="change_details">
                    <h6 class="mt-4 mb-2 text-muted">Changing Account Details</h6>

                    <div class="ms-4">
                        <h4 class="mt-1 fw-bold">Options Account</h4>
                        
                        <div class="details-list pt-1">
                            <ul class="list-unstyled">
                                <li class="">
                                    <button type="button" class="btn btn-primary bg-transparent border border-0 text-dark text-muted p-0" data-bs-toggle="modal" data-bs-target="#userNameModal">
                                        Change My Username
                                    </button>
                                </li>
    
                                <li class="">
                                    <button type="button" class="btn btn-primary bg-transparent border border-0 text-dark text-muted p-0" data-bs-toggle="modal" data-bs-target="#firstNameModal">
                                        Change My Firstname
                                    </button>
                                </li>
    
                                <li>
                                    <button type="button" class="btn btn-primary bg-transparent border border-0 text-dark text-muted p-0" data-bs-toggle="modal" data-bs-target="#lastNameModal">
                                        Change My Lastname
                                    </button>
                                </li>
    
                                <li>
                                    <button type="button" class="btn btn-primary bg-transparent border border-0 text-dark fw-semibold p-0" data-bs-toggle="modal" data-bs-target="#passwordModal">
                                        Reset My Password
                                    </button>
                                </li>
                    
                                <li>
                                    <button type="button" class="btn btn-primary bg-transparent border border-0 text-dark fw-semibold p-0" data-bs-toggle="modal" data-bs-target="#emailModal">
                                        Change My Email
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
