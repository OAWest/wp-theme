      </div>
      <div class="row">
        <div class="col-xs-12">
		  <?php bittersweet_pagination(); ?>
        </div>
      </div>
    </div>
  </section>
</main>

<footer id="footer">
  <div class="container">
    <div class="row">
        <?php clean_custom_menu("footer_menu"); ?>
    </div>
    <div class="row">
      <div class="col-xs-12 social">
		<?php echo my_social_media_icons(); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 description">
		 <?php echo get_bloginfo( 'description' ); ?>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 copyright">
        &copy; <?php echo date('Y'); ?>
      </div>
    </div>
  </div>
</footer>
<footer id="edit">
  <?php edit_post_link('Edit this page'); ?>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/js/isotope.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/fit-columns.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/imagesloaded.pkgd.min.js"></script>
  </body>
</html>
