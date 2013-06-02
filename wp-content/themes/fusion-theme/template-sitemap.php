<?php
/*
Template Name: Sitemap Template
*/
?>
<?php get_header(); ?>

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
                    <div class="twelve columns sitemap right">
                        <h4><?php _e('Latest Blog Posts', GETTEXT_DOMAIN) ?></h4>
                        <ul class="_sitemap">
                            <?php $query = new WP_Query();?>
                            <?php $query->query('posts_per_page=15&ignore_sticky_posts=1');?>
                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endwhile; endif; ?> 
                            <?php wp_reset_query(); ?> 
                        </ul>
                        <div class="twelve alpha omega">
                            <div class="navi_carousel">
                                <div class="pager-sitemap"></div>
                                <div class="clear"></div>
                            </div> 
                 			<div class="list_carousel-sitemap">
                				<ul class="list_items-sitemap">
                                    <?php $query = new WP_Query();?>
                                    <?php $query->query('post_type=portfolio&posts_per_page=-1&ignore_sticky_posts=1');?>
                                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                    <?php $lightbox = get_post_meta($post->ID, 'lightbox_value', true);?>
                                    <?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
                                    <?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
                                        <li class="four columns item">
                                        <?php if ( $lightbox) { ?>
                                        <div class="img">
                                            <a rel="prettyPhoto[pp_gal-<?php echo $post->ID ?>]" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $image[0];?>">
                                                <img class="home-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '420x207' ); echo $image[0];?>" width="220" height="108" alt="<?php _e('view more', GETTEXT_DOMAIN) ?>"/>
                                            </a>
                                        </div>
                                        <?php $thumbnail_id = get_post_thumbnail_id( $post->ID )?>
                                        <?php $args = array(
                                        'numberposts' => 9999, // change this to a specific number of images to grab
                                        'offset' => 0,
                                        'post_parent' => $post->ID,
                                        'post_type' => 'attachment',
                                        'exclude'  => $thumbnail_id,
                                        'nopaging' => false,
                                        'post_mime_type' => 'image',
                                        'order' => 'ASC', // change this to reverse the order
                                        'orderby' => 'menu_order ID', // select which type of sorting
                                        'post_status' => 'any'
                                        );
                                        $attachments =& get_children($args);?>
                                        <?php foreach($attachments as $attachment) {
                                            $imageTitle = $attachment->post_title;
                                            $imageDescription = $attachment->post_content;
                                            $imageArrayFull = wp_get_attachment_image_src($attachment->ID, 'full', false);?>
                                            <a class="hide" rel="prettyPhoto[pp_gal-<?php echo $post->ID ?>]" href="<?php echo $imageArrayFull[0] ?>" title="<?php echo $imageDescription ?>"></a>
                                        <?php }?>
                                        <?php } elseif ( $linkURL ) { ?>
                                            <div class="img"><img class="home-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '420x207' ); echo $image[0];?>" width="220" height="108"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php echo $linkURL; ?>"/></div>
                                        <?php } elseif ( $videoURL ) { ?>
                                            <div class="vimeoOrYoutube">
                                                <iframe width="220" height="108" src="<?php echo $videoURL ?>?rel=0&amp;autohide=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        <?php } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                            <div class="img"><img class="home-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '420x207' ); echo $image[0];?>" width="220" height="108"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php the_permalink(); ?>"/></div>
                                        <?php }?>
                                            <div class="info">
                                                <?php if ( $videoURL ) { ?>
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                <?php }else { ?>
                                                    <h4><?php the_title(); ?></h4>
                                                <?php }?>
                                                <p><?php echo excerpt(8); ?></p>
                                            </div>
                                            
                                        </li>
                                    <?php endwhile; endif; ?> 
                                    <?php wp_reset_query(); ?>
                				</ul>
                			</div>
                        </div>
                        <hr />
                        <div class="four columns alpha">
                            <h4><?php _e('Available Pages:', GETTEXT_DOMAIN) ?></h4>
                            <ul class="_sitemap">
                            <?php wp_list_pages('title_li='); ?>
                            </ul>
                        </div>
                        <div class="four columns">
                            <h4><?php _e('Archives by Categories:', GETTEXT_DOMAIN) ?></h4>
                            <ul class="_sitemap">
                                <?php wp_list_categories('title_li='); ?>
                            </ul>
                        </div>
                        <div class="four columns omega">
                            <h4><?php _e('Archives by Date:', GETTEXT_DOMAIN) ?></h4>
                            <ul class="_sitemap">
                                <?php wp_get_archives('type=monthly'); ?>
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
            		<div class="four columns sidebar">
                    <?php get_sidebar(); ?>
            		</div>
                </div><!-- container -->
            </div>
        </div>
        
<?php get_footer(); ?>