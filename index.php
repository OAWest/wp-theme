<?php
	require_once('includes/head.php'); // Include the head info
	
	// If this is the first index page, include the following
	if ( !is_paged() ) {
		require_once('includes/header.php'); // Include the header banner
		echo "<main class=\"index\">";
		require_once('includes/sidebar.php'); // Iteriate through the sticky posts
	}
	else {echo "<main class=\"index\">";}
?>
  <section class="posts">
  <header class="divider">
      <h3><span><?php echo get_bloginfo( 'name' ); ?> News</span></h3>
  </header>
    <div class="container">
      <div class="row grid" isotope-grid>
	  
		<?php
			// Iteriate through the first 10 non-sticky posts
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array(
				'post__not_in' => get_option( 'sticky_posts' ),
				'posts_per_page' => 10,
				'paged' => $paged
			);
			$wp_query = new WP_Query( $args );
			if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post();
		?>
          <div class="col-xs-12 col-sm-6 grid-item">
            <div class="panel post">
              <div class="panel-body">
                <h2>
                  <a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h2>
                <div class="post-date date">
                  <time datetime="" itemprop="datePublished">
                    <?php the_time('F jS, Y') ?> <?php edit_post_link('edit', '<a>', '</a>'); ?>
                  </time>
                </div>
                <?php the_content(__('<div class="read-more"><p class="btn btn-block btn-default">Read More</p></div>')); ?>
              </div>
            </div>
          </div>
		  
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<?php require_once('includes/footer.php'); ?>