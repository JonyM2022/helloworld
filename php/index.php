<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="/php/assets/css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body>

<div class="page">
    <header class="header" id="header">
            <div class="container">
                <div class="header__inner">
                    <a href="/index.html" class="header__logo">Project</a>
                    <div class="header__burger">
                        <span></span>
                    </div>
                    <nav class="header__nav" id="nav">
                        <ul class="header__list">
                            <li class="header__item">
                                <a href="/index.html" class="header__link">Главная</a>
                            </li>
                            <li class="header__item">
                                <a href*="#" class="header__link">Кейсы</a>
                            </li>
                            <div class="dropdown">
                                <img src="/img/bottom-arrow.png" width="10px" height="10px" alt="btn" class="dropbtn" onclick="myFunction()">
                            </img>
                                <div class="dropdown-content" id="myDropdown">
                                <a href="/php/price.php">Услуги</a>
                                <a href="/php/portfolio.php">Портфолио</a>
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
<div class="main">
        <!-- Форма авторизации -->
    <div class="container">
        <div class="loginform">
            <form>
                <label>Логин</label>
                <input type="text" name="login" placeholder="Введите свой логин">
                <label>Пароль</label>
                <input type="password" name="password" placeholder="Введите пароль">
                <button type="submit" class="login-btn">Войти</button>
                <p>
                    У вас нет аккаунта? - <a href="/php/register.php">зарегистрируйтесь</a>!
                </p>
                <p class="msg none">Lorem ipsum dolor sit amet.</p>
            </form>
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
                            <a href="/index.html" class="footer__link">Главная</a>
                            <a href="/php/price.php" class="footer__link">Услуги</a>
                            <a href="/php/portfolio.php" class="footer__link">Портфолио</a>
                        </div>
                    </div>
                </div><!-- /.footer__inner -->
        
            </div><!-- /.container -->
        
            <div class="copyright">
                <div class="container">
                    <div class="copyright__text">
                        <div>Copyright © 2021 Project. Все права защищены</div>
                        <div>Made <span>by АКВ</span></div>
                    </div>
                </div>
            </div>
        </footer>
</div>

    <script src="/php/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/php/assets/js/main.js"></script>
    <script src="/js/script.js"></script>

</body>
</html>