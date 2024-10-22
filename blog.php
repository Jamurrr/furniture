<?php
include 'db.php';

session_start();

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    $sql = "SELECT * FROM beds WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    }
}


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabrika</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
</head>
<body>

<header class="header">
    <div class="header-container">
        <div class="logo-wrapper">
            <span class="city">Тюмень</span>
            <div class="logo">
                <h1>Fabrika</h1>
            </div>
        </div>
        <nav class="nav">
            <ul class="nav-list">
                <li><a href="index.php">Главная</a></li>
                <li><a href="#">О компании</a></li>
                <li><a href="#">Портфолио</a></li>
                <li><a href="#">Блог</a></li>
                <li><a href="#">Контакты</a></li>
            </ul>
        </nav>
        <div class="icons">
            <div class="contacts">
                <p>+7 (908) 875-04-06</p>
                <p>+7 (3452) 748-804</p>
            </div>
            <div class="user-icon">
                <?php
                if (!isset($_SESSION['user_id'])) {
                    echo '<img src="css/icons/user_logo.webp" alt="Войти" class="user-icon-img">';
                }
                else {
                    echo '<a href="logout.php"><img src="css/icons/logout-icon.webp" alt="Выйти"></a>';
                }
                ?>
            </div>
        </div>
        <div class="menu-icon" onclick="toggleMenu()">
            &#9776;
        </div>
    </div>
</header>

<main>

    <div id="side-menu" class="side-menu">
        <a href="#" class="close-btn" onclick="toggleMenu()">&times;</a>
        <a href="index.php">Каталог</a>
        <a href="#">О компании</a>
        <a href="#">Портфолио</a>
        <a href="blog.php">Блог</a>
        <a href="#">Контакты</a>
    </div>
    <div id="overlay" class="overlay" onclick="toggleMenu()"></div>

    <!-- Модальное окно -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2 id="login-register-text">Войти</h2>
            <!-- Вход -->
            <form class="login-form" action="login.php" method="post">
                <input type="text" name="name" placeholder="Логин" required>
                <br>
                <input type="password" name="password" placeholder="Пароль" required>
                <br>
                <button type="submit">Войти</button>
            </form>

            <p class="modal-content-bottom" id="open-register-text">Нет аккаунта? <a href="#" id="open-register-button">Регистрация</a></p>
            <!-- Регистрация -->
            <form class="register-form" style="display: none;" action="register.php" method="post">
                <input type="text" name="name" placeholder="Логин" required>
                <input type="password" name="password" placeholder="Пароль" required>
                <span class="register-form-row">
                    <input type="checkbox" name="checkbox" required>
                    <label for="checkbox">Соглашаюсь с условиями обработки данных</label>
                </span>
                <button type="submit">Зарегистрироваться</button>
            </form>

            <p class="modal-content-bottom" id="open-login-text" style="display: none">У вас есть аккаунт? <a href="#" id="open-login-button">Авторизоваться</a></p>
        </div>
    </div>

    <ul class="breadcrumb">
        <li><a href="#">Блог</a></li>
        <li><?=$product['name'] ?></li>
    </ul>

    <img src="<?=$product['image'] ?>" alt="<?=$product['name'] ?>" class="blog-image">

    <div class="blog-content">
        <span class="blog-time">23.09.2022 <img src="css/icons/rub-icon.png" alt="Стоимость"><?=$product['price'] ?> руб.</span>
        <div class="blog-content-text">
            <h1><?=$product['name'] ?></h1>
            <?=$product['description'] ?>
        </div>
    </div>

</main>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-column">
            <h3>Fabrika</h3>
            <p>Политика конфиденциальности</p>
            <p>Все права защищены</p>
        </div>
        <div class="footer-column">
            <h4>Каталог</h4>
            <p>Перетяжка мебели</p>
            <p>Изготовление кроватей</p>
            <p>Изготовление стеновых панелей</p>
            <p>Изготовление диванов</p>
            <p>Вызвать замерщика</p>
        </div>
        <div class="footer-column">
            <h4>Компания</h4>
            <p>О компании</p>
            <p>Портфолио</p>
            <p>Блог</p>
            <p>Контакты</p>
        </div>
        <div class="footer-column">
            <p>Fabrika-tymen@yandex.ru</p>
            <p>+7 (908) 875-04-06</p>
            <p>+7 (3452) 748-804</p>
            <p>Свяжитесь с нами удобным способом!</p>
            <div class="social-icons">
                <a href="#"><img src="css/icons/vk_logo.png" alt="VK"></a>
                <a href="#"><img src="css/icons/viber_logo.svg" alt="Viber"></a>
                <a href="#"><img src="css/icons/whatsapp_logo.svg.webp" alt="WhatsApp"></a>
            </div>
        </div>
    </div>
</footer>
<script src="js/scripts.js"></script>
</body>
</html>