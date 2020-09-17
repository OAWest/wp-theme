<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(); ?></title>
  <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<nav class="navbar navbar-light navbar-expand-xl<?php echo is_admin_bar_showing() ? ' navbar-admin-space' : ''; ?>">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="/"></a>
    </div>
    <button type="button" class="navbar-toggler" data-toggle="slide-collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div id="navbar" class="navbar-collapse slide-collapse">
      <ul id="menu-header" class="navbar-nav ml-auto">
        <?php clean_custom_menu("nav_menu"); ?>
      </ul>
    </div>
    <script>
      $('[data-toggle="slide-collapse"]').on('click', function() {
        $navMenuCont = $($(this).data('target'));
        $navMenuCont.animate({
          'width': 'toggle'
        }, 350);
      });
    </script>
  </div>
</nav>