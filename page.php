<?php get_header(); ?>
<main class="post">
    <div class="container">
      <div class="row">
	  
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            <div class="panel post">
			<?php
			if ( has_post_thumbnail() ) { // check if the post has a featured image assigned to it.
				echo "<img src=\"";
				the_post_thumbnail_url( 'medium_large' ); // 768px x 768px resolution
				echo "\" srcset=\"";
				the_post_thumbnail_url( 'medium' ); // 300px x 300px medium resolution
				echo " 300w, ";
				the_post_thumbnail_url( 'medium_large' ); // 300px x 300px medium resolution
				echo " 768w, ";
				the_post_thumbnail_url( 'full' ); // 1024px x 1024px medium resolution
				echo " 1024w\" width=\"100%\">";
			}
			?>
              <div class="panel-body">
                <h1 class="post-title" itemprop="name headline"><?php the_title(); ?></h1>
				<hr>
				<div class="post-content" itemprop="articleBody">
					<?php the_content(__('<div class="read-more"><p class="btn btn-block btn-default">Read More</p></div>')); ?>
				</div>
              </div>
			  <div class="panel-footer">
				<div class="post-date date">
				  <time datetime="<?php the_time('Y-m-d\TH:i:sP') ?>" itemprop="datePublished">
					Published <?php the_time('F jS, Y') ?>
				  </time>
				  <?php edit_post_link('edit'); ?> <br> by <?php the_author(); ?> 
				</div>
			 </div>
            </div>
          </div>
		  
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		
<?php require_once('footer.php'); ?>