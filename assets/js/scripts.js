/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 *  Date Modified: 02.21.2025
 */
jQuery(document).ready(function ($) {

  //Sticky Header
  //var stickyOffset = $('.site-header').offset().top;
  var stickyOffset = $('.site-header').height() + 20;
  page_scrolled();
  $(window).scroll(function(){
    page_scrolled();
  });

  function page_scrolled() {
    var top_offset = ( $('#wpadminbar').length ) ? $('#wpadminbar').height() : 0;
    var sticky = $('.site-header'),
        scroll = $(window).scrollTop();
    if (scroll >= stickyOffset) {
      sticky.addClass('fixed');
      if( $('body').hasClass('home') ) {
        if( $('.logoContainer .mainNav #site-navigation').length==0 ) {
          $('.leftCol #site-navigation').appendTo('.logoContainer .mainNav');
        }
      }
      $('.site-header').css('top', top_offset+'px');
    } else {
      sticky.removeClass('fixed');
      if( $('body').hasClass('home') ) {
        if( $('.logoContainer .mainNav #site-navigation').length ) {
          $('.logoContainer .mainNav #site-navigation').appendTo('.leftCol');
        }
      }
      $('.site-header').css('top','');
    }
  }

  if( $('.repeatable p').length ) {
    $('.repeatable p').each(function(){
      if( $(this).text() ) {
        if( !$(this).text().replace(/\s/g,'') ) {
          $(this).addClass('empty');
        }
      }
    });
  }

  if( $('.main-navigation ul.menu').length ) {
    var mobileMenu = '<ul class="mobile-menu">';
    $('.main-navigation ul.menu > li').each(function(){
      var linkClass = $(this).attr('class');
      mobileMenu += '<li class="'+linkClass+'">'+$(this).html()+'</li>';
    });
    mobileMenu += '</ul>';
    $('#mobile-site-navigation').html(mobileMenu);
  }

  $(document).on('click', '.mobileMenuToggle', function(e){
    e.preventDefault();
    let ariaControls = $(this).attr('aria-controls');
    let isExpanded = $(this).attr('aria-expanded') === 'true';
    $(this).attr('aria-expanded', !isExpanded);
    if( $('#'+ariaControls).length ) {
      $('#'+ariaControls).toggleClass('open');
    }
  });
  $(document).on('click', '.mobile-menu-close, .mobileOverlay', function(e){
    e.preventDefault();
    $('#MobileHeader').addClass('closed');
    setTimeout(function(){
      $('#MobileHeader').removeClass('open closed');
    },500);
  });

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
    slidesPerView: 1,
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
      1080: {
        slidesPerView: 1,
      },
      1024: {
        slidesPerView: 2,
      },
      1250: {
        slidesPerView: 3,
      }
    }
  });

  if( $('.section-slideshow').length ) {
    $('.section-slideshow').each(function(){
      do_slideshow( this );
    });
  }

  /* Slideshow */
  function do_slideshow(selector) {
    var swiper = new Swiper(selector, {
      effect: 'fade',

      /* "slide", "fade", "cube", "coverflow" or "flip" */
      loop: true,
      // noSwiping: true,
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

  if( $('.repeatable').length ) {
    $('.repeatable').each(function(){
      if( $(this).prev().hasClass('repeatable') ) {
        if( $(this).prev().attr('data-group')!=undefined ) {
          var groupName = $(this).prev().attr('data-group');
          $(this).addClass('prev-' + groupName);
        }
      } else {
        $(this).addClass('repeatable-first-section');
      }
      if( $(this).next().hasClass('repeatable') ) {
        if( $(this).next().attr('data-group')!=undefined ) {
          var groupName = $(this).next().attr('data-group');
          $(this).addClass('next-' + groupName);
        }
      }
    }); 
  }

  if( $('body').hasClass('page-template-page-the-dish') ) {

    if( typeof params.q!=='undefined' && params.q ) {
      var newUrl = window.location.href + '#main';
      if( !window.location.hash ) {
        window.location.href = newUrl;
      }
    }

    if($('.pagination-dish a').length)  {
      $('.pagination-dish a').each(function(){
        var pageHref = $(this).attr('href');
        $(this).attr('href', pageHref+'#main');
      });
    }
  }

  $( document ).on( 'updated_wc_div updated_cart_totals', function(e) {
    var count = 0;
    if( $('.woocommerce-cart-form input.qty').length ) {
      $('.woocommerce-cart-form input.qty').each(function(){
        count += parseInt(this.value);
      });
    }
    if(count>0) {
      $('.cart-contents .cart-count b').text(count);
    } else {
      $('.cart-contents .cart-count').remove();
    }
  });

  if( window.location.hash ) {
    //do_smooth_scroll(window.location.hash);
    setTimeout(function(){
      do_smooth_scroll(window.location.hash,500);
    }, 600);
    setTimeout(function(){
      do_smooth_scroll(window.location.hash,200);
    }, 601);
  }

  function do_smooth_scroll(hashTag,speed) {
    let target = $(hashTag);
    let topOffset = $('#masthead').outerHeight() + 30;
    if (target.length) {
      $('html, body').animate({
        scrollTop: target.offset().top - topOffset
      }, speed, function() {
        target.focus();
        if (target.is(":focus")) {
          return false;
        } else {
          target.attr('tabindex','-1'); 
          target.focus().css('outline','0'); 
        };
      });
    }
  }

});