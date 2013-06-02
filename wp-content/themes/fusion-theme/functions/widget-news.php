<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: News Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display the latest news.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'news_widget' );


// register widget.
function news_widget() {
	register_widget( 'News_Widget' );
}

// widget class.
class news_widget extends WP_Widget {


/* widget setup
================================================== */
	function News_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'news_widget', 'description' => __('A widget that displays the latest news (only for front page sidebar).', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'news_widget' );

		/* create the widget. */
		$this->WP_Widget( 'news_widget', __('News Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
        
        global $wpdb;
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
        $left_col = $instance['left_col'];
        
		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
                
                <div class="container latest_news">
            		<div class="four columns">
                        <?php 
                        $posts_page_id = get_option( 'page_for_posts');
                        $posts_page_url = get_page_link($posts_page_id);
                        ?>                    
                        <div class=" rt-border">
                            <?php /* display the widget title if one was input (before and after defined by themes). */
            				if ( $title )
            					echo $before_title . $title . $after_title;
            				?>
                            <div class="i"><?php echo !empty( $instance['filter'] ) ? wpautop( $left_col ) : $left_col; ?></div>
                            <a class="small_button" href="<?php echo $posts_page_url;?>"><?php _e('read more', GETTEXT_DOMAIN) ?></a></p>
                            <div class="clear"></div>                		      
                        </div>
                    </div>
                    <?php $query = new WP_Query();?>
                    <?php $query->query('posts_per_page=3&ignore_sticky_posts=1');?>
                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                    <?php $videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));?>
                    <?php $linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);?>
            		<div class="four columns post">
                        <?php if( $linkURL ){?>
                            <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {?>
                            <img class="home-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '420x207' ); echo $image[0];?>" width="220" height="108"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php echo $linkURL; ?>"/>
                            <?php }else{?>
                            <img class="home-overlay-item" src="<?php echo THEME_ASSETS; ?>images/post-format-link.png" width="220" height="108"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php echo $linkURL; ?>"/>
                            <?php }?>
                        <?php }elseif ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                        <img class="home-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '420x207' ); echo $image[0];?>" width="220" height="108"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php the_permalink(); ?>"/>
                        <?php }elseif($videoURL){?>
                        <div class="vimeoOrYoutube">
                            <iframe width="220" height="108" src="<?php echo $videoURL ?>?rel=0&amp;autohide=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                        </div>
                        <?php }else{?>
                        <img class="home-overlay-item" src="<?php echo THEME_ASSETS; ?>images/post-format-pencil.png" width="220" height="108"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php the_permalink(); ?>"/>
                        <?php }?>
                        <h4>
                            <?php if ( $videoURL ) { ?>
                            <a href="<?php echo $videoURL; ?>"><?php the_title(); ?></a>
                            <?php }else{?>
                            <?php the_title(); ?>
                            <?php }?>
                        </h4>
                        <div class="info">
                            <div class="date">
                                <span class="day"><?php echo get_the_time('j'); ?></span>
                                <span class="month"><?php echo get_the_time('M'); ?></span>
                            </div>
                            <span class="comment"><?php comments_number( '0', '1', '%' ); ?></span>
                        </div>
                        <p><?php echo excerpt(15)?></p>
            		</div>
                    <?php endwhile; endif; ?> 
                    <?php wp_reset_query(); ?>
            	</div><!-- container -->
                <div class="container hr"><hr /></div>
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
        
		if ( current_user_can('unfiltered_html') ){
			$instance['left_col'] =  $new_instance['left_col'];
		}else{
			$instance['left_col'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['left_col']) ) ); // wp_filter_post_kses() expects slashed
        }
        $instance['filter'] = isset($new_instance['filter']);

        
		/* no need to strip tags for.. */

		return $instance;
	}
	

/* widget settings
================================================== */
	 
	function form( $instance ) {

		/* set up some default widget settings. */
		$defaults = array(
		'title' => 'Title'
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <!-- widget title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
        
        <!-- widget text: left_col textarea -->
        <p>
			<label for="<?php echo $this->get_field_id( 'left_col' ); ?>"><?php _e('Text:', GETTEXT_DOMAIN) ?></label>
            <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('left_col'); ?>" name="<?php echo $this->get_field_name('left_col'); ?>"><?php echo $instance['left_col']; ?></textarea>
        <p>
        
        <!-- widget filter: text input -->
        <p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs', GETTEXT_DOMAIN) ?></label></p>

	
	<?php
	}
}
?>