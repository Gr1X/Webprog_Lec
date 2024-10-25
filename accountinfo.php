<?php
require_once('db.php');
session_start();

if (!isset($_SESSION['username'])) {
  header('location: login.php');
  exit();
}
// re push

// Mengambil data dari session
$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') : '';
$email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') : '';
$id_akun = isset($_SESSION['id_akun']) ? htmlspecialchars($_SESSION['id_akun'], ENT_QUOTES, 'UTF-8') : '';
$akses_akun = isset($_SESSION['akses_akun']) ? htmlspecialchars($_SESSION['akses_akun'], ENT_QUOTES, 'UTF-8') : '';

$link = ($akses_akun === 'user') ? 'index.php' : 'dashboardadmin.php';
$link = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');

$query26 = "SELECT id_akun, nama_event, tanggal_event, lokasi_event, tanggal_daftar
            FROM histori AS h
            JOIN listevent AS e ON e.id_event = h.id_event
            WHERE id_akun = ?";
            
$stmt26 = $db->prepare($query26);
$stmt26->execute([$id_akun]);
$historyuser = $stmt26->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/accountinfo.css?v=1.1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light px-4 py-2 fixed-top" style="background-color: #B88EE5; color: white;">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand fst-italic pt-sm-3 pt-md-3 pt-lg-0" href="#">Pandawara.</a>
            <!-- Tombol navbar-toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse untuk navigasi dan search bar -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <!-- Icon Profil (tombol) -->
                        <a class="text-decoration-none align-self-center mt-auto profile-trigger" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bxs-user-circle fs-1 text-dark'></i>
                        </a>
                            
                        <!-- Isi Dropdown -->
                        <ul class="dropdown-menu dropdown-menu-end m-0 p-0" id="profileDropdownMenu" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                <a class="dropdown-item d-flex m-0 px-md-0 px-lg-2 text-dark icon-link" href="accountinfo.php">
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

    <div class="container mt-5 pt-5">
    <div class="row">
        <!-- Kolom Kiri untuk Navigasi -->
        <div class="col-lg-3 col-12 left-column mt-3">
            <a href="<?= $link ?>" class="d-flex align-items-center text-dark mb-3 text-decoration-none">
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
        <div class="col-lg-9 col-12 right-column">
            <!-- Judul Account -->
            <h1 class="mt-4">Account</h1>
            <h6 class="text-muted mt-4">Account Details</h6>

            <div class="ms-4 mt-2">
                <!-- Detail Akun -->
                <div class="account-details">
                    <div class="">
                        <h2 class="fw-semibold pb-1 pt-2 m-0 p-0"><?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?></h2>
                        <h5 class=""><?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></h5>
                    </div>
                </div>
            </div>
            
            <hr class='mb-1' style="width: 100%; height: 2px; background-color: black; border: none;" />

            <div class="d-flex ms-2 mt-2">
                <a href="accountview.php" class="p-0 m-0 text-decoration-none text-dark">Manage Account</a>
                <i class='bx bx-chevron-right align-self-center'></i>
            </div>

            <?php if($akses_akun == 'user'){ ?>
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
                                    <!-- Loop through the event history from the query -->
                                    <?php foreach ($historyuser as $history): ?>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <!-- Display event name, event date, and location -->
                                                <i><?= isset($history['nama_event']) ? htmlspecialchars($history['nama_event'], ENT_QUOTES, 'UTF-8') : 'Unknown Event'; ?></i>
                                                <p>
                                                    <?= 
                                                        isset($history['tanggal_event']) ? htmlspecialchars($history['tanggal_event'], ENT_QUOTES, 'UTF-8') : 'Unknown Date'; 
                                                    ?>, 
                                                    <?= 
                                                        isset($history['lokasi_event']) ? htmlspecialchars($history['lokasi_event'], ENT_QUOTES, 'UTF-8') : 'Unknown Location'; 
                                                    ?>
                                                </p>
                                            </div>
                                            <!-- Display registration date on the right -->
                                            <div class="text-muted">
                                                <small>Registered on: <?= htmlspecialchars($history['tanggal_daftar'], ENT_QUOTES, 'UTF-8'); ?></small>
                                            </div>
                                        </div>
                                        <hr>
                                    <?php endforeach; ?>
                                    <!-- If there's no history -->
                                    <?php if (empty($historyuser)): ?>
                                        <p>No event registration history available.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>


</body>
</html>
