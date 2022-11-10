<?php

require_once 'vendor/connect.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetc - Portfolio</title>
    <link rel="stylesheet" href="/css/reset.css">
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
                              <a href="#">Портфолио</a>
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


    <main class="main">
        <div class="container">
        <div class="slider">
                <div class="item">
                    <img src="/img/slide1-1.jpg" alt="Первый слайд">
                    <div class="slideText">BrainLegion</div>
                </div>

                <div class="item">
                    <img src="/img/slide3.jpg" alt="Второй слайд">
                    <div class="slideText">Кафе "Loft"</div>
                </div>

                <div class="item">
                    <img src="/img/slide1-2.jpg" alt="Третий слайд">
                    <div class="slideText">"Project"</div>
                </div>
                <div class="item">
                    <img src="/img/slide1-3.jpg" alt="Четвертый слайд">
                    <div class="slideText">OpenAirFEST</div>
                </div>

                <a class="prev" onclick="minusSlide()">&#10094;</a>
                <a class="next" onclick="plusSlide()">&#10095;</a>
            </div>

            <div class="slider-dots">
                <span class="slider-dots_item" onclick="currentSlide(1)"></span> 
                <span class="slider-dots_item" onclick="currentSlide(2)"></span> 
                <span class="slider-dots_item" onclick="currentSlide(3)"></span>
                <span class="slider-dots_item" onclick="currentSlide(4)"></span>
            </div>

            <h1 class="content__title">Портфолио</h1>

            <div class="contentbd">
            <section>
                <div class="tbl-header1">
                    <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Описание</th>
                        </tr>
                    </thead>
                    </table>
                </div>
                <div class="tbl-content1">
                    <table cellpadding="0" cellspacing="0">
                    <tbody>
                    <?php

                        $portfolio = mysqli_query($connect, "SELECT * FROM `portfolio`");
                        $portfolio = mysqli_fetch_all($portfolio);
                        foreach($portfolio as $portfolio){
                        ?>
                        <tr>
                        <td><?= $portfolio[1] ?></td>
                        <td><?= $portfolio[2] ?></td>
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
    </main>

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
                        <a href="#" class="footer__link">Портфолио</a>
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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/js/script.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="/js/index.js"></script>

</body>
</html>