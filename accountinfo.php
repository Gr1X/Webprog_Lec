<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/accountinfo.css">
</head>
<body>
    <nav class="navbar navbar_custom fixed-top navbar-expand-lg px-4 py-2 shadow">
        <div class="container-fluid d-flex justify-content-between py-2">
            <a class="navbar-brand fst-italic" href="#">Pandawara.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse untuk navigasi dan search bar -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">

                <!-- Navigasi Tambah Event dan My Event -->
                <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll">    
                    <!-- Profile Icon -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="text-decoration-none align-self-center mt-auto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bxs-user-circle fs-1 text-white'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Account Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger d-flex justify-content-between" href="logout.php">Log Out<i class='bx bx-log-out fs-4 align-self-center' ></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 pt-5">
    <div class="row">
        <!-- Kolom Kiri untuk Navigasi -->
        <div class="col-md-3 col-12 left-column mt-3">
            <a href="dashboarduser.php" class="d-flex align-items-center text-dark mb-3 text-decoration-none">
                <i class='bx bx-left-arrow-alt text-decoration-none align-self-center fs-3'></i>
                <p class="mb-0 align-self-center fs-3">Back to dashboard</p>
            </a>
            <ul class="list-unstyled ms-4">
                <li>
                    <a href="accountinfo.php" class="text-dark text-decoration-none">Account Information</a>
                </li>
                <li>
                    <a href="accountview.php" class="text-dark text-decoration-none">View Account</a>
                </li>
            </ul>
        </div>

        <!-- Kolom Kanan untuk Detail Akun -->
        <div class="col-md-9 col-12 right-column">
            <!-- Judul Account -->
            <h1 class="mt-4">Account</h1>
            <h6 class="text-muted mt-4">Account Details</h6>

            <div class="ms-4 mt-2">
                <!-- Detail Akun -->
                <div class="account-details">
                    <div class="">
                        <h2 class="fw-semibold pb-1 pt-2 m-0 p-0">KayooH23</h2>
                        <h4 class="text-secondary pb-4 m-0">Calvin Jomok</h4>
                        <h6 class="fs-5">MarinirJawa23@gmail.com</h6>
                    </div>
                </div>
            </div>
            
            <hr class='mb-1' style="width: 100%; height: 2px; background-color: black; border: none;" />

            <div class="d-flex ms-2 mt-2">
                <a href="accountview.php" class="p-0 m-0 text-decoration-none text-dark">Manage Account</a>
                <i class='bx bx-chevron-right align-self-center'></i>
            </div>

            <!-- History Event Register -->
            <div class="history">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <h6 class="text-muted mt-4">Activity history</h6>
                        <button class="accordion-button collapsed py-2 px-4" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <h4>History Event Register</h4>
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="history-list">
                                    <a href="#">Ado Music Concert</a>
                                    <p>9 April 2025, Stadion Utama Gelora Bung Karno</p>
                                    <a href="#">Art Exhibition - Vincent Van Gogh</a>
                                    <p>28 Juli 2025, Stadion Utama Gelora Bung Karno</p>
                                    <a href="#">Art Exhibition - Vincent Van Gogh</a>
                                    <p>28 Juli 2025, Stadion Utama Gelora Bung Karno</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>
