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
        <link rel="stylesheet" media="screen" href="_template_style/css/customStyles.css">
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

        <body class="detail">
            <!--[IE 9]>
                <p class="chromeframe">Stai usando un browser <strong>non supportato</strong>. Per favore <a href="http://browsehappy.com/">aggiorna il tuo browser</a> o <a href="http://www.google.com/chromeframe/?redirect=true">attiva Google Chrome Frame</a> per far diventare pi&ugrave; potente il tuo browser.</p>
            <![endif]-->

            <!-- outer -->
            <div id="outer" class="full-screen">

                <!-- header -->
                <header id="header" class="bg-eee fixed-header clearfix init-scroll">

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
                              <?php print $searchSolr ?>
                            <!-- module-main-search -->

                        </div>
                        <!-- module-column -->

                        <!-- mcp-module-results-tool -->
                        <div class="mcp-module-results-tool clearfix">

                            <!-- module-column -->
                            <div class="module-column pull-left padding-left">
                                <div class="bcp-count-results">
                                    <?php print $searchSections ?>
                                </div>
                            </div>
                            <div class="module-column pull-right padding-right">
                              <?php print $buttons ?>
                              <?php print $showArchives ?>
                            </div>
                            <!-- module-column -->

                        </div>
                        <!-- mcp-module-results-tool -->

                    </div>
                    <!-- content -->
                    <?php print $loginPopup ?>
               </header>
               <!-- header -->

               <!-- main -->
               <div id="main" class="mcp-module-main-parallax">

                   <!-- module-list-archive -->
                   <?php print $breadcrumbs ?>
                   <div class="module-list-archive mcp-module-list-archive--results-list gcp-w-1-3-bg-F8F8F8 clearfix">
                       <?php print $filters ?>
                       <!-- module-column -->
                       <section class="module-column mcp-module-column-content-search w-all-wm-xxl bw-f no-gutter padding-top padding-left w-2-3 last padding-right">

                            <!-- mcp-module-results-tool -->
                              <?php print $paginate ?>
                            <!-- mcp-module-results-tool -->

                           <!-- block-item-post -->
                            <?php print $content ?>
                           <!-- block-item-post -->


                           <!-- module-row -->
                           <div class="module-row padding-bottom clearboth clearfix">

                               <!-- bcp-count-results -->
                                <div class="bcp-count-results pull-right">
                                    <div class="pagination paginationBottom">

                                    </div>
                                </div>
                                <script>
                                  $('.paginationBottom').html($('.pagination').first().html());
                                </script>
                                <!-- bcp-count-results -->

                           </div>
                           <!-- module-row -->

                       </section>
                       <!-- module-column -->

                   </div>
                   <!-- module-list-archive -->

               </div>
               <!-- main -->

            </div>
            <!-- outer -->

            <!-- footer -->
            <footer id="footer" class="footer-detail full-screen clearfix">
                <!-- content -->
                <div class="content clearfix">

                    <!-- block-footer -->
                    <div class="block-footer pull-left">
                        <?php print $address;?>
                    </div>
                    <!-- block-footer -->

					<!--social -->
					<?php print $socialFooter; ?>
					<!--social -->

                </div>
                <!-- content -->
                <!-- content -->
                <div class="content padding-top clearfix">

                    <!-- block-footer -->
                    <div class="block-footer pull-left">
                        <?php print $copyright;?>
                    </div>
                    <!-- block-footer -->

                    <!-- block-footer -->
                    <div class="block-footer content-align-right pull-right">

                    </div>
                    <!-- block-footer -->

                </div>
                <!-- content -->
            </footer>
            <!-- footer -->

            <script src="js/bootstrap/v2.3.1/bootstrap.min.js"></script>
            <script src="http://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.3.15/slick.min.js"></script>
			<script src="slick/slick-script.js"></script>
            <script src="js/_main.js"></script>
            <?php print $detailBox;?>
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
            });

            $(document).ready(function(){
              $('h4.block-title').each(function(){
                if($(this).html() === 'Digitale')
                {
                  $(this).siblings('ul').children('li').children('a').html('tutti i documenti');
                }
                if($(this).html() === 'Localizzazione')
                {
                  $(this).siblings('ul').first().children('li').each(function(){
                    var html = $(this).children('a').html();
                    if(html !== undefined)
                    {
                      $(this).children('a').html(subLocalication(html));
                    }
                  });
                  $(this).siblings('ul.js-collapse-box').children('li').each(function(){
                    var html = $(this).find('a').html();
                    if(html !== undefined)
                    {
                      $(this).find('a').html(subLocalication(html));
                    }
                  });
                }
              });

              $('span.bcp-field-value').each(function(){
                if($(this).html() === 'true')
                {
                  $(this).html('tutti i documenti');
                }
              });

              function subLocalication(html)
              {
                html = html.replace('cappella-del-tesoro-di-san-gennaro','Cappella del Tesoro di San Gennaro');
                html = html.replace('societa-napoletana-di-storia-patria','Società Napoletana di Storia Patria');
                html = html.replace('cappella-del-tesoro-di-san-gennaro','Cappella del tesoro di San Gennaro');
                html = html.replace('fondazione-biblioteca-benedetto-croce','Fondazione biblioteca Benedetto Croce');
                html = html.replace('pio-monte-della-misericordia','Pio Monte della Misericordia');
                html = html.replace('istituto-centrale-per-gli-archivi-(icar)','Istituto centrale per gli archivi (ICAR)');
                return html;
              }
            })
            </script>
            <script src="js/ecommerce.js"></script>

			<?php print $tail ?>
        </body>
</html>
