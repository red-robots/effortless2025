/**
 *	Custom jQuery Scripts
 *	Developed by: Lisa DeBona
 *  Date Modified: 08.30.2025
 */
jQuery(document).ready(function ($) {

  $('.btn-mobile-toggle').on('click', function(e){
    e.preventDefault();
    let isExpanded = $(this).attr('aria-expanded') === 'true';
    $(this).attr('aria-expanded', !isExpanded);
    $('#login-site-navigation').slideToggle();
  });

});