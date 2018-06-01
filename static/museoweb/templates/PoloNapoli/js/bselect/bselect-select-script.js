(function( $ ) {

	$( document ).ready(function() {
		$("[id^='bselect-']").bselect();
		window.prettyPrint && prettyPrint();
		$('.roles').find('.bselect-option-list').children('li').first().addClass('hide');
	});

})( jQuery );
