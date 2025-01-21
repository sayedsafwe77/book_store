const swiper = new Swiper(".swiper", {
  loop: true,
  slidesPerView: 7,
  spaceBetween: 10,
  autoplay: {
    delay: 1500,
    disableOnInteraction: false,
  },
  breakpoints: {
    320: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    480: {
      slidesPerView: 3,
      spaceBetween: 30,
    },
    640: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  },
});

const slides = document.querySelectorAll(".swiper-slide");
slides.forEach((slide) => {
  slide.addEventListener("click", function () {
    slides.forEach((s) => s.classList.remove("active"));
    this.classList.add("active");
  });
});
