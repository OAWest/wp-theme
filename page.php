<?php get_header(); ?>
<main class="post">
	<div class="container">
		<div class="row">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="col-xs-12 col-sm-10 offset-sm-1">
					<div class="card post">
						<?php get_featured_image(); ?>
						<div class="card-body">
							<h1 class="post-title" itemprop="name headline"><?php the_title(); ?></h1>
							<hr>
							<div class="post-content" itemprop="articleBody">
								<?php the_content(); ?>
							</div>
						</div>
						<div class="card-footer">
							<div class="post-date date">
								<time datetime="<?php the_time('Y-m-d\TH:i:sP') ?>" itemprop="datePublished">
									Published <?php the_time('F jS, Y') ?>
								</time>
								<?php
									if(is_user_logged_in()){
										echo edit_post_link('edit').'<br> by '.get_the_author();
									}
								?>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; else: ?>
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>