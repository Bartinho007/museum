<?php
session_start();
require "Database.php";

$sqlUser = 'select * from users where ID_User = :id';
$paramUser = array('id' => $_SESSION['id']);

$user = $database->get($sqlUser, $paramUser);


$sql1 = 'SELECT * FROM `exhibits`';
$sql2 = 'SELECT * FROM artists;';
$sql3 = 'SELECT * FROM exhibits JOIN artists WHERE exhibits.id_artist=artists.id_artist AND artists.fio="Винсент ван Гог"';
$sql4 = 'SELECT * FROM schedule WHERE data < "20241130"';
$sql5 = 'SELECT et.name, COUNT(e.name) "count" FROM exhibits e JOIN exhibit_type et ON e.id_exhibit_type = et.id_exhibit_type GROUP BY et.id_exhibit_type;';
$sql6 = 'SELECT k.Data, COUNT(k.ID_Korzina) "count" FROM korzina k WHERE k.Data BETWEEN "20240101" AND "20241231" GROUP BY "count", k.Data;';
$sql7 = 'SELECT name, data FROM schedule s WHERE s.data LIKE "%2024%";';
$sql8 = 'SELECT u.Email, t.Naimenovanie FROM users u JOIN korzina k ON u.ID_User = k.ID_User JOIN tovari t on t.ID_Tovar = k.ID_Tovar;';
$sql9 = 'SELECT u.Email, t.Naimenovanie, k.Data FROM users u JOIN korzina k ON u.ID_User = k.ID_User JOIN tovari t on t.ID_Tovar = k.ID_Tovar WHERE k.Data >= "20240530";';
$sql10 = 'SELECT e.name, a.fio FROM exhibits e JOIN artists a ON a.id_artist = e.id_artist;';


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
                <h3 style="text-align: center;">Добавить нового пользователя</h3>
<form  action="add_user.php" method="post">
    <label for="email">Email:</label>
    <input style="height: 50px; margin-bottom: 0;" type="email" name="email" id="email" placeholder="Email" required>
    <label for="login">Логин:</label>
    <input style="height: 50px; margin-bottom: 0;" type="text" name="login" id="login" placeholder="Логин" required>
    <label for="ID_role">ID роли:</label>
    <input style="height: 50px; margin-bottom: 0;" type="number" min="1" max="2" name="ID_role" id="ID_role" placeholder="Роль" required>
    <label for="password_hash">Пароль:</label>
    <input style="height: 50px; margin-bottom: 0;" type="password" name="password_hash" id="password_hash" placeholder="Пароль" required>

    <button class="btn" type="submit" name="add_user">Добавить</button>

</form>
                    <h2 class="green-line green-line-center">Запросы</h2>
                    <p>1. Список всех экспонатов в музее</p>
                    <?php
                    $result = $database->get($sql1);
                    if ($result <> 0) {
                        echo "<table><tr><th>id</th><th>Наименование</th></tr>";
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
                        echo "<table><tr><th>id</th><th>Художник</th></tr>";
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

                    <p>5. Получить список общего количества экспонатов каждого типа в музее.</p>
                    <?php
                    $result = $database->get($sql5);
                    if ($result <> 0) {
                        echo "<table><tr><th>Название</th><th>Количество</th><th>";
                        foreach ($result as $key) {
                            echo "<tr><td>" . $key["name"] . "</td><td>" . $key["count"] . "</td><td>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 результатов";
                    }
                    ?>
                    <br><br>

                    <p>6. Получить количество проданных билетов за определенный преиод времени.</p>
                    <?php
                    $result = $database->get($sql6);
                    if ($result <> 0) {
                        echo "<table><tr><th>Дата</th><th>Количество</th><th>";
                        foreach ($result as $key) {
                            echo "<tr><td>" . $key["Data"] . "</td><td>" . $key["count"] . "</td><td>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 результатов";
                    }
                    ?>
                    <br><br>

                    <p>7. Получить список выставок которые прошли в определенном году.</p>
                    <?php
                    $result = $database->get($sql7);
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

                    <p>8. Получить список посетителей которые приобрели билет определенного типа.</p>
                    <?php
                    $result = $database->get($sql8);
                    if ($result <> 0) {
                        echo "<table><tr><th>Посетитель</th><th>Тип билета</th><th>";
                        foreach ($result as $key) {
                            echo "<tr><td>" . $key["Email"] . "</td><td>" . $key["Naimenovanie"] . "</td><td>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 результатов";
                    }
                    ?>
                    <br><br>

                    <p>9. Получить список посетителей которые приобрели билеты после заданной даты</p>
                    <?php
                    $result = $database->get($sql9);
                    if ($result <> 0) {
                        echo "<table><tr><th>Клиент</th><th>Билет</th><th>Дата</th>";
                        foreach ($result as $key) {
                            echo "<tr><td>" . $key["Email"] . "</td><td>" . $key["Naimenovanie"] . "</td><td>"  . $key["Data"] . "</td><td>";
                        }
                        echo "</table>";
                    } else {
                        echo "0 результатов";
                    }
                    ?>
                    <br><br>

                    <p>10. Получить список авторов экспонатов представленных в музее</p>
                    <?php
                    $result = $database->get($sql10);
                    if ($result <> 0) {
                        echo "<table><tr><th>Экспонат</th><th>Автор</th>";
                        foreach ($result as $key) {
                            echo "<tr><td>" . $key["name"] . "</td><td>" . $key["fio"] . "</td><td>";
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