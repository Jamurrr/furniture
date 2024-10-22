
//Боковое меню
function toggleMenu() {
    var sideMenu = document.getElementById("side-menu");
    var overlay = document.getElementById("overlay");

    if (sideMenu.style.width === "0px" || sideMenu.style.width === "") {
        sideMenu.style.width = "250px";
        overlay.style.display = "block";
    } else {
        sideMenu.style.width = "0";
        overlay.style.display = "none";
    }
}


// Фиксация шапки при скролле
window.addEventListener('scroll', function () {
    console.log(1);
    let header = document.getElementById('header');
    if (window.scrollY > 50) {
        header.classList.add('header-fixed');
    } else {
        header.classList.remove('header-fixed');
    }
});


let modal = document.getElementById("modal");
let userIcon = document.querySelector(".user-icon-img");
let closeBtn = document.querySelector(".close");
let registerButton = document.getElementById("open-register-button");
let loginButton = document.getElementById("open-login-button");
let registerText = document.getElementById("open-register-text")
let loginText = document.getElementById("open-login-text")
let loginForm = document.querySelector(".login-form");
let registerForm = document.querySelector(".register-form");
let text = document.getElementById("login-register-text");

// Открытие модального окна при клике на иконку пользователя
userIcon.onclick = function() {
    modal.style.display = "block";
}

// Закрытие окна при клике на крестик
closeBtn.onclick = function() {
    modal.style.display = "none";
}

// Закрытие окна при клике вне окна (на фон)
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}


registerButton.onclick = function(e) {
    e.preventDefault();
    loginForm.style.display = "none";
    registerForm.style.display = "block";
    registerText.style.display = "none";
    loginText.style.display = "block";
    text.textContent = "Регистрация";
}

loginButton.onclick = function(e) {
    e.preventDefault();
    registerForm.style.display = "none";
    loginForm.style.display = "block";
    registerText.style.display = "block";
    loginText.style.display = "none";
    text.textContent = "Войти";

}

$(document).ready(function() {
    $('#searchForm').on('submit', function(e) {
        e.preventDefault();
        var searchQuery = $('#searchQuery').val();

        $.ajax({
            url: 'search.php',
            method: 'POST',
            data: { searchQuery: searchQuery },
            success: function(response) {
                $('#searchResults').html(response);
            },
            error: function() {
                alert('Произошла ошибка при поиске.');
            }
        });
    });
});

