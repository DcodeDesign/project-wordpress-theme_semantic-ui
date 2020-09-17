/* global wp, jQuery */
/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */
(function ($) {
  activeMenu();

  function activeMenu() {
    $('a.item').each(function () {
      console.log(this.href, window.location.href);
      if (this.href === window.location.href) {
        $(this).addClass('current');
      }
    });
  }

  
}(jQuery));
