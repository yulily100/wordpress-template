<?php get_header();

$args = array(
 'posts_per_page' => 4,
 'paged' => get_query_var('page'),
 'orderby' => 'date',
 'order' => 'DESC',
 'post_type' => 'post',
 'post_status' => 'publish'
);
$the_query = new WP_Query($args);
?>


つぼちゃん。

<?php get_footer(); ?>
