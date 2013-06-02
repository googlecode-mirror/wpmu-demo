            			<?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
                        <?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
                        
                        <div class="post
                        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                        <?php }elseif (  $videoURL  ) { ?>
                        <?php }else{?>
                        no-img
                        <?php }?>
                        ">
                            <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                            <div class="frame"><img class="overlay-item-link" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'blog' ); echo $image[0];?>" width="692"  height="262" alt="<?php _e('Read More', GETTEXT_DOMAIN) ?>" rel="<?php the_permalink(); ?>"/></div>
                            <?php }elseif ( $videoURL ) { ?>
                            <div class="frame"><iframe width="700" height="386" src="<?php echo $videoURL ?>" frameborder="0" allowfullscreen></iframe></div>
                            <?php }?>
                            <div class="content">
                                <div class="date">
                                    <span class="day"><?php the_time('j'); ?></span>
                                    <span class="year"><?php the_time('Y'); ?></span>
                                    <span class="month"><?php the_time('M'); ?></span>
                                </div>
                                <?php if ( $linkURL ) { ?>
                                <div class="post-format-icon"></div>
                                <?php }elseif((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){?>
                                <div class="post-format-icon gallery"></div>
                                <?php }elseif($videoURL){?>
                                <div class="post-format-icon video"></div>
                                <?php }else{?>
                                <div class="post-format-icon pencil"></div>
                                <?php }?>
                                <?php if ( $linkURL ) { ?>
                                <h2><a href="<?php echo $linkURL; ?>"><?php the_title(); ?></a></h2>
                                <?php }else{?>
                                <h2><?php the_title(); ?></h2>
                                <?php }?>
                                <ul class="info">
                                    <li><?php _e('by', GETTEXT_DOMAIN) ?> <?php the_author_posts_link(); ?></li>
                                    <li><?php comments_popup_link(__('No Comments', GETTEXT_DOMAIN), __('1 Comment', GETTEXT_DOMAIN), __('% Comments', GETTEXT_DOMAIN)); ?></li>
                                    <li><?php _e('posted in', GETTEXT_DOMAIN) ?> 
                                    <?php
                                    $categories = wp_get_post_categories($post->ID);
                                    foreach ($categories as $category) {
                                       $cat_id .= $category. ', ';
                                    }?>
                                    <?php 
                                    $categories=get_categories('include='.$cat_id.'');
                                        foreach($categories as $category) {
                                        $results[] = '<a href="' . get_category_link( $category->term_id ) . '" title="' . sprintf(__('View all posts in %s', GETTEXT_DOMAIN), $category->name ) . '" ' . '>' . $category->name.'</a>';
                                    }
                                    echo implode(", ", $results);
                                    ?>
                                    </li>
                                </ul>
                                <div class="clear"></div>
                                <div class="tx-content">
                                    <?php if ( $linkURL ) { ?>
                                    <?php the_content(); ?>
                                    <?php }else{?>
                                    <?php the_content(__('Read more&rarr;', GETTEXT_DOMAIN)); ?>
                                    <?php }?>
                                    <div class="clear"></div>
                                    <?php edit_post_link(__('edit', GETTEXT_DOMAIN), '<span class="edit-post">[', ']</span>' ); ?>
                                </div>
                                <div class="tags">
                                    <?php the_tags('','',''); ?>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>