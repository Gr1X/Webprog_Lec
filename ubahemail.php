<?php
require_once('db.php');
session_start();

$id_akun = $_POST['id_akun'];
$newemail = $_POST['newemail'];

$query24 = "UPDATE account
            SET email = ?
            WHERE id_akun = ?";

$stmt24 = $db->prepare($query24);
$stmt24->execute([$newemail, $id_akun]);

$_SESSION['email'] = $newemail;

header("location: accountview.php");