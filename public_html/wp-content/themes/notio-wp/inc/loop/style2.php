<?php $blog_header = ot_get_option('blog_header'); ?>
<?php $rand = rand(0,1000); ?>
<?php if ($blog_header) { ?>
	<div class="header_content"><?php echo do_shortcode($blog_header); ?></div>	
<?php } ?>
<div class="blog-container">
	<section class="blog-section row masonry style2" data-loadmore="#loadmore-<?php echo $rand; ?>" data-count="<?php echo get_option('posts_per_page'); ?>" data-total="<?php echo $wp_query->max_num_pages; ?>" data-type="style2">
	  	<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
		<article itemscope itemtype="http://schema.org/BlogPosting" <?php post_class('small-12 medium-6 large-3 grid-sizer item post columns style2'); ?> id="post-<?php the_ID(); ?>" role="article">
			<?php if ( has_post_thumbnail() ) { ?>
			<figure class="post-gallery">
				<a href="<?php the_permalink(); ?>"><div class="simple-overlay"></div><?php the_post_thumbnail('notio-style2'); ?></a>
			</figure>
			<?php } ?>
			<header class="post-title">
				<h2 itemprop="headline"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			</header>
			<aside class="post-meta cf">
				<ul>
					<li><?php _e("By", 'bronx'); ?> <?php the_author_posts_link(); ?></li>
					<li><time class="author" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time></li>
				</ul>
			</aside>
			
			<div class="post-content">
				<?php echo thb_excerpt(200, '...'); ?>
			</div>
			<a href="<?php the_permalink(); ?>" class="more-link"><?php _e( 'Read More', 'bronx' ); ?></a>
		</article>
	  <?php endwhile; else : ?>
	    <?php get_template_part( 'inc/loop/notfound' ); ?>
	  <?php endif; ?>
	</section>
	<a class="masonry_btn" href="#" id="loadmore-<?php echo $rand; ?>" data-type="post" data-loading="<?php _e( 'Loading Posts', 'bronx' ); ?>" data-nomore="<?php _e( 'No More Posts to Show', 'bronx' ); ?>" data-initial="<?php echo get_option('posts_per_page');?>" data-count="<?php echo get_option('posts_per_page');?>"><?php _e( 'Load More', 'bronx' ); ?></a>
</div>