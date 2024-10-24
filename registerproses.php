<?php
session_start();
require_once('db.php');

$username = $_POST['username'];
$password = $_POST['password_akun'];
$email = $_POST['email'];
$akses = $_POST['akses_akun'];

$query0 = "SELECT * FROM account WHERE email = ?";
$stmt0 = $db->prepare($query0);
$stmt0->execute([$email]);
$email_ada = $stmt0->fetch(PDO::FETCH_ASSOC);

if($email_ada){
  $_SESSION['error'] = "Email Already Exist.";
  header('Location: registeruser.php');
  exit(); 
}
else {
  $query1 = "SELECT * FROM account WHERE username = ?";
  $stmt1 = $db->prepare($query1);
  $stmt1->execute([$username]);
  $username_ada = $stmt1->fetch(PDO::FETCH_ASSOC);

  if($username_ada){
    $_SESSION['error'] = "Username Already Exist.";
    if($akses == 'user'){
      header('Location: registeruser.php');
    }
    else if($akses == 'admin'){
      header('Location: registeradmin.php');
    }
    exit();
  }
  else {
    $en_password = password_hash($password, PASSWORD_BCRYPT);
    
    $query2 = "INSERT INTO Account(username, email, password_akun, akses_akun) VALUES(?, ?, ?, ?)";
    $result = $db->prepare($query2);
    $result->execute([$username, $email, $en_password, $akses]);

    $_SESSION['registered'] = "Your Account Successfully Added.";

    header('Location: login.php');
    exit();
  }
}
?>
