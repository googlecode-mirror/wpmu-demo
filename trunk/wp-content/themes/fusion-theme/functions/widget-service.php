<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Service Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display the service description.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'service_widget' );


// register widget.
function service_widget() {
	register_widget( 'Service_Widget' );
}

// widget class.
class service_widget extends WP_Widget {


/* widget setup
================================================== */
	function Service_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'service_widget', 'description' => __('A widget that displays the service description (only for front page sidebar).', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'service_widget' );

		/* create the widget. */
		$this->WP_Widget( 'service_widget', __('Service Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
        $left_col = $instance['left_col'];
        
        $dropcap1 = $instance['dropcap1'];
        $dropcap1_style = $instance['dropcap1_style'];
        $col1_title = $instance['col1_title'];
        $col1_subtitle = $instance['col1_subtitle'];
		$col1_text = $instance['col1_text'];
        
        $dropcap2 = $instance['dropcap2'];
        $dropcap2_style = $instance['dropcap2_style'];
        $col2_title = $instance['col2_title'];
        $col2_subtitle = $instance['col2_subtitle'];
		$col2_text = $instance['col2_text'];
        
        $dropcap3 = $instance['dropcap3'];
        $dropcap3_style = $instance['dropcap3_style'];
        $col3_title = $instance['col3_title'];
        $col3_subtitle = $instance['col3_subtitle'];
		$col3_text = $instance['col3_text'];

		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
                
                <div class="container service">
            		<div class="four columns">
                        <div class=" rt-border">
                            <?php /* display the widget title if one was input (before and after defined by themes). */
            				if ( $title )
            					echo $before_title . $title . $after_title;
            				?>
                            <div class="i"><?php echo !empty( $instance['filter'] ) ? wpautop( $left_col ) : $left_col; ?></div>
                            <div class="clear"></div>             		      
                        </div>
                    </div>
                    <?php if($col1_title||$col1_text){?>
            		<div class="four columns">
                        <?php if($col1_title){?>
                        <div class="top">
                            <?php if($dropcap1){?>
                            <span class="<?php echo $dropcap1_style?>"><?php echo $dropcap1?></span>
                            <?php }?>
                            <div class="header" <?php if(!$dropcap1){?>style="padding: 0;"<?php }?>>
                                <?php if($col1_title){?><h3><?php echo $col1_title?></h3><?php }?>
                                <?php if($col1_subtitle){?><span class="desc"><?php echo $col1_subtitle?></span><?php }?>
                            </div>
                        </div>
                        <?php }?>
                        <?php echo !empty( $instance['filter'] ) ? wpautop( $col1_text ) : $col1_text; ?>
            		</div>
                    <?php }?>
                    <?php if($col2_title||$col2_text){?>
            		<div class="four columns">
                        <?php if($col2_title){?>
                        <div class="top">
                            <?php if($dropcap2){?>
                            <span class="<?php echo $dropcap2_style?>"><?php echo $dropcap2?></span>
                            <?php }?>
                            <div class="header" <?php if(!$dropcap2){?>style="padding: 0;"<?php }?>>
                                <?php if($col2_title){?><h3><?php echo $col2_title?></h3><?php }?>
                                <?php if($col2_subtitle){?><span class="desc"><?php echo $col2_subtitle?></span><?php }?>
                            </div>
                        </div>
                        <?php }?>
                        <?php echo !empty( $instance['filter'] ) ? wpautop( $col2_text ) : $col2_text; ?>
            		</div>
                    <?php }?>
                    <?php if($col3_title||$col3_text){?>
            		<div class="four columns">
                        <?php if($col3_title){?>
                        <div class="top">
                            <?php if($dropcap3){?>
                            <span class="<?php echo $dropcap3_style?>"><?php echo $dropcap3?></span>
                            <?php }?>
                            <div class="header" <?php if(!$dropcap3){?>style="padding: 0;"<?php }?>>
                                <?php if($col3_title){?><h3><?php echo $col3_title?></h3><?php }?>
                                <?php if($col3_subtitle){?><span class="desc"><?php echo $col3_subtitle?></span><?php }?>
                            </div>
                        </div>
                        <?php }?>
                        <?php echo !empty( $instance['filter'] ) ? wpautop( $col3_text ) : $col3_text; ?>
            		</div>
                    <?php }?>
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
            $instance['col1_text'] =  $new_instance['col1_text'];
            $instance['col2_text'] =  $new_instance['col2_text'];
            $instance['col3_text'] =  $new_instance['col3_text'];
		}else{
			$instance['left_col'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['left_col']) ) ); // wp_filter_post_kses() expects slashed
    		$instance['col1_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['col1_text']) ) ); // wp_filter_post_kses() expects slashed
    		$instance['col2_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['col2_text']) ) ); // wp_filter_post_kses() expects slashed
    		$instance['col3_text'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['col3_text']) ) ); // wp_filter_post_kses() expects slashed
        }
        $instance['filter'] = isset($new_instance['filter']);
        
        $instance['dropcap1'] = strip_tags( $new_instance['dropcap1'] );
        $instance['dropcap2'] = strip_tags( $new_instance['dropcap2'] );
        $instance['dropcap3'] = strip_tags( $new_instance['dropcap3'] );
        
        $instance['dropcap1_style'] = strip_tags( $new_instance['dropcap1_style'] );
        $instance['dropcap2_style'] = strip_tags( $new_instance['dropcap2_style'] );
        $instance['dropcap3_style'] = strip_tags( $new_instance['dropcap3_style'] );
        
        $instance['col1_title'] = strip_tags( $new_instance['col1_title'] );
        $instance['col2_title'] = strip_tags( $new_instance['col2_title'] );
        $instance['col3_title'] = strip_tags( $new_instance['col3_title'] );
        
        $instance['col1_subtitle'] = strip_tags( $new_instance['col1_subtitle'] );
        $instance['col2_subtitle'] = strip_tags( $new_instance['col2_subtitle'] );
        $instance['col3_subtitle'] = strip_tags( $new_instance['col3_subtitle'] );
        
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
        
        <hr style="border: 0; background: #ccc; height: 1px;"/>
        
		<!-- widget dropcap: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'dropcap1' ); ?>"><?php _e('Dropcap:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dropcap1' ); ?>" name="<?php echo $this->get_field_name( 'dropcap1' ); ?>" value="<?php echo $instance['dropcap1']; ?>" />
		</p>
        
        <!-- widget dropcap style: select -->
		<p>
			<label for="<?php echo $this->get_field_id('dropcap1_style'); ?>"><?php _e( 'Dropcap style:', GETTEXT_DOMAIN); ?></label>
			<select name="<?php echo $this->get_field_name('dropcap1_style'); ?>" id="<?php echo $this->get_field_id('dropcap1_style'); ?>" class="widefat">
				<option value="dropcap"<?php selected( $instance['dropcap1_style'], 'dropcap' ); ?>><?php _e( 'Style 1', GETTEXT_DOMAIN); ?></option>
				<option value="dropcap1"<?php selected( $instance['dropcap1_style'], 'dropcap1' ); ?>><?php _e( 'Style 2', GETTEXT_DOMAIN); ?></option>
				<option value="dropcap2"<?php selected( $instance['dropcap1_style'], 'dropcap2' ); ?>><?php _e( 'Style 3', GETTEXT_DOMAIN); ?></option>
			</select>
		</p>
        
        <!-- widget col1_title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'col1_title' ); ?>"><?php _e('Title:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col1_title' ); ?>" name="<?php echo $this->get_field_name( 'col1_title' ); ?>" value="<?php echo $instance['col1_title']; ?>" />
		</p>
        
        <!-- widget col1_subtitle: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'col1_subtitle' ); ?>"><?php _e('Subtitle:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col1_subtitle' ); ?>" name="<?php echo $this->get_field_name( 'col1_subtitle' ); ?>" value="<?php echo $instance['col1_subtitle']; ?>" />
		</p>
        
        <!-- widget col1_text: text textarea -->
        <p>
			<label for="<?php echo $this->get_field_id( 'col1_text' ); ?>"><?php _e('Text:', GETTEXT_DOMAIN) ?></label>
            <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('col1_text'); ?>" name="<?php echo $this->get_field_name('col1_text'); ?>"><?php echo $instance['col1_text']; ?></textarea>
        <p>
        
        <hr style="border: 0; background: #ccc; height: 1px;"/>
        
		<!-- widget dropcap: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'dropcap2' ); ?>"><?php _e('Dropcap:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dropcap2' ); ?>" name="<?php echo $this->get_field_name( 'dropcap2' ); ?>" value="<?php echo $instance['dropcap2']; ?>" />
		</p>
        
        <!-- widget dropcap style: select -->
		<p>
			<label for="<?php echo $this->get_field_id('dropcap2_style'); ?>"><?php _e( 'Dropcap style:', GETTEXT_DOMAIN); ?></label>
			<select name="<?php echo $this->get_field_name('dropcap2_style'); ?>" id="<?php echo $this->get_field_id('dropcap2_style'); ?>" class="widefat">
				<option value="dropcap"<?php selected( $instance['dropcap2_style'], 'dropcap' ); ?>><?php _e( 'Style 1', GETTEXT_DOMAIN); ?></option>
				<option value="dropcap1"<?php selected( $instance['dropcap2_style'], 'dropcap1' ); ?>><?php _e( 'Style 2', GETTEXT_DOMAIN); ?></option>
				<option value="dropcap2"<?php selected( $instance['dropcap2_style'], 'dropcap2' ); ?>><?php _e( 'Style 3', GETTEXT_DOMAIN); ?></option>
			</select>
		</p>
        
        <!-- widget col2_title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'col2_title' ); ?>"><?php _e('Title:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col2_title' ); ?>" name="<?php echo $this->get_field_name( 'col2_title' ); ?>" value="<?php echo $instance['col2_title']; ?>" />
		</p>
        
        <!-- widget col2_subtitle: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'col2_subtitle' ); ?>"><?php _e('Subtitle:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col2_subtitle' ); ?>" name="<?php echo $this->get_field_name( 'col2_subtitle' ); ?>" value="<?php echo $instance['col2_subtitle']; ?>" />
		</p>
        
        <!-- widget col2_text: text textarea -->
        <p>
			<label for="<?php echo $this->get_field_id( 'col2_text' ); ?>"><?php _e('Text:', GETTEXT_DOMAIN) ?></label>
            <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('col2_text'); ?>" name="<?php echo $this->get_field_name('col2_text'); ?>"><?php echo $instance['col2_text']; ?></textarea>
        <p>

        <hr style="border: 0; background: #ccc; height: 1px;"/>
        
		<!-- widget dropcap: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'dropcap3' ); ?>"><?php _e('Dropcap:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'dropcap3' ); ?>" name="<?php echo $this->get_field_name( 'dropcap3' ); ?>" value="<?php echo $instance['dropcap3']; ?>" />
		</p>
        
        <!-- widget dropcap style: select -->
		<p>
			<label for="<?php echo $this->get_field_id('dropcap3_style'); ?>"><?php _e( 'Dropcap style:', GETTEXT_DOMAIN); ?></label>
			<select name="<?php echo $this->get_field_name('dropcap3_style'); ?>" id="<?php echo $this->get_field_id('dropcap3_style'); ?>" class="widefat">
				<option value="dropcap"<?php selected( $instance['dropcap3_style'], 'dropcap' ); ?>><?php _e( 'Style 1', GETTEXT_DOMAIN); ?></option>
				<option value="dropcap1"<?php selected( $instance['dropcap3_style'], 'dropcap1' ); ?>><?php _e( 'Style 2', GETTEXT_DOMAIN); ?></option>
				<option value="dropcap2"<?php selected( $instance['dropcap3_style'], 'dropcap2' ); ?>><?php _e( 'Style 3', GETTEXT_DOMAIN); ?></option>
			</select>
		</p>
        
        <!-- widget col3_title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'col3_title' ); ?>"><?php _e('Title:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col3_title' ); ?>" name="<?php echo $this->get_field_name( 'col3_title' ); ?>" value="<?php echo $instance['col3_title']; ?>" />
		</p>
        
        <!-- widget col3_subtitle: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'col3_subtitle' ); ?>"><?php _e('Subtitle:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'col3_subtitle' ); ?>" name="<?php echo $this->get_field_name( 'col3_subtitle' ); ?>" value="<?php echo $instance['col3_subtitle']; ?>" />
		</p>
        
        <!-- widget col3_text: text textarea -->
        <p>
			<label for="<?php echo $this->get_field_id( 'col3_text' ); ?>"><?php _e('Text:', GETTEXT_DOMAIN) ?></label>
            <textarea class="widefat" rows="4" cols="20" id="<?php echo $this->get_field_id('col3_text'); ?>" name="<?php echo $this->get_field_name('col3_text'); ?>"><?php echo $instance['col3_text']; ?></textarea>
        <p>
        
        <!-- widget filter: text input -->
        <p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs', GETTEXT_DOMAIN); ?></label></p>

	
	<?php
	}
}
?>