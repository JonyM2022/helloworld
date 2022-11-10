<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /php/admin.php?id=4');
}

require_once 'connect.php';

$id = $_GET['id'];
$name = $_POST['name'];
$disc = $_POST['disc'];
$cost = $_POST['cost'];


mysqli_query($connect, "UPDATE `price` SET `name`='$name',`disc`='$disc',`price`='$cost' WHERE `id`='$id'");
?>