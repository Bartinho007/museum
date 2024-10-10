<header class="header">
    <div class="container">
        <div class="header__row">
            <a href="index.php" class="header__logo"><img src="assets/img/logo_image.png" alt="логотип"></a>
            <a href="index.php" class="header__title"><img src="assets/img/logo_title.png" alt="надпись"></a>
            <nav class="nav">
                <?php if (isset($_SESSION['id']) and $_SESSION['id_role'] == 2): ?>
                    <a href="exhibitions.php" class="nav__link">Выставки</a>
                    <a href="catalog.php" class="nav__link">Билеты</a>
                    <a href="cart.php" class="nav__link">Корзина</a>
                    <a href="profile.php" class="nav__link">Профиль</a>
                    <a href="endSes.php" class="nav__link">Выход</a>
                <?php elseif (isset($_SESSION['id']) and $_SESSION['id_role'] == 3): ?>
                    <a href="admin.php" class="nav__link">Админ-панель</a>
                    <a href="endSes.php" class="nav__link">Выход</a>
                <?php else: ?>
                    <a href="exhibitions.php" class="nav__link">Выставки</a>
                    <a href="catalog.php" class="nav__link">Билеты</a>
                    <a href="registration.php" class="nav__link">Регистрация</a>
                    <a href="auth.php" class="nav__link">Авторизация</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>