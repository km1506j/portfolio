"use strict";

jQuery(function ($) {
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
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },

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

//トップボタン
document.addEventListener("DOMContentLoaded", function () {
    const topButton = document.querySelector(".to-the-top__button");
    const target = document.querySelector(".main-visual");

    if (!topButton || !target) return;

    const options = {
        root: null,
        rootMargin: "0px",
        threshold: 0
    };

    function onIntersect(entries) {
        const entry = entries[0];
        if (entry.isIntersecting) {
            topButton.classList.add("invisible");
        } else {
            topButton.classList.remove("invisible");
        }
    }

    const observer = new IntersectionObserver(onIntersect, options);

    observer.observe(target);
});
