<?php get_header(); ?>
<?php if( have_posts() ) { ?>
  <?php while( have_posts() ) { ?>
    <?php the_post(); ?>
    <?php the_permalink()   ; ?>
    <?php the_title(); ?>
    <?php the_content(); ?>
    <br />
  <?php } ?>
<?php } else { ?>
  Sorry, no posts were found.      
<?php } ?>
<?php get_footer(); ?>
