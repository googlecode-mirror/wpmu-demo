<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Search CSE Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display a search cse form.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'search_cse_widget' );


// register widget.
function search_cse_widget() {
	register_widget( 'Search_CSE_Widget' );
}

// widget class.
class search_cse_widget extends WP_Widget {


/* widget setup
================================================== */
	function Search_CSE_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'search_cse_widget', 'description' => __('A widget that displays cse search form. The widget is not compatible with a default permalink settings', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'search_cse_widget' );

		/* create the widget. */
		$this->WP_Widget( 'search_cse_widget', __('Search CSE Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
		$page_id = $instance['page_id'];

		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
        <?php /* display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
                <?php if (!$page_id){?>
                <p>Enter the page id</p>
                <?php }else{?>
                <div class="gce-widget">
                    <form method="get" action="<?php echo get_permalink( $page_id ); ?>">
                        <fieldset>
                            <input id="q" class="search_input" type="text" name="q" value="search site"/>
                            <input class="submit" type="submit" value="<?php _e('Search', GETTEXT_DOMAIN) ?>"/>
                        </fieldset>
                    </form>
                </div>
                <?php }?>
		
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
		$instance['page_id'] = strip_tags( $new_instance['page_id'] );
        
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
        
		<!-- widget page_id: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'page_id' ); ?>"><?php _e('Enter the page id:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'page_id' ); ?>" name="<?php echo $this->get_field_name( 'page_id' ); ?>" value="<?php echo $instance['page_id']; ?>" />
		</p>

	
	<?php
	}
}
?>