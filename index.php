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
    <link rel="icon" href="assets/img/logo_image.png" type="image/x-icon">
    <title>Музей искусства - Главная</title>
</head>

<body>
    <?php 
    include "header.php";
    ?>
    <main class="main">
        <img src="assets/img/hero.png" alt="Фон" class="bg-img">
        <section class="hero">
            <div class="container">
                <div class="hero__inner">
                    <h1>
                    Музей искусства    
                    <br>
                    Всех времен и народов
                        </h1>
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
                <img src="assets/img/slider-button-left.png" class="button-slider" id="prev" alt="Назад">
                <div class="slider-line">
                    <div class="slide" data-index="0">
                    <a href="exhibitions.php">
                        <img src="assets/img/secret.png" alt="Секреты Джузеппе Арчимбольдо">
                        </a>
                        <ul>
                            <li class="slide-title">Секреты Джузеппе Арчимбольдо</li>
                            <li class="slide-desc">Билет действует на любой день работы выставки (пн-вс 12:00-21:00). Выставка открыта до 31 октября 2024г.</li>
                        </ul>
                    </div>
                    <div class="slide" data-index="1">
                    <a href="exhibitions.php">
                        <img src="assets/img/newEra.png" alt="Сальвадор Дали">
                        </a>
                        <ul>
                            <li class="slide-title">Сальвадор Дали & Пабло Пикассо</li>
                            <li class="slide-desc">Билет действует на любой день работы выставки (пн-вс 12:00-21:00). Выставка открыта до 24 ноября 2024г.</li>
                        </ul>
                    </div>
                    <div class="slide" data-index="2">
                    <a href="exhibitions.php">
                        <img src="assets/img/vr.png" alt="VR">
                    </a>
                        <ul>
                            <li class="slide-title">Проект VR Gallery</li>
                            <li class="slide-desc">Билет действует на любой день работы выставки (пн-вс 12:00-21:00). Выставка открыта до 1 декабря 2024г.</li>
                        </ul>
                    </div>
                    
                </div>
                <img src="assets/img/slider-button-right.png" class="button-slider" id="next" alt="Вперед">
            </div>
        </div>
    </div>
</section>
        <section class="bludo">
            <div class="container">
                <div class="bludo__inner">
                    <h2 class="green-line green-line-center">Виды билетов</h2>
                    <div class="grid">
                        <?php foreach ($tovari as $key): ?>
                            <div class="product">
                                <img src="assets/img/<?= $key['Photo'] ?>" alt="#" class="product__img">
                                <div class="product__bottom">
                                    <p class="product__title"><?= $key['Naimenovanie'] ?></p>
                                    <p class="product__composition"><?= $key['Discription'] ?> </p>
                                </div>
                                <a href="product-details.php?id=<?= $key['ID_Tovar'] ?>"
                                        class="product__btn btn">Заказать</a>
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