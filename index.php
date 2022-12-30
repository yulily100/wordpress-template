<?php get_header();?>

<div class="wrapper">
	<ul class="">
		<?php
		$args = array(
			'posts_per_page' => 8,
			'paged' => get_query_var('paged'),
			'orderby' => 'date',
			'order' => 'DESC',
			'post_type' => 'post',
			'post_status' => 'publish'
		);
		$post_query = new WP_Query( $args );
		?>

		<?php if ( $post_query->have_posts()) :
			while ( $post_query->have_posts()) : $post_query->the_post();
			$image_id = get_post_thumbnail_id(); ?>
		<li>
			<a href="<?php the_permalink(); ?>" class="">
				<?php the_post_thumbnail('thumbnail'); ?>
			</a>
			<span class="">
				<span class=""><?php the_category(); ?></span>
				<span class=""><?php echo get_the_date(); ?></span>
			</span>
			<h2 class=""><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
		</li>
		<?php endwhile;endif; wp_reset_query();?>
	</ul>
</div>
<?php get_footer(); ?>
