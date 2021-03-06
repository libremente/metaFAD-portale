<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title><?php print $doctitle ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,600' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" media="screen" href="_template_style/css/styles.css">
        <link rel="stylesheet" media="screen" href="_template_style/css/stylesViewer.css">
        <link rel="stylesheet" media="print" href="_template_style/css/print.css">
        <link rel="stylesheet" media="screen" href="_template_style/css/font-awesome.css">
        <link rel="stylesheet" media="screen" href="_template_style/css/customStyles.css">
        <link rel="stylesheet" media="screen" href="_template_style/css/lodFix.css">

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

    	</head>

        <body>
            <!--[IE 9]>
                <p class="chromeframe">Stai usando un browser <strong>non supportato</strong>. Per favore <a href="http://browsehappy.com/">aggiorna il tuo browser</a> o <a href="http://www.google.com/chromeframe/?redirect=true">attiva Google Chrome Frame</a> per far diventare pi&ugrave; potente il tuo browser.</p>
            <![endif]-->

            <!-- outer -->
            <div id="outer" class="full-screen">

                <!-- header -->
                <header id="header" class="bg-eee clearfix init-scroll">

                	<!-- content -->
                	<div class="content clearfix">

                        <!-- module-column -->
                        <div class="module-column mcp-module-header-sx bw-f w-1-3 no-gutter">

                            <!-- module-meta-header -->
                            <div class="module-meta-header mcp-module-meta-header clearfix">

                                <!-- block-meta-header -->
                                <div class="block-meta-header">

                                    <?php print $metanavigation ?>

                                </div>
                                <!-- block-meta-header -->

                            </div>
                            <!-- module-meta-header -->

                            <!-- bcp-block-header-page-title -->
                            <div class="bcp-block-header-page-title padding-left">
                              <?php print $pageTitle ?>
                            </div>
                            <!-- bcp-block-header-page-title -->

                        </div>
                        <!-- module-column -->

                        <!-- module-column -->
                        <div class="module-column mcp-module-header-dx bw-f w-2-3 no-gutter">

                            <!-- site-link -->
                            <?php print $siteLink ?>
                            <!-- site-link -->

                            <!-- module-main-search -->
                              <?php print $searchSolr;?>
                            <!-- module-main-search -->

                        </div>
                        <!-- module-column -->

                        <!-- mcp-module-results-tool -->
                          <?php print $paginate; ?>
                        <!-- mcp-module-results-tool -->

                    </div>
                    <!-- content -->
                    <div class="backButton">
                      <?php print $backButton ?>
                    </div>
                    <?php print $loginPopup ?>
               </header>
               <!-- header -->

               <!-- main -->
               <div id="main">

                   <?php print $content; ?>

               </div>
               <!-- main -->

            </div>
            <!-- outer -->

            <script src="js/bootstrap/v2.3.1/bootstrap.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.3.15/slick.min.js"></script>
			<script src="slick/slick-script.js"></script>
            <script src="js/_main.js"></script>

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
            });
            </script>
			<?php print $tail ?>
        </body>
</html>
