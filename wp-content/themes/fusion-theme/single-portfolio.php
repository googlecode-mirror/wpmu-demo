<?php get_header(); ?>
        <?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
        <?php $details = get_post_meta($post->ID, 'details_value', true);?>
        <?php $terms = get_the_terms( get_the_ID(), 'portfolio_tags' ); ?>
        <?php $share = get_post_meta($post->ID, 'share_value', true);?>
        <div id="main_wrap">
            <div id="title">
                <div class="container">
            		<div class="sixteen columns">
            			<span class="wrap"><?php echo the_breadcrumb()?></span>
            		</div>
                </div><!-- container -->
            </div>
            <div id="main">
                <div class="container">
                    <?php if (  $videoURL  ) { ?>
                    <div class="sixteen columns">
                        <div class="frame">
                            <iframe width="932" height="528" src="<?php echo $videoURL; ?>?rel=0&amp;autohide=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe> 
                        </div>
                    </div>
                    <?php }elseif (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                    <div class="sixteen columns">
                        <div class="frame"><?php the_post_thumbnail('full-width-page'); ?></div>
                    </div>
                    <?php }?>
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="two-thirds column portfolio-post main-content">
                        <?php get_template_part('includes/single-portfolio-post' ) ?>
                    </div>
                    <?php endwhile; else: ?>
                    <div class="two-thirds column portfolio-post main-content">
                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN); ?></p>
                    </div>
                    <?php endif; ?>
            		<div class="one-third column sidebar">
                        <?php get_sidebar(); ?>
                        <?php if($details || $terms || !$share){ ?>
                        <div class="portfolio-details">
                            <ul>
                                <?php
                                $separator1 = "\n";
                                $separator2 = "||";
                                $array = explode($separator1,$details);
                                $output = ''; // initialize the variable
                                if($details){
                                    foreach ($array as $item) {
                                        list($item_text1, $item_text2) = explode($separator2, trim($item));
                                        $output .= '<li><strong>' . $item_text1 . ':</strong> ' . $item_text2 . '</li>';
                                    }
                                    echo $output;
                                }
                                ?>
                                <?php if($terms){?>
                                <li class="tags">
                                    <?php if($terms) : foreach ($terms as $term) { ?>
                                        <?php echo '<a href="'.get_term_link($term->slug, 'portfolio_tags').'">'.$term->name.'</a>'?>
                                    <?php } endif;?>
                                    <div class="clear"></div>
                                </li>
                                <?php }?>
                                <?php if(!$share){?>
                                <li class="share"><strong><?php _e('Share:', GETTEXT_DOMAIN); ?></strong>
                                    <ul>
                                        <li><iframe src="//www.facebook.com/plugins/like.php?href=<?php the_permalink(the_id()); ?>&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=false&amp;action=like&amp;colorscheme=light&amp;font&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150; height:21px;" allowTransparency="true"></iframe></li>
                                        <li>
                                            <!-- Place this tag where you want the +1 button to render -->
                                            <div class="g-plusone" data-size="medium" data-annotation="none" data-href="<?php the_permalink(the_id()); ?>"></div>
                                            <!-- Place this render call where appropriate -->
                                            <script type="text/javascript">
                                              (function() {
                                                var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
                                                po.src = 'https://apis.google.com/js/plusone.js';
                                                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
                                              })();
                                            </script>
                                        </li>
                                    </ul>
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                        <?php } ?>
            		</div>
                </div><!-- container -->
            </div>
        </div>
        
<?php get_footer(); ?>