<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
require_once 'vendor/connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

<div class="page">
    <header class="header" id="header">
            <div class="container">
                <div class="header__inner">
                    <a href="/index2.php" class="header__logo">Project</a>
                    <div class="header__burger">
                        <span></span>
                    </div>
                    <nav class="header__nav" id="nav">
                        <ul class="header__list">
                            <li class="header__item">
                                <a href="/index2.php" class="header__link">Главная</a>
                            </li>
                            <li class="header__item">
                                <a href="#" class="header__link">Кейсы</a>
                            </li>
                            <div class="dropdown">
                                <img src="/img/bottom-arrow.png" width="10px" height="10px" alt="btn" class="dropbtn" onclick="myFunction()">
                            </img>
                                <div class="dropdown-content" id="myDropdown">
                                <a href="/php/price2.php">Услуги</a>
                                <a href="/php/portfolio2.php">Портфолио</a>
                                </div>
                            </div> 
                            <li class="header__item">
                                <a href="/php/index.php" class="header__linkA"><img src="/img/user.png" width="30px" height="30px" alt="logo"></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
    </header>

    <div class="main"></div>

        <!-- Профиль -->
    <div class="contentbd">
    <div class="container">
        <form>
            <img src="<?= $_SESSION['user']['avatar'] ?>" width="200" alt="">
            <h2 style="margin: 10px 0;"><?= $_SESSION['user']['full_name'] ?></h2>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <a href="vendor/logout.php" class="logout">Выход</a>
        </form>
    </div>

    <div class="container">
        <div class="tabs">
            <input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
            <label for="tab-btn-1">Активные</label>
            <input type="radio" name="tab-btn" id="tab-btn-2" value="">
            <label for="tab-btn-2">Завершенные</label>

            <div id="content-1">
            <section>
                <div class="tbl-header">
                    <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Номер заявки</th>
                        <th>Услуга</th>
                        <th>Дата</th>
                        <th>Стоимость</th>
                        <th>Статус</th>
                        <th></th>
                        </tr>
                    </thead>
                    </table>
                </div>
                <div class="tbl-content">
                    <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <?php
                    $status = "Активная";
                    $id_user = $_SESSION['user']['id'];
                    $zayavki = mysqli_query($connect, "SELECT `zayavki`.`id`, `price`.`name`, `zayavki`.`date` , `price`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `price` ON `zayavki`.`id_work` = `price`.`id` WHERE `zayavki`.`id_user` = '$id_user' AND `zayavki`.`status` = '$status'");
                    $zayavki = mysqli_fetch_all($zayavki);
                    foreach($zayavki as $zayavki){
                        $date = date('d.m.Y', strtotime($zayavki[2]));
                    ?>
                    <tr>
                    <td><?= $zayavki[0] ?></td>
                    <td><?= $zayavki[1] ?></td>
                    <td><?= $date ?></td>
                    <td><?= $zayavki[3] ?></td>
                    <td><?= $zayavki[4] ?></td>
                    <td><a href="vendor/delete.php?id=<?= $zayavki[0] ?>" onclick="return confirmDelete();">Отменить заявку</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
                </section>
            </div>
            <div id="content-2">
            <section>
                <div class="tbl-header">
                    <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                        <th>Номер заявки</th>
                        <th>Услуга</th>
                        <th>Дата</th>
                        <th>Стоимость</th>
                        <th>Статус</th>
                        <th></th>
                        </tr>
                    </thead>
                    </table>
                </div>
                <div class="tbl-content">
                    <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <?php
                    $status = "Завершенная";
                    $id_user = $_SESSION['user']['id'];
                    $zayavki = mysqli_query($connect, "SELECT `zayavki`.`id`, `price`.`name`, `zayavki`.`date` , `price`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `price` ON `zayavki`.`id_work` = `price`.`id` WHERE `zayavki`.`id_user` = '$id_user' AND `zayavki`.`status` = '$status'");
                    $zayavki = mysqli_fetch_all($zayavki);
                    foreach($zayavki as $zayavki){
                        $date = date('d.m.Y', strtotime($zayavki[2]));
                    ?>
                    <tr>
                    <td><?= $zayavki[0] ?></td>
                    <td><?= $zayavki[1] ?></td>
                    <td><?= $date ?></td>
                    <td><?= $zayavki[3] ?></td>
                    <td><?= $zayavki[4] ?></td>
                    <td><a href="vendor/delete.php?id=<?= $zayavki[0] ?>" onclick="return confirmDelete();">Отменить заявку</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
                </section>
            </div>
        </div>
    </div>
    </div>
    </div>
    <footer class="footer">
        <div class="container">
    
            <div class="footer__inner">
                <div class="footer__block">
                    <h4 class="footer__title">Контактная информация</h4>
                    <address class="footer__address">
                        <div>project@domen.com</div>
                        <div>+8 777 555 66 99</div>
                    </address>
                </div>
    
                <div class="footer__block">
                    <h4 class="footer__title">Подпишись на нас!</h4>
                    <div class="footer-block  footer-social">
                        <a href="#" class="btn footer-social-vk">вконтакте</a>
                        <a href="#" class="btn footer-social-fb">фейсбук</a>
                        <a href="#" class="btn footer-social-inst">инстаграм</a>
                    </div>
                </div>
    
                <div class="footer__block">
                    <h4 class="footer__title">Навигация</h4>
                    <div class="footer__text">
                        <a href="/index2.php" class="footer__link">Главная</a>
                        <a href="/php/price2.php" class="footer__link">Услуги</a>
                        <a href="/php/portfolio2.php" class="footer__link">Портфолио</a>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="copyright">
            <div class="container">
                <div class="copyright__text">
                    <div>Copyright © 2021 Project. Все права защищены</div>
                    <div>Made <span>by АКВ</span></div>
                    <a href="/php/admin.php?id=<?= $_SESSION['user']['id'] ?>">admin</a>
                </div>
            </div>
        </div>
    </footer>
</div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/php/assets/js/scroll.js"></script>
    <script src="/js/script.js"></script>

</body>
</html>