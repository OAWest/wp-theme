<?php
/* Template Name: Leadership */
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
			
			<section class="key-three">
				  <div class="row">
					<div class="col-xs-12 col-sm-4">
							<a href="chief">
						  <h2 class="text-center">Manué Lopez</h2>
							<h3 class="text-center">2017 Region Chief</h3>
							</a>
							<p class="text-center">The region chief is the youth leader of the region elected by the section chiefs from that region at the national planning meeting. He must be under 21 years of age during the entire term of office and will serve until a successor is elected. The election is held following the election of the national chief and national vice chief.</p>
					  <a href="chief" class="btn btn-default btn-block visible-xs-block">Meet the Chief</a>
					</div>
					<div class="col-xs-12 col-sm-4">
							<a href="region-chairman">
						  <h2 class="text-center">Gary Christiansen</h2>
							<h3 class="text-center">Region Chairman</h3>
							</a>
							<p class="text-center">The volunteer leader in the region is the region Order of the Arrow chairman. Appointed annually by the region director, they are responsible for administering and monitoring the program regionally, with a special emphasis placed on their role as adviser to the region chief.</p>
					  <a href="region-chairman" class="btn btn-default btn-block visible-xs-block">Meet the Chairman</a>
					</div>
					<div class="col-xs-12 col-sm-4">
					  <a href="region-staff-adviser">
								<h2 class="text-center">Wendy Kurten</h2>
							<h3 class="text-center">Region Staff Adviser</h3>
					  </a>
							<p class="text-center">The region staff adviser is appointed by the region director. They represent the region director in all Order of the Arrow operations within the region. Their duties include regular communication and counsel with the region chairman and region chief.</p>
					  <a href="region-staff-adviser" class="btn btn-default btn-block visible-xs-block">Meet the Staff Adviser</a>
					</div>
				  </div>
				  <div class="row hidden-xs">
					<div class="col-xs-12 col-sm-4">
					  <a href="chief" class="btn btn-default btn-block">Meet the Chief</a>
					</div>
					<div class="col-xs-12 col-sm-4">
					  <a href="region-chairman" class="btn btn-default btn-block">Meet the Chairman</a>
					</div>
					<div class="col-xs-12 col-sm-4">
					  <a href="region-staff-adviser" class="btn btn-default btn-block">Meet the Staff Adviser</a>
					</div>
				  </div>
				</section>
			
              <div class="panel-body">
				<div class="post-content" itemprop="articleBody">

					<?php echo file_get_contents('http://western.oa-bsa.org/includes/sectionleadership.php'); ?>

				
				<hr>
				<h2>Region Committees</h2>
				<div class="panel panel-default">
					<ul class="list-group">
						<a class="list-group-item" href="/leadership/administration/"><i class="fa fa-chevron-right"></i> Administration</a>
						<a class="list-group-item" href="/leadership/awards-and-recognition/"><i class="fa fa-chevron-right"></i> Awards &amp; Recognition</a>
						<a class="list-group-item" href="/leadership/camping-promotions/"><i class="fa fa-chevron-right"></i> Camping Promotions</a>
						<a class="list-group-item" href="/leadership/communications/"><i class="fa fa-chevron-right"></i> Communications</a>
						<a class="list-group-item" href="/leadership/cub-scout-camping/"><i class="fa fa-chevron-right"></i> Cub Scout Camping</a>
						<a class="list-group-item" href="/leadership/finance/"><i class="fa fa-chevron-right"></i> Finance</a>
						<a class="list-group-item" href="/leadership/marketing-and-trading-post/"><i class="fa fa-chevron-right"></i> Marketing &amp; Trading Post</a>
						<a class="list-group-item" href="/leadership/oa-high-adventure/"><i class="fa fa-chevron-right"></i> OA High Adventure</a>
						<a class="list-group-item" href="/leadership/training/"><i class="fa fa-chevron-right"></i> Training</a>
					</ul>
				</div>

				<hr>
				<h2>Area Chairmen</h2>
				<div class="panel panel-default">
					<ul class="list-group">
						<li class="list-group-item">
							Area 1:	Dan Hunker<br>
							Council Lodge Relations
						</li>
						<li class="list-group-item">
							Area 2:	Bill Topkis<br>
							SURGE
						</li>
						<li class="list-group-item">
							Area 3: Larry Frith<br>
							JTE
						</li>
						<li class="list-group-item">
							Area 4: Ed Cadena<br>
							Camp Promotions
						</li>
						<li class="list-group-item">
							Area 6: Tim Malaney<br>
							NOAC
						</li>
					</ul>
				</div>

				<hr>

				<h2>National Committee</h2>
				<div class="row national-committee">
					<div class="col-xs-12 col-sm-6">
						<div class="panel panel-default">
							<ul class="list-group">
								<li class="list-group-item">Glenn Ault</li>
								<li class="list-group-item">Mike Bliss</li>
								<li class="list-group-item">Steve Bradley</li>
								<li class="list-group-item">Toby Capps</li>
								<li class="list-group-item">Steve Gaines</li>
								<li class="list-group-item">Jack Hess</li>
								<li class="list-group-item">Mike Hoffman</li>
								<li class="list-group-item">Del Loder</li>
								<li class="list-group-item">Terrel Miller</li>
								<li class="list-group-item">Steve Silbiger</li>
								<li class="list-group-item">Clint Takeshita</li>
								<li class="list-group-item">Bill Topkis</li>
							</ul>
						</div>
					</div>
				</div>

				<hr>

				<h2>Officer History</h2>
				<p>The Western Region has a long history of exceptional youth and adult leaders.</p>
				<a href="history"class="btn btn-default">View Officer History</a>

				
				
					<?php the_content(__('<div class="read-more"><p class="btn btn-block btn-default">Read More</p></div>'));
					
					?>
				</div>
              </div>
			  <div class="panel-footer">
				<div class="post-date date">
				  <time datetime="<?php the_time('Y-m-d\TH:i:sP') ?>" itemprop="datePublished">
					Published <?php the_time('F jS, Y') ?>
				  </time>
				  <?php edit_post_link('edit', '<a>', '</a>'); ?> <br> by <?php the_author(); ?> 
				</div>
			 </div>
            </div>
          </div>
		  
		<?php endwhile; else: ?>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
		
<?php require_once('footer.php'); ?>