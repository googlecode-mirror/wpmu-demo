<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Posts Widget (type 2)
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display of posts.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'posts_widget2' );


// register widget.
function posts_widget2() {
	register_widget( 'Posts_Widget2' );
}

// widget class.
class posts_widget2 extends WP_Widget {


/* widget setup
================================================== */
	function Posts_Widget2() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'posts_widget2', 'description' => __('A widget that displays your posts.', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'posts_widget2' );

		/* create the widget. */
		$this->WP_Widget( 'posts_widget2', __('Posts Widget (type 2)', GETTEXT_DOMAIN), $widget_ops, $control_ops );
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
                    <div class="post-widget-2">
                        <?php $query = new WP_Query();?>
                        <?php $query->query('posts_per_page='.$num.'&ignore_sticky_posts=1');?>
                        <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                        <?php $videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));?>
                        <?php $linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);?>
                        <div class="post">
                            <a href="
                            <?php if ( $linkURL ) { ?>
                            <?php echo $linkURL; ?>
                            <?php }else{?>
                            <?php the_permalink(); ?>
                            <?php }?>
                            " title="<?php the_title(); ?>" class="icon-format
                            <?php if((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){?>
                            gallery
                            <?php }elseif ( $linkURL ) { ?>
                            link
                            <?php }elseif($videoURL){?>
                            video
                            <?php }else{?>
                            pencil
                            <?php }?>
                            ">
                            <?php 
                            if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
                            the_post_thumbnail('posts-widget');
                            };
                            ?>
                            </a>
                            <?php if ( $linkURL ) { ?>
                            <h5><a href="<?php echo $linkURL; ?>"><?php the_title(); ?></a></h5>
                            <?php }else{?>
                            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                            <?php }?>
                            <div class="icons">
                                <div class="iconWrap">
                                    <div class="icon author tooltip text_replace">
                                        <p class="hoveralls_text"><?php echo get_the_author(); ?></p>
                                        <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>" class="hoveralls_link"></a>
                                    </div>
                                </div>
                                <div class="iconWrap">
                                    <div class="icon tag tooltip text_replace">
                                        <p class="hoveralls_text"><?php comments_number(__('No Comments', GETTEXT_DOMAIN),__('1 Comment', GETTEXT_DOMAIN),__('% Comments', GETTEXT_DOMAIN)); ?></p>
                                        <a href="<?php comments_link($id); ?>" class="hoveralls_link"></a>
                                    </div>
                                </div>
                                <?php if(get_the_tags()){?>
                                <div class="iconWrap">
                                    <div class="icon comment tooltip text_replace">
                                        <p class="hoveralls_text">
                                        <?php
                                        $posttags = get_the_tags();
                                        $count=0;
                                        if ($posttags) {
                                          foreach($posttags as $tag) {
                                            $count++;
                                            if (1 == $count) {
                                              echo $tag->name;
                                              $tag_id = $tag->term_id;      
                                            }
                                          }
                                        }
                                        ?>
                                        </p>
                                        <a href="<?php echo get_tag_link($tag_id); ?>" class="hoveralls_link"></a>
                                    </div>
                                </div>
                                <?php }?>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <?php endwhile; endif; ?> 
                        <?php wp_reset_query(); ?>
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