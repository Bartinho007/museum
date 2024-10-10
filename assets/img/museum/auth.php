<?php
session_start();

if (isset($_POST["login"]) && isset($_POST["password"])) {
    require 'Database.php';
    $user = $database->get("SELECT * FROM users WHERE Login=:login AND password_hash=:password", [
        "login" => $_POST["login"],
        "password" => $_POST["password"]
    ]);

    if (count($user) > 0) {
        $_SESSION['id'] = $user[0]['ID_User'];
        $_SESSION['id_role'] = $user[0]['ID_Role'];
        header('Location: index.php');
        return;
    } else {
        include('login.php');
        return;
    }
}
include('login.php');