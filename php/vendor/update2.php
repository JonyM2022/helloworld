<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /php/adminP.php?id=4');
}

require_once 'connect.php';

$id = $_GET['id'];
$name = $_POST['name'];
$disc = $_POST['disc'];


mysqli_query($connect, "UPDATE `portfolio` SET `name`='$name',`disc`='$disc' WHERE `id`='$id'");
?>