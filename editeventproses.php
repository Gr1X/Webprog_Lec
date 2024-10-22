<?php
require_once('db.php');

$id_event = $_POST['id_event'];
$nama_event = $_POST['nama_event'];
$deskripsi = $_POST['deskripsi'];
$kategori = $_POST['kategori'];
$tanggal_event = $_POST['tanggal_event'];
$waktu_event = ($_POST['waktu_mulai'] . " - " . $_POST['waktu_selesai']);
$lokasi_event = $_POST['lokasi_event'];
$max_peserta = $_POST['max_peserta'];
$status_event = $_POST['status_event'];

if (!empty($_FILES['foto_event']['name'])){
  $filename = $_FILES['foto_event']['name'];
  $temp_file = $_FILES['foto_event']['tmp_name'];

  $file_ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

  $allowed_ext = ['jpg', 'jpeg', 'png', 'svg', 'webp', 'bmp', 'gif'];

  if (in_array($file_ext, $allowed_ext)){
    $foto_path = "uploads/{$filename}";
    move_uploaded_file($temp_file, $foto_path);

    $query9 = "UPDATE listevent
               SET nama_event = ?,
                   foto_event = ?,
                   deskripsi = ?,
                   kategori = ?,
                   tanggal_event = ?,
                   waktu_event = ?,
                   lokasi_event = ?,
                   max_peserta = ?,
                   status_event = ?
               WHERE id_event = ?";

    $stmt9 = $db->prepare($query9);
    $stmt9->execute([$nama_event, $filename, $deskripsi, $kategori, $tanggal_event, $waktu_event, $lokasi_event, $max_peserta, $status_event, $id_event]);
  }
  else{
    echo "<div class='alert alert-danger'>Format file tidak didukung.</div>";
    exit();
  }

}
else{
  $query8 = "UPDATE listevent
            SET nama_event = ?,
                deskripsi = ?,
                kategori = ?,
                tanggal_event = ?,
                waktu_event = ?,
                lokasi_event = ?,
                max_peserta = ?,
                status_event = ?
            WHERE id_event = ?";

  $stmt8 = $db->prepare($query8);
  $stmt8->execute([$nama_event, $deskripsi, $kategori, $tanggal_event, $waktu_event, $lokasi_event, $max_peserta, $status_event, $id_event]);
}

header('location: dashboardadmin.php');
?>

