<?php
require_once('db.php');

$id_event = $_POST['id_event'];
$id_akun = $_POST['id_akun'];


$query21 = "DELETE
            FROM registerke
            WHERE id_event = ? AND id_akun = ?";

$stmt21 = $db->prepare($query21);
$stmt21->execute([$id_event, $id_akun]);

header('location: dashboardadmin.php');