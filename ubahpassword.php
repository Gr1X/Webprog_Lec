<?php
require_once('db.php');

$id_akun = $_POST['id_akun'];
$newpassword = $_POST['password'];

$en_password = password_hash($newpassword, PASSWORD_BCRYPT);

$query25 = "UPDATE account
            SET password_akun = ?
            WHERE id_akun = ?";

$stmt25 = $db->prepare($query25);
$stmt25->execute([$en_password, $id_akun]);
session_start();
$_SESSION['log'] = "Your password successfully changed";

header("location: accountview.php");