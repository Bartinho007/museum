<?php
session_start();
require "Database.php";

$sqlUser = 'select * from users where ID_User = :id';
$paramUser = array('id' => $_SESSION['id']);

$user = $database->get($sqlUser, $paramUser);


$sqlCart = 'select * from korzina join tovari on tovari.ID_Tovar = korzina.ID_Tovar where ID_User = :id and korzina.Status = :status';
$paramCart = array(
    'id' => $_SESSION['id'],
    'status' => 'order'
);
$tovari = $database->get($sqlCart, $paramCart);
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/logo_image.png" type="image/x-icon">
    <title>Музей искусства - Профиль</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main class="main">
        <section class="user">
            <div class="container">
                <?php foreach ($user as $key): ?>
                    <div class="user__inner">
                        <p>Логин: <?= $key['Login'] ?></p>
                        <p>Почта: <?= $key['Email'] ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>
        <section class="orders">
            <div class="container">
                <div class="orders__inner">
                    <h2 class="green-line green-line-center">Мои заказы</h2>
                    <?php foreach ($tovari as $key): ?>
                        <div class="order">
                            <p class="order__date"><?= $key['Data'] ?></p>
                            <div class="grid">
                                <div class="product">
                                    <img src="assets/img/<?= $key['Photo'] ?>" alt="Блюдо 1" class="product__img">
                                    <div class="product__bottom">
                                        <p class="product__title"><?= $key['Naimenovanie'] ?></p>
                                        <p class="product__composition"><?= $key['Discription'] ?></p>
                                    </div>
                                </div>
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