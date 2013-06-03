<div id="comments">
<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die (__('Please do not load this page directly. Thanks!','ecobiz'));

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php echo __('This post is password protected. Enter the password to view comments.', 'ecobiz') ?></p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

	<?php if ( have_comments() ) : // if there are comments ?>
        
        <?php if ( ! empty($comments_by_type['comment']) ) : // if there are normal comments ?>
    		
    		<h4 class="comment-heading"><?php comment_form_title(__('Comment', 'ecobiz')); ?></h4>
    		
    		<ul id="listcomment">
        <?php wp_list_comments('type=comment&avatar_size=50&callback=imediapixel_comment'); ?>
        </ul>
        <?php endif; ?>
        <div class="clear"></div>
        
        <?php if ( ! empty($comments_by_type['pings']) ) : // if there are pings ?>
    		<h4 class="comment-heading"><?php echo __('Trackbacks for this post', 'ecobiz') ?></h4>
    		<ul class="pinglist">
        <?php wp_list_comments('type=pings&callback=imediapixel_list_pings'); ?>
        </ul>
        <?php endif; ?>
		    <div class="clear"></div>
        
    		<div class="navigation">
    			<div class="alignleft"><?php previous_comments_link(); ?></div>
    			<div class="alignright"><?php next_comments_link(); ?></div>
    		</div>
    		
		<?php if ('closed' == $post->comment_status ) : // if the post has comments but comments are now closed ?>
		<p class="nocomments"><?php echo __('Comments are now closed for this article.', 'ecobiz') ?></p>
		<?php endif; ?>

 		<?php else :  ?>
		
        <?php if ('open' == $post->comment_status) : // if comments are open but no comments so far ?>
        <!-- If comments are open, but there are no comments. -->

        <?php else : // if comments are closed ?>
		
		<?php if (is_single()) { ?><p class="nocomments"><?php echo __('Comments are closed.', 'ecobiz') ?></p><?php } ?>

        <?php endif; ?>
        
        
<?php endif; ?>


	<?php if ( comments_open() ) : ?>

	<div id="respond">
		<h4 class="comment-heading" style="padding-left:0;margin-left:0;"><?php comment_form_title(__('Leave a Comment', 'ecobiz')); ?></h4>
		<div class="cancel-comment-reply">
			<?php cancel_comment_reply_link(); ?>
		</div>
	
		<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p><?php printf(__('You must be %1$slogged in%2$s to post a comment.', 'ecobiz'), '<a href="'.get_option('siteurl').'/wp-login.php?redirect_to='.urlencode(get_permalink()).'">', '</a>') ?></p>
		<?php else : ?>
	 <div id="commentform">
		<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	
			<?php if ( is_user_logged_in() ) : ?>
		
			<p><?php printf(__('Logged in as %1$s. %2$sLog out &raquo;%3$s', 'ecobiz'), '<a href="'.get_option('siteurl').'/wp-admin/profile.php">'.$user_identity.'</a>', '<a href="'.(function_exists('wp_logout_url') ? wp_logout_url(get_permalink()) : get_option('siteurl').'/wp-login.php?action=logout" title="').'" title="'.__('Log out of this account', 'ecobiz').'">', '</a>') ?></p>
		
			<?php else : ?>
		
        <div class="leftcomment">
        <label><?php echo __('Name', 'ecobiz') ?> <?php if ($req) _e("(required)", 'ecobiz'); ?></label>
          <input name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" class="comment-input" />
        <label><?php echo __('Mail (will not be published)', 'ecobiz') ?> <?php if ($req) _e("(required)", 'ecobiz'); ?></label>
          <input name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" class="comment-input" />
        <label><?php echo __('Website', 'ecobiz') ?> </label>
          <input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" class="comment-input" />          
        </div>
		
			<?php endif; ?>
        <div class="rightcomment">
          <label><?php echo __('Message', 'ecobiz') ?></label>
          <textarea name="comment" id="comment"  cols="2" rows="2" tabindex="4" class="comment-textarea"></textarea>
        
			<!-- <p class="allowed-tags"><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p> -->
		
			   <p><input  name="submit" type="submit" id="submit" tabindex="5" value="Submit" class="comment-submit"/></p>
			   </div>
			<?php comment_id_fields(); ?>
			<?php do_action('comment_form', $post->ID); ?>
	
		</form>
    </div>
	</div>

	<?php endif; // If registration required and not logged in ?>

	<?php endif; // if you delete this the sky will fall on your head ?>
</div>