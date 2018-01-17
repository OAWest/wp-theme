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

<script src="https://unpkg.com/isotope-layout@3.0.5/dist/isotope.pkgd.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/fit-columns.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </body>
</html>