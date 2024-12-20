<?php
require_once('db.php');
session_start();

if (!isset($_SESSION['username'])) {
  header('location: login.php');
  exit();
}

$username = isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') : '';
$email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') : '';
$id_akun = isset($_SESSION['id_akun']) ? htmlspecialchars($_SESSION['id_akun'], ENT_QUOTES, 'UTF-8') : '';
$akses_akun = isset($_SESSION['akses_akun']) ? htmlspecialchars($_SESSION['akses_akun'], ENT_QUOTES, 'UTF-8') : '';

$link = ($akses_akun === 'user') ? 'index.php' : 'dashboardadmin.php';
$link = htmlspecialchars($link, ENT_QUOTES, 'UTF-8');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/accountview.css?v=1.0">
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
                                <a class="dropdown-item d-flex m-0 px-md-0 px-lg-2 text-dark icon-link" href="accountview.php">
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
            <div class="col-md-3 left-column mt-3">
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
            <div class="col-md-9 right-column ">
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

                <!-- Change Details -->
                <div class="change_details">
                    <h6 class="mt-4 mb-2 text-muted">Changing Account Details</h6>

                    <div class="ms-4">
                        <h4 class="mt-1 fw-bold">Options Account</h4>
                        
                        <div class="details-list pt-1">
                            <ul class="list-unstyled">
                                <li class="">
                                    <button type="button" class="btn btn-primary bg-transparent border border-0 text-dark text-muted p-0" data-bs-toggle="modal" data-bs-target="#usernameModal">
                                        Change My Username
                                    </button>
                                </li>
    
                                <li>
                                    <button type="button" class="btn btn-primary bg-transparent border border-0 text-dark text-muted p-0" data-bs-toggle="modal" data-bs-target="#emailModal">
                                        Change My Email
                                    </button>
                                </li>

                                <li>
                                    <button type="button" class="btn btn-primary bg-transparent border border-0 text-dark text-muted p-0" data-bs-toggle="modal" data-bs-target="#passwordModal">
                                        Reset My Password
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal ganti nama Username -->
    <div class="modal fade border border-0" id="usernameModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
            <div class="modal-content border border-0 text-center p-3">
                <div class="mx-3">
                    <i class='bx bx-rename fw-bold text-start bg-light border border-0 rounded-3 p-3 shadow-sm fs-1' ></i>
                </div>

                <p class="fw-semibold mt-3 fs-4">Change Username</p>

                <form action="ubahusername.php" method="post">
                    <input type="hidden" name="id_akun" value="<?= htmlspecialchars($id_akun, ENT_QUOTES, 'UTF-8') ?>">
                    <div class="text-center fs-6">
                        <p class="">Please make sure your username was correct before submitted.</p>
                        <div class="input-group flex-nowrap mb-2">
                            <!-- Edit Nama -->
                            <input type="text" required class="form-control" name="newusername" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                        
                    <div class="d-grid gap-2 py-3">
                        <button type="submit" class="btn tombol_custom text-center m-0 p-0 py-2 shadow-sm" style="background-color: #B88EE5; color: white; border: none;">Confirm</button>
                        <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
             </div>
         </div>
    </div>

    <!-- Modal ganti Email -->
    <div class="modal fade border border-0" id="emailModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
            <div class="modal-content border border-0 text-center p-3">
                <div class="mx-3">
                    <i class='bx bxs-envelope-open fw-bold text-start bg-light border border-0 rounded-3 p-3 shadow-sm fs-1' ></i>
                </div>

                <p class="fw-semibold mt-3 fs-4">Change Email</p>

                <form action="ubahemail.php" method="post">
                    <input type="hidden" name="id_akun" value="value="<?= htmlspecialchars($id_akun, ENT_QUOTES, 'UTF-8') ?>">
                    <div class="text-center fs-6">
                        <p class="">Please make sure your email was correct before submitted.</p>
                        <div class="input-group flex-nowrap mb-2">
                            <!-- Edit Email -->
                            <input type="email" required class="form-control" name="newemail" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping">
                        </div>
                    </div>
                        
                    <div class="d-grid gap-2 py-3">
                        <button type="submit" class="btn text-center m-0 p-0 py-2 shadow-sm" style="background-color: #B88EE5; color: white; border: none;">Confirm</button>
                        <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
             </div>
         </div>
    </div>

    <!-- Modal ganti Password-->
    <div class="modal fade border border-0" id="passwordModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered border border-0 modal_kategori">
            <div class="modal-content border border-0 text-center p-3">
                <div class="mx-3">
                    <i class='bx bxs-lock fw-bold text-start bg-light border border-0 rounded-3 p-3 shadow-sm fs-1' ></i>
                </div>

                <p class="fw-semibold mt-3 fs-4">Change Password</p>

                <form action="ubahpassword.php" method="post">
                    <input type="hidden" name="id_akun" value="<?= htmlspecialchars($id_akun, ENT_QUOTES, 'UTF-8') ?>">
                    <div class="text-center fs-6">
                        <p class="">Please make sure your Password is correct before submitting.</p>

                        <div class="input-group flex-nowrap mb-2">
                            <!-- Password -->
                            <input type="password" required class="form-control" id="password" name="password" placeholder="Password" aria-label="Password">
                        </div>

                        <div class="input-group flex-nowrap mb-2">
                            <!-- Re-Enter Password -->
                            <input type="password" required class="form-control" id="repassword" name="repassword" placeholder="Re-Enter Password" aria-label="Re-Enter Password">
                        </div>
                    </div>

                    <div class="d-grid gap-2 py-3">
                        <button type="submit" id="submitBtn" class="btn tombol_custom text-center m-0 p-0 py-2 shadow-sm" 
                                style="background-color: #B88EE5; color: white; border: none;" disabled>
                            Confirm
                        </button>
                        <button type="button" class="btn border text-center m-0 p-0 py-2 shadow-sm" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
             </div>
         </div>
    </div>

    <?php  if (isset($_SESSION['error'])): 
        $error = $_SESSION['error'];
    ?>
        <div class="alert bg-light border border-0 rounded-4 shadow-lg px-5 py-3 position-absolute top-0 start-50 translate-middle-x mt-3" data-bs-backdrop="static" role="alert" style="z-index: 1200;">
            <div class="d-flex">
                <i class='bx bx-x bg-danger text-light border border-0 rounded-circle p-1 fs-4 fw-bold'></i>
                <h4 class="align-self-center fw-semibold m-0 p-0 ms-2 text-muted"><?= isset($_SESSION['error']) ? htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8') : ''; ?></h4>
            </div>
            <div class="text-start mt-3 ms-2">
                <?php if($error == 'Email Already Exist.'){?>
                <p class="m-0 p-0 text-muted">Please try again that email has already been used.</p>
                <?php }else if($error == 'Username Already Exist.'){?>
                <p class="m-0 p-0 text-muted">Please try again that username has already been used.</p>
                <?php }?>
            </div>
        </div>
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>

    <?php  if (isset($_SESSION['log'])): ?>
        <div class="alert bg-light border border-0 rounded-4 shadow-lg px-5 py-3 position-absolute top-0 start-50 translate-middle-x mt-3" data-bs-backdrop="static" role="alert" style="z-index: 1200;">
            <div class="d-flex">
                <i class='bx bxs-megaphone bg-primary text-light border border-0 rounded-circle p-2 fs-4 fw-bold'></i>
                <h4 class="align-self-center fw-semibold m-0 p-0 ms-2 text-muted"><?= isset($_SESSION['error']) ? htmlspecialchars($_SESSION['error'], ENT_QUOTES, 'UTF-8') : ''; ?></h4>
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
    // Get the password fields and the submit button
    const password = document.getElementById('password');
    const repassword = document.getElementById('repassword');
    const submitBtn = document.getElementById('submitBtn');

    // Function to check if passwords match and are filled
    function checkPasswords() {
        if (password.value !== "" && repassword.value !== "" && password.value === repassword.value) {
            submitBtn.disabled = false; // Enable the submit button
        } else {
            submitBtn.disabled = true; // Disable the submit button
        }
    }

    // Add event listeners to password fields
    password.addEventListener('input', checkPasswords);
    repassword.addEventListener('input', checkPasswords);

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