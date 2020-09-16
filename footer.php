      </div>
      <div class="row">
        <div class="col-12">
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
          <div class="col-12 social">
        <?php echo my_social_media_icons(); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-12 description">
        <?php echo get_bloginfo( 'description' ); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-12 copyright">
            &copy; <?php echo date('Y'); ?>
          </div>
        </div>
      </div>
    </footer>
  </body>
</html>
