"use strict";

/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 *  Date Modified: 02.21.2025
 */
jQuery(document).ready(function ($) {
  // var testimonialSwiper = '.testimonial-swiper';
  // var $swiper = $(testimonialSwiper);
  // var $bottomSlide = null;
  // var $bottomSlideContent = null;
  // var mySwiper = new Swiper(testimonialSwiper, {
  //   spaceBetween: 1,
  //   slidesPerView: 3,
  //   centeredSlides: true,
  //   roundLengths: true,
  //   loop: true,
  //   loopAdditionalSlides: 30,
  //   navigation: {
  //     nextEl: ".swiper-button-next",
  //     prevEl: ".swiper-button-prev"
  //   }
  // });
  // const testimonialSwiper = new Swiper('.testimonialSwiper', {
  //   // slidesPerView: 1,
  //   // spaceBetween: 5,
  //   // breakpoints: {
  //   //   320: {
  //   //     slidesPerView: 2,
  //   //     spaceBetween: 20
  //   //   },
  //   //   // when window width is >= 480px
  //   //   480: {
  //   //     slidesPerView: 2,
  //   //     spaceBetween: 30
  //   //   },
  //   //   // when window width is >= 640px
  //   //   768: {
  //   //     slidesPerView: 3,
  //   //     spaceBetween: 40
  //   //   }
  //   // }
  //   slidesPerView: 1,
  //   spaceBetween: 30,
  //   loop: true,
  //   noSwiping: true,
  //   simulateTouch: true,
  //   speed: 1000,
  //   autoplay: {
  //     delay: 6000
  //   },
  //   pagination: {
  //     el: '.swiper-pagination',
  //     clickable: true
  //   },
  //   navigation: {
  //     nextEl: ".swiper-button-next",
  //     prevEl: ".swiper-button-prev"
  //   },
  //   breakpoints: {
  //     320: {
  //       slidesPerView: 2,
  //       spaceBetween: 20
  //     },
  //     480: {
  //       slidesPerView: 2,
  //       spaceBetween: 30
  //     },
  //     768: {
  //       slidesPerView: 3,
  //       spaceBetween: 40
  //     }
  //   }
  // });
  do_slideshow('.testimonial-swiper');
  /* Slideshow */

  function do_slideshow(selector) {
    var swiper = new Swiper(selector, {
      effect: 'fade',

      /* "slide", "fade", "cube", "coverflow" or "flip" */
      loop: true,
      noSwiping: true,
      simulateTouch: true,
      speed: 1000,
      autoplay: {
        delay: 6000
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev"
      },
      on: {
        init: function init() {//console.log("swiper initialized");
        }
      }
    });
  }

  $('[data-fancybox]').fancybox({
    touch: true,
    hash: false,
    youtube: {
      controls: 0,
      showinfo: 0,
      rel: 0
    },
    vimeo: {
      color: 'ffffff'
    }
  });
  $('.zoom-image').fancybox({
    buttons: ['fullScreen', 'close'],
    hash: false
  });
});