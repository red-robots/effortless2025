/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 *  Date Modified: 02.21.2025
 */
jQuery(document).ready(function ($) {

  const testimonialSwiper = new Swiper('.testimonialSwiper', {
    slidesPerView: 1,
    // autoHeight: true,
    centeredSlides: true,
    roundLengths: true,
    spaceBetween: 20,
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
    breakpoints: {
      600: {
        slidesPerView: 1,
      },
      960: {
        slidesPerView: 2,
      },
      1024: {
        slidesPerView: 3,
      }
    }
  });

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

  // $('[data-fancybox]').fancybox({
  //   touch: true,
  //   hash: false,
  //   youtube: {
  //     controls: 0,
  //     showinfo: 0,
  //     rel: 0
  //   },
  //   vimeo: {
  //     color: 'ffffff'
  //   }
  // });
  // $('.zoom-image').fancybox({
  //   buttons: ['fullScreen', 'close'],
  //   hash: false
  // });

  setTimeout(function(){
    if( $('.subscribe-container li.gfield').length ) {
      $('.subscribe-container .gform_wrapper li.gfield').each(function(){
        if( $(this).find('label.gfield_label').length ) {
          var labelTxt = $(this).find('label.gfield_label').text();
          $(this).find('.ginput_container input').attr('placeholder', labelTxt);
        }
      });
    }
  },100);

});