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
  <a href="/wp-admin">Edit this page</a>
</footer>

<script src="<?php echo get_template_directory_uri(); ?>/js/build/vendor.bundle.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/build/main.bundle.js"></script>
  </body>
</html>