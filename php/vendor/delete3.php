<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /php/adminP.php?id=4');
}
require_once 'connect.php';

$id = $_GET['id'];

mysqli_query($connect, "DELETE FROM `portfolio` WHERE `id` = '$id'")
?>