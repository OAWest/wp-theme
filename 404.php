<?php require_once('includes/head.php'); ?>
<main class="post">
    <div class="container">
      <div class="row">
	  
          <div class="col-xs-12 col-sm-10 col-sm-offset-1">
            <div class="panel post">
              <div class="panel-body">
                <h1 class="post-title" itemprop="name headline">404 Error</h1>
				<div class="post-content" itemprop="articleBody">
					Unfortunately, we cannot find the page you are looking for.<br />
					Please press the back button on your browser, or <a href="/">click here</a> to return to the homepage.<br />
					<br />
					Here are some of our more recent posts instead:<br />
					<?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 5, 'format' => 'custom', 'before' => '', 'after' => '<br />' ) ); ?>
				</div>
              </div>
            </div>
          </div>

<?php require_once('includes/footer.php'); ?>
