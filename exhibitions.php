<?php
session_start();
require "Database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/logo_image.png" type="image/x-icon">
    <title>Музей искусства - Выставки</title>
</head>
<body>
<?php
    include "header.php";
    ?>
    <main>
    <h2 class="green-line green-line-center">Выставки</h2>
    <section class="exhibition">
            <div class="image-block">
            <img src="assets/img/newEra.png" alt="Скульптура Сальвадора Дали">
                <p class="desc">Жанр: <strong>Графика, Скульптура, Классическое искусство</strong></p>
                <p class="desc">Возраст: <strong>6+</strong></p>
            </div>
            <div class="exhibition-text">
                <h2>Сальвадор Дали & Пабло Пикассо</h2>
                <p>На выставке представлена одна из самых больших
 в мире частных коллекций скульптур Сальвадора Дали 
и керамики Пабло Пикассо, а также графика.
Что думали два гения о женщинах, великих творцах, 
современниках и родной стране? Проект дарит возможность
сравнить мировосприятие художников и взглянуть на 
окружающее их глазами.
Дополнит знакомство с творчеством
 Дали и
Пикассо видеофильм, раскрывающий интересные 
детали создания работ и возникновения популярных сюжетов
 двух мастеров. А чтобы сделать посещение выставки ещё 
интереснее, всем гостям на входе будет вручена 
квест-открытка. Каждого отгадавшего кодовое слово 
в открытке ждет приз.</>            
</div>
        </section>

        <section class="exhibition">
            <div class="image-block">
            <img src="assets/img/secret.png" alt="Иммерсивный мультимедийный проект">
                <p class="desc">Жанр: <strong>Новые медиа, Интерактивная, Современное искусство</strong></p>
                <p  class="desc">Возраст: <strong>14+</strong></p>
            </div>
            <div class="exhibition-text">
                <h2>Иммерсивный мультимедийный проект</h2>
                <p>Организаторы выставки предлагают по-новому посмотреть на аллегористические портреты художника 16 века. Работы представлены в иммерсивном мультимедийном формате, 
Джузеппе Арчимбольдо, один из самых своеобразных художников эпохи Возрождения, приобрел всемирную известность благодаря необычным портретам. Арчимбольдо мастерски использовал технику визуальной иллюзии, причудливые головоломки. На его полотнах множество деталей гармонично соединяются друг с другом, образуя единое целое - человеческий образ. Такой прием позволяет усиливать акцент на чертах характера, рассказывает историю героя картины.
Внешний облик каждого из нас можно рассматривать как систему знаков, которые поддаются расшифровке. Символика портретов
Арчимбольдо поможет научиться читать человека по его лицу, разбираться в людях и особенностях характера.
Аудиогид поможет погрузиться в психологический анализ картин, составленный кандидатом психологических наук.</p>
            </div>
        </section>
        <section class="exhibition">
            <div class="image-block">
            <img src="assets/img/vr.png" alt="Виртуальный тур">
                <p class="desc">Жанр: <strong>Новые медиа, Интерактивная, Современное искусство
                </strong></p>
                <p class="desc">Возраст: <strong>16+</strong></p>
            </div>
            <div class="exhibition-text">
                <h2>Проект VR Gallery</h2>
                <p>VR Gallery - уникальный проект, который позволяет виртуально оказаться в совершенно разных пространствах, не покидая одного помещения.
Выбирайте, куда отправиться - в картину «Крик» Эдварда Мунка, в Лувр, чтобы лучше узнать тайны одной из самых мистических картин мира - «Моны Лизы» или в музей Кремера, где воссозданы шедевры живописи XVII века!
Студия «АртДинамикс» представляет проект VR
Gallery («Виртуальная галерея»), который станет вашим порталом в мир классического и современного искусства. Новейшие технологии переносят в иное пространство и обеспечивают полное погружение в мир творцов и их идей.
Посетителям предлагаются четыре VR-путешествия на выбор. В рамках первого - Deep Immersive («Глубокое погружение») - вы взглянете на «Крик»
полюбуетесь нежными кувшинками Клода Моне.
Второй вариант - виртуально посетить Galactic
Gallery («Галактическая галерея») и выставку Rone
(«Рон») и открыть для себя творчество талантливых мастеров стрит-арта и диджитал-художников.
Третий вариант Beyond the Glass «За стеклом» даёт возможность узнать тайны картины «Мона Лиза» и прогуляться по собору Парижской Богоматери, увидеть храм изнутри в оригинальном интерьере
XVIII века. Четвертая возможность - заглянуть в VR-музей Кремера, где собраны шедевры датского и фламандского искусства XVII века. </p>            
</div>
        </section>
    </main>

    <?php 
    include "footer.php";
    ?>
</body>
</html>


<!-- <img src="assets/img/vr.png" alt="VR Gallery"> -->
