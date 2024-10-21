<?php
require_once('db.php');

$filename = $_FILES['foto_event']['name'];
$temp_file = $_FILES['foto_event']['tmp_name'];

$file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

$allowed_ext = ['jpg', 'jpeg', 'png', 'svg', 'webp', 'bmp', 'gif'];

if (in_array($file_ext, $allowed_ext)){
  $foto_path = "uploads/{$filename}";
  move_uploaded_file($temp_file, $foto_path);

  $nama_event = $_POST['nama_event'];
  $deskripsi = $_POST['deskripsi'];
  $lokasi_event = $_POST['lokasi_event'];
  $tanggal_event = $_POST['tanggal_event'];
  $waktu_event = ($_POST['waktu_mulai'] . " - " . $_POST['waktu_selesai']);
  $max_peserta = $_POST['max_peserta'];
  $kategori = $_POST['kategori'];

  $query4 = "INSERT INTO listevent (nama_event, foto_event, deskripsi, kategori, tanggal_event, waktu_event, lokasi_event, max_peserta)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
  
  $stmt4 = $db->prepare($query4);
  $stmt4->execute([$nama_event, $filename ,$deskripsi, $kategori, $tanggal_event, $waktu_event, $lokasi_event, $max_peserta]);

  header('location: dashboardadmin.php');
}
?>