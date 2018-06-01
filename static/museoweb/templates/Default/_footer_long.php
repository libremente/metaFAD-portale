<div class="u-background-95 u-hiddenPrint">
    <div class="u-layout-wide u-layoutCenter u-layout-r-withGutter">
        <footer class="Footer u-background-95">

  <div class="Grid Grid--withGutter">

    <div class="Footer-block Grid-cell u-md-size1of4 u-lg-size2of4">
      <?php print $address ?>
      <div class="Footer-subBlock">
        <?php if ($footerLogo) {
          foreach($footerLogo as $item) {
            echo '<p>'.$item.'</p>';
          }
        } ?>
      </div>
      <small>
        <?php print $copyright ?>
      </small>
    </div>

    <div class="Footer-block Grid-cell u-md-size1of4 u-lg-size1of4">
      <div class="Footer-subBlock">
      </div>
    </div>

    <div class="Footer-block Grid-cell u-md-size1of4 u-lg-size1of4">
      <div class="Footer-subBlock">
        <h3 class="Footer-subTitle">Seguici su</h3>
        <ul class="Footer-socialIcons">
          <?php if ($facebook) { ?>
          <li><a href="<?php print $facebook;?>" rel="external"><span class="Icon Icon-facebook"></span><span class="u-hiddenVisually">Facebook</span></a></li>
          <?php } ?>
          <?php if ($twitter) { ?>
          <li><a href="<?php print $twitter;?>" rel="external"><span class="Icon Icon-twitter"></span><span class="u-hiddenVisually">Twitter</span></a></li>
          <?php } ?>
          <?php if ($instagram) { ?>
          <li><a href="<?php print $instagram;?>" rel="external"><span class="Icon Icon-instagram"></span><span class="u-hiddenVisually">Instagram</span></a></li>
          <?php } ?>
          <?php if ($youtube) { ?>
          <li><a href="<?php print $youtube;?>" rel="external"><span class="Icon Icon-youtube"></span><span class="u-hiddenVisually">Youtube</span></a></li>
          <?php } ?>
        </ul>
      </div>
    </div>

  </div>

</footer>

    </div>
</div>

<a href="#" title="torna all'inizio del contenuto" class="ScrollTop js-scrollTop js-scrollTo">
  <i class="ScrollTop-icon Icon-collapse" aria-hidden="true"></i>
  <span class="u-hiddenVisually">torna all'inizio del contenuto</span>
</a>


<script>__PUBLIC_PATH__ = 'static/museoweb/templates/Default/ita-web-toolkit/build/'</script>

<?php print $tail ?>

</body>
</html>
