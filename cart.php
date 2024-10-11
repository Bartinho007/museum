<?php
session_start();
require "Database.php";

$sqlCart = 'select * from korzina join tovari on tovari.ID_Tovar = korzina.ID_Tovar where ID_User = :id and korzina.Status = :status';
$paramCart = array(
    'id' => $_SESSION['id'],
    'status' => 'cart'
);
$tovari = $database->get($sqlCart, $paramCart);

if (isset($_POST['tel'])) {

    for ($i = 0; $i < count($tovari); $i++) {
        $sqlOrder = "UPDATE `korzina` SET `Status`= :status WHERE ID_Tovar = :id";
        $paramOrder = array(
            'status' => 'order',
            'id' => $tovari[$i]['ID_Tovar']
        );
        $database->get($sqlOrder, $paramOrder);
    }
    header('Location: profile.php');

}
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
        <section class="cart">
            <div class="container">
                <div class="cart__inner">
                    <h2 class="green-line green-line-center">Корзина</h2>
                    <form action="" method="POST">
                        <input type="tel" id="tel" name="tel" placeholder="Ваш телефон" required>
                        <button type="submit" class="btn">Заказать сейчас</button>
                    </form>
                    <div class="grid">
                        <?php foreach ($tovari as $key): ?>
                            <div class="product">
                                <img src="assets/img/<?= $key['Photo'] ?>" alt="Блюдо 1" class="product__img">
                                <div class="product__bottom">
                                    <p class="product__title"><?= $key['Naimenovanie'] ?></p>
                                    <p class="product__composition"><?= $key['Discription'] ?></p>
                                    <a href="cartDel.php?id=<?= $key['ID_Tovar'] ?>" class="product__btn__detailss btn">Удалить</a>
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
    <script>
        function maskPhone(selector, masked = '+7 (___) ___-__-__') {
            const elems = document.querySelectorAll(selector);

            function mask(event) {
                const keyCode = event.keyCode;
                const template = masked,
                    def = template.replace(/\D/g, ""),
                    val = this.value.replace(/\D/g, "");
                console.log(template);
                let i = 0,
                    newValue = template.replace(/[_\d]/g, function (a) {
                        return i < val.length ? val.charAt(i++) || def.charAt(i) : a;
                    });
                i = newValue.indexOf("_");
                if (i !== -1) {
                    newValue = newValue.slice(0, i);
                }
                let reg = template.substr(0, this.value.length).replace(/_+/g,
                    function (a) {
                        return "\\d{1," + a.length + "}";
                    }).replace(/[+()]/g, "\\$&");
                reg = new RegExp("^" + reg + "$");
                if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) {
                    this.value = newValue;
                }
                if (event.type === "blur" && this.value.length < 5) {
                    this.value = "";
                }

            }

            for (const elem of elems) {
                elem.addEventListener("input", mask);
                elem.addEventListener("focus", mask);
                elem.addEventListener("blur", mask);
            }

        }

        maskPhone('#tel');
    </script>
</body>

</html>