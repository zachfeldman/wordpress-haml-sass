<?php get_header(); ?>
<?php while( have_posts() ) { ?>
  <?php the_post(); ?>
  <?php the_title(); ?>
  <?php the_content(); ?>
<?php } ?>
<?php get_footer(); ?>
