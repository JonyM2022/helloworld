<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /php/adminP.php?id=4');
}

require_once 'connect.php';

$name = $_POST['name'];
$disc = $_POST['disc'];


mysqli_query($connect, "INSERT INTO `portfolio` (`id`, `name`, `disc`) VALUES (NULL, '$name','$disc')");
?>