<?php
include 'db.php';

session_start();

$sql = "SELECT * FROM beds";
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabrika</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules/swiper/swiper-bundle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<header class="header" id="header">
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
            &#9776; <!-- Символ бургер-меню -->
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
    <!-- Слайдер -->
    <section class="slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="css/images/bed.jpg" alt="Изготовление кроватей">
                    <div class="slider-content">
                        <h2>Изготовление кроватей</h2>
                        <button class="slider-btn">Подробнее</button>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="css/images/bed2.jpg" alt="Изготовление мягких стеновых панелей">
                    <div class="slider-content">
                        <h2>Изготовление мягких стеновых панелей</h2>
                        <button class="slider-btn">Подробнее</button>
                    </div>
                </div>
                <div class="swiper-slide">
                    <img src="css/images/bed.jpg" alt="Изготовление диванов">
                    <div class="slider-content">
                        <h2>Изготовление диванов</h2>
                        <button class="slider-btn">Подробнее</button>
                    </div>
                </div>
            </div>
            <!-- Добавим кнопки навигации для слайдера -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>


    <!-- Поиск -->
    <form id="searchForm">
        <section class="search-bar">
            <input type="text" id="searchQuery"  name="searchQuery" placeholder="Найти">
            <button class="search-btn">
                <img src="css/icons/search.png" alt="Поиск" class="icon">
            </button>
        </section>
    </form>


    <div id="searchResults" class="product-grid"></div> <!-- Результаты поиска -->

    <!-- Готовые решения -->
    <section class="ready-solutions">
        <h1>Готовые решения</h1>
        <div class="product-grid">
            <?php
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product-card">';
                echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
                echo '<h3>' . $row['name'] . '</h3>';
                echo '<p>' . $row['price'] . ' руб.</p>';
                echo '<a href="blog.php?id='.$row['id'].'"><button class="add-to-cart">Подробнее</button></a>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <!-- О компании -->
    <section class="about-company">
        <div class="about-container">
            <div class="about-text">
                <h2>О компании</h2>
                <p>
                    Мы предлагаем качественную перетяжку мебели, изготовление кроватей и стеновых панелей по индивидуальному заказу.
                    Наши мастера с большим опытом работы гарантируют высокий уровень сервиса.
                </p>
            </div>
            <div class="about-image">
                <img src="css/images/about.jpg" alt="О компании">
            </div>
        </div>
    </section>

    <!-- Оставьте заявку -->
    <section class="request-form" style="background-color: #333333;">
        <h2>Оставьте заявку</h2>
        <p>Мы свяжемся с вами и расскажем подробнее обо всех видах услуг</p>
        <form action="#">
            <div class="form-row">
                <input type="text" placeholder="Ваше имя" required>
                <input type="tel" placeholder="Номер телефона" required>
                <input type="email" placeholder="Email" required>
            </div>
            <div class="form-row">
                <input type="text" placeholder="Сообщение" required>
            </div>
            <div class="form-row-checkbox">
                <label><input type="checkbox" required></label>
                <label >Я согласен на обработку персональных данных</label>
            </div>
            <button type="submit">Отправить</button>
        </form>
    </section>

    <section class="ready-solutions">
        <h2>Готовые решения</h2>
        <div class="product-grid">
            <div class="product-card">
                <img src="css/images/bed.jpg" alt="Кровать 1">
                <h3>Кровать 1</h3>
                <p>20,000 ₽</p>
                <button class="add-to-cart">В корзину</button>
            </div>
            <div class="product-card">
                <img src="css/images/bed.jpg" alt="Кровать 2">
                <h3>Кровать 2</h3>
                <p>25,000 ₽</p>
                <button class="add-to-cart">В корзину</button>
            </div>
            <div class="product-card">
                <img src="css/images/bed.jpg" alt="Кровать 3">
                <h3>Кровать 3</h3>
                <p>30,000 ₽</p>
                <button class="add-to-cart">В корзину</button>
            </div>
            <div class="product-card">
                <img src="css/images/bed.jpg" alt="Кровать 4">
                <h3>Кровать 4</h3>
                <p>35,000 ₽</p>
                <button class="add-to-cart">В корзину</button>
            </div>
        </div>
    </section>


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


<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="js/scripts.js"></script>
<script src="js/swiper.js"></script>
</body>
</html>
