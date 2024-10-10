<?php
session_start();
require "Database.php";

$sqlUser = 'select * from users where ID_User = :id';
$paramUser = array('id' => $_SESSION['id']);

$user = $database->get($sqlUser, $paramUser);


$sql1 = 'SELECT * FROM exhibits JOIN artists ON exhibits.id_aryist=artists.id_artist WHERE exhibits.id_aryist=artists.id_artist;';
$sql2 = 'select * from artists';
$sql3 = 'SELECT * FROM exhibits JOIN artists WHERE exhibits.id_aryist=artists.id_artist AND artists.fio="Винсент ван Гог"';
$sql4 = 'SELECT * FROM schedule WHERE data < "20240903"';
$sql5 = 'SELECT * FROM exhibits JOIN artists ON exhibits.id_aryist=artists.id_artist WHERE exhibits.id_aryist=artists.id_artist GROUP BY artists.fio;';
// $sql6 = '';
// $sql7 = '';
// $sql8 = '';
// $sql9 = '';
// $sql10 = '';


?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Профиль</title>
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
                    <h2 class="green-line green-line-center">Запросы</h2>
                    <p>1. Получить список всех доступных услуг тюнингового центра.</p>
                    <?php
                    $result = $database->get($sql1);
                    if ($result <> 0) {
                        echo "<table><tr><th>id</th><th>Наименование</th><th>Художник</th></tr>";
                        foreach ($result as $key) {
                            echo "<tr><td>" . $key["id_exhibit"] . "</td><td>" . $key["name"] . "</td><td>" . $key["fio"] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 результатов";
                    }
                    ?>
                    <br><br>

                    <p>2. Получить список всех художников, представленных в музее.</p>
                    <?php
                    $result = $database->get($sql2);
                    if ($result <> 0) {
                        echo "<table><tr><th>id</th><th>ФИО</th><th>Художник</th></tr>";
                        foreach ($result as $key) {
                            echo "<tr><td>" . $key["id_artist"] . "</td><td>" . $key["fio"] . "</td></tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 результатов";
                    }
                    ?>
                    <br><br>

                    <p>3. Получить список экспонатов определенного художника.</p>
                    <?php
                    $result = $database->get($sql3);
                    if ($result <> 0) {
                        echo "<table><tr><th>Название</th><th>ФИО</th><th>";
                        foreach ($result as $key) {
                            echo "<tr><td>" . $key["name"] . "</td><td>" . $key["fio"] . "</td><td>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 результатов";
                    }
                    ?>
                    <br><br>

                    <p>4. Получить список выставок, доступных в определенный период времени.</p>
                    <?php
                    $result = $database->get($sql4);
                    if ($result <> 0) {
                        echo "<table><tr><th>Название</th><th>Дата</th><th>";
                        foreach ($result as $key) {
                            echo "<tr><td>" . $key["name"] . "</td><td>" . $key["data"] . "</td><td>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 результатов";
                    }
                    ?>
                    <br><br>

                    <p>5. Получить список авторов экспонатов, представленных в музее.</p>
                    <?php
                    $result = $database->get($sql5);
                    if ($result <> 0) {
                        echo "<table><tr><th>Авторы</th><th>";
                        foreach ($result as $key) {
                            echo "<tr><td>" . $key["fio"] . "</td><td>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 результатов";
                    }
                    ?>
                    <br><br>
                </div>
            </div>
        </section>
    </main>
    <?php
    include "footer.php";
    ?>
</body>

</html>