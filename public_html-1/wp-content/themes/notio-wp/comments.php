<?php
/*-----------------------------------------------------------------------------------*/
/*  Begin processing our comments
/*-----------------------------------------------------------------------------------*/
?>
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e("This post is password protected. Enter the password to view any comments.", 'bronx'); ?></p>
			</div><!-- #comments -->
<?php
	return;
	endif;
?>
<?php if ( have_comments() ) : ?>
	<div class="commentlist_container">
		<div class="row">
			<div class="small-12 medium-10 large-8 medium-centered columns">
				<h4 id="comment-title"><?php comments_number(__('0 Comments', 'bronx'), __('1 Comments', 'bronx'), __('% Comments', 'bronx') ); ?></h4>
				<div class="text-center"><a href="#reply-title"><?php _e('LEAVE A REPLY', 'bronx'); ?></a></div>
				<ol class="commentlist">
					<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
				</ol>

				<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
					<div class="navigation">
						<div class="nav-previous"><?php previous_comments_link(); ?></div>
						<div class="nav-next"><?php next_comments_link(); ?></div>
					</div><!-- .navigation -->
				<?php } ?>
				<?php if ( ! empty($comments_by_type['pings']) ) { ?>
					<h4 id="comment-title"><?php _e("Trackbacks/Pingbacks", 'bronx'); ?></h4>
					<ol class="pingslist">
					  <?php wp_list_comments('type=pings&callback=list_pings'); ?>
					</ol>
				<?php } ?>
			</div>
		</div>
	</div>
<?php else : 
	if ( ! comments_open() ) :
?>
	<p class="nocomments"><?php _e("Comments are closed", 'bronx'); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<div class="row">
	<div class="small-12 medium-10 large-8 medium-centered columns">
<?php
	// Comment Form
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	$aria_req = ( $req ? ' aria-required="true" data-required="true"' : '' );
	
	$defaults = array( 'fields' => apply_filters( 'comment_form_default_fields', array(
	
		'author' => '<div class="row"><div class="small-12 medium-6 columns"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' class="placeholder" placeholder="' . __( 'Name', 'bronx' ) . '"/></div>',
		
		'email'  => '<div class="small-12 medium-6 columns"><input id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' class="placeholder" placeholder="' . __( 'Email', 'bronx' ) . '" /></div>',
		
		'url'    => '<div class="small-12 columns"><input name="url" size="30" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" type="text" class="placeholder" placeholder="' . __( 'Website', 'bronx' ) . '"/></div></div>' ) ),
		
		'comment_field' => '<div class="row"><div class="small-12 columns"><textarea name="comment" id="comment"' . $aria_req . ' rows="10" cols="58" class="placeholder" placeholder="' . __( 'Your Comment', 'bronx' ) . '"></textarea></div></div>',
		
		'must_log_in' => '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.', 'bronx' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
		'logged_in_as' => '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>', 'bronx' ), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		
		'comment_notes_before' => '',
		'comment_notes_after' => '',
		'id_form' => 'form-comment',
		'id_submit' => 'submit',
		'title_reply' => __( 'Leave a Reply', 'bronx' ),
		'title_reply_to' => __( 'Leave a Reply to %s', 'bronx' ),
		'cancel_reply_link' => __( 'Cancel reply', 'bronx' ),
		'label_submit' => __( 'Submit Comment', 'bronx' ),
	); 
comment_form($defaults); 

?>
	</div>
</div>