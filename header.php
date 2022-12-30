<!doctype html>
<html>
  <head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Use title if it's in the page YAML frontmatter -->
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" media="screen">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>

  </head>

  <body <?php body_class(); ?>>

  <header class="header">
    <div class="wrapper">
      <h1>title</h1>
    </div>
  </header>
