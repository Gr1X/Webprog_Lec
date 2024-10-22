<?php 

$passwordadmin = $_POST['adminPass'];

if($passwordadmin != 'admin'){
    header('location: registeruser.php');
} else {
    header('location: registeradmin.php');
}

?>