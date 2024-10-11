<?php

session_start();
$db = new mysqli('localhost', 'root', '', 'db_museum');

if ($db->connect_error) {
    die("Ошибка подключения: " . $db->connect_error);
}

if (isset($_POST['login'], $_POST['email'], $_POST['password_hash'], $_POST['ID_role'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password_hash'], PASSWORD_DEFAULT); 
    $role = $_POST['ID_role'];

    if ($stmt = $db->prepare("INSERT INTO users (login, email, password_hash, ID_role) VALUES (?, ?, ?, ?)")) {
        $stmt->bind_param('ssss', $login, $email, $password, $role);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Пользователь добавлен.";
            header('Location: admin.php');
            return;
                } else {
            echo "Ошибка при добавлении пользователя.";
        }
        $stmt->close();
    } else {
        echo "Ошибка подготовки запроса: " . $db->error;
    }
}


