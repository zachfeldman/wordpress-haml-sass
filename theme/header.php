<!DOCTYPE html>
<html lang='en'>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
  <title>
    <?php wp_title(); ?>
  </title>
  <link href="<?php echo get_stylesheet_uri(); ?>" type="text/css" rel="stylesheet" />
  <?php wp_head(); ?>
  <script src="<?php bloginfo( 'template_directory' ); ?>/scripts/compiled.min.js"></script>
</head>
<body>
<nav>
  <ul>
    <li>
      <a href="<?php echo home_url(); ?>">Home</a>
    </li>
    <li>Another Link</li>
  </ul>
  <br />
  <br />
</nav>
