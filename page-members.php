<?php get_header(); ?>
<div class="member-main">
  <h2 class="member-title">MEMBER</h2>
  <div class="member-intro">
  </div>
  <div class="member-wrapper">

    <ul class="member-list">
      <?php
        $memberList = new WP_Query(array("post_type" => "member", "genre" => "member", "order" => "ASC"));
        if ( $memberList->have_posts() ) : while($memberList->have_posts()): $memberList->the_post();
      ?>
      <li>
        <?php the_post_thumbnail();?>
        <p class="member-position"><?php echo get_post_meta($post->ID,'肩書',true); ?></p>
        <p class="member-name"><?php the_title(); ?></p>
        <ul class="member-meta">
        <?php
          if(get_post_meta($post->ID,'twitter',true)) {
            echo '<li><a href="https://twitter.com/'.get_post_meta($post->ID,'twitter',true).'" target="_blank" rel="noopener"><span class="member-meta-twitter"></span></a></li>';
          }
          if(get_post_meta($post->ID,'instagram',true)) {
            echo '<li><a href="https://www.instagram.com/'.get_post_meta($post->ID,'instagram',true).'" target="_blank" rel="noopener"><span class="member-meta-instagram"></span></a></li>';
          }
          if(get_post_meta($post->ID,'URL',true)) {
            echo '<li><a href="'.get_post_meta($post->ID,'URL',true).'" target="_blank" rel="noopener"><span class="member-meta-link"></span></a></li>';
          }
          ?>
        </ul>

      </li>
      <?php endwhile;endif; ?>
    </ul>

    <h2 class="member-title">PARTNER</h2>
    <ul class="member-list">
      <?php
        $partnerList = new WP_Query(array("post_type" => "member", "genre" => "partner", "order" => "ASC"));
        if ( $partnerList->have_posts() ) : while($partnerList->have_posts()): $partnerList->the_post();
      ?>
      <li>
        <?php the_post_thumbnail();?>
        <p class="member-position"><?php echo get_post_meta($post->ID,'肩書',true); ?></p>
        <p class="member-name"><?php the_title(); ?></p>

        <ul class="member-meta">
        <?php
          if(get_post_meta($post->ID,'twitter',true)) {
            echo '<li><a href="https://twitter.com/'.get_post_meta($post->ID,'twitter',true).'" target="_blank" rel="noopener"><span class="member-meta-twitter"></span></a></li>';
          }
          if(get_post_meta($post->ID,'instagram',true)) {
            echo '<li><a href="https://www.instagram.com/'.get_post_meta($post->ID,'instagram',true).'" target="_blank" rel="noopener"><span class="member-meta-instagram"></span></a></li>';
          }
          if(get_post_meta($post->ID,'URL',true)) {
            echo '<li><a href="'.get_post_meta($post->ID,'URL',true).'" target="_blank" rel="noopener"><span class="member-meta-link"></span></a></li>';
          }
          ?>
        </ul>
      </li>
      <?php endwhile;endif; ?>
    </ul>

  </div>
</div>
<?php get_footer(); ?>
