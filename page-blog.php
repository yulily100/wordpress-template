<?php get_header(); ?>

<?php
$args_pickup = array(
 'posts_per_page' => 3,
 'orderby' => 'post_date',
 'order' => 'DESC',
 'post_type' => 'post',
 'post_status' => 'publish',
 'category_name' => 'pickup'
);
$the_query_pickup = new WP_Query($args_pickup);


$args = array(
 'posts_per_page' => 16,
 'paged' => get_query_var('paged'),
 'orderby' => 'date',
 'order' => 'DESC',
 'post_type' => 'post',
 'post_status' => 'publish'
);
$the_query = new WP_Query($args);
?>

<div class="">

  <section class="">
    <ul class="">
      <?php
      if ( $the_query_pickup->have_posts() ) :
       while ( $the_query_pickup->have_posts() ) : $the_query_pickup->the_post();
      ?>
      <li>
        <a href="<?php the_permalink();?>" class="">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail();?>
          <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/noimage-rect.png" alt="no image">
          <?php endif; ?>
        </a>
        <span class=""><?php the_category(" "); ?></span><span class=""><?php echo get_the_date(); ?></span>
        <h3 class="">
          <a href="<?php the_permalink();?>" class=""><?php if(mb_strlen($post->post_title)>35) { $title= mb_substr($post->post_title,0,35) ; echo $title. … ;} else {echo $post->post_title;}?></a></h3>
      </li>
      <?php endwhile;endif; wp_reset_query();?>
    </ul>
  </section>
  <section class="">
    <h2 class="">CONTENTS</h2>
    <ul class="">
      <?php
      if ( $the_query->have_posts() ) :
       while ( $the_query->have_posts() ) : $the_query->the_post();
      ?>
        <li>
          <a href="<?php the_permalink();?>" class="">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail();?>
            <?php else : ?>
              <img src="<?php echo get_template_directory_uri(); ?>/images/noimage-rect.png" alt="no image">
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
  <?php
    if ($the_query->max_num_pages > 1) {
      echo paginate_links(array(
      'base' => get_pagenum_link(1) . '%_%',
      'format' => 'page/%#%/',
      'current' => max(1, $paged),
      'total' => $the_query->max_num_pages,
      'prev_text'    => '<span>＜</span>',
    	'next_text'    => '<span class="pager-next">＞</span>'
      ));
    }
  ?>
  </div>

  <?php wp_reset_postdata(); ?>
  </section>

</div>

<?php get_footer(); ?>
