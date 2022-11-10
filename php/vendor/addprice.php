<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /php/admin.php?id=4');
}

require_once 'connect.php';

$name = $_POST['name'];
$disc = $_POST['disc'];
$cost = $_POST['cost'];


mysqli_query($connect, "INSERT INTO `price` (`id`, `name`, `disc`,`price`) VALUES (NULL, '$name','$disc','$cost')");
?>