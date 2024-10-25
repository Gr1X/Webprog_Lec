<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['username'])) {
  header('location: login.php');
  exit();
}


$id_akun = htmlspecialchars($_SESSION['id_akun'], ENT_QUOTES, 'UTF-8');
$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
$keyword = isset($_POST['keyword']) ? htmlspecialchars(trim($_POST['keyword']), ENT_QUOTES, 'UTF-8') : '';


// Base query
$query10 = "SELECT e.id_event, nama_event, foto_event, status_event, kategori, tanggal_event, max_peserta, tanggal_event, waktu_event, deskripsi, lokasi_event
            FROM listevent AS e
            LEFT JOIN registerke AS r ON r.id_event = e.id_event";

// Tambahkan kondisi jika keyword ada
if (!empty($keyword)) {
    $query10 .= " WHERE nama_event LIKE :keyword";
}

// Tambahkan bagian akhir query
$query10 .= " GROUP BY e.id_event ORDER BY tanggal_event ASC";

// Persiapkan dan jalankan query
$stmt10 = $db->prepare($query10);

// Bind parameter jika ada keyword
if (!empty($keyword)) {
    $stmt10->bindValue(':keyword', '%' . $keyword . '%');
}

$stmt10->execute();
$events = $stmt10->fetchAll(PDO::FETCH_ASSOC);

// ========================= //

// Query to get the events the user has registered for
$query12 = "SELECT id_event FROM registerke WHERE id_akun = ?";
$stmt12 = $db->prepare($query12);
$stmt12->execute([$id_akun]); // Note: passing $id_akun in an array
$registers = $stmt12->fetchAll(PDO::FETCH_ASSOC);

// Create an array of registered event IDs
$registeredEvents = array_column($registers, 'id_event');

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
    <link rel="stylesheet" href="styling/dashboarduser.css?v=1.0">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light px-4 py-2 fixed-top">
        <div class="container-fluid navbar_asw">
            <!-- Tombol Toggle Navbar -->
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <!-- Search Bar dan Navigasi -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <!-- Logo -->
                <a class="navbar-brand fst-italic pt-sm-3 pt-md-3 pt-lg-0" href="#">Pandawara.</a>
                <!-- Search Bar -->
                <form action="mylist.php" method="post" class="input-group mx-lg-3 mt-sm-3 mt-md-3 mt-lg-0" role="search">
                    <input class="form-control input_search" type="text" name="keyword" placeholder="Search" aria-label="Search">
                    <button class="btn tombol_search" type="submit"><i class='bx bx-search fw-bold'></i></button>
                </form>
                
                <!-- Navigasi -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link d-flex align-items-center" href="index.php">
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
                    
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown d-flex align-items-center">
                        <!-- Icon Profil (tombol) -->
                        <a class="text-decoration-none align-self-center mt-auto profile-trigger" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bxs-user-circle fs-1 text-muted'></i>
                        </a>
                        
                        <!-- Isi Dropdown -->
                        <ul class="dropdown-menu dropdown-menu-end m-0 p-0" id="profileDropdownMenu" aria-labelledby="navbarDropdown">
                            <li class="nav-item">
                                <a class="dropdown-item d-flex m-0 px-md-0 px-lg-2 text-muted icon-link" href="accountinfo.php">
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
            <!-- Card Gambar Event -->
            <div class="row">
                <?php 
                // Tanggal hari ini
                $currentDate = new DateTime();
                
                foreach ($events as $event): 
                    // Tanggal event dari database
                    $eventDate = new DateTime($event['tanggal_event']);
                    
                    // Hitung selisih hari antara event dan tanggal saat ini
                    $interval = $currentDate->diff($eventDate);
                    $daysRemaining = (int) $interval->format('%r%a'); // %r untuk tanda negatif/positif
                    
                    // Cek apakah event kurang dari 7 hari
                    $isUpcoming = ($daysRemaining >= 0 && $daysRemaining <= 7);

                    $query13 = "SELECT id_event, COUNT(id_akun) AS jumlahdaftar
                                FROM registerke AS r
                                WHERE id_event = ?";

                    $stmt13 = $db->prepare($query13);
                    $stmt13->execute([$event['id_event']]);
                    $totaldaftar = $stmt13->fetch(PDO::FETCH_ASSOC);
                ?>
                <div class="col-md-4">
                    <div class="card border border-0 mb-4" style="width: 100%;">
                        <!-- Gambar Event -->
                        <img src="uploads/<?= htmlspecialchars($event['foto_event'], ENT_QUOTES, 'UTF-8') ?>" class="card-img-top border border-0 rounded-3 shadow-sm" alt="...">
                        
                        <div class="card-body mt-4 p-0">
                            <div class="d-flex gap-2 mb-3">
                                <!-- Nama Event -->
                                <h5 class="card-title m-0 align-self-center"><?= htmlspecialchars($event['nama_event'], ENT_QUOTES, 'UTF-8') ?></h5>
                                
                                <!-- Status Event -->
                                <p type="button" class="btn 
                                    <?php
                                    if ($totaldaftar['jumlahdaftar'] >= $event['max_peserta']) {
                                        echo 'btn-secondary';
                                    } else {
                                        echo htmlspecialchars($event['status_event'] === 'open' ? 'btn-success' : 'btn-danger', ENT_QUOTES, 'UTF-8');
                                    }
                                    ?>
                                    rounded-2 px-3 py-0 m-0">
                                    <?php 
                                    if ($totaldaftar['jumlahdaftar'] >= $event['max_peserta']) {
                                        echo 'Sold Out';
                                    } else {
                                        echo htmlspecialchars(ucfirst($event['status_event']), ENT_QUOTES, 'UTF-8');
                                    }
                                    ?>
                                </p>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center">    
                                    <!-- Kategori Event -->
                                    <div class="d-flex border border-0 rounded-2 px-3 py-0 kategori_tombol">
                                        <p class="align-self-center p-0 m-0"><?= ucfirst(htmlspecialchars($event['kategori'], ENT_QUOTES, 'UTF-8')) ?></p>
                                    </div>

                                    <!-- Upcoming Status hanya jika event kurang dari 1 minggu -->
                                    <?php if ($isUpcoming): ?>
                                        <button type="button" class="btn button_event rounded-2 px-3 p-0 m-0">Upcoming</button>
                                    <?php endif; ?>
                                </div>

                                <!-- Participants (dummied since it is not in the query) -->
                                <div class="m-0 p-0 mt-auto border border-0 rounded-2 px-2 py-0">
                                  <?php if($event['status_event'] === 'open'){ ?>
                                      <p class="d-flex align-items-center p-0 m-0 text-dark">
                                          <i class='bx bx-user fs-6 fw-bold me-2'></i> 
                                          <?= htmlspecialchars(isset($totaldaftar['jumlahdaftar']) ? $totaldaftar['jumlahdaftar'] : 0, ENT_QUOTES, 'UTF-8') ?> / <?= htmlspecialchars($event['max_peserta'], ENT_QUOTES, 'UTF-8') ?>
                                      </p>
                                  <?php }else{?>
                                      <p class="d-flex align-items-center p-0 m-0 text-dark">
                                          <i class='bx bx-user fs-6 fw-bold me-2'></i>- / - 
                                      </p>
                                  <?php }?>
                                </div>
                            </div>

                            <div class="d-flex mt-2">
                                <!-- Button Modal -->
                                <div class="">
                                    <div class="d-flex">
                                        <button href="#" class="btn bg-transparent border border-0 text-muted m-0" data-bs-toggle="modal" data-bs-target="#cardModal<?=htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8')?>"><i class="fa-regular fa-eye"></i> See More Information</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Event -->
                <div class="modal fade border border-0" id="cardModal<?=htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8')?>" tabindex="-1" aria-labelledby="cardModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal_custom modal-dialog-centered border border-0">
                        <div class="modal-content border border-0 rounded-4">
                            <img src="uploads/<?= htmlspecialchars($event['foto_event'], ENT_QUOTES, 'UTF-8') ?>" class="card-img-top object-fit-cover border border-0 rounded-top-4" alt="..." style="width: 100%; height: 300px;">
                            <div class="modal-body p-5 py-3">
                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <h4 class="modal-title fw-semibold my-2 m-0 align-self-center"><?= htmlspecialchars($event['nama_event'], ENT_QUOTES, 'UTF-8') ?></h4>
                                        <!-- ini buat statusnya di dalem modal untuk open pakae text-bg-primary kalo sold out warning -->
                                        <p class="border border-0 rounded-2 align-self-center m-0 mx-2 px-2
                                            <?php 
                                            if ($totaldaftar['jumlahdaftar'] >= $event['max_peserta']) {
                                                echo 'text-bg-secondary';
                                            } else {
                                                echo htmlspecialchars($event['status_event'] === 'open' ? 'text-bg-success' : 'text-bg-danger', ENT_QUOTES, 'UTF-8');
                                            }
                                            ?> 
                                            ">
                                            <?php 
                                            if ($totaldaftar['jumlahdaftar'] >= $event['max_peserta']) {
                                                echo 'Sold Out';
                                            } else {
                                                echo htmlspecialchars(ucfirst($event['status_event']), ENT_QUOTES, 'UTF-8');
                                            }
                                            ?>
                                        </p>
                                    </div>

                                    <div class="">
                                        <div class="d-flex my-4">
                                            <div class="d-flex justify-content-center gap-2">
                                                <div class="d-flex border border-0 rounded-5 px-4 py-1 kategori_tombol">
                                                    <p class="align-self-center p-0 m-0"><?= htmlspecialchars(ucfirst($event['kategori']), ENT_QUOTES, 'UTF-8') ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            
                                
                                <!-- Deskripsi -->
                                <p class="card-text m-0">
                                    <?= htmlspecialchars($event['deskripsi'], ENT_QUOTES, 'UTF-8') ?>
                                </p>
                                
                                <hr style="height: 2px;"/>

                                <div class="mb-4">
                                    <!-- Date -->
                                    <p class="card-text m-0 my-2 d-flex"><i class='bx bx-calendar-alt align-self-center fs-4 me-3'></i><?= htmlspecialchars($event['tanggal_event'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <!-- Waktu -->
                                    <p class="card-text m-0 d-flex"><i class='bx bxs-time align-self-center fs-4 me-3'></i><?= htmlspecialchars($event['waktu_event'], ENT_QUOTES, 'UTF-8') ?></p>
                                    <!-- Location -->
                                     <div class="d-flex justify-content-between">
                                         <p class="card-text m-0 my-2 d-flex"><i class='bx bxs-map align-self-center fs-4 me-3'></i><?= htmlspecialchars($event['lokasi_event'], ENT_QUOTES, 'UTF-8') ?></p>
                                        <div class="">
                                            <?php
                                            if (in_array($event['id_event'], $registeredEvents)){
                                                if($event['status_event'] == 'open'){
                                                    ?>
                                                    <div class="mx-3">
                                                        <button type="button" class="btn button_register rounded-pill px-4" disabled>Registered</button>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                            else{
                                                if (!($totaldaftar['jumlahdaftar'] >= $event['max_peserta'])){
                                                    if ($event['status_event'] == 'open'){
                                                    ?>
                                                    <div class="mx-3">
                                                        <button type="button" class="btn button_register rounded-pill px-4" data-bs-toggle="modal" data-bs-target="#modalRegister<?= htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8') ?>">Register Event</button>
                                                    </div>
                                                    <?php
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Confirm Data-->
                <div class="modal fade border border-0" id="modalRegister<?= htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8') ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
                        <div class="modal-content border border-0 text-center p-3">
                            <div class="mx-3">
                                <i class='bx bx-user-check text-center bg-light border border-0 rounded-circle p-3 shadow-sm fs-2' ></i>
                            </div>
                            <p class="fw-semibold mt-3 fs-4">Register Event</p>
                            <div class="text-center fs-6">
                                Are you sure you want to Register to this event? All of your data will be added to the list. This action can be canceled.
                            </div>
                            
                            <!-- Modal Confirm Submit Regis -->
                            <form action="registerevent.php" method="post" class="d-grid gap-2 py-3">
                                <input type="hidden" name="id_event" value="<?= htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8') ?>">
                                <input type="hidden" name="id_akun" value="<?= htmlspecialchars($id_akun, ENT_QUOTES, 'UTF-8') ?>">
                                <button type="submit" class="btn button_custom text-center m-0 p-0 py-2 shadow-sm">Confirm</button>
                                <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php  if (isset($_SESSION['log'])): ?>
        <!-- Toast untuk notifikasi -->
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <!-- Toast Container di kanan bawah -->
            <div class="toast-container position-fixed bottom-0 end-0 p-3" id="toastPlacement">
                <div class="toast shadow-lg" id="myToast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                 <!-- Toast header -->
                    <div class="toast-header text-light border border-0" style="background-color: #9A6CC5;">
                        <i class='bx bxs-megaphone rounded me-2'></i>
                        <strong class="me-auto">Notification</strong>
                        <button type="button" class="btn-close custom-close " data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <!-- Custom toast body -->
                    <div class="toast-body fs-6 rounded-bottom-2 text-dark" 
                        style="background: rgba(154, 108, 197, 0.35); 
                                border-radius: 0 0 5px 5px; 
                                box-shadow: 0 4px 50px rgba(0, 0, 0, 0.1); 
                                backdrop-filter: blur(0.2px); 
                                -webkit-backdrop-filter: blur(0.2px); 
                                border: 1px solid rgba(154, 108, 197, 0.1); 
                            ">
                            <?php echo htmlspecialchars($_SESSION['log'], ENT_QUOTES, 'UTF-8'); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php unset($_SESSION['log']); ?>
    <?php endif; ?>

</body>

<script>
   document.addEventListener('DOMContentLoaded', function () {
    // Inisialisasi Toast dengan opsi autohide: false
    var myToastEl = document.getElementById('myToast');
    var myToast = new bootstrap.Toast(myToastEl, {
        autohide: false  // Atur menjadi true jika ingin toast otomatis hilang
    });

    // Tampilkan toast
    myToast.show();
});
</script>

</html>
