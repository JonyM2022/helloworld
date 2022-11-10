<?php
session_start();

require_once 'vendor/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>admin-panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
                
    <form action="vendor/update.php?id=<?= $_GET['id'] ?>" method="post">
        <p>Название</p>
        <input type="text" name="name" value="<?= $_GET['name'] ?>">
        <p>Описание</p>
        <input type="text" name="disc" value="<?= $_GET['disc'] ?>">
        <p>Стоимость</p>
        <input type="text" name="cost" value="<?= $_GET['cost'] ?>">
        <button>Изменить</button>
    </form>
   
</body>
</html>