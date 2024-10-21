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
                        <a class="nav-link d-flex align-items-center" href="#">
                            <i class='bx bxs-calendar-event fs-4'></i>
                            <span class="mx-2 p-0">My Event</span>
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
                            <h5 class="card-title align-self-center m-0">Chirstmas Street Party</h5>
                            <button type="button" class="btn button_event rounded-pill">Upcoming</button>
                        </div>

                        <div class="d-flex mt-2">
                            <div class="d-flex border border-0 rounded-5 px-4 py-1 kategori_tombol">
                                <p class="align-self-center p-0 m-0">Tradition</p>
                            </div>
                            <div class="ps-4">
                                <div class="d-flex justify-content-center pe-4">
                                    <button type="button" href="#" class="btn btn-primary bg-transparent border border-0 text-muted" data-bs-toggle="modal" data-bs-target="#cardModal"><i class="fa-regular fa-eye"></i> See More Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade border border-0" id="cardModal" tabindex="-1" aria-labelledby="cardModalLabel" aria-hidden="true">
            <div class="modal-dialog modal_custom modal-dialog-centered border border-0">
                <div class="modal-content border border-0 rounded-4">
                    <img src="img/christmas.jpg" class="card-img-top object-fit-cover border border-0 rounded-top-4" alt="..." style="width: 100%; height: 300px;">
                    <div class="modal-body p-5 py-3">
                        <h4 class="modal-title fw-semibold my-2">Christmas Street Party</h4>
                        <p class="card-text m-0">
                            Christmas is an annual festival commemorating the birth of Jesus Christ, 
                            observed primarily on December 25[a] as a religious and cultural celebration among billions 
                            of people around the world. A feast central to the liturgical year in Christianity, it follows 
                            the season of Advent (which begins four Sundays before) or the Nativity Fast, and initiates the season of Christmastide,
                            which historically in the West lasts twelve days and culminates on Twelfth Night.
                        </p>

                        <div class="d-flex gap-3 my-4 ">
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#">Edit</button>
                            <button type="button" class="btn button_register rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalRegister">Delete</button>
                            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#participantsModal">Participants</button>
                        </div>

                        <div class="mb-4">
                            <p class="card-text m-0 my-2 d-flex"><i class='bx bx-calendar-alt align-self-center fs-4 me-3'></i>21 October 2024</p>
                            <p class="card-text m-0 my-2 d-flex"><i class='bx bxs-time align-self-center fs-4 me-3'></i>17.00 - 19.00</p>
                            <p class="card-text m-0 my-2 d-flex"><i class='bx bxs-map align-self-center fs-4 me-3'></i>Gelora Bung Jebret</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="participantsModal" tabindex="-1" aria-labelledby="cardModalLabel" aria-hidden="true">
            <div class="modal-dialog modal_custom modal-dialog-centered border border-0">
                <div class="modal-content border border-0 rounded-4">
                    <div>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#cardModal">Back</button>
                        <form class="input-group mx-3" role="search">
                            <input class="form-control part_search" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn tombol_search" type="submit"><i class='bx bx-search'></i></button>
                        </form>
                        <button type="button" class="btn">Export</button>
                    </div>
                    <table class="table">
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
