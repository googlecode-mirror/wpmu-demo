<?php
function comment($comment, $args, $depth) {

    $GLOBALS['comment'] = $comment; ?>
    <div class="comment-container">
        <div class="comment-post" <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
            <?php echo get_avatar($comment,$size='90'); ?>
            <p class="comment-author"><?php comment_author();?></p>
            <p class="comment-info">posted on <?php echo get_comment_date()?><?php edit_comment_link(__('Edit', GETTEXT_DOMAIN),'','') ?><?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?></p>
            
            <?php if ($comment->comment_approved == '0') : ?>
            <p class="comment-content"><em class="moderation"><?php _e('Your comment is awaiting moderation.', GETTEXT_DOMAIN) ?></em></p>
            <?php endif; ?>
            
            <p class="comment-content"><?php comment_text() ?></p>
            <div class="clear"></div>
        
    </div>
<?php }?>