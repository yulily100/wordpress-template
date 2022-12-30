<?php get_header(); ?>

<?php

$args = array(
 'posts_per_page' => 16,
 'paged' => get_query_var('page'),
 'orderby' => 'date',
 'order' => 'DESC',
 'post_type' => 'post',
 'post_status' => 'publish'
);
$the_query = new WP_Query($args);
?>

<div class="wrapper">

  <p class="">category:<?php single_cat_title(); ?></p>
  <section class="">
    <ul class="">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <li>
          <a href="<?php the_permalink();?>" class="">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail();?>
            <?php else : ?>
              <div class="noimage"></div>
            <?php endif; ?>
          </a>
          <span class=""><?php the_category(" "); ?></span><span class=""><?php echo get_the_date(); ?></span>
          <h3 class="">
            <a href="<?php the_permalink();?>" class=""><?php if(mb_strlen($post->post_title)>32) { $title= mb_substr($post->post_title,0,32) ; echo $title. … ;} else {echo $post->post_title;}?></a></h3>
        </li>
      <?php endwhile;endif; wp_reset_query();?>
    </ul>
  </div>

  <div class="">
    <?php echo paginate_links(array(
      'prev_text'    => '<span>＜</span>',
      'next_text'    => '<span class="pager-next">＞</span>'
    )) ?>
  </div>

  <?php wp_reset_postdata(); ?>
  </section>

</div>

<?php get_footer(); ?>
