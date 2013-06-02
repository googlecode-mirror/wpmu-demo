<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Tabs Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display tabs.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'tabs_widget' );


// register widget.
function tabs_widget() {
	register_widget( 'Tabs_Widget' );
}

// widget class.
class tabs_widget extends WP_Widget {


/* widget setup
================================================== */
	function Tabs_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'tabs_widget', 'description' => __('A widget that displays tabs.', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'tabs_widget' );

		/* create the widget. */
		$this->WP_Widget( 'tabs_widget', __('Tabs Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
        $text = $instance['text'];

		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
        <?php /* display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
                <div class="tabs-widget">
                    <?php echo apply_filters('the_content', $text); ?>
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
        
		$instance['text'] =  $new_instance['text'];

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
         <p>   
            <textarea class="widefat" rows="16" cols="20" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $instance['text']; ?></textarea>
    	</p>
        
        <p><small><?php _e('Shortcode for displaying a tabs.', GETTEXT_DOMAIN) ?></small></p>
        <p>[tabs tab1="Tab 1 Title" tab2="Tab 2 Title"][tab]Your content here...[/tab][tab]Your content here...[/tab][/tabs]</p>
    
	<?php
	}
}
?>