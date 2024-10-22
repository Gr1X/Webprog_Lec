<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/af48b2d60e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/mylist.css">
</head>

<body>
<nav class="navbar fixed-top navbar-expand-lg bg-light px-4 py-2">
        <div class="container-fluid d-flex justify-content-between py-2">
            <a class="navbar-brand fst-italic" href="#">Pandawara.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse untuk navigasi dan search bar -->
            <div class="collapse navbar-collapse" id="navbarScroll">
                <!-- Search Bar -->
                <form class="input-group mx-3" role="search">
                    <input class="form-control input_search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn tombol_search" type="submit"><i class='bx bx-search fw-bold'></i></button>
                </form>

                <!-- Navigasi Tambah Event dan My Event -->
                <ul class="navbar-nav ml-auto my-2 my-lg-0 navbar-nav-scroll">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="dashboarduser.php">
                            <i class='bx bxs-home fs-4'></i>
                            <span class="mx-2 p-0">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="mylist.php">
                            <i class='bx bxs-inbox fs-4'></i>
                            <span class="mx-2 p-0">My List</span>
                        </a>
                    </li>
                    
                    <!-- Profile Icon -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="text-decoration-none align-self-center mt-auto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bxs-user-circle fs-1 text-dark'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="accountinfo.php">Account Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger d-flex justify-content-between" href="#">Log Out<i class='bx bx-log-out fs-4 align-self-center' ></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mt-5 pt-5 mx-3">
        <div class="row gap-3 d-flex justify-content-center">

            <!-- itu img/ diubah -> uploads/ (ini masih pakei dummy) -->
            <div class="col-5 card card_book m-0 p-0 text-white" style="background-image: url('img/<?php echo "christmas.jpg"; ?>');">
                <div class="card-header card-header border border-0">
                    Your Registration Event
                </div>
                <div class="card-body p-4 pt-2">
                    <!-- Tulisan Ini ga berubah -->
                    <p class="card-title m-0">Event</p>
                    <div class="d-flex justify-content-between">
                        <!-- Nama Event -->
                        <h2 class="card-text align-self-center"><?php  echo "Event Name" ?></h2>
                        <div class="text-center">
                            <!-- Date -->
                            <p class="p-0 m-0"><?php echo "22 October 2024"; ?></p>
                            <!-- Time -->
                            <h2><?php echo "18.00 - 19.00"; ?></h2>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <!-- Date -->
                            <p class="card-text m-0 my-2 d-flex"><i class='bx bx-calendar-alt align-self-center fs-4 me-3'></i><?php echo "21 October 2024"; ?></p>
                            <!-- Time -->
                            <p class="card-text m-0 my-2 d-flex"><i class='bx bxs-time align-self-center fs-4 me-3'></i><?php echo "17.00 - 19.00"?></p>
                            <!-- Location -->
                            <p class="card-text m-0 my-2 d-flex"><i class='bx bxs-map align-self-center fs-4 me-3'></i><?php echo "Gelora Bung Jebret" ?></p>
                        </div>
                        <div class="d-flex align-items-end">
                            <button href="#" class="btn tombol_book" data-bs-toggle="modal" data-bs-target="#modalDeleteRegis">Cancel Book Registration</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Data-->
    <div class="modal fade border border-0" id="modalDeleteRegis" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
            <div class="modal-content border border-0 text-center p-3">
                <div class="mx-3">
                    <i class='bx bx-error text-center bg-light border border-0 rounded-circle p-3 shadow-sm fs-2' ></i>
                </div>
                <p class="fw-semibold mt-3 fs-4">Cancel Event</p>
                <div class="text-center fs-6">
                    Are you sure you want to remove your Booked Event? All of your data will be permanently removed. This action cannot be undone.
                </div>
                
                <!-- Delete Data -->
                <form action="" class="d-grid gap-2 py-3">
                    <button type="button" class="btn btn-danger text-center m-0 p-0 py-2 shadow-sm">Confirm</button>
                    <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-dismiss="modal">Cancel</i></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>