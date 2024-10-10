<?php
session_start();
require "Database.php";

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
    <title>Музей искусства - Каталог</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main class="main">
        <section class="bludo">
            <div class="container">
                <div class="bludo__inner">
                    <h2 class="green-line green-line-center">Билеты</h2>
                    <div class="grid">
                        <?php foreach ($tovari as $key): ?>
                            <div class="product">
                                <img src="assets/img/<?= $key['Photo'] ?>" alt="Билет" class="product__img">
                                <div class="product__bottom">
                                    <p class="product__title"><?= $key['Naimenovanie'] ?></p>
                                    <p class="product__composition"><?= $key['Discription'] ?></p>
                                </div>
                                <a href="product-details.php?id=<?= $key['ID_Tovar'] ?>"
                                        class="product__btn btn">Купить</a>
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
</body>

</html>