<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /php/profile.php');
}
require_once 'connect.php';

$id_user = $_SESSION['user']['id'];
$id_work = $_POST['Select'];
$Phone = $_POST['Phone'];
$status = "Активная";
$date = date("y.m.d");

$error_fields = [];


if ($Phone === '') {
    $error_fields[] = 'Phone';
}





if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

if(empty($error_fields)){

    mysqli_query($connect, "INSERT INTO `zayavki`(`id`, `id_user`, `id_work`, `phone`, `date`, `status`) VALUES (NULL,'$id_user','$id_work','$Phone','$date','$status')");

    $response = [
        "status" => true,
        "message" => "Ваша заявка отправлена",
    ];
    echo json_encode($response);
}else{

    $response = [
        "status" => false,
        "message" => "Введите номер телефона без пробелов",
    ];
    echo json_encode($response);

}

$to = 'jony.mazik7@gmail.com'; // кому адрес
$subject = 'Заявка с сайта ProjectStudio'; // тема
$body = 'Новая заявка'."\n"; // тело письма
$body .= 'Дата = '.date('d.m.Y')."\n";
$body .= 'Имя = '.$_SESSION['user']['id']."\n";
$body .= 'Телефон = '.$_POST['Phone']."\n";
$body .= 'Услуга = '.$_POST['Select']."\n";
if (mail($to, $subject, $body)) { // отправка
    echo 'Заявка отправлена';
} else {
    echo 'Заявка НЕ отправлена';
}

?>

