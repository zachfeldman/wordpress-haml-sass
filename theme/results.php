<?php if( have_posts() ) { ?>
  <?php while( have_posts() ) { ?>
    <?php the_post(); ?>
    <?php the_time("F jS, Y"); ?>
    <?php the_title(); ?>
    <?php the_author(); ?>
  <?php } ?>
<?php } else { ?>
  Sorry, no posts were found.
<?php } ?>
