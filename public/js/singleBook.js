var swiper = new Swiper(".mySwiper", {
  loop: true,
  spaceBetween: 10,
  slidesPerView: 4,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".mySwiper2", {
  loop: true,
  spaceBetween: 10,

  thumbs: {
    swiper: swiper,
  },
});

var swiper = new Swiper(".books-sale_swiper", {
  loop: true,
  spaceBetween: 0,
  slidesPerView: 2,
  freeMode: true,
  watchSlidesProgress: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    1200: {
      slidesPerView: 2,
    },
    767: {
      slidesPerView: 1,
    },
    425: {
      slidesPerView: 1,
    },
    325: {
      slidesPerView: 1,
    },
  },
});
