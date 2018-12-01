<section class="blog-section style4">
	<?php $i = 0;?>
  	<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('post row no-padding style4'); ?> id="post-<?php the_ID(); ?>" role="article">
			<div class="small-12 medium-6<?php if ($i % 2 != 0) { echo ' medium-push-6'; } ?> columns ">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php
					    $image_id = get_post_thumbnail_id();
					    $image = wp_get_attachment_image_src($image_id,'notio-style4');
					?>
				<figure class="post-gallery full-height-content" style="background-image: url('<?php echo $image[0]; ?>');">
					<div class="simple-overlay"></div>
				</figure>
				<?php } ?>
			</div>
			<div class="small-12 medium-6<?php if ($i % 2 != 0) { echo ' medium-pull-6'; } ?> columns full-height-content">
				<div class="table full-height-content">
					<div>
						<div class="inner-padding">
							<header class="post-title">
								<h2 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
							</header>
							<?php get_template_part( 'inc/postformats/post-meta' ); ?>
							
							<div class="post-content">
								<?php echo thb_excerpt(400, '...'); ?>
							</div>
							<a href="<?php the_permalink(); ?>" class="more-link"><?php _e( 'Read More', 'bronx' ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</article>
	<?php $i++; endwhile; else : ?>
		<?php get_template_part( 'inc/loop/notfound' ); ?>
	<?php endif; ?>
</section>
<?php if ( get_next_posts_link() || get_previous_posts_link()) { ?>
<div class="blog_nav row no-padding">
	<?php if ( get_next_posts_link() ) : ?>
		<a href="<?php echo next_posts(); ?>" class="next"><?php _e( 'Older', 'bronx' ); ?></a>
	<?php endif; ?>

	<?php if ( get_previous_posts_link() ) : ?>
		<a href="<?php echo previous_posts(); ?>" class="prev"><?php _e( 'Newer', 'bronx' ); ?></a>
	<?php endif; ?>
</div>
<?php } ?>