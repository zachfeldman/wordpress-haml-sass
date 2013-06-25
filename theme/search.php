<?php
/*
Template Name: Search Page
*/?>
<?php get_header(); ?>
Search results for:
<?php echo get_search_query(); ?>
<hr />
<?php require("results.php"); ?>
<?php get_footer(); ?>
