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
				<div class="panel post">
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
				  <div class="panel-body">
					<center>
					<h2><a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_content(__('<div class="read-more"><p class="btn btn-block btn-default">Read More</p></div>')); ?>
					</center>
				  </div>
				</div>
			  </div>
			  
			  <!--
				<div class="col-xs-12 col-sm-4">
				  <div class="well">
				    <center>
					<h2><a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<?php the_content(__('<div class="read-more"><p class="btn btn-block btn-default">Read More</p></div>')); ?>
					</center>
				  </div>
				</div>
				-->
		<?php endwhile;?>
      </div>
    </div>
  </section>
<?php  endif; wp_reset_query(); ?>