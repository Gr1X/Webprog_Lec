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
    <link rel="stylesheet" href="styling/seeparticipant.css">
</head>

<body>
<nav class="navbar fixed-top navbar-expand-lg bg-light px-4 py-2">
        <div class="container-fluid d-flex justify-content-between py-2">
            <a class="navbar-brand fst-italic" href="#">Pandawara.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse untuk navigasi dan search bar -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
                <!-- Search Bar -->

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
                            <li><a class="dropdown-item" href="#">Account Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger d-flex justify-content-between" href="#">Log Out<i class='bx bx-log-out fs-4 align-self-center' ></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row p-0 m-0">
            <div class="col-4 mt-5 pt-5">
                <div class="card m-0 p-0">
                    <div class="card-header">
                        Featured
                    </div>
            
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
            
                    <div class="">
                        <div class="accordion accordion-flush border border-0 rounded-bottom-3" id="accordionFlushExample">
                            <div class="accordion-item border border-0 rounded-bottom-3">
                                <h2 class="accordion-header border border-0 rounded-bottom-3">
                                <button class="accordion-button collapsed mb-2 accord_custom" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Accordion Item #1
                                </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>   
            
            <div class="col-4 mt-5 pt-5">
                <div class="card m-0 p-0">
                    <div class="card-header">
                        Featured
                    </div>
            
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
            
                    <div class="">
                        <div class="accordion accordion-flush border border-0 rounded-bottom-3" id="accordionFlushExample">
                            <div class="accordion-item border border-0 rounded-bottom-3">
                                <h2 class="accordion-header border border-0 rounded-bottom-3">
                                <button class="accordion-button collapsed mb-2 accord_custom" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Accordion Item #1
                                </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-4 mt-5 pt-5">
                <div class="card m-0 p-0">
                    <div class="card-header">
                        Featured
                    </div>
            
                    <div class="card-body">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
            
                    <div class="">
                        <div class="accordion accordion-flush border border-0 rounded-bottom-3" id="accordionFlushExample">
                            <div class="accordion-item border border-0 rounded-bottom-3">
                                <h2 class="accordion-header border border-0 rounded-bottom-3">
                                <button class="accordion-button collapsed mb-2 accord_custom" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Accordion Item #1
                                </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
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