<?php
session_start();
$id_user = $_SESSION['user']['id'];
$check_user = 1;

if ($id_user == 4) {
    $check_user = 0;
}else{
    header('Location: profile.php');
}
require_once 'vendor/connect.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php echo "<link rel='stylesheet' href='/php/assets/css/main.css'>"; ?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body> 

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
                                <a href="/php/admin.php" class="header__link">Услуги</a>
                            </li>
                            <li class="header__item">
                                <form class="btnform" action="adminZ.php" method="get">
                                    <input type="hidden" name="query" value="SELECT `zayavki`.`id`, `price`.`name`,`zayavki`.`phone`, `zayavki`.`date` , `price`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `price` ON `zayavki`.`id_work` = `price`.`id`">
                                    <button class="admbtn">Заявки</button>
                                </form>
                            </li>
                            <li class="header__item">
                                <a href="/php/adminP.php" class="header__link">Портфолио</a>
                            </li>
                            <li class="header__item">
                                <a href="/php/index.php" class="header__linkA"><img src="/img/user.png" width="30px" height="30px" alt="logo"></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
</header>

<div class="contentbd"> 
    <div class="containerb">
    <section>
        <h1 class="bd__title">Портфолио</h1>
                <div class="tbl-header">
                    <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                        <th class="head">Название</th>
                        <th class="head">Описание</th>
                        <th></th>
                        <th></th>
                        </tr>
                    </thead>
                    </table>
                </div>
                <div class="tbl-content">
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
                      <td><a href="vendor/delete3.php?id=<?= $portfolio[0] ?>">Удалить</a></td>
                      <td><a href="adminupdate2.php?id=<?= $portfolio[0]?>&name=<?= $portfolio[1]?>&disc=<?= $portfolio[2]?>">Изменить</a></td>
                      </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
        </section>
        <form action="vendor/addportfolio.php?id=4" method="post">
            <p>Название</p>
            <input type="text" name="name">
            <p>Описание</p>
            <input type="text" name="disc">
            <button>Добавить</button>
        </form>
    </div>
</div>
        <script>
                document.addEventListener('DOMContentLoaded', () => {

            const getSort = ({ target }) => {
                const order = (target.dataset.order = -(target.dataset.order || -1));
                const index = [...target.parentNode.cells].indexOf(target);
                const collator = new Intl.Collator(['en', 'ru'], { numeric: true });
                const comparator = (index, order) => (a, b) => order * collator.compare(
                    a.children[index].innerHTML,
                    b.children[index].innerHTML
                );

                for(const tBody of target.closest('table').tBodies)
                    tBody.append(...[...tBody.rows].sort(comparator(index, order)));

                for(const cell of target.parentNode.cells)
                    cell.classList.toggle('sorted', cell === target);
            };

            document.querySelectorAll('.table_sort .head').forEach(tableTH => tableTH.addEventListener('click', () => getSort(event)));

        });
        </script>
</body>
</html>