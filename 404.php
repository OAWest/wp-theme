<?php get_header(); ?>
<main class="post">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-10 offset-sm-1">
          <div class="card post">
            <div class="card-body">
              <h1 class="post-title" itemprop="name headline">404 Error</h1>
				      <hr>
              <div class="post-content" itemprop="articleBody">
                <p>
                  Unfortunately, we cannot find the page you are looking for.<br />
                  Please press the back button on your browser, or <a href="/">click here</a> to return to the homepage.
                </p>
                <p>Here are some of our more recent posts instead:</p>
                <?php wp_get_archives( array( 'type' => 'postbypost', 'limit' => 5, 'format' => 'custom', 'before' => '', 'after' => '<br />' ) ); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<main>

<?php require_once('footer.php'); ?>
