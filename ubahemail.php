<?php
require_once('db.php');
session_start();

$id_akun = $_POST['id_akun'];
$newemail = $_POST['newemail'];

$query30 = "SELECT * FROM account WHERE email = ?";
$stmt30 = $db->prepare($query30);
$stmt30->execute([$newemail]);
$newemail_ada = $stmt30->fetch(PDO::FETCH_ASSOC);

if($newemail_ada){
  $_SESSION['error'] = "Email Already Exist.";
  header('Location: accountview.php');
  exit(); 
}

else {
    $query24 = "UPDATE account
                SET email = ?
                WHERE id_akun = ?";
    
    $stmt24 = $db->prepare($query24);
    $stmt24->execute([$newemail, $id_akun]);
    
    
    $_SESSION['email'] = $newemail;
    $_SESSION['log'] = "Your email successfully changed";
    
    header("location: accountview.php");
}