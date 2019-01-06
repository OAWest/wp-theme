<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://western.oa-bsa.org/
 *
 * @package WordPress
 * @subpackage WR
 * @since 1.0
 * @version 2.0
 */

get_header(); ?>

	<section class="posts">
	<header class="divider">
		<h3><span><?php echo get_bloginfo( 'name' ); ?> News</span></h3>
	</header>
	<div class="container">
		<div class="row grid" id="grid">
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
				<div class="card post">
					<?php
					if ( has_post_thumbnail() ) { // check if the post has a featured image assigned to it.
						echo "<a class=\"post-link\" href=\"";
						the_permalink();
						echo "\"><img src=\"";
						the_post_thumbnail_url( 'medium' ); // 300px x 300px resolution
						echo "\" srcset=\"";
						the_post_thumbnail_url( 'medium' ); // 300px x 300px medium resolution
						echo " 300w, ";
						the_post_thumbnail_url( 'large' ); // 640px x 640px medium resolution
						echo " 640w, ";
						the_post_thumbnail_url( 'full' ); // 1024px x 1024px medium resolution
						echo " 1024w\" width=\"100%\"></a>";
					}
					?>
					<div class="card-body">
						<h2>
							<a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h2>
						<div class="post-date date">
							<time datetime="" itemprop="datePublished">
								<?php the_time('F jS, Y') ?> <?php edit_post_link('edit'); ?>
							</time>
						</div>
						<?php the_content(); ?>
					</div>
				</div>
				</div>
		  
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<?php wp_footer(); ?>
