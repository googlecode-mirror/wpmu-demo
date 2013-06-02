<?php
/*
Template Name: 4 Column Portfolio
*/
?>
<?php get_header(); ?>
<?php $filter = get_post_meta($post->ID, 'filter_value', true);?>
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
                        <?php
                        $filter_slugs = explode(",", $filter);
                        foreach($filter_slugs as $filter_slug){
                             $filter_id .= $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE slug='$filter_slug'").',';
                        }
                        ?>
                        <ul class="filter_navi">
        					<li><a href="javascript:void(0)" rel="all" title="<?php _e('All Categories', GETTEXT_DOMAIN); ?>"><?php _e('All Categories', GETTEXT_DOMAIN); ?></a></li>
        					<?php if($filter){?>
                                <?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'portfolio_category', 'include' => $filter_id, 'walker' => new portfolio_filter_walker())); ?>
        				    <?php }else{?>
                                <?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'portfolio_category', 'walker' => new portfolio_filter_walker())); ?>
                            <?php }?>
                        </ul>
                        <div class="clear"></div>
                        <div id="portfolio" class="portfolio-4">
                            <ul class="portfolio-list">
                            <?php 
                            $query = new WP_Query();?>
                            <?php if($filter){?>
                                <?php $query->query('post_type=portfolio&portfolio_category='. $filter .'&posts_per_page=-1');?>
                            <?php }else{?>
                                <?php $query->query('post_type=portfolio&posts_per_page=-1');?>
                            <?php }?>
                            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                            $terms = get_the_terms( get_the_ID(), 'portfolio_category' );
                            ?>
                            <?php $lightbox = get_post_meta($post->ID, 'lightbox_value', true);?>
                            <?php $videoURL = theme_parse_video(get_post_meta($post->ID, 'video-url_value', true));?>
                            <?php $linkURL = get_post_meta($post->ID, 'link-url_value', true);?>
                            <li class="four columns item all <?php if($terms) : foreach ($terms as $term) { echo ''.$term->name.' '; } endif; ?>">
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
                    </div>
                </div><!-- container -->
            </div>
        </div>
        
<?php get_footer(); ?>