<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php print $doctitle ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" media="screen" href="_template_style/css/styles.css">
        <link rel="stylesheet" media="screen" href="_template_style/css/customStyles.css">
        <link rel="stylesheet" media="screen" href="_template_style/css/popupFix.css">
        <link rel="stylesheet" media="print" href="_template_style/css/print.css">
        <link rel="stylesheet" media="screen" href="_template_style/css/font-awesome.css">

        <!-- JQUERY LIB -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/1.2.1/jquery-migrate.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
        <!-- JQUERY LIB -->

        <!--[if lt IE 9]>
          <script src="http://cdnjs.cloudflare.com/ajax/libs/nwmatcher/1.2.5/nwmatcher.min.js"></script>
          <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/selectivizr/1.0.2/selectivizr-min.js"></script>
         <link rel="stylesheet" href="_template_style/css/styles.css" />
        <![endif]-->

        <!--[if lte IE 8]>
         <link rel="stylesheet" href="_template_style/css/ie8.css" />
        <![endif]-->

        <script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

        <!-- SLICK -->
        <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.3.15/slick.css"/>
        <!-- SLICK -->
        <?php print $head ?>

    	</head>

        <body>
            <!--[IE 9]>
                <p class="chromeframe">Stai usando un browser <strong>non supportato</strong>. Per favore <a href="http://browsehappy.com/">aggiorna il tuo browser</a> o <a href="http://www.google.com/chromeframe/?redirect=true">attiva Google Chrome Frame</a> per far diventare pi&ugrave; potente il tuo browser.</p>
            <![endif]-->

            <!-- outer -->
            <div id="outer" class="full-screen">

               <!-- main -->
               <div id="main">

                   <!-- module-list-archive -->
                   <div class="module-list-archive mcp-module-list-archive--results-list clearfix">
                        <?php print $filters ?>
                       <!-- module-column -->
                       <section class="module-column mcp-module-column-content-search w-all-wm-xxl bw-f no-gutter last">
                           <!-- block-item-post -->
                            <?php print $content ?>
                           <!-- block-item-post -->

                       </section>
                       <!-- module-column -->

                   </div>
                   <!-- module-list-archive -->

               </div>
               <!-- main -->

            </div>
            <!-- outer -->

            <script src="js/bootstrap/v2.3.1/bootstrap.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.3.15/slick.min.js"></script>
			<script src="slick/slick-script.js"></script>
            <script src="js/_main.js"></script>

            <!-- PARALLAX -->
            <script src="js/parallax/parallax-script.js"></script>
            <!-- PARALLAX -->

            <!-- bselect -->
            <script src="js/bselect/bselect-select-script.js"></script>
            <script src="js/bselect/bselect.js"></script>
            <!-- bselect -->

            <script>
            $(document).ready(function(){
            $(function () {
                $('.js-back-top').click(function () {
                    $('body,html').animate({
                        scrollTop: 0
                    }, 800);
                    return false;
                });
            });

            //Nasconde aggiunta a carrello
            setTimeout(function(){$('#messageSuccess').toggle(500)}, 3000);

            $('#outer').height($(window).height());
            $('.bcp-block-pop-up-cart').height($(window).height());
            $('.block-my-pop-up-content').height($(window).height());
            });
            </script>
			<?php print $tail ?>
        </body>
</html>
