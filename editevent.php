<?php
require_once('db.php');

// Fetch the event details for editing (assuming this is fetched from the database)
$id_event = $_POST['id_event'];
$nama_event = $_POST['nama_event'];
$foto_event = $_POST['foto_event'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$tanggal_event = $_POST['tanggal_event'];
$waktu_event = $_POST['waktu_event'];
$lokasi_event = $_POST['lokasi_event'];
$max_peserta = $_POST['max_peserta'];
$status_event = $_POST['status_event'];

// Split the event time by " - "
list($waktu_mulai, $waktu_selesai) = explode(' - ', $waktu_event);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/af48b2d60e.js"></script>
    <link rel="stylesheet" href="styling/inputevent.css">
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg bg-light px-4 py-2">
        <div class="container-fluid d-flex justify-content-between py-2">
            <a class="navbar-brand fst-italic" href="logout.php">Pandawara.</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarScroll">
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
                    <li class="nav-item dropdown d-flex align-items-center">
                        <a class="text-decoration-none align-self-center mt-auto" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bxs-user-circle fs-1 text-dark'></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Account Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger d-flex justify-content-between" href="#">Log Out<i class='bx bx-log-out fs-4 align-self-center'></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="form-container">
        <h2>Edit Event</h2>

        <form action="editeventproses.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_event" value="<?= $id_event ?>">

            <!-- Upload Photo -->
            <div class="upload-photo">
                <input type="file" name="foto_event" style="display:none;" id="eventImage">
                <label for="eventImage" style="cursor: pointer;">+ Select Photo to Upload</label>
            </div>
            
            <!-- Event Name -->
            <div class="form-group">
                <label for="nama_event">Event Name</label>
                <input type="text" required name="nama_event" id="nama_event" placeholder="Event Name" value="<?= $nama_event ?>">
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="deskripsi" required id="description" placeholder="Share more about your event" maxlength="400"><?= $deskripsi ?></textarea>
            </div>

            <!-- Location -->
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" required name="lokasi_event" id="location" placeholder="Specific" value="<?= $lokasi_event ?>">
            </div>

            <!-- Event Date -->
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" required name="tanggal_event" id="event_date" value="<?= $tanggal_event ?>">
            </div>

            <!-- Start Time -->
            <div class="form-group">
                <label for="event_start_time">Event Start Time</label>
                <input type="time" required name="waktu_mulai" id="event_start_time" value="<?= $waktu_mulai ?>">
            </div>

            <!-- End Time -->
            <div class="form-group">
                <label for="event_end_time">Event End Time</label>
                <input type="time" required name="waktu_selesai" id="event_end_time" value="<?= $waktu_selesai ?>">
            </div>

            <!-- Maximum Participants -->
            <div class="form-group">
                <label for="max_participants">Maximum Participants</label>
                <input type="number" required name="max_peserta" id="max_participants" placeholder="Number" value="<?= $max_peserta ?>">
            </div>

            <!-- Category -->
            <div class="form-group">
                <label for="category">Category</label>
                <select name="kategori" required id="category">
                    <option value="music" <?= ($kategori == 'music') ? 'selected' : '' ?>>Music</option>
                    <option value="sports" <?= ($kategori == 'sports') ? 'selected' : '' ?>>Sports</option>
                    <option value="art" <?= ($kategori == 'art') ? 'selected' : '' ?>>Art</option>
                    <option value="education" <?= ($kategori == 'education') ? 'selected' : '' ?>>Education</option>
                    <option value="technology" <?= ($kategori == 'technology') ? 'selected' : '' ?>>Technology</option>
                </select>
            </div>

            <!-- Event Status -->
            <div class="form-group">
                <label for="status">Event Status</label>
                <select name="status_event" required id="status">
                    <option value="open" <?= ($status_event == 'open') ? 'selected' : '' ?>>Open</option>
                    <option value="closed" <?= ($status_event == 'closed') ? 'selected' : '' ?>>Closed</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="form-actions">
                <button type="submit" class="btn-create">Save Edit</button>
            </div>
        </form>
    </div>

    <!-- JavaScript to confirm form submission -->
    <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            console.log('Form is being submitted');
        });
    </script>

</body>
</html>
