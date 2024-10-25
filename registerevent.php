<?php
require_once('db.php');
$currentDate = new DateTime();
$formattedDate = $currentDate->format('Y-m-d');

$id_akun = $_POST['id_akun'];
$id_event = $_POST['id_event'];

$query11 = "INSERT INTO registerke(id_akun, id_event)
            VALUES(?, ?)";

$stmt11 = $db->prepare($query11);
$stmt11->execute([$id_akun, $id_event]);


// history

$query11 = "INSERT INTO histori(id_akun, id_event, tanggal_daftar)
            VALUES(?, ?, ?)";

$stmt11 = $db->prepare($query11);
$stmt11->execute([$id_akun, $id_event, $formattedDate]);

session_start();
$_SESSION['log'] = "Your has been register successfully.";

header('location: index.php');