$(document).ready(function() {
	  $('.single-item').slick({
		  dots: false,
		  infinite: true,
		  speed: 800,
		  slidesToShow: 1,
		  slidesToScroll: 1
	  });
	  $('.single-item-autoplay').slick({
		  dots: false,
		  infinite: true,
		  speed: 800,
		  slidesToShow: 1,
		  autoplay: true,
          autoplaySpeed: 2000,
		  slidesToScroll: 1
	  });
      $('.slideshow').slick({
		  dots: false,
		  infinite: true,
		  speed:900,
		  slidesToShow: 1,
		  slidesToScroll: 1,
          fade: true,
          pauseOnHover:false,
          autoplay: true,
          arrows: false,
          autoplaySpeed: 2000,
          cssEase: 'linear'
	  });
      $('.super-slideshow').slick({
		  dots: false,
		  infinite: true,
		  speed:2000,
		  slidesToShow: 2,
		  slidesToScroll: 1,
          autoplay: true,
          centerMode: true,
          arrows: false,
          pauseOnHover:false,
          autoplaySpeed:2500,
          responsive: [{
			  breakpoint: 1501,
			  settings: {
				  slidesToShow: 1,
                  centerMode: true
			  }
		  }]
	  });
	  $('.banner-slideshow').slick({
		  dots: false,
		  infinite: true,
		  speed:2000,
			focusOnSelect: false,
		  slidesToShow: 1,
		  slidesToScroll: 1,
          fade: true,
          pauseOnHover:false,
					pauseOnFocus: false,
          autoplay: true,
          arrows: false,
          autoplaySpeed: 5000,
          cssEase: 'linear'
	  });
       $('.responsive-x2').slick({
		  dots: false,
          arrows: true,
		  infinite: true,
		  speed:800,
		  slidesToShow: 2,
		  slidesToScroll: 1,
		  responsive: [{
			  breakpoint: 1024,
			  settings: {
				  slidesToShow: 2
			  }
		  }, {
			  breakpoint: 600,
			  settings: {
				  slidesToShow: 2
			  }
		  }, {
			  breakpoint: 480,
			  settings: {
				  slidesToShow: 1
			  }
		  }]
	  });
	  $('.responsive-x3').slick({
		  dots: false,
          arrows: true,
		  infinite: true,
		  speed:800,
		  slidesToShow: 3,
		  slidesToScroll: 1,
		  responsive: [{
			  breakpoint: 1024,
			  settings: {
				  slidesToShow: 3
			  }
		  }, {
			  breakpoint: 600,
			  settings: {
				  slidesToShow: 2
			  }
		  }, {
			  breakpoint: 480,
			  settings: {
				  slidesToShow: 1
			  }
		  }]
	  });
});
