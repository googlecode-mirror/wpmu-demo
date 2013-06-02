<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Contact Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display contact details.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'contact_widget' );


// register widget.
function contact_widget() {
	register_widget( 'Contact_Widget' );
}

// widget class.
class contact_widget extends WP_Widget {


/* widget setup
================================================== */
	function Contact_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'contact_widget', 'description' => __('A widget that displays contact details.', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'contact_widget' );

		/* create the widget. */
		$this->WP_Widget( 'contact_widget', __('Contact Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
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
                <div class="contact-widget">
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
        
        <p><small><?php _e('Code for displaying contact details.', GETTEXT_DOMAIN) ?></small></p>
        <p>
&lt;ul&gt;<br />
    &lt;li&gt;&lt;span&gt;phone :&lt;/span&gt; +44 (0) 1234567890&lt;/li&gt;<br />
    &lt;li&gt;&lt;span&gt;fax :&lt;/span&gt; +44 (0) 1234567890&lt;/li&gt;<br />
    &lt;li&gt;&lt;span&gt;email :&lt;/span&gt; &lt;a href="#"&gt;contact@your_domain.com&lt;/a&gt;&lt;/li&gt;<br />
    &lt;li&gt;&lt;span&gt;address :&lt;/span&gt; Your Address&lt;/li&gt;<br />
&lt;/ul&gt;
        </p>
    
	<?php
	}
}
?>