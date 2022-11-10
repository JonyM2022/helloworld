<?php
session_start();
require_once 'connect.php';

$start = $_POST['start'];
$end = $_POST['end'];
$status = $_POST['status'];
if($status = $_POST['status'] and $end = $_POST['end'] and $status = $_POST['status']){
    header("Location: ../adminZ.php?query=SELECT `zayavki`.`id`, `price`.`name`,`zayavki`.`phone`, `zayavki`.`date` , `price`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `price` ON `zayavki`.`id_work` = `price`.`id` WHERE (`zayavki`.`date` BETWEEN '$start' AND '$end') AND `zayavki`.`status` = '$status'");
}else{
    header("Location: ../adminZ.php?query=SELECT `zayavki`.`id`, `price`.`name`,`zayavki`.`phone`, `zayavki`.`date` , `price`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `price` ON `zayavki`.`id_work` = `price`.`id`");
}
?>