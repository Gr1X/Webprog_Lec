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
    <link rel="stylesheet" href="styling/dashboard.css">
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
                        <a class="nav-link d-flex align-items-center" href="inputevent.php">
                            <i class='bx bxs-calendar-plus fs-4'></i>
                            <span class="mx-2 p-0">Tambah Event</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="dashboardadmin.php">
                            <i class='bx bxs-calendar-event fs-4'></i>
                            <span class="mx-2 p-0">My Event</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="seeparticipant.php">
                            <i class='bx bxs-user-detail fs-4'></i>
                            <span class="mx-2 p-0">See participants</span>
                        </a>
                    </li>
                    
                    <!-- Profile Icon -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="text-decoration-none align-self-center mt-auto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bxs-user-circle fs-1 text-dark'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="accountview.php">Account Settings</a></li>
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
            <!-- Card Gambar Event -->
            <div class="col-md-4">
                <div class="card border border-0 mb-4" style="width: 100%;">
                    <img src="img/christmas.jpg" class="card-img-top border border-0 rounded-3" alt="...">
                    <div class="card-body mt-4 p-0">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title m-0">Christmas Street Party</h5>
                            <p type="button" class="btn btn-danger rounded-pill px-3 p-0 m-0">Closed</p>
                        </div>
                        
                        <div class="d-flex gap-1 mt-2">    
                            <!-- Kategori -->
                            <div class="d-flex border border-0 rounded-2 px-3 py-0 kategori_tombol">
                                <p class="align-self-center p-0 m-0">Tradition</p>
                            </div>
                            <!-- Upcoming Status -->
                            <button type="button" class="btn button_event rounded-2 px-3 p-0 m-0">Upcoming</button>
                        </div>

                        <div class="d-flex mt-2">
                            <!-- Button Modal -->
                            <div class="">
                                <div class="d-flex justify-content-center pe-4">
                                    <button href="#" class="btn bg-transparent border border-0 text-muted d-flex justify-content-center m-0 p-0" data-bs-toggle="modal" data-bs-target="#cardModal"><i class='bx bxs-cog fs-4 align-self-center me-1'></i>Modify Event Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Gambar Event -->
            <div class="col-md-4">
                <div class="card border border-0 mb-4" style="width: 100%;">
                    <img src="img/christmas.jpg" class="card-img-top border border-0 rounded-3" alt="...">
                    <div class="card-body mt-4 p-0">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title m-0">Christmas Street Party</h5>
                            <p type="button" class="btn btn-danger rounded-pill px-3 p-0 m-0">Sold Out</p>
                        </div>
                        
                        <div class="d-flex gap-1 mt-2">    
                            <!-- Kategori -->
                            <div class="d-flex border border-0 rounded-2 px-3 py-0 kategori_tombol">
                                <p class="align-self-center p-0 m-0">Tradition</p>
                            </div>
                            <!-- Upcoming Status -->
                            <button type="button" class="btn button_event rounded-2 px-3 p-0 m-0">Upcoming</button>
                        </div>

                        <div class="d-flex mt-2">
                            <!-- Button Modal -->
                            <div class="">
                                <div class="d-flex justify-content-center pe-4">
                                    <button href="#" class="btn bg-transparent border border-0 text-muted d-flex justify-content-center m-0 p-0" data-bs-toggle="modal" data-bs-target="#cardModal"><i class='bx bxs-cog fs-4 align-self-center me-1'></i>Modify Event Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Gambar Event -->
            <div class="col-md-4">
                <div class="card border border-0 mb-4" style="width: 100%;">
                    <img src="img/christmas.jpg" class="card-img-top border border-0 rounded-3" alt="...">
                    <div class="card-body mt-4 p-0">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title m-0">Christmas Street Party</h5>
                            <p type="button" class="btn btn-primary rounded-pill px-3 p-0 m-0">Open</p>
                        </div>
                        
                        <div class="d-flex gap-1 mt-2">    
                            <!-- Kategori -->
                            <div class="d-flex border border-0 rounded-2 px-3 py-0 kategori_tombol">
                                <p class="align-self-center p-0 m-0">Tradition</p>
                            </div>
                            <!-- Upcoming Status -->
                            <button type="button" class="btn button_event rounded-2 px-3 p-0 m-0">Upcoming</button>
                        </div>

                        <div class="d-flex mt-2">
                            <!-- Button Modal -->
                            <div class="">
                                <div class="d-flex justify-content-center pe-4">
                                    <button href="#" class="btn bg-transparent border border-0 text-muted d-flex justify-content-center m-0 p-0" data-bs-toggle="modal" data-bs-target="#cardModal"><i class='bx bxs-cog fs-4 align-self-center me-1'></i>Modify Event Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Modal Event -->
    <div class="modal fade border border-0" id="cardModal" tabindex="-1" aria-labelledby="cardModalLabel" aria-hidden="true">
            <div class="modal-dialog modal_custom modal-dialog-centered border border-0">
                <div class="modal-content border border-0 rounded-4">
                    <img src="img/christmas.jpg" class="card-img-top object-fit-cover border border-0 rounded-top-4" alt="..." style="width: 100%; height: 300px;">
                    <div class="modal-body p-5 py-3">

                        <div class="d-flex justify-content-between">
                            <div class="d-flex">
                                <h4 class="modal-title fw-semibold my-2">Christmas Street Party</h4>
                                <!-- ini buat statusnya di dalem modal untuk open pakae text-bg-primary kalo sold out warning -->
                                <p class="text-bg-danger border border-0 rounded-2 align-self-center m-0 mx-2 px-2">Closed</p> 
                            </div>

                            <div class="">
                                <a type="button" class="btn button_register rounded-pill px-4 d-flex justify-content-between">Event participants<i class='bx bx-group fs-4 align-self-center ps-2'></i></a>
                            </div>

                        </div>
                        
                        <!-- Deskripsi -->
                        <p class="card-text m-0">
                            Christmas is an annual festival commemorating the birth of Jesus Christ, 
                            observed primarily on December 25[a] as a religious and cultural celebration among billions 
                            of people around the world. A feast central to the liturgical year in Christianity, it follows 
                            the season of Advent (which begins four Sundays before) or the Nativity Fast, and initiates the season of Christmastide,
                            which historically in the West lasts twelve days and culminates on Twelfth Night.
                        </p>

                        <div class="d-flex my-4">
                            <div class="d-flex justify-content-center gap-2">
                                <a href="editevent.php" class="btn button_register rounded-pill px-4 d-flex justify-content-between">Edit<i class='bx bxs-edit-alt align-self-center ms-2' ></i></a>
                                <button type="button" class="btn button_register rounded-pill px-4 d-flex justify-content-between" data-bs-toggle="modal" data-bs-target="#modalDelete">Delete<i class='bx bxs-trash align-self-center ms-2' ></i></button>
                            </div>
                        </div>


                        <div class="mb-4">
                            <!-- Date -->
                            <p class="card-text m-0 my-2 d-flex"><i class='bx bx-calendar-alt align-self-center fs-4 me-3'></i>21 October 2024</p>
                            <!-- Waktu -->
                            <p class="card-text m-0 my-2 d-flex"><i class='bx bxs-time align-self-center fs-4 me-3'></i>17.00 - 19.00</p>
                            <!-- Location -->
                            <p class="card-text m-0 my-2 d-flex"><i class='bx bxs-map align-self-center fs-4 me-3'></i>Gelora Bung Jebret</p>
                        </div>
                    </div>
            </div>
        </div>
    </div>

    <!-- Modal Delete Data-->
    <div class="modal fade border border-0" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
            <div class="modal-content border border-0 text-center p-3">
                <div class="mx-3">
                    <i class='bx bx-error text-center bg-light border border-0 rounded-circle p-3 shadow-sm fs-2' ></i>
                </div>
                <p class="fw-semibold mt-3 fs-4">Removing Event</p>
                <div class="text-center fs-6">
                    Are you sure you want to remove your event? All of your data will be permanently removed. This action cannot be undone.
                </div>
                
                <form action="" class="d-grid gap-2 py-3">
                    <button type="button" class="btn btn-danger text-center m-0 p-0 py-2 shadow-sm">Confirm</button>
                    <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-dismiss="modal">Cancel</i></button>
                </form>
            </div>
        </div>
    </div>

     <!-- Modal Edit Data-->
     <div class="modal fade border border-0" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
            <div class="modal-content border border-0 text-center p-3">
                <div class="mx-3">
                    <i class='bx bx-error text-center bg-light border border-0 rounded-circle p-3 shadow-sm fs-2' ></i>
                </div>
                <p class="fw-semibold mt-3 fs-4">Edit Data</p>
                <div class="text-center fs-6">
                    Are you sure you want to remove your event? All of your data will be permanently removed. This action cannot be undone.
                </div>
                
                <form action="" class="d-grid gap-2 py-3">
                    <button type="button" class="btn btn-danger text-center m-0 p-0 py-2 shadow-sm">Confirm</button>
                    <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-dismiss="modal">Cancel</i></button>
                </form>
            </div>
        </div>
    </div>
 </div>
</body>

</html>
