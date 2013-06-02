<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Testimonial Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display testimonial.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'testimonial_widget' );


// register widget.
function testimonial_widget() {
	register_widget( 'Testimonial_Widget' );
}

// widget class.
class testimonial_widget extends WP_Widget {


/* widget setup
================================================== */
	function Testimonial_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'testimonial_widget', 'description' => __('A widget that displays testimonial.', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'testimonial_widget' );

		/* create the widget. */
		$this->WP_Widget( 'testimonial_widget', __('Testimonial Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
        $text = $instance['text'];
		$cite = $instance['cite'];

		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
        <?php /* display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
                        <div class="testimonial-widget">
                            <div class="testimonial">
                                <div class="content 
                                <?php if($cite){?>
                                <?php }else{?>
                                no-cite
                                <?php }?>
                                ">
                                    <?php echo !empty( $instance['filter'] ) ? wpautop( $text ) : $text; ?>
                                </div>
                                <?php if($cite){?>
                                <cite><?php echo $cite?></cite>
                                <?php }?>
                                <div class="element"></div>
                            </div>
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
        
		if ( current_user_can('unfiltered_html') )
			$instance['text'] =  $new_instance['text'];
		else
			$instance['text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['text']) ) ); // wp_filter_post_kses() expects slashed
		$instance['filter'] = isset($new_instance['filter']);
        
        $instance['cite'] = strip_tags( $new_instance['cite'] );
        
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
        
        <!-- widget text: text textarea -->
        <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $instance['text']; ?></textarea>
        
		<!-- widget cite: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'cite' ); ?>"><?php _e('Cite:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'cite' ); ?>" name="<?php echo $this->get_field_name( 'cite' ); ?>" value="<?php echo $instance['cite']; ?>" />
		</p>
        
        <!-- widget filter: text input -->
        <p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs', GETTEXT_DOMAIN) ?></label></p>

	
	<?php
	}
}
?>