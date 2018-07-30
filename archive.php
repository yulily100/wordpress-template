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

<div class="blog-wrapper">
  <?php get_template_part("blog-header"); ?>

  <section class="blog-section">
    <ul class="blog-entry">
      <?php
      if ( $the_query->have_posts() ) :
       while ( $the_query->have_posts() ) : $the_query->the_post();
      ?>
        <li>
          <a href="<?php the_permalink();?>" class="common-blog-thumb-link">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail();?>
            <?php else : ?>
              <div class="noimage"></div>
            <?php endif; ?>
          </a>
          <span class="common-blog-category"><?php the_category(" "); ?></span><span class="common-blog-date"><?php echo get_the_date(); ?></span>
          <h3 class="common-blog-title">
            <a href="<?php the_permalink();?>" class=""><?php if(mb_strlen($post->post_title)>32) { $title= mb_substr($post->post_title,0,32) ; echo $title. … ;} else {echo $post->post_title;}?></a></h3>
        </li>
      <?php endwhile;endif; wp_reset_query();?>
    </ul>
  </div>

  <div class="blog-pager">
  <?php
    if ($the_query->max_num_pages > 1) {
      echo paginate_links(array(
      'base' => get_pagenum_link(1) . '%_%',
      'format' => 'page/%#%/',
      'current' => max(1, $paged),
      'total' => $the_query->max_num_pages,
      'prev_text'    => __('<span>＜</span>'),
    	'next_text'    => __('<span class="pager-next">＞</span>')
      ));
    }
  ?>
  </div>

  <?php wp_reset_postdata(); ?>
  </section>

</div>

<?php get_footer(); ?>
