<?php if (isset($error_message)): ?>
    <p style="color:red;"><?php echo $error_message; ?></p>
<?php endif; ?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" href="assets/img/logo_image.png" type="image/x-icon">
    <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script>>
    <title>Музей искусства - Авторизация</title>
</head>

<body>
    <?php
    include "header.php";
    ?>
    <main class="main">
        <section class="auth">
            <div class="container">
                <div class="auth__inner">
                    <h2 class="green-line green-line-center">Авторизация</h2>
                    <form method="POST">
                        <input type="text" name="login" id="login" placeholder="Логин" required>
                        <input type="password" name="password" id="password" placeholder="Пароль" required>
                        <div class="g-recaptcha" data-sitekey="6LfQwV4qAAAAAOdP6uGbWXtH_N1wruzHz1Q0z6Yc" data-action="LOGIN"></div>
                        <button type="submit" class="btn">ВХОД</button>
                        <a href="registration.php" class="btn">Зарегистрироваться</a>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php 
    include "footer.php";
    ?>
</body>



</html>