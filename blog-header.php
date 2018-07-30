<header class="blog-header">
  <h2 class="blog-header-title"><a href="/blog"><img src="<?php echo get_template_directory_uri(); ?>/images/logo-journal.svg" alt="blog-title" width="270"></a></h2>
  <?php
  $menu = array(
    'menu_class'      => 'blog-menu',
  );
  wp_nav_menu( $menu );
  ?>
</header>
