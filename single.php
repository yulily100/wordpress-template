<?php
get_header();
$thumbnail_id =  get_post_thumbnail_id($id);
?>

<div class="">
  <?php get_template_part("blog-header"); ?>

  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <div class="single-eyecatch">
    <?php the_post_thumbnail('entry-image');?>
  </div>

  <div class="">
    <p class="">
      <span class=""><?php the_category(" "); ?></span><?php echo get_the_date(); ?>
    </p>
    <h1 class=""><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h1>

    <div class="">
      <?php the_content(); ?>
    </div>

    <div class="">
      <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php echo get_the_title(); ?>" class="btn-share twitter" target="_blank" rel="noopener">Tweet</a>
      <a href="http://www.facebook.com/share.php?u=<?php the_permalink(); ?>&t=<?php echo get_the_title(); ?>" class="btn-share facebook" target="_blank" rel="noopener">Share</a>
    </div>


    <?php
      endwhile;
      endif;
    ?>
  </div>

  <div class="">
    <?php
    $args = array(
      'posts_per_page' => 4
    );
    $the_query = new WP_Query( $args );
    ?>
    <?php if ( $the_query->have_posts() ) : ?>
      <ul class="">
    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <li>
        <a href="<?php the_permalink() ?>"><?php the_post_thumbnail();?></a>
        <span class=""><?php the_category(" "); ?></span><span class=""><?php echo get_the_date(); ?></span></p>
        <h3 class=""><a href="<?php the_permalink() ?>"><?php if(mb_strlen($post->post_title)>32) { $title= mb_substr($post->post_title,0,32) ; echo $title. … ;} else {echo $post->post_title;}?></a></h3>
      </li>
    <?php endwhile; ?>
      </ul>
    <?php endif; wp_reset_postdata(); ?>
  </div>
</div>
<?php get_footer(); ?>
