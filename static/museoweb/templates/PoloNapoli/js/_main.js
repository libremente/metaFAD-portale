$(window).load(function(){

//add class fix viewer on Safari and Chrome
var isSafari = navigator.userAgent.indexOf("Safari") > -1;
var hasViewer = $("body").find("#viewer").length != 0;
if(isSafari && hasViewer) {
   $('body').addClass("webkit");
}

	//tabs multilevel navigation
	$('.ul-level-1 > li a').click(function (event) {
		var currentIdLevelOne,
			currentIdLevelTwo;

		$('.ul-level-1 > li a.active').removeClass('active');
		$(this).addClass('active');
		currentIdLevelOne = $(this)[0].hash;

		$('.ul-level-1-content.current').removeClass('current');
		$(currentIdLevelOne).addClass('current');
		currentIdLevelTwo = $(currentIdLevelOne + ' .ul-level-2 > li a.active')[0].hash;
		$(currentIdLevelOne + ' .ul-level-2-content ' + currentIdLevelTwo).addClass('current');
		event.preventDefault();
	});
	$('.ul-level-2 > li a').click(function (event) {
		var currentIdLevelOne,
			currentIdLevelTwo;

		currentIdLevelOne = $('.ul-level-1 > li a.active')[0].hash;

		$('.ul-level-1-content.current .ul-level-2 > li a.active').removeClass('active');
		$(this).addClass('active');
		currentIdLevelTwo = $(this)[0].hash;

		$('.ul-level-2-content .current').removeClass('current');
		$(currentIdLevelOne + ' ' + currentIdLevelTwo).addClass('current');
		event.preventDefault();
	});

// add same to div related the same height of div reference
if ($('.js-height-reference').length) {

  var catH = $('.js-height-reference').outerHeight();
  if ( catH  > $('.js-height-related').height() ){
      $('.js-height-related').height( catH  );
  } else {
     $('.js-height-related').height('auto');
  }

}
// add style to change the position of main content according to header height
var headerHeight = $('#header').outerHeight();
$('.mcp-module-main-parallax').css('top', headerHeight);

// show pop-up
// info: http://stackoverflow.com/questions/24853723/jquery-popup-windows-automaticly-pops-up
$(".js-my-pop-up").removeClass( "hidden" );
$('[data-popup-target]').click(function () {
    var activePopup = $(this).attr('data-popup-target');
    $(activePopup).toggleClass('js-called');
    return false;
});

$('[data-popup-target-close]').click(function () {
    var activePopup = $(this).attr('data-popup-target-close');
    $(activePopup).toggleClass('js-called');
    return false;
});
if ($('.js-my-pop-up').before() !== undefined)
{
	$('.js-my-pop-up').before().click(function () {
	if($(this).attr('id') !== 'plogin' && !$(this).hasClass('js-popup-carrello'))
	{
		$(this).toggleClass('js-called');
		return false;
	}
	});
}

// add class when start scroll
$(window).on('scroll', function(){

    if ($(window).scrollTop()) {

        $('#header').addClass('init-scroll');

    }else {

         $('#header').removeClass('init-scroll');
    }
});

// user scroll
var iScrollPos = 0;

$('#outer').scroll(function () {
    var iCurScrollPos = $(this).scrollTop();
    if (iCurScrollPos > iScrollPos) {
        $(this).addClass('user-init-scroll');
    } else {
        $(this).removeClass('user-init-scroll');
    }
    iScrollPos = iCurScrollPos;
});

// PLACEOLDER
//Assign to those input elements that have 'placeholder' attribute
if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.appVersion.indexOf('Trident/') > 0) {
   $('input[placeholder]').each(function(){

        var input = $(this);

        $(input).val(input.attr('placeholder'));

        $(input).focus(function(){
             if (input.val() == input.attr('placeholder')) {
                 input.val('');
             }
        });

        $(input).blur(function(){
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.val(input.attr('placeholder'));
            }
        });
    });
};

// SHOW BOX

$(".js-collapse-box").hide();
$(".js-collapse-box").removeClass( "hidden" );
$(".js-show-element").click(function(){
	$(this).next().slideToggle('fast', function(){
		$(this).prev(".js-show-element").toggleClass("active");
		});
	return false;
});

$(".js-collapse-box-reverse").removeClass( "hidden" );
$(".js-show-element-reverse").click(function(){
	$(this).next().slideToggle('fast', function(){
		$(this).prev(".js-show-element-reverse").toggleClass("active");
		});
	return false;
});

// scroll section regolate animation menu in mobile version
/*
$('.js-menu').on('click', function(e) {
	  $('.nav-collapse').addClass("close-menu");
      e.preventDefault();
    });

$('.show-nav-for-iphone').on('click', function(e) {
	  $('.nav-collapse').removeClass("in");
	  $('.nav-collapse').removeClass("close-menu");
      e.preventDefault();
    });
*/

// animation simple hide/show

$('.js-simple-animation').bind('inview', function (event, visible) {

   if (visible == true) {
	  $(this).addClass('on');
   }

});


// js-inner nav ad class to show menu
var width1 = $(window).width();
if(width1 <=767) {
$('.js-block-inner-nav').on('touchend', function(e) {
	  $(this).addClass("touch");
      e.preventDefault();
});
}

// NEWSLETTER VALIDATE
/*
$('#mc-embedded-subscribe-form').validate({
	rules: {
		formPrivacy: "required"

	},
	messages: {
		formPrivacy: "Richiesto"

	}
});
*/
// VIDEO YOUTUBE e VIMEO LIQUID

$(function() {

	// Find all YouTube videos
	var $allVideos = $("iframe[src^='https://www.youtube.com']"),

		// The element that is fluid width
		$fluidEl = $("#main-article");

	// Figure out and save aspect ratio for each video
	$allVideos.each(function() {

		$(this)
			.data('aspectRatio', this.height / this.width)

			// and remove the hard coded width/height
			.removeAttr('height')
			.removeAttr('width');

	});

	// When the window is resized
	// (You'll probably want to debounce this)
	$(window).resize(function() {

		var newWidth = $fluidEl.width();

		// Resize all videos according to their own aspect ratio
		$allVideos.each(function() {

			var $el = $(this);
			$el
				.width(newWidth)
				.height(newWidth * $el.data('aspectRatio'));

		});

	// Kick off one resize to fix all videos on page load
	}).resize();

});

$(function() {

	// Find all YouTube videos
	var $allVideosVimeo = $("iframe[src^='https://player.vimeo.com']"),

		// The element that is fluid width
		$fluidEl = $("#main-article");

	// Figure out and save aspect ratio for each video
	$allVideosVimeo.each(function() {

		$(this)
			.data('aspectRatio', this.height / this.width)

			// and remove the hard coded width/height
			.removeAttr('height')
			.removeAttr('width');

	});

	// When the window is resized
	// (You'll probably want to debounce this)
	$(window).resize(function() {

		var newWidth = $fluidEl.width();

		// Resize all videos according to their own aspect ratio
		$allVideosVimeo.each(function() {

			var $el = $(this);
			$el
				.width(newWidth)
				.height(newWidth * $el.data('aspectRatio'));

		});

	// Kick off one resize to fix all videos on page load
	}).resize();

});

});

$(document).ready(function(){
  $('.js-get-request-iframe').on('click',function(){
    $('#popupRequest-iframe').attr('src',$(this).data('iframe'));
  });
});
