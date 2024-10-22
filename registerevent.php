<?php
require_once('db.php');

$id_akun = $_POST['id_akun'];
$id_event = $_POST['id_event'];

echo $id_akun;
echo $id_event;

$query11 = "INSERT INTO registerke(id_akun, id_event)
            VALUES(?, ?)";

$stmt11 = $db->prepare($query11);
$stmt11->execute([$id_akun, $id_event]);

header('location: dashboarduser.php');