<?php $post_meta = ot_get_option('blog_post_meta'); ?>
<aside class="post-meta cf">
	<ul>
		<?php if (in_array('author',(!empty($post_meta) ? $post_meta : array()))) { ?>
		<li><?php _e("by", 'bronx'); ?> <?php the_author_posts_link(); ?></li>
		<?php } ?>
		
		<?php if (in_array('date',(!empty($post_meta) ? $post_meta : array()))) { ?>
		<li><?php _e("Published", 'bronx'); ?> <time class="author" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo thb_human_time_diff_enhanced(); ?></time></li>
		<?php } ?>
		
		<?php if (in_array('comment',(!empty($post_meta) ? $post_meta : array()))) { ?>
		<li><?php comments_popup_link(__('0 Comments', 'bronx'), __('1 Comment', 'bronx'), __('% Comments', 'bronx'), 'postcommentcount', __('Comments Disabled', 'bronx')); ?></li>
		<?php } ?>
		
		<?php if (in_array('category',(!empty($post_meta) ? $post_meta : array()))) { ?>
		<?php if(has_category()) { ?>
		<li><?php the_category(', '); ?></li>
		<?php } ?>
		<?php } ?>
		
		<?php if (in_array('tag',(!empty($post_meta) ? $post_meta : array()))) { ?>
		<?php $posttags = get_the_tags();													
			if ($posttags) {
				the_tags( "<li>", ", ", "</li>" );
			} ?>
		<?php } ?>
	</ul>
</aside>