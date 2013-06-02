<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Portfolio Carousel Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display of portfolio.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'carousel_widget' );


// register widget.
function carousel_widget() {
	register_widget( 'Carousel_Widget' );
}

// widget class.
class carousel_widget extends WP_Widget {


/* widget setup
================================================== */
	function Carousel_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'carousel_widget', 'description' => __('A widget that displays your portfolio.', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'carousel_widget' );

		/* create the widget. */
		$this->WP_Widget( 'carousel_widget', __('Portfolio Carousel Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
		$num = $instance['num'];

		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
        <?php /* display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
                
                <div class="carousel-widget">
        			<ul class="sidebar_list_items">
                        <?php $query = new WP_Query();?>
                        <?php $query->query('post_type=portfolio&posts_per_page='.$num.'&ignore_sticky_posts=1');?>
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                        <?php $lightbox = get_post_meta(get_the_ID(), 'lightbox_value', true);?>
                        <?php $videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));?>
                        <?php $linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);?>
                        <?php $rand = rand(2, 9999); ?>  
                        <li class="itemSidebar">
                        <?php if ( $lightbox) { ?>
                            <div class="frame">
                                <a rel="prettyPhoto[pp_gal-widget-<?php echo $rand ?>]" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); echo $image[0];?>">
                                    <img class="sb-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '412x229' ); echo $image[0];?>" height="118" width="212" alt="<?php _e('view more', GETTEXT_DOMAIN) ?>"/>
                                </a>
                            </div>
                            <?php $thumbnail_id = get_post_thumbnail_id( get_the_ID() )?>
                            <?php $args = array(
                            'numberposts' => 9999, // change this to a specific number of images to grab
                            'offset' => 0,
                            'post_parent' => get_the_ID(),
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
                                <a class="hide" rel="prettyPhoto[pp_gal-widget-<?php echo $rand ?>]" href="<?php echo $imageArrayFull[0] ?>" title="<?php echo $imageDescription ?>"></a>
                            <?php }?>
                        <?php } elseif ( $linkURL ) { ?>
                            <div class="frame"><img class="sb-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '412x229' ); echo $image[0];?>" height="118" width="212" alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php echo $linkURL ?>"/></div>
                        <?php } elseif ( $videoURL ) { ?>
                            <div class="frame">
                                <div class="vimeoOrYoutube">
                                    <iframe height="118" width="212" src="<?php echo $videoURL ?>?rel=0&amp;autohide=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                            <div class="frame"><img class="sb-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '412x229' ); echo $image[0];?>" height="118" width="212" alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php the_permalink(); ?>"/></div>
                        <?php } ?>
                        </li>  
                        <?php endwhile; endif; ?> 
                        <?php wp_reset_query(); ?>     
        			</ul>
                    <div class="pager"></div>
                    <div class="clear"></div>
                </div>

		<?php

		/* after widget (defined by themes). */
		echo $after_widget;
	}


/* widget update
================================================== */
	
	function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		/* strip tags to remove HTML (important for text inputs). */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['num'] = strip_tags( $new_instance['num'] );
        
		/* no need to strip tags for.. */

		return $instance;
	}
	

/* widget settings
================================================== */
	 
	function form( $instance ) {

		/* set up some default widget settings. */
		$defaults = array(
		'title' => 'Title',
		'num' => 1,
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <!-- widget title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
        
		<!-- widget num: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e('Number of posts to show:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo $instance['num']; ?>" />
		</p>

	
	<?php
	}
}
?>