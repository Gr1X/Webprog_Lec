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
    <link rel="stylesheet" href="styling/inputevent.css">
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
                            <li><a class="dropdown-item text-danger d-flex justify-content-between" href="logout.php">Log Out<i class='bx bx-log-out fs-4 align-self-center' ></i></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="form-container">
        <h2 class="">Create Event</h2>

        <form action="inputeventproses.php" method="post" enctype="multipart/form-data">
            <div class="upload-photo">
                <input type="file" required name="foto_event" style="display:none;" id="eventImage" onchange="previewImage(event)">
                <label for="eventImage" style="cursor: pointer;">+ Select Photo to Upload</label>
            </div>

            <h2 class="text-center" for="eventImage">Preview</h2>
            <div class="upload-photo">
                <img id="imagePreview" src="#" alt="Your Event Image" style="display: none; max-width: 100%; height: auto;" />
            </div>

            <div class="form-group">
                <label for="location">Event Name</label>
                <input type="text" required name="nama_event" id="" placeholder="Event Name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="deskripsi" required id="description" placeholder="Share more about your event and let everyone know" maxlength="400"></textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" required name="lokasi_event" id="location" placeholder="Specific">
            </div>
            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" required name="tanggal_event" id="event_date">
            </div>
            <div class="form-group">
                <label for="event_start_time">Event Start Time</label>
                <input type="time" required name="waktu_mulai" id="event_start_time">
            </div>
            <div class="form-group">
                <label for="event_end_time">Event End Time</label>
                <input type="time" required name="waktu_selesai" id="event_end_time">
            </div>
            <div class="form-group">
                <label for="max_participants">Maximum Participants</label>
                <input type="number" required name="max_peserta" id="max_participants" placeholder="Number">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="kategori" required id="category">
                    <option value="music">Music</option>
                    <option value="sports">Sports</option>
                    <option value="art">Art</option>
                    <option value="education">Education</option>
                    <option value="technology">Technology</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-create">Create Event</button>
            </div>
        </form>

    </div>
</body>

<script>
    function previewImage(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function() {
            var preview = document.getElementById('imagePreview');
            preview.src = reader.result;
            preview.style.display = 'block';  // Menampilkan gambar
        };

        reader.readAsDataURL(input.files[0]);  // Membaca file gambar
    }
</script>
</html>