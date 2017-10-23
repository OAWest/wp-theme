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
			 $myCount = 1; //Limit to the newest 3 sticky posts
			 while ( $the_query->have_posts() && $myCount <= 3) : $the_query->the_post();
			 $myCount = $myCount + 1;
			  ?>
				<div class="col-xs-12 col-sm-4">
				  <div class="well">
					<h2><a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<div class="post-date date">
						<time datetime="" itemprop="datePublished">
							<?php the_time('F jS, Y') ?> <?php edit_post_link('edit', '<a>', '</a>'); ?>
						</time>
					 </div>
					<?php the_content(__('<div class="read-more"><p class="btn btn-block btn-default">Read More</p></div>')); ?>
				  </div>
				</div>
				
		<?php endwhile;?>
      </div>
    </div>
  </section>
<?php  endif; wp_reset_query(); ?>