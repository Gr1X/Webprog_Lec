<?php
session_start();
require_once('db.php');

if(!isset($_SESSION['username'])){
  header('location: login.php');
}

$id_akun = htmlspecialchars($_SESSION['id_akun'], ENT_QUOTES, 'UTF-8');
$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
$keyword = isset($_POST['keyword']) ? htmlspecialchars(trim($_POST['keyword']), ENT_QUOTES, 'UTF-8') : '';

// Base query
$query16 = "SELECT e.id_event, nama_event, foto_event, kategori, tanggal_event, max_peserta, tanggal_event, waktu_event, deskripsi, lokasi_event
            FROM listevent AS e
            LEFT JOIN registerke AS r ON r.id_event = e.id_event";

// Tambahkan kondisi jika keyword ada
if (!empty($keyword)) {
    $query16 .= " WHERE nama_event LIKE :keyword AND r.id_akun = :id_akun";
} else {
    $query16 .= " WHERE r.id_akun = :id_akun";
}

// Tambahkan bagian akhir query
$query16 .= " GROUP BY e.id_event ORDER BY tanggal_event ASC";

// Persiapkan dan jalankan query
$stmt16 = $db->prepare($query16);

// Bind parameter jika ada keyword
if (!empty($keyword)) {
    $stmt16->bindValue(':keyword', '%' . $keyword . '%');
}

// Bind id_akun parameter in both cases
$stmt16->bindValue(':id_akun', $id_akun);

// Execute the query
$stmt16->execute();
$events = $stmt16->fetchAll(PDO::FETCH_ASSOC);
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
    <link rel="stylesheet" href="styling/mylist.css?v=1.0">
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

    <div class="mt-5 pt-5 mx-5">
        <div class="row my-3 mx-3">
            <?php foreach ($events as $event): ?>
                <div class="col-md-6 mb-3">
                    <div class="card card_book text-white m-0 p-0" style="background-image: url('uploads/<?php echo htmlspecialchars($event['foto_event'], ENT_QUOTES, 'UTF-8'); ?>');">
                        <div class="card-header border-0">
                            Your Registration Event
                        </div>
                        <div class="card-body p-4 pt-2">
                            <p class="card-title m-0">Event</p>
                            <div class="d-flex justify-content-between">
                                <h2 class="card-text align-self-center"><?php echo htmlspecialchars($event['nama_event'], ENT_QUOTES, 'UTF-8'); ?></h2>
                                <div class="text-center">
                                    <p class="p-0 m-0"><?php echo date('d F Y', strtotime($event['tanggal_event'])); ?></p>
                                    <h2><?php echo htmlspecialchars($event['waktu_event'], ENT_QUOTES, 'UTF-8'); ?></h2>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="card-text m-0 my-2 d-flex">
                                        <i class='bx bx-category-alt align-self-center fs-4 me-3'></i>
                                        <?php 
                                        if($event['kategori'] == 'education'){
                                            echo 'Education';
                                        } else if($event['kategori'] == 'art'){
                                            echo 'Art';
                                        } else if($event['kategori'] == 'music'){
                                            echo 'Music';
                                        } else if($event['kategori'] == 'sports'){
                                            echo 'Sports';
                                        } else if($event['kategori'] == 'technology'){
                                            echo 'Technology';
                                        }
                                        ?>
                                    </p>
                                    <p class="card-text m-0 my-2 d-flex">
                                        <i class='bx bxs-map align-self-center fs-4 me-3'></i>
                                        <?php echo htmlspecialchars($event['lokasi_event'], ENT_QUOTES, 'UTF-8'); ?>
                                    </p>
                                </div>
                                <div class="d-flex align-items-end">
                                    <button class="btn tombol_book" data-bs-toggle="modal" data-bs-target="#modalDeleteRegis<?= htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8') ?>">Cancel Book Registration</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Delete Data-->
                <div class="modal fade border border-0" id="modalDeleteRegis<?= htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8') ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
                        <div class="modal-content border border-0 text-center p-3">
                            <div class="mx-3">
                                <i class='bx bx-error text-center bg-light border border-0 rounded-circle p-3 shadow-sm fs-2'></i>
                            </div>
                            <p class="fw-semibold mt-3 fs-4">Cancel Event</p>
                            <div class="text-center fs-6">
                                Are you sure you want to remove your Booked Event? All of your data will be permanently removed. This action cannot be undone.
                            </div>
                            <form action="deleteregisterke.php" method="post" class="d-grid gap-2 py-3"> 
                                <input type="hidden" name="id_akun" value="<?= htmlspecialchars($id_akun, ENT_QUOTES, 'UTF-8') ?>">
                                <input type="hidden" name="id_event" value="<?= htmlspecialchars($event['id_event'], ENT_QUOTES, 'UTF-8') ?>">
                                <button type="submit" class="btn btn-danger text-center m-0 p-0 py-2 shadow-sm">Confirm</button>
                                <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php  if (isset($_SESSION['log'])): ?>
        <div class="alert bg-light border border-0 rounded-4 shadow-lg px-5 py-3 position-absolute top-0 start-50 translate-middle-x mt-3" data-bs-backdrop="static" role="alert" style="z-index: 1200;">
            <div class="d-flex">
                <i class='bx bxs-megaphone bg-primary text-light border border-0 rounded-circle p-2 fs-4 fw-bold'></i>
                <h4 class="align-self-center fw-semibold m-0 p-0 ms-2 text-muted"><?= htmlspecialchars($_SESSION['log'], ENT_QUOTES, 'UTF-8'); ?></h4>
            </div>
            <div class="text-start mt-3 ms-2">
                <p class="m-0 p-0 text-muted">Your account has succesfully created, now input to login.</p>
            </div>
        </div>
        <?php unset($_SESSION['log']); ?>
    <?php endif; ?>

</body>

</html>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var alertElement = document.querySelector('.alert');
        
        if (alertElement) {
            // Tambahkan kelas "show" untuk memunculkan alert dengan jeda sedikit lebih lama
            setTimeout(function() {
                alertElement.classList.add('show');
            }, 200); // 0.2 detik (membuat transisi lebih smooth)

            // Sembunyikan alert setelah 3 detik
            setTimeout(function() {
                alertElement.classList.add('hide');
            }, 3200); // Tambahkan 3 detik untuk durasi tampil

            // Hapus elemen alert dari DOM setelah animasi selesai
            setTimeout(function() {
                alertElement.remove();
            }, 3700); // Pastikan animasi selesai sebelum elemen dihapus
        }
    });
</script>