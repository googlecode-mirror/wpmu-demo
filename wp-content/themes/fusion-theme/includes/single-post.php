                        <?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
                        <?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
                        
                        
                        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                        <div class="frame"><?php the_post_thumbnail('blog'); ?></div>
                        <?php }elseif ( $videoURL ) { ?>
                        <div class="frame"><iframe width="700" height="386" src="<?php echo $videoURL ?>" frameborder="0" allowfullscreen></iframe></div>
                        <?php }?>
                        <div class="content
                        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                        <?php }elseif (  $videoURL  ) { ?>
                        <?php }else{?>
                        no-img
                        <?php }?>
                        <?php if(get_the_tags()){ ?><?php }else{?>no-tags<?php } ?>
                        ">
                            <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) || $videoURL ) { ?>
                            <div class="date">
                                <span class="day"><?php the_time('j'); ?></span>
                                <span class="year"><?php the_time('Y'); ?></span>
                                <span class="month"><?php the_time('M'); ?></span>
                            </div>
                            <?php }?>
                            <ul class="info">
                            <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                            <?php }else{?>
                            <li class="alpha"><a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><?php the_time('F j, Y'); ?></a></li>
                            <?php }?>
                                <li><?php _e('by', GETTEXT_DOMAIN) ?> <?php the_author_posts_link(); ?></li>
                                <li><?php comments_popup_link(__('No Comments', GETTEXT_DOMAIN),__('1 Comment', GETTEXT_DOMAIN),__('% Comments', GETTEXT_DOMAIN)); ?></li>
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
                            <?php if(get_the_tags()){ ?>
                            <div class="three columns alpha tags">
                                <p><?php _e('Tags:', GETTEXT_DOMAIN) ?></p>
                                <?php the_tags('','<br />',''); ?>
                            </div>
                            <?php } ?>
                            <div class="<?php if(get_the_tags()){ ?>nine<?php }else{?>twelve alpha<?php } ?> columns omega">
                                <?php the_content(__('Read more&rarr;', GETTEXT_DOMAIN)); ?>
                                <div class="clear"></div>
                                <?php edit_post_link(__('edit', GETTEXT_DOMAIN), '<span class="edit-post">[', ']</span>' ); ?>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php comments_template('', true); ?>