"use strict";

$(function () {
    //ハンバーガーメニュー
    $('.header__hamburger').on('click', function () {
        $(".header__nav").slideToggle()
    });

    $('.header__nav-link').on('click', function () {
        const windowWidth = $(window).outerWidth();
        if (windowWidth <= 768) {
            $(".header__nav").slideToggle()
        }
    });

    $(window).resize(function () {
        const windowWidth = $(window).outerWidth();
        if (windowWidth >= 768) {

            $('.header__nav').show();
        } else {
            $('.header__nav').hide();
        };
    });
});

//swiper
const swiper = new Swiper('.swiper', {
    spaceBetween: 50,
    loop: true,

    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },

    breakpoints: {
        768: {
            slidesPerGroup: 1,
            slidesPerView: 3,
            spaceBetween: 30,
        }
    }
});