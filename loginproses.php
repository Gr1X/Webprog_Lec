<?php
session_start();
require_once('db.php');

// Data dari Form Login
$email = $_POST['email'];
$password = $_POST['password_akun'];

// Check if user exists
$query3 = "SELECT * FROM account
           WHERE email = ?";

$stmt3 = $db->prepare($query3);
$stmt3->execute([$email]);
$row = $stmt3->fetch(PDO::FETCH_ASSOC);

if (!$row) {
  // Check Email
  $_SESSION['error'] = "Email not found.";
  header("location: login.php");
  exit();
} else {
  // Check password
  if (!password_verify($password, $row['password_akun'])) {
      $_SESSION['error'] = "Wrong password.";
      header("location: login.php");
      exit();
  }
  else{
    // Login Sukses
    $_SESSION['id_akun'] = $row['id_akun'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['akses_akun'] = $row['akses_akun'];

    $akses = $_SESSION['akses_akun'];
    if ($akses == 'user') {
        header('location: index.php');
    } else if($akses == 'admin') {
        header('location: dashboardadmin.php');
    }
  }
}