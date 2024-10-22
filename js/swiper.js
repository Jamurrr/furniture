const swiper = new Swiper('.swiper-container', {
    effect: "fade",
    fadeEffect: {
        crossFade: true
    },
    loop: true, // Зацикливание слайдов
    pagination: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },

});