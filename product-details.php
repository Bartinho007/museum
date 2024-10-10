<?php
session_start();
require "Database.php";

$sql = 'select * from tovari where ID_Tovar = :id';
$param = array('id' => $_GET['id']);
$tovari = $database->get($sql, $param);
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Продукт</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main class="main">
        <section class="product-details">
            <div class="container">
                <div class="product-details__inner">
                    <?php foreach ($tovari as $key): ?>
                        <div class="product">
                            <img src="assets/img/<?= $key['Photo'] ?>" alt="Блюдо 1" class="product__img">
                            <div class="product__bottom">
                                <p class="product__title"><?= $key['Naimenovanie'] ?></p>
                                <p class="product__price"><?= $key['Cena'] ?> рублей</p>
                                <p class="product__dcp"><?= $key['Discription'] ?></p>
                                <?php if (isset($_SESSION['id'])): ?>
                                    <a href="cartAdd.php?id=<?= $key['ID_Tovar'] ?>"><button
                                            class="product__btn__details btn">Купить</button></a>
                                <?php else: ?>
                                    <a href="auth.php"><button class="product__btn__details btn">Купить</button></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>
    <?php 
    include "footer.php";
    ?>
</body>

</html>