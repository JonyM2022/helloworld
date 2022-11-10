<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /php/admin.php?id=4');
}

require_once 'connect.php';

$id = $_GET['id'];
$status = "Завершенная";

mysqli_query($connect, "UPDATE `zayavki` SET `status` = '$status' WHERE `id`='$id'");
?>