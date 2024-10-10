<?php
require "Database.php";
$conn = new Database();

$sql1 = "SELECT * FROM Role";


if (isset($_POST['login']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password_repeat'])) {
    $sql = "INSERT INTO `Users`(`Email`, `Password_hash`, `Login`, `ID_role`) VALUES (:email, :password, :login, :role)";
    // var_dump($conn->get($sql1));
    $param = array(
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'login' => $_POST['login'],
        'role' => 2
    );
    $conn->get($sql, $param);
    header('Location: auth.php');
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
    <title>Музей искусства - Регистрация</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main class="main">
        <section class="auth">
            <div class="container">
                <div class="auth__inner">
                    <h2 class="green-line green-line-center">Регистрация</h2>
                    <form method="POST">
                        <input type="text" name="login" id="login" placeholder="Логин" required>
                        <input type="email" name="email" id="email" placeholder="Почта" required>
                        <input type="password" name="password" id="password" placeholder="Пароль" required>
                        <input type="password" name="password_repeat" id="password_repeat" placeholder="Пароль ещё раз"
                            required>
                        <button type="submit" class="btn">Зарегистрироваться</button>
                        <a href="auth.php" class="btn">Войти в аккаунт</a>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php 
    include "footer.php";
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="inputmask.js"></script>
    <script>
        $(document).ready(function () {
            $("#email").inputmask("email")
        });
    </script>
</body>

</html>