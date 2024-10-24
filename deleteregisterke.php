<?php
require_once('db.php');

$id_akun = $_POST['id_akun'];
$id_event = $_POST['id_event'];

$query17 = "DELETE
            FROM registerke
            WHERE id_akun = ? AND id_event = ?";

$stmt17 = $db->prepare($query17);
$stmt17->execute([$id_akun, $id_event]);
session_start();
$_SESSION['log'] = "Your event succesfully deleted from mylist.";

header('location: mylist.php');