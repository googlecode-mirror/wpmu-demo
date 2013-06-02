<?php
/*
Portfolio Categories
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
                    <div class="sixteen columns _portfolio function">
                    <ul class="filter_navi" style="display: none;"><!-- disable -->
    					<li><a href="javascript:void(0)" rel="all" title="<?php _e('No Categories', GETTEXT_DOMAIN); ?>"><?php _e('No Categories', GETTEXT_DOMAIN); ?></a></li>
                    </ul>
                    <div class="clear"></div>
                    <div id="portfolio" class="portfolio-3">
                        <ul class="portfolio-list">
                        <?php $query = new WP_Query();?>
                        <?php $taxo_slug = get_queried_object()->slug;?>
                        <?php $query->query('portfolio_category='.$taxo_slug.'&=post_type=portfolio&posts_per_page=-1');?>
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();?>
                        <?php $lightbox = get_post_meta($post->ID, 'lightbox_value', true);?>
                        <?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
                        <?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
                        <li class="one-third column item">
                            <?php if ( $lightbox) { ?>
                            <a rel="prettyPhoto[pp_gal-<?php echo $post->ID ?>]" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); echo $image[0];?>">
                                <img class="portfolio-overlay-item-images" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '460x306' ); echo $image[0];?>" width="460" height="306"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" />
                            </a>
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
                                <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                                    <div class="img"><img class="portfolio-overlay-item-link" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '460x306' ); echo $image[0];?>" width="460" height="306"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php echo $linkURL; ?>"/></div>
                                <?php }?>
                            <?php } elseif ( $videoURL ) { ?>
                                <div class="vimeoOrYoutube"><iframe height="306" width="460" src="<?php echo $videoURL ?>" frameborder="0" allowfullscreen></iframe></div>
                            <?php } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                            <div class="img"><img class="portfolio-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '460x306' ); echo $image[0];?>" width="460" height="306"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php the_permalink(); ?>"/></div>
                            <?php }?>
                            <div class="info">
                                <?php if ( $videoURL ) { ?>
                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <?php }else { ?>
                                    <h4><?php the_title(); ?></h4>
                                <?php }?>
                                <?php the_excerpt(); ?>
                            </div>
                        </li>
                        <?php endwhile; endif; ?>
                        </ul>
                        <div class="clear"></div>
                    </div>
                </div><!-- container -->
            </div>
        </div>
        
<?php get_footer(); ?>