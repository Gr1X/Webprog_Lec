<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['username'])) {
  header('location: login.php');
  exit();
}


$id_akun = $_SESSION['id_akun'];
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') : '';
$keyword = isset($_POST['keyword']) ? trim($_POST['keyword']) : '';

// Base query
$query6 = "SELECT id_akun, username, email
           FROM account AS a
           WHERE akses_akun = 'user'";

// Jika keyword ada, tambahkan kondisi untuk mencari berdasarkan username
if (!empty($keyword)) {
    $query6 .= " AND username LIKE :keyword";
}

// Persiapkan statement
$stmt6 = $db->prepare($query6);

// Jika keyword ada, bind value untuk pencarian
if (!empty($keyword)) {
    $stmt6->bindValue(':keyword', '%' . $keyword . '%');
}

// Jalankan query
$stmt6->execute();
$accounts = $stmt6->fetchAll(PDO::FETCH_ASSOC);

?>

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
    <link rel="stylesheet" href="styling/seeparticipant.css?v=1.0">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4 py-2 fixed-top">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand fst-italic pt-sm-3 pt-md-3 pt-lg-0" href="#">Pandawara.</a>
            <!-- Tombol navbar-toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse untuk navigasi dan search bar -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
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

                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <!-- Icon Profil (tombol) -->
                        <a class="text-decoration-none align-self-center mt-auto profile-trigger" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bxs-user-circle fs-1 text-dark'></i>
                        </a>
                            
                        <!-- Isi Dropdown -->
                        <ul class="dropdown-menu dropdown-menu-end m-0 p-0" id="profileDropdownMenu" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                <a class="dropdown-item d-flex m-0 px-md-0 px-lg-2 text-muted icon-link" href="accountview.php">
                                <i class='bx bxs-cog fs-4 align-self-center'></i>
                                <span class="mx-2 p-0">Account Settings</span>
                                </a>
                            </li>

                            <li><hr class="dropdown-divider m-0 p-0"></li>

                            <li class="nav-item">
                                <a class="dropdown-item text-danger d-flex m-0 px-md-0 px-lg-2 icon-link" href="logout.php">
                                    <i class='bx bx-log-out fs-4 align-self-center'></i>
                                    <span class="mx-2 p-0">Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row p-0 m-0 mt-5 pt-5">
        <?php foreach ($accounts as $account): 
            // Query to get the history of events a user registered for
            $query22 = "SELECT e.nama_event, h.tanggal_daftar 
                        FROM histori AS h
                        JOIN listevent AS e ON e.id_event = h.id_event
                        WHERE h.id_akun = ?";
                              
            $stmt22 = $db->prepare($query22);
            $stmt22->execute([$account['id_akun']]);
            $historidaftar = $stmt22->fetchAll(PDO::FETCH_ASSOC);
        ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card m-0 p-0">
                    <div class="card-header">
                        User History
                    </div>
            
                    <div class="card-body">
                        <!-- Display Username and Email -->
                        <h5 class="card-title"><?= htmlspecialchars($account['username'], ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p class="card-text text-secondary"><?= htmlspecialchars($account['email'], ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
            
                    <div class="">
                        <div class="accordion accordion-flush border border-0 rounded-bottom-3" id="accordionFlushActivity<?= htmlspecialchars($account['id_akun'], ENT_QUOTES, 'UTF-8'); ?>">
                            <div class="accordion-item border border-0 rounded-bottom-3">
                                <h2 class="accordion-header border border-0 rounded-bottom-3">
                                    <!-- Unique ID for each account's accordion -->
                                    <button class="accordion-button collapsed mb-2 accord_custom" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= htmlspecialchars($account['id_akun'], ENT_QUOTES, 'UTF-8'); ?>" aria-expanded="false" aria-controls="flush-collapseOne">
                                        Activity Log
                                    </button>
                                </h2>
                                <!-- Unique ID for collapsible -->
                                <div id="collapse<?= htmlspecialchars($account['id_akun'], ENT_QUOTES, 'UTF-8'); ?>" class="accordion-collapse collapse" data-bs-parent="#accordionFlushActivity<?= htmlspecialchars($account['id_akun'], ENT_QUOTES, 'UTF-8'); ?>">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                                <th class="text-start" scope="col">Event</th>
                                                <th scope="col">Registered On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Check if the user has any registered events -->
                                            <?php if (!empty($historidaftar)): ?>
                                                <?php foreach ($historidaftar as $history): ?>
                                                    <tr>
                                                        <!-- Display event name and registration date -->
                                                        <td class="text-start" scope="row"><?= htmlspecialchars($history['nama_event'], ENT_QUOTES, 'UTF-8'); ?></td> 
                                                        <td><?= htmlspecialchars($history['tanggal_daftar'], ENT_QUOTES, 'UTF-8'); ?></td>                                             
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="2" class="text-muted">No events registered</td>
                                                </tr>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    
</body>
</html>