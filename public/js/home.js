document.addEventListener("DOMContentLoaded", function () {
  const splide = new Splide(".splide", {
    type: "loop",
    interval: 0,
    gap: "20px",
    autoplay: true,
    drag: "true",
    focus: "center",
    perPage: 8,
    perMove: 2,
    speed: 10000,
    easing: "linear",
    arrows: false,
    pagination: false,
    padding: "5rem",
    // pauseOnHover: false,
    autoScroll: {
      speed: 1,
    },
    breakpoints: {
      1200: { perPage: 2, gap: "1rem" },
      640: { gap: 0 },
    },
  });
  splide.mount();
  new Splide(".splide").mount(window.splide.Extensions);
});

function saleSlider() {
  const splide = new Splide("#saleSlider", {
    perPage: 2,
    gap: 20,
    focus: "center",
    omitEnd: true,
    arrows: true,
    pagination: false,
    perMove: 1,
    padding: "0rem",
    breakpoints: {
      1200: { perPage: 1, gap: "1rem", arrows: false },
      640: { gap: 0, arrows: false },
    },
  });
  splide.mount();
}

saleSlider();

// rang progress

function updateRangeColor(input) {
  const value = ((input.value - input.min) / (input.max - input.min)) * 100;
  console.log(value);
  input.style.background = `linear-gradient(to right, #eaa451 ${value}%, #ffffff1a ${value}%)`;
}
