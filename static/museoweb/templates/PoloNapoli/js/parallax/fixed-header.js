$(window).on('load',function() {


    $(window).scroll(function() {

            var startscroll = $(window).scrollTop();

            // quando lo scroll supera altezza di header porta header fuori dal campo
            if (startscroll >= 100) {
                $('#header').addClass('translate-negative-top');

            } else {
                 $('#header').removeClass('translate-negative-top');
            }

			var top = $(window).scrollTop();

            // quando lo scroll supera precisa distanza in px dal top mostra header fixed
            if (top >= 210) {
                $('#outer').addClass('init-parallax');
				//$('#header').addClass('translate-in-position');
				//$('#header').removeClass('translate-negative-top');
			} else {
                $('#outer').removeClass('init-parallax');
				//$('#header').removeClass('translate-in-position');
			}

		});

});
