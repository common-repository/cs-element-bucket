"use strict";

(function ($) {
  /**-----------------------------
   *  Mobile Menu
   * ---------------------------*/

  /* -----------------------------------------------------
      Header Search
      ----------------------------------------------------- */
  let header_search = document.querySelector(".search-form");
  let search_icon = document.querySelector(".search-icon");
  let search_close = document.querySelector(".search-close");
  if (header_search) {
    search_icon.addEventListener("click", function () {
      header_search.classList.add("open-search");
      search_icon.style.display = "none";
      search_close.style.display = "block";
    });
    search_close.addEventListener("click", function () {
      header_search.classList.remove("open-search");
      search_icon.style.display = "block";
      search_close.style.display = "none";
    });
  }

  // banner-video-slider.
  const videoSlider = new Swiper(".banner-video-slider", {
    slidesPerView: 1,
    effect: "fade",
    navigation: {
      nextEl: ".video-banner-next",
      prevEl: ".video-banner-prev",
    },
    loop: true,
    autoplay: {
      delay: 1000,
    },
    speed: 1500,
  });

  //heading-text-slider
  const clientSlider = new Swiper(".heading-text-slider", {
    spaceBetween: 100,
    speed: 15000,
    loop: true,
    autoplay: {
      delay: 1,
      disableOnInteraction: false,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      1199: {
        slidesPerView: 1.2,
      },
      2000: {
        slidesPerView: 1.6,
        spaceBetween: 100,
      },
    },
  });

  //service-slider-1
  const serviceSlider = new Swiper(".service-slider-1", {
    spaceBetween: 25,
    speed: 3000,
    loop: true,
    autoplay: true,
    centeredSlides: true,
    pagination: {
      el: ".service-slider-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 1.5,
      },
      768: {
        slidesPerView: 1.8,
      },
      992: {
        slidesPerView: 2.5,
      },
      1199: {
        slidesPerView: 3,
      },
    },
  });

  //testimonial-slider-1
  const testimonialSlider = new Swiper(".testimonial-slider-1", {
    speed: 3000,
    loop: true,
    centeredSlides: true,
    slidesPerView: 1,
    navigation: {
      nextEl: ".testimonial-banner-next",
      prevEl: ".testimonial-banner-prev",
    },
  });

  //blog-slider-1
  const blogSlider = new Swiper(".blog-slider-1", {
    spaceBetween: 30,
    speed: 3000,
    loop: true,
    pagination: {
      el: ".blog-slider-pagination",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1199: {
        slidesPerView: 3,
      },
    },
  });

  //service-slider-2
  const serviceSliderTwo = new Swiper(".service-slider-2", {
    spaceBetween: 25,
    speed: 3000,
    loop: true,
    autoplay: true,
    pagination: {
      el: ".service-slider-2-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1199: {
        slidesPerView: 4,
      },
    },
  });

  //shipment-slider-1
  const shipmentSlider = new Swiper(".shipment-track-slider-1", {
    spaceBetween: 25,
    speed: 3000,
    loop: false,
    autoplay: false,
    pagination: {
      el: ".shipment-track-slider-pagination",
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + "</span>";
      },
    },
    slidesPerView: 1,
  });

  // video popup
  if ($(".popup-video").length) {
    $(".popup-video").magnificPopup({
      type: "iframe",
      mainClass: "video-fade",
      removalDelay: 160,
      preloader: false,
      fixedContentPos: false,
    });
  }

  //counter
  if ("counterUp" in window) {
    const skill_counter = window.counterUp.default;
    const skill_cb = (entries) => {
      entries.forEach((entry) => {
        const el = entry.target;
        if (entry.isIntersecting && !el.classList.contains("is-visible")) {
          skill_counter(el, {
            duration: 1500,
            delay: 16,
          });
          el.classList.add("is-visible");
        }
      });
    };
    const IO = new IntersectionObserver(skill_cb, {
      threshold: 1,
    });
    const els = document.querySelectorAll(".counter");
    els.forEach((el) => {
      IO.observe(el);
    });
  }

  // Added halim from here

  //testimonial-slider-9
  const testimonialSliderNine = new Swiper(".testimonial-slider-9", {
    speed: 3000,
    loop: true,
    slidesPerView: 1,
    navigation: {
      nextEl: ".next-btn",
      prevEl: ".prev-btn",
    },
  });

  //portfolio-slider-9
  const portfolioSliderNine = new Swiper(".portfolio-slider-9", {
    speed: 3000,
    loop: true,
    slidesPerView: 3,
    spaceBetween: 30,
    navigation: {
      nextEl: ".portfolio-next",
      prevEl: ".portfolio-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      575: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 2,
      },
      1200: {
        slidesPerView: 3,
      },
    },
  });

  //portfolio-slider-10
  const portfolioSliderTen = new Swiper(".portfolio-slider-10", {
    speed: 3000,
    loop: true,
    slidesPerView: 2,
    spaceBetween: 30,
    pagination: {
      el: ".portfolio-btn",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      575: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 1,
      },
      1024: {
        slidesPerView: 1,
      },
      1200: {
        slidesPerView: 2,
      },
    },
  });

  //team-slider-9
  const teamSliderNine = new Swiper(".team-slider-9", {
    speed: 3000,
    loop: true,
    slidesPerView: 4,
    spaceBetween: 30,
    pagination: {
      el: ".pagination-btn",
      clickable: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      575: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });

 //team-slider-9
  const clientSliderNine = new Swiper(".eb-client-slider-one", {
    speed: 3000,
    loop: true,
    slidesPerView: 5,
    spaceBetween: 0,
    navigation: {
      nextEl: ".client-next",
      prevEl: ".client-prev",
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      575: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 4,
      },
      1200: {
        slidesPerView: 5,
      },
    },
  });

  const swiper = new Swiper('.eb-client-slider-two', {
    effect: 'creative',
    speed: 1000, 
    creativeEffect: {
      prev: {
        translate: ['-100%', 0, -400],
        rotate: [0, 80, 0], 
        opacity: 0.7, 
        scale: 0.9, 
        shadow: true,
        origin: 'left center',
      },
      next: {
        translate: ['100%', 0, -400],
        rotate: [0, -80, 0],
        scale: 0.9,
        shadow: true,
        origin: 'right center',
      },
    },
    navigation: {
      nextEl: ".client-next",
      prevEl: ".client-prev",
    },
  });
  
  //team-slider-9
  const rollslider = new Swiper(".eb-rollslider", {
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    speed: 6000,
    autoplay: {
      delay: 1,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      575: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });
  rollslider.slides.forEach((slide, index) => {
    slide.style.width = "auto";
  });


  const rollslider_one = new Swiper(".eb-rollslider-reverse", {
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    speed: 6000,
    autoplay: {
      delay: 1,
      reverseDirection: true,
    },
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      575: {
        slidesPerView: 2,
      },
      768: {
        slidesPerView: 3,
      },
      1024: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4,
      },
    },
  });
  rollslider_one.slides.forEach((slide, index) => {
    slide.style.width = "auto";
  });

  // Filter by price
  if (true) {
    function getVals() {
      // Get slider values
      let parent = this.parentNode;
      let slides = parent.getElementsByTagName("input");
      let slide1 = parseFloat(slides[0].value);
      let slide2 = parseFloat(slides[1].value);
      if (slide1 > slide2) {
        let tmp = slide2;
        slide2 = slide1;
        slide1 = tmp;
      }
      let displayElement = parent.getElementsByClassName("range-values")[0];
      displayElement.innerHTML = "$" + slide1 + " - $" + slide2;
    }
    window.onload = function () {
      let sliderSections = document.getElementsByClassName("range-slide");
      for (let x = 0; x < sliderSections.length; x++) {
        let sliders = sliderSections[x].getElementsByClassName("filter-input");
        for (let y = 0; y < sliders.length; y++) {
          if (sliders[y].type === "range") {
            sliders[y].oninput = getVals;
            sliders[y].oninput();
          }
        }
      }
    };
  }

  // Form distance slider
  document.addEventListener("DOMContentLoaded", function () {
    let slider = document.getElementById("range-bar");
    let output = document.getElementById("demo");
    if (output) {
      output.innerHTML = slider.value;
      slider.oninput = function () {
        output.innerHTML = this.value;
      };
    }
  });

  // Menu style 10
  let menuItems = document.querySelectorAll(".menu-item");
  menuItems.forEach((item) => {
    item.addEventListener("click", function () {
      const subMenu = this.querySelector(".sub-menu");
      if (subMenu) {
        subMenu.style.display =
          subMenu.style.display === "block" ? "none" : "block";
        subMenu.style.height = subMenu.style.height === "auto" ? "0px" : "auto";
        subMenu.style.opacity = subMenu.style.opacity === "1" ? "0" : "1";
      }
    });
  });
})(jQuery);
