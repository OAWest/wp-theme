<?php
/* Template Name: Section */
	get_header();
	remove_filter( ‘the_content’, ‘wpautop’ );
	remove_filter( ‘the_excerpt’, ‘wpautop’ );
?>
<main class="post">
    <div class="container">
      <div class="row">
	  
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            <div class="panel post">
						<?php 
						$file = strip_tags(get_the_title());
						if((strlen($file) == 12) && (substr($file, 0, 10) == "Section W-")){
							$file = substr($file, 10, 12);
							echo file_get_contents("http://western.oa-bsa.org/includes/sections/$file.php");
						}
						else echo "<h1>$file Not Found</h1>";
						the_content(__('<div class="read-more"><p class="btn btn-block btn-default">Read More</p></div>'));?>
						
					</div>
				</div>
			</div>
		  </div>
		</div>
	</div>
		  
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		
<?php require_once('footer.php'); ?>