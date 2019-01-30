"use strict";
/**
 * Modulus-Pro entry point.
 *
 * @package ModulusPro\JS
 * @author  PolishedWP
 * @license GPL-2.0-or-later
 */

var genesisSample = function ($) {
  'use strict';
  /**
   * Adjust site inner margin top to compensate for sticky header height.
   *
   * @since 1.0.0
   */

  var moveContentBelowFixedHeader = function moveContentBelowFixedHeader() {
    var siteInnerMarginTop = 0;

    if ($('.site-header').css('position') === 'fixed') {
      siteInnerMarginTop = $('.site-header').outerHeight();
    }

    $('.site-inner').css('margin-top', siteInnerMarginTop);
  },

  /**
   * Initialize Modulus-Pro.
   *
   * Internal functions to execute on full page load.
   *
   * @since 1.0.0
   */
  load = function load() {
    moveContentBelowFixedHeader();
    $(window).resize(function () {
      moveContentBelowFixedHeader();
    }); // Run after the Customizer updates.
    // 1.5s delay is to allow logo area reflow.

    if (typeof wp != "undefined" && typeof wp.customize != "undefined") {
      wp.customize.bind('change', function (setting) {
        setTimeout(function () {
          moveContentBelowFixedHeader();
        }, 1500);
      });
    }
  }; // Expose the load and ready functions.


  return {
    load: load
  };
}(jQuery);

jQuery(window).on('load', genesisSample.load);