<?php
session_start();
require_once('db.php');

$id_akun = $_SESSION['id_akun'];
$username = $_SESSION['username'];
$keyword = isset($_POST['keyword']) ? trim($_POST['keyword']) : '';

// Base query
$query5 = "SELECT e.id_event, nama_event, foto_event, status_event, kategori, tanggal_event, max_peserta, tanggal_event, waktu_event, deskripsi, lokasi_event
           FROM listevent AS e
           LEFT JOIN registerke AS r ON r.id_event = e.id_event";

// Tambahkan kondisi jika keyword ada
if (!empty($keyword)) {
    $query5 .= " WHERE nama_event LIKE :keyword";
}

// Tambahkan bagian akhir query
$query5 .= " GROUP BY e.id_event ORDER BY tanggal_event ASC";

// Persiapkan dan jalankan query
$stmt5 = $db->prepare($query5);

// Bind parameter jika ada keyword
if (!empty($keyword)) {
    $stmt5->bindValue(':keyword', '%' . $keyword . '%');
}

$stmt5->execute();
$events = $stmt5->fetchAll(PDO::FETCH_ASSOC);
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
                <form action="dashboardadmin.php" method="post" class="input-group mx-3" role="search">
                    <input class="form-control input_search" type="text" name="keyword" placeholder="Search" aria-label="Search">
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
                            <li><a class="dropdown-item text-danger d-flex justify-content-between" href="logout.php">Log Out<i class='bx bx-log-out fs-4 align-self-center' ></i></a></li>
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

                    $query14 = "SELECT id_event, COUNT(r.id_akun) AS jumlahdaftar
                    FROM registerke AS r
                    WHERE id_event = ?";

                    $stmt14 = $db->prepare($query14);
                    $stmt14->execute([$event['id_event']]);
                    $totaldaftar = $stmt14->fetch(PDO::FETCH_ASSOC);

                    // ======================================== //

                    $query20 = "SELECT id_event, r.id_akun, username, email
                                FROM registerke AS r
                                JOIN account AS a ON a.id_akun = r.id_akun
                                WHERE id_event = ?";

                    $stmt20 = $db->prepare($query20);
                    $stmt20->execute([$event['id_event']]);
                    $viewparticipants = $stmt20->fetchAll(PDO::FETCH_ASSOC);
                ?>
                <div class="col-md-4">
                    <div class="card border border-0 mb-4" style="width: 100%;">
                        <!-- Gambar Event -->
                        <img src="uploads/<?= $event['foto_event'] ?>" class="card-img-top border border-0 rounded-3" alt="...">
                        
                        <div class="card-body mt-4 p-0">
                            <div class="d-flex gap-2 mb-3">
                                <!-- Nama Event -->
                                <h5 class="card-title m-0 align-self-center"><?= $event['nama_event'] ?></h5>
                                
                                <!-- Status Event -->
                                <p type="button" class="btn 
                                    <?php 
                                        if ($totaldaftar['jumlahdaftar'] >= $event['max_peserta']) {
                                            echo 'btn-secondary';
                                        } else {
                                            echo $event['status_event'] === 'open' ? 'btn-success' : 'btn-danger';
                                        }
                                    ?> 
                                    rounded-2 px-3 py-0 m-0">
                                    <?php 
                                        if ($totaldaftar['jumlahdaftar'] >= $event['max_peserta']) {
                                            echo 'Sold Out';
                                        } else {
                                            echo ucfirst($event['status_event']);
                                        }
                                    ?>
                                </p>
                            </div>
                            
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-1 align-items-center">    
                                    <!-- Kategori Event -->
                                    <div class="d-flex border border-0 rounded-2 px-3 py-0 kategori_tombol">
                                        <p class="align-self-center p-0 m-0"><?= ucfirst($event['kategori']) ?></p>
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
                                          <?= isset($totaldaftar['jumlahdaftar']) ? $totaldaftar['jumlahdaftar'] : 0 ?> / <?= $event['max_peserta'] ?>
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
                                    <div class="d-flex justify-content-center pe-4">
                                        <button href="#" class="btn bg-transparent border border-0 text-muted d-flex justify-content-center m-0 p-0" data-bs-toggle="modal" data-bs-target="#cardModal<?=$event['id_event']?>">
                                            <i class='bx bxs-cog fs-4 align-self-center me-1'></i>Modify Event Information
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Event -->
                <div class="modal fade border border-0" id="cardModal<?=$event['id_event']?>" tabindex="-1" aria-labelledby="cardModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal_custom modal-dialog-centered border border-0">
                        <div class="modal-content border border-0 rounded-4">
                            <img src="uploads/<?= $event['foto_event'] ?>" class="card-img-top object-fit-cover border border-0 rounded-top-4" alt="..." style="width: 100%; height: 300px;">
                            <div class="modal-body p-5 py-3">

                                <div class="d-flex justify-content-between">
                                    <div class="d-flex">
                                        <h4 class="modal-title fw-semibold my-2"><?= $event['nama_event'] ?></h4>
                                        <!-- ini buat statusnya di dalem modal untuk open pakae text-bg-primary kalo sold out warning -->
                                        <p class="border border-0 rounded-2 align-self-center m-0 mx-2 px-2
                                        <?php 
                                            if ($totaldaftar['jumlahdaftar'] >= $event['max_peserta']) {
                                                echo 'text-bg-secondary';
                                            } else {
                                                echo $event['status_event'] === 'open' ? 'text-bg-success' : 'text-bg-danger';
                                            }
                                        ?> 
                                        ">
                                        <?php 
                                            if ($totaldaftar['jumlahdaftar'] >= $event['max_peserta']) {
                                                echo 'Sold Out';
                                            } else {
                                                echo ucfirst($event['status_event']);
                                            }
                                        ?>
                                        </p>
                                        
                                    </div>
                                    
                                    <?php if($event['status_event'] == 'open'){?>
                                    <div class="">
                                        <a type="button" class="btn button_register rounded-pill px-4 d-flex justify-content-between" data-bs-toggle="modal" data-bs-target="#modalParticipant<?= $event['id_event']?>">Event participants<i class='bx bx-group fs-4 align-self-center ps-2'></i></a>
                                    </div>
                                    <?php } ?>

                                </div>
                                
                                <!-- Deskripsi -->
                                <p class="card-text m-0">
                                    <?= $event['deskripsi'] ?>
                                </p>

                                <div class="d-flex my-4">
                                    <div class="d-flex justify-content-center gap-2">
                                        <form action="editevent.php" method="POST" class="d-inline">
                                            <input type="hidden" name="id_event" value="<?= $event['id_event'] ?>">
                                            <input type="hidden" name="nama_event" value="<?= $event['nama_event'] ?>">
                                            <input type="hidden" name="foto_event" value="<?= $event['foto_event'] ?>">
                                            <input type="hidden" name="deskripsi" value="<?= $event['deskripsi'] ?>">
                                            <input type="hidden" name="kategori" value="<?= $event['kategori'] ?>">
                                            <input type="hidden" name="tanggal_event" value="<?= $event['tanggal_event'] ?>">
                                            <input type="hidden" name="waktu_event" value="<?= $event['waktu_event'] ?>">
                                            <input type="hidden" name="lokasi_event" value="<?= $event['lokasi_event'] ?>">
                                            <input type="hidden" name="max_peserta" value="<?= $event['max_peserta'] ?>">
                                            <input type="hidden" name="status_event" value="<?= $event['status_event'] ?>">
                                            <button type="submit" class="btn button_register rounded-pill px-4 d-flex justify-content-between">Edit
                                                <i class='bx bxs-edit-alt align-self-center ms-2'></i>
                                            </button>
                                        </form>

                                        <button type="button" class="btn button_register rounded-pill px-4 d-flex justify-content-between" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $event['id_event']?>">Delete<i class='bx bxs-trash align-self-center ms-2' ></i></button>
                                    </div>
                                </div>
                                

                                <div class="mb-4">
                                    <!-- Date -->
                                    <p class="card-text m-0 my-2 d-flex"><i class='bx bx-calendar-alt align-self-center fs-4 me-3'></i><?= $event['tanggal_event'] ?></p>
                                    <!-- Waktu -->
                                    <p class="card-text m-0 my-2 d-flex"><i class='bx bxs-time align-self-center fs-4 me-3'></i><?= $event['waktu_event'] ?></p>
                                    <!-- Location -->
                                    <p class="card-text m-0 my-2 d-flex"><i class='bx bxs-map align-self-center fs-4 me-3'></i><?= $event['lokasi_event'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Delete Data-->
                <div class="modal fade border border-0" id="modalDelete<?= $event['id_event']?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
                        <div class="modal-content border border-0 text-center p-3">
                            <div class="mx-3">
                                <i class='bx bx-error text-center bg-light border border-0 rounded-circle p-3 shadow-sm fs-2' ></i>
                            </div>
                                <p class="fw-semibold mt-3 fs-4">Removing Event</p>
                            <div class="text-center fs-6">
                                Are you sure you want to remove your event? All of your data will be permanently removed. This action cannot be undone.
                            </div>
                                                
                            <form action="deleteevent.php" method="post"class="d-grid gap-2 py-3">
                                <input type="hidden" name="id_event" value="<?= $event['id_event'] ?>">
                                <button type="submit" class="btn btn-danger text-center m-0 p-0 py-2 shadow-sm">Confirm</button>
                                <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-toggle="modal" data-bs-dismiss="modal">Cancel</i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- ModalParticipant -->
                <div class="modal fade border border-0" id="modalParticipant<?= $event['id_event']?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg border-0">
                        <div class="modal-content border-0 p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <!-- Back Button -->
                                <button type="button" class="btn btn-primary button_part" data-bs-toggle="modal" data-bs-target="#cardModal">Back</button>

                                <!-- Export Button -->
                                <button type="button" class="btn btn-primary d-flex align-items-center button_part justify-content-between">
                                    Export<i class='bx bx-spreadsheet text-end fs-4'></i>
                                </button>
                            </div>
                            
                            <!-- Participants Table -->
                            <div class="table-responsive">
                                <table class="table table-borderless align-middle">
                                    <tbody>
                                    <!-- Loop through participants -->
                                    <?php if($totaldaftar['jumlahdaftar'] != 0){
                                          foreach ($viewparticipants as $participant): ?>
                                          <tr>
                                              <td>
                                                  <div class="participant-row">
                                                      <p class="participant-name"><?= htmlspecialchars($participant['username']) ?></p>
                                                      <p class="participant-email"><?= htmlspecialchars($participant['email']) ?></p>  
                                                  </div>
                                              </td>
                                              <td>
                                                  <!-- Delete Button triggers the specific delete modal -->
                                                  <button class="btn-delete" data-bs-toggle="modal" data-bs-target="#deleteParticipant<?= $participant['id_akun'] ?>">
                                                      <i class='bx bx-trash fs-5'></i>
                                                  </button>
                                              </td>
                                          </tr>
                                    <?php endforeach;
                                    } else { ?>
                                          <p> Belum ada participant di event ini</p>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <?php foreach ($viewparticipants as $participant): ?>
                <!-- Modal Delete Data Participant -->
                <div class="modal fade border border-0" id="deleteParticipant<?= $participant['id_akun'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
                        <div class="modal-content border border-0 text-center p-3">
                            <div class="mx-3">
                                <i class='bx bx-error text-center bg-light border border-0 rounded-circle p-3 shadow-sm fs-2'></i>
                            </div>
                            <p class="fw-semibold mt-3 fs-4">Removing Participant</p>
                            <div class="text-center fs-6">
                                Are you sure you want to remove this participant? This action cannot be undone.
                            </div>
                                                          
                            <!-- Form to delete the participant -->
                            <form action="deleteuserregister.php" method="post" class="d-grid gap-2 py-3">
                                <input type="hidden" name="id_event" value="<?= $event['id_event'] ?>">
                                <input type="hidden" name="id_akun" value="<?= $participant['id_akun'] ?>">
                                <button type="submit" class="btn btn-danger text-center m-0 p-0 py-2 shadow-sm">Confirm</button>
                                <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                <?php endforeach; ?>
            </div>

        

        
    </div>
    
</body>

</html>
