<?php
require_once('db.php');

$id_event = $_POST['id_event'];

$query18 = "DELETE
            FROM registerke
            WHERE id_event = ?";

$stmt18 = $db->prepare($query18);
$stmt18->execute([$id_event]);

$query19 = "DELETE
            FROM listevent
            WHERE id_event = ?";

$stmt19 = $db->prepare($query19);
$stmt19->execute([$id_event]);

header('location: dashboardadmin.php');