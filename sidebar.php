<?php
	$the_query = new WP_Query( array( 'post__in' => get_option( 'sticky_posts' ), 'posts_per_page' => 3 ) );
	if ( $the_query->have_posts() and get_option( 'sticky_posts' ) ) :
?>
<section class="highlights">
	<header class="divider">
		<h3><span>Featured Articles</span></h3>
	</header>
	<div class="container">
		<div class="row">
			<?php
				$args = [
						'post__in' => get_option('sticky_posts'),
						'post_status' => 'publish'
				];

				$bootstrapClasses = array(
					'<div class="col-xs-12 col-sm-12 col-md-8 offset-md-2 col-lg-6 offset-lg-3">',
					'<div class="col-xs-12 col-sm-6">',
					'<div class="col-xs-12 col-sm-6 col-md-4">',
				);

				$posts = new WP_Query($args);
				$sticky_count = $posts->post_count;

				// Limit to the newest 3 sticky posts
				$sticky_count = ($sticky_count > 2) ? 2 : $sticky_count;
			
				for ($i=0; ($i<$sticky_count && $the_query->have_posts()); $i++) : 
					$the_query->the_post();
					echo $bootstrapClasses[$sticky_count-1];
				?>
				<div class="card post">
					<?php get_featured_image(); ?>
					<div class="card-body text-center">
						<h2><a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
			<?php endfor;?>
		</div>
	</div>
</section>
<?php  endif; wp_reset_query(); ?>