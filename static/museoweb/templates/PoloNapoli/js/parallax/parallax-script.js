$(document).ready(function(){

    /*** NOTE ***
    - #menu
    -- ul
    --- li
    ---- a.js-go-to-step1

    - .block-parallax-section-controller
    -- ul
    --- li
    ---- a.js-go-to-step1.js-controller-1
    *** NOTE ***/

    /* go to */
    var width1 = $(window).width();
    if(width1 > 768) {

	    $(".js-go-to-step0").click(function() {
	        $('html, body').animate({
	            scrollTop: $(".js-anchor-step0").offset().top
	        }, 600);

	    })

	    $(".js-go-to-step1").click(function() {
	        $('html, body').animate({
	            scrollTop: $(".js-anchor-step1").offset().top
	        }, 600);

	        $('a').each(function () {
	              $(this).removeClass('active');
	              $(".js-controller-1").addClass('active'); // for block-parallax-section-controller
	          })
	          $(this).addClass('active');

	    })

	    $(".js-go-to-step2").click(function() {
	        $('html, body').animate({
	            scrollTop: $(".js-anchor-step2").offset().top
	        }, 600);

	        $('a').each(function () {
	              $(this).removeClass('active');
	              $(".js-controller-2").addClass('active'); // for block-parallax-section-controller
	          })
	          $(this).addClass('active');

	    })

	    $(".js-go-to-step3").click(function() {
	        $('html, body').animate({
	            scrollTop: $(".js-anchor-step3").offset().top
	        }, 600);

	        $('a').each(function () {
	              $(this).removeClass('active');
	              $(".js-controller-3").addClass('active'); // for block-parallax-section-controller
	          })
	          $(this).addClass('active');

	    })

	    $(".js-go-to-step4").click(function() {
	        $('html, body').animate({
	            scrollTop: $(".js-anchor-step4").offset().top
	        }, 600);

	        $('a').each(function () {
	              $(this).removeClass('active');
	              $(".js-controller-4").addClass('active'); // for block-parallax-section-controller
	          })
	          $(this).addClass('active');

	    })

     }

     if(width1 >= 600) {
    function resize() {
          var h = $(window).height() - $('#header').height() - $('#footer').height();
          //var h = $(window).height();
          var h2 = $(window).height();
          var h3 = $(window).height();
          var h4 = $(window).height()-30;

          $('.js-detect-window-height').height(h4);
          $(".js-detect-window-min-height").css("min-height", h4 );
          $(".js-detect-window-max-screen").css("max-height", h2 );
          $(".js-detect-window-min-height-fixed").css("min-height", h4 - 140 );
          $(".js-detect-window-max-screen-fixed").css("max-height", h2 - 140);

      }

      $(window).resize(function () {
          resize();
    });

      resize();
    }

});
