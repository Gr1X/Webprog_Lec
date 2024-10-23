<?php
require_once('db.php');
session_start();

$id_akun = $_POST['id_akun'];
$newusername = $_POST['newusername'];

$query23 = "UPDATE account
            SET username = ?
            WHERE id_akun = ?";

$stmt23 = $db->prepare($query23);
$stmt23->execute([$newusername, $id_akun]);

$_SESSION['username'] = $newusername;

header("location: accountview.php");