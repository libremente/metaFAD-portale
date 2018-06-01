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
        <link rel="stylesheet" media="print" href="_template_style/css/print.css">
        <link rel="stylesheet" media="screen" href="_template_style/css/font-awesome.css">
        <link rel="stylesheet" media="screen" href="_template_style/css/customStyles.css">

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
            <div id="outer" class="full-screen parallax-layout">

                <!-- header -->
            	<header id="header" class="fixed-header clearfix">

                	<!-- content -->
                	<div class="content clearfix">

                        <!-- module-column -->
                        <div class="module-column mcp-module-header-sx bw-f w-1-3 no-gutter z-index-fix">

                            <!-- module-meta-header -->
                            <div class="module-meta-header mcp-module-meta-header clearfix">

                                <!-- block-meta-header -->
                                <div class="block-meta-header">

                                    <?php print $metanavigation ?>

                                </div>
                                <!-- block-meta-header -->

                            </div>

                        </div>
                        <!-- module-column -->

                        <!-- module-column -->
                        <div class="module-column mcp-module-header-dx bw-f w-2-3 no-gutter z-index-fix">

                            <?php print $siteLink ?>
                            <!-- module-main-search -->
                            <?php print($searchSolr);?>
                            <!-- module-main-search -->

                        </div>
                        <!-- module-column -->

                        <?php print $selectedInstitute ?>

                    </div>
                    <!-- content -->

                  <?php print $loginPopup ?>
               </header>
               <!-- header -->

               <!-- main -->
               <div id="main">

                   <!-- module-parallax -->
                   <div class="module-parallax js-anchor-step0 js-detect-window-height">

                     <!-- slider -->
                     <?php print $sliderhome ?>
                     <!-- slider -->

                        <!-- bcp-parallax-slide-controller -->
                        <div class="bcp-parallax-slide-controller">
                            <a class="js-back-top bcp-btn-slide-controller" ><span class="icon-arrowup12231"></span></a>
                            <a class="js-go-to-step1 bcp-btn-slide-controller" ><span class="icon-arrowdown12231"></span></a>
                        </div>
                        <!-- bcp-parallax-slide-controller -->
                        <!-- mcp-wrapper-gate-all-collaction -->
                          <?php print $navigateCollections ?>
                        <!-- mcp-wrapper-gate-all-collaction -->
                   </div>
                   <!-- module-parallax -->

                   <!-- module-parallax -->
                   <?php print $collections ?>
                   <!-- module-parallax -->

                   <!-- module-parallax -->
                   <?php print $newDoc ?>
                   <!-- module-parallax -->

                   <!-- module-parallax -->
                   <div class="module-parallax js-anchor-step3 gcp-bg-ct6 js-detect-window-min-height">

                       <div class="mcp-module-heading-parallax-section content-align-right padding-right">
                            <h1 class="block-title gcp-text-weight-300 gcp-super-title">I servizi</h1>
                       </div>

                       <!-- mcp-module-parallax-content -->
                       <div class="mcp-module-parallax-content clearfix">

                           <!-- module-row -->
                           <div class="module-row gutter-top-large content-align-center">

                             <?php print $serviceSection ?>

                           </div>
                           <!-- module-row -->

                       </div>
                       <!-- mcp-module-parallax-content -->

                        <!-- bcp-parallax-slide-controller -->
                        <div class="bcp-parallax-slide-controller">
                            <a class="js-go-to-step2 bcp-btn-slide-controller" ><span class="icon-arrowup12231"></span></a>
                            <a class="js-go-to-step4 bcp-btn-slide-controller" ><span class="icon-arrowdown12231"></span></a>
                        </div>
                        <!-- bcp-parallax-slide-controller -->

                   </div>
                   <!-- module-parallax -->

                   <?php print $institutesSection ?>

                   <!-- module-parallax -->

               </div>
               <!-- main -->

            </div>
            <!-- outer -->

            <!-- footer -->
            <footer id="footer" class="full-screen clearfix">
                <!-- content -->
                <div class="content clearfix">

                    <!-- block-footer -->
                    <div class="block-footer footer-info row">
											<div class="col-md-6 col-xs-12">
												<?php print $address;?>
											</div>
											<div class="col-md-3 col-xs-6 align-right-ul">
												<?php print $linkFooter;?>
											</div>
											<div class="col-md-3 col-xs-6">
												<?php print $socialFooter; ?>
											</div>
                    </div>
					<!-- block-footer -->
                </div>
                <!-- content -->
                <!-- content -->
                <div class="content clearfix">

                    <!-- block-footer -->
                    <div class="block-footer pull-left">
                        <?php print $copyright;?>
                    </div>
                    <!-- block-footer -->

                    <!-- block-footer -->
                    <div class="block-footer content-align-right pull-right">

											<ul class="footer-logo">
												<li>
													<a href="http://europa.eu/index_it.htm"><img src="_template_style/images/logo-eu.jpg" alt="Logo UE"></a>
												</li>
												<li>
													<a href="http://www.governo.it/"><img src="_template_style/images/logo-min.jpg" alt="Logo Governo"></a>
												</li>
												<li>
													<a href="http://www.regione.campania.it/"><img src="_template_style/images/logo-regione.jpg" alt="Logo Regione"></a>
												</li>
												<li>
													<a href="http://porfesr.regione.campania.it/"><img src="_template_style/images/logo-fesr.jpg" alt="Logo Fesr"></a>
												</li>
											</ul>

                    </div>
                    <!-- block-footer -->

                </div>
                <!-- content -->
            </footer>
            <!-- footer -->

            <?php print $homeNavigator ?>

            <script src="js/bootstrap/v2.3.1/bootstrap.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.3.15/slick.min.js"></script>
			<script src="slick/slick-script.js"></script>
            <script src="js/_main.js"></script>

            <!-- PARALLAX -->
            <script src="js/parallax/parallax-script.js"></script>
            <!-- PARALLAX -->

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
