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
    <div>
        <div>
            <h1 class="bd__title">Активные заявки</h1>
            <section>
                <div class="tbl-header">
                    <table cellpadding="0" cellspacing="0">
                    <thead>
                    <tr>
                    <th class="head">Номер заявки</th>
                    <th class="head">Услуга</th>
                    <th class="head">Номер телефона</th>
                    <th class="head">Дата</th>
                    <th class="head">Стоимость</th>
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
                    $zayavki = mysqli_query($connect, "SELECT `zayavki`.`id`, `price`.`name`,`zayavki`.`phone`, `zayavki`.`date` , `price`.`price` , `zayavki`.`status` FROM `zayavki` INNER JOIN `price` ON `zayavki`.`id_work` = `price`.`id` WHERE `zayavki`.`status` = '$status'");
                        $zayavki = mysqli_fetch_all($zayavki);
                        foreach($zayavki as $zayavki){
                            $date = date('d.m.Y', strtotime($zayavki[3]));
                    ?>
                    <tr>
                    <td><?= $zayavki[0] ?></td>
                    <td><?= $zayavki[1] ?></td>
                    <td><?= $zayavki[2] ?></td>
                    <td><?= $date ?></td>
                    <td><?= $zayavki[4] ?></td>
                    <td><?= $zayavki[5] ?></td>
                    <td><a href="vendor/status.php?id=<?= $zayavki[0] ?>" onclick="return confirmDelete();">Завершить заявку</a></td>
                    </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    </table>
                </div>
                </section>
        </div>
        <div>
        <div class="formZ">
        <h1 class="bd__title">Заявки</h1>
        <form action="vendor/sort.php" method="post" class="sort">
                    <div class="formlabel">
                    <label>От : </label>
                    <input type="date" name="start">

                    <label>До : </label>
                    <input type="date" name="end">

                    <select name="status">
                        <option value="0">Статус</option>

                            <option value="Активная">Активная</option>
                            <option value="Завершенная">Завершенная</option>


                    </select>


                    <button type="submit"  >Сортировать</button>
                    </div>
        </form>

        <form action="vendor/xlss.php" method="post" class="sort">

        <input type="hidden" name="data" id="xls_data" value="">

        <input type="hidden" name="report_name" value="weryhsrtyrtdu">

        <input type="submit" value="Выгрузить в Excel" class="button--excel" >

        </div>

        </form>
            <table class="table_sort" id="report_table">
            <tr>
            <th class="head">Номер заявки</th>
            <th class="head">Услуга</th>
            <th class="head">Номер телефона</th>
            <th class="head">Дата</th>
            <th class="head">Стоимость</th>
            <th class="head">Статус</th>
            <th></th>
            </tr>
            <tbody>
            <?php
            $query = $_GET['query'];
             $zayavkii = mysqli_query($connect, $query);
                $zayavkii = mysqli_fetch_all($zayavkii);
                foreach($zayavkii as $zayavkii){
                    $date = date('d.m.Y', strtotime($zayavkii[3]));
            ?>
            <tr>
            <td><?= $zayavkii[0] ?></td>
            <td><?= $zayavkii[1] ?></td>
            <td><?= $zayavkii[2] ?></td>
            <td><?= $date ?></td>
            <td><?= $zayavkii[4] ?></td>
            <td><?= $zayavkii[5] ?></td>
            <td><a href="vendor/delete.php?id=<?= $zayavki[0] ?>" onclick="return confirmDelete();">Удалить заявку</a></td>
            
            </tr>
            <?php
            }
            ?>
            </tbody>




            </table>
        </div>
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

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="/php/assets/js/xls.js"></script>

</body>
</html>