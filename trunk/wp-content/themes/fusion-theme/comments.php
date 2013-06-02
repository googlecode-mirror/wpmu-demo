<?php

	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', GETTEXT_DOMAIN) ?></p>
	<?php
		return;
	}

/* Comments Tree
================================================== */

	if ( have_comments() ) : ?>
    
    <div class="comment" id="comments">                        
    
    <?php if ( ! empty($comments_by_type['comment']) ) :  ?>
    
    <h3><?php comments_number(__('No Comments', GETTEXT_DOMAIN),__('One Comment', GETTEXT_DOMAIN),__('% Comments', GETTEXT_DOMAIN));?></h3>
    
    <?php wp_list_comments('type=comment&style=div&callback=comment'); ?>
    
    <?php endif; ?>
	
	</div>
	<?php

/* No comments or closed comments
================================================== */
    if ('closed' == $post->comment_status ) :  ?>
    
    <p class="nocomments"><?php _e('Comments are now closed for this article.', GETTEXT_DOMAIN) ?></p>
    
    <?php endif; ?>
    
    <?php else :  ?>
    
    <?php if ('open' == $post->comment_status) : ?>
    
    <?php else : ?>
    
    <?php if (is_single()) { ?><p class="nocomments"><?php _e('Comments are closed.', GETTEXT_DOMAIN) ?></p><?php } ?>
    
    <?php endif; ?>
            
    <?php endif;


/* Comment Form
================================================== */
    if ( comments_open() ) : ?>
    
    <?php if ( !have_comments() ) : ?>
    
    <?php endif; ?>
    
    <div class="comment-form">
    
    	<div id="respond">
            <h3><?php comment_form_title(__('Leave a Comment', GETTEXT_DOMAIN),__('Leave a Comment to %s', GETTEXT_DOMAIN) ); ?></h3>
        
        	<div class="cancel-comment-reply">
        		<?php cancel_comment_reply_link(); ?>
        	</div>
        
        	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
        	<p><?php printf( __('You must be %1$slogged in%2$s to post a comment.', GETTEXT_DOMAIN), '<a href="'.get_option('siteurl').'/wp-login.php?redirect_to='.urlencode(get_permalink()).'">', '</a>') ?></p>
        	<?php else : ?>
    
        	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="comment">
               <fieldset>
        		<?php if ( is_user_logged_in() ) : ?>
        	
        		<p><?php printf(__('Logged in as %1$s. %2$sLog out &raquo;%3$s', GETTEXT_DOMAIN), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>', '<a href="'.(function_exists('wp_logout_url') ? wp_logout_url(get_permalink()) : get_option('siteurl').'/wp-login.php?action=logout" title="').'" title="'. __('Log out of this account', GETTEXT_DOMAIN).'">', '</a>') ?></p>
        	
        		<?php else : ?>
        	
        		<p><input type="text" name="author" id="author" value="<?php if($comment_author) {echo esc_attr($comment_author);}else{?><?php _e('Name', GETTEXT_DOMAIN) ?><?php if ($req) _e("*", GETTEXT_DOMAIN); }?>" size="22" tabindex="1" /></p>
        	
        		<p><input type="text" name="email" id="email" value="<?php if($comment_author_email) {echo esc_attr($comment_author_email);}else{?><?php _e('Email', GETTEXT_DOMAIN) ?> <?php _e('(never pulished)', GETTEXT_DOMAIN); ?><?php if ($req) _e("*", GETTEXT_DOMAIN); }?>" size="22" tabindex="2" />
        	
        		<p><input type="text" name="url" id="url" value="<?php if($comment_author_url) {echo esc_attr($comment_author_url);}else{?><?php _e('Website', GETTEXT_DOMAIN); }?>" size="22" tabindex="3" />
        		
        		<?php endif; ?>
        	
        		<p><textarea name="comment" id="comment" cols="58" rows="8" tabindex="4"><?php _e('Your Commnet*', GETTEXT_DOMAIN); ?></textarea></p>
        		
        		<!--<p class="allowed-tags"><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
        	
            	<button type="submit" name="submit"><?php _e('Submit Comment', GETTEXT_DOMAIN); ?></button>
                
        		<?php comment_id_fields(); ?>
                    
        		<?php do_action('comment_form', $post->ID); ?>
               </fieldset>
        	</form>
        </div>
    
    <?php endif;?>
    </div>
    <?php endif;?>