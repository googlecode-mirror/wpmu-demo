                        <?php $size = "460x306"; // options: thumbnail, medium, large, full
                        $args = array(
                        'numberposts' => 9999, // change this to a specific number of images to grab
                        'offset' => 0,
                        'post_parent' => $post->ID,
                        'post_type' => 'attachment',
                        'nopaging' => false,
                        'post_mime_type' => 'image',
                        'order' => 'ASC', // change this to reverse the order
                        'orderby' => 'menu_order ID', // select which type of sorting
                        'post_status' => 'any'
                        );
                        $attachments =& get_children($args);?>
                        <?php $comments = get_post_meta($post->ID, 'comments_value', true);?>
                            
                        <div class="content" <?php if (!$attachments) {?>style="margin-bottom: 17px;"<?php }?>>
                            <?php the_content(); ?>
                            <div class="clear"></div>
                            <?php edit_post_link(__('edit', GETTEXT_DOMAIN), '<p><span class="edit-post">[', ']</span></p>' ); ?>
                            <hr />
                            <?php if ($attachments) {?>
                            <div class="portfolio-gallery">
                                <h3><?php _e('More Images', GETTEXT_DOMAIN) ?></h3>
                                <ul>
                                    <?php foreach($attachments as $attachment) {
                                    $imageTitle = $attachment->post_title;
                                    $imageDescription = $attachment->post_content;
                                    $imageArray = wp_get_attachment_image_src($attachment->ID, $size, false);
                                    $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'full', false);?>
                                    <li class="three columns"><a rel="prettyPhoto[pp_gal-1]" href="<?php echo $imageArrayFull[0] ?>" title="<?php echo $imageDescription ?>"><img class="portfolio-overlay-item-images" src="<?php echo $imageArray[0] ?>" alt="<?php _e('view image', GETTEXT_DOMAIN) ?>"/></a></li>
                                    <?php }?>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <?php }
                            unset($args);?>
                        </div>
                        <?php if(!$comments) {?>
                        <div class="comment">
                            <h3><?php _e('Leave a Comment', GETTEXT_DOMAIN) ?></h3>
                            <div class="facebook-comments">
                                <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="5" data-width="470" mobile="false"></div>
                            </div>
                            <!-- facebook comments -->
                            <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                              var js, fjs = d.getElementsByTagName(s)[0];
                              if (d.getElementById(id)) return;
                              js = d.createElement(s); js.id = id;
                              js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                              fjs.parentNode.insertBefore(js, fjs);
                            }(document, 'script', 'facebook-jssdk'));</script>
                            <!-- facebook comments END-->
                        </div>
                        <?php }?>