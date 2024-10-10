<?php
session_start();
require "Database.php";
// var_dump($_SESSION['id'])

$sql = 'select * from tovari';

$tovari = $database->get($sql);


?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Главная страница</title>
</head>

<body>
    <?php 
    include "header.php";
    ?>
    <main class="main">
        <img src="assets/img/hero.jpg" alt="Фон" class="bg-img">
        <section class="hero">
            <div class="container">
                <div class="hero__inner">
                    <h1>Музей искусства<br>
                        Всех врепен и народов</h1>
                    <p class="hero__subtitle">
                        Самый крупный музей в России, расположенный в самом её сердце
                    </p>
                    <a href="catalog.php" class="btn hero__btn">Купить билет</a>
                </div>
            </div>
        </section>
        <section class="diet">
            <div class="container">
                <div class="diet__inner">
                    <h2 class="green-line green-line-center">Ближайшие выставки</h2>
                    <p class="diet__subtitle">Наши выставки — это увлекательное и познавательное мероприятие, которое будет <br>интересно посетителям любого возраста.</p>
                    <div class="diet__imgs">
                        <img src="assets/img/slider-button-left.png" class="button-slider" id="prev" alt="#">
                        <img src="assets/img/slider-button-right.png" class="button-slider" id="next" alt="#">
                        <div class="slider-line">
                            <div class="slide">
                                <img src="assets/img/newEra.jpg" alt="Для бороды">
                                <ul>
                                    <li>Выставка современного искусства</li>
                                    <li>14 сентября 8:00-23:00</li>
                                </ul>
                            </div>
                            <div class="slide">
                                <img src="assets/img/oldEra.png" alt="Гидрофил">
                                <ul>
                                    <li>Выставка древнего искусства</li>
                                    <li>15 сентября 8:00-23:00</li>
                                </ul>
                            </div>
                            <div class="slide">
                                <img src="assets/img/semiEra.jpg" alt="Для детей">
                                <ul>
                                    <li>Выставка средневекового искусства</li>
                                    <li>16 сентября 8:00-23:00</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="how">
            <div class="container">
                <div class="how__inner">
                    <h2 class="green-line green-line-center">Виды билетов</h2>
                    <div class="how__list">
                        <div class="how__card how__card_green">
                            <p class="how__card-title green-line">Варианты посещения</p>
                            <p class="how__card-text">Мы предлагаем три вида билетов для посещения музея: стандартный, семейный и студенческий. Билеты дают право на посещение экспозиций музея в соответствии с выбранным тарифом.</p>
                        </div>
                        <div class="how__card">
                            <p class="how__card-title green-line">Стандартный билет</p>
                            <p class="how__card-text">Стандартный билет — это базовый вариант, который позволяет посетить все постоянные экспозиции музея без ограничений. Это отличный выбор для тех, кто хочет познакомиться с основными коллекциями и выставками музея.</p>
                        </div>
                        <div class="how__card">
                            <p class="how__card-title green-line">Семейный билет</p>
                            <p class="how__card-text">Семейный билет предназначен для семей с детьми. Он даёт право на посещение музея двум взрослым и трём детям до 16 лет. Этот билет позволит сэкономить на стоимости посещения и провести время в музее всей семьёй.</p>
                        </div>
                        <div class="how__card">
                            <p class="how__card-title green-line">Билет «Студенческий»</p>
                            <p class="how__card-text">Билет «Студенческий» предоставляет студентам очной формы обучения скидку на входной билет. Этот билет подойдёт тем, кто интересуется культурой и искусством и хочет сэкономить на посещении музея.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="bludo">
            <div class="container">
                <div class="bludo__inner">
                    <h2 class="green-line green-line-center">Наши товары</h2>
                    <div class="grid">
                        <?php foreach ($tovari as $key): ?>
                            <div class="product">
                                <img src="assets/img/<?= $key['Photo'] ?>" alt="#" class="product__img">
                                <div class="product__bottom">
                                    <p class="product__title"><?= $key['Naimenovanie'] ?></p>
                                    <p class="product__composition"><?= $key['Discription'] ?> </p>
                                    <a href="product-details.php?id=<?= $key['ID_Tovar'] ?>"
                                        class="product__btn btn">Заказать</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php 
    include "footer.php";
    ?>
    <script src="assets/js/main.js"></script>
</body>

</html>