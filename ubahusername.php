<?php
require_once('db.php');
session_start();

$id_akun = $_POST['id_akun'];
$newusername = $_POST['newusername'];

$query31 = "SELECT * FROM account WHERE username = ?";
$stmt31 = $db->prepare($query31);
$stmt31->execute([$newusername]);
$newusername_ada = $stmt31->fetch(PDO::FETCH_ASSOC);

if($newusername_ada){
  $_SESSION['error'] = "Username Already Exist.";
  header('Location: accountview.php');
  exit();
}

$query23 = "UPDATE account
            SET username = ?
            WHERE id_akun = ?";

$stmt23 = $db->prepare($query23);
$stmt23->execute([$newusername, $id_akun]);

$_SESSION['username'] = $newusername;
$_SESSION['log'] = "Your email successfully changed";

header("location: accountview.php");