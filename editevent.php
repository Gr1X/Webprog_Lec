<?php
require_once('db.php');
session_start();

if (!isset($_SESSION['username'])) {
  header('location: login.php');
  exit();
}

// Fetch the event details for editing (assuming this is fetched from the database)
$id_event = htmlspecialchars($_POST['id_event'], ENT_QUOTES, 'UTF-8');
$nama_event = htmlspecialchars($_POST['nama_event'], ENT_QUOTES, 'UTF-8');
$foto_event = htmlspecialchars($_POST['foto_event'], ENT_QUOTES, 'UTF-8');
$deskripsi = htmlspecialchars($_POST['deskripsi'], ENT_QUOTES, 'UTF-8');
$kategori = htmlspecialchars($_POST['kategori'], ENT_QUOTES, 'UTF-8');
$tanggal_event = htmlspecialchars($_POST['tanggal_event'], ENT_QUOTES, 'UTF-8');
$waktu_event = htmlspecialchars($_POST['waktu_event'], ENT_QUOTES, 'UTF-8');
$lokasi_event = htmlspecialchars($_POST['lokasi_event'], ENT_QUOTES, 'UTF-8');
$max_peserta = htmlspecialchars($_POST['max_peserta'], ENT_QUOTES, 'UTF-8');
$status_event = htmlspecialchars($_POST['status_event'], ENT_QUOTES, 'UTF-8');


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
                            <li><a class="dropdown-item" href="accountinfo.php">Account Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger d-flex justify-content-between" href="logout.php">Log Out<i class='bx bx-log-out fs-4 align-self-center'></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="form-container">
        <h2>Edit Event</h2>

        <form action="editeventproses.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id_event" value="<?= htmlspecialchars($id_event, ENT_QUOTES, 'UTF-8') ?>">

            <!-- Upload Photo -->
            <div class="upload-photo">
                <input type="file" name="foto_event" style="display:none;" id="eventImage" onchange="previewImage(event)">
                <label for="eventImage" style="cursor: pointer;">+ Select Photo to Upload</label>
            </div>

            <!-- Preview Photo -->
            <h2 class="text-center" for="eventImage">Preview</h2>
            <div class="upload-photo">
                <img id="imagePreview" src="#" alt="Your Event Image" style="display: none; max-width: 100%; height: auto;" />
            </div>

            <!-- Event Name -->
            <div class="form-group">
                <label for="nama_event">Event Name</label>
                <input type="text" required name="nama_event" id="nama_event" placeholder="Event Name" value="<?= htmlspecialchars($nama_event, ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="deskripsi" required id="description" placeholder="Share more about your event" maxlength="400"><?= htmlspecialchars($deskripsi, ENT_QUOTES, 'UTF-8') ?></textarea>
            </div>

            <!-- Location -->
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" required name="lokasi_event" id="location" placeholder="Specific" value="<?= htmlspecialchars($lokasi_event, ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <!-- Event Date -->
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" required name="tanggal_event" id="event_date" value="<?= htmlspecialchars($tanggal_event, ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <!-- Start Time -->
            <div class="form-group">
                <label for="event_start_time">Event Start Time</label>
                <input type="time" required name="waktu_mulai" id="event_start_time" value="<?= htmlspecialchars($waktu_mulai, ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <!-- End Time -->
            <div class="form-group">
                <label for="event_end_time">Event End Time</label>
                <input type="time" required name="waktu_selesai" id="event_end_time" value="<?= htmlspecialchars($waktu_selesai, ENT_QUOTES, 'UTF-8') ?>">
            </div>

            <!-- Maximum Participants -->
            <div class="form-group">
                <label for="max_participants">Maximum Participants</label>
                <input type="number" required name="max_peserta" id="max_participants" placeholder="Number" value="<?= htmlspecialchars($max_peserta, ENT_QUOTES, 'UTF-8') ?>">
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

        function previewImage(event) {
        var input = event.target; // Mengambil elemen input yang memicu event
        var reader = new FileReader();

        reader.onload = function() {
            var preview = document.getElementById('imagePreview');
            preview.src = reader.result; // Menetapkan hasil baca sebagai sumber gambar
            preview.style.display = 'block'; // Menampilkan gambar
        };

        reader.readAsDataURL(input.files[0]); // Membaca file gambar
    }
    </script>

</body>
</html>
