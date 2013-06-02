<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Post Tabs Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display of popular posts, recent posts and all tags.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'post_tabs_widget' );


// register widget.
function post_tabs_widget() {
	register_widget( 'Post_Tabs_Widget' );
}

// widget class.
class post_tabs_widget extends WP_Widget {


/* widget setup
================================================== */
	function Post_Tabs_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'post_tabs_widget', 'description' => __('A widget that displays your popular posts, recent posts and all tags.', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'post_tabs_widget' );

		/* create the widget. */
		$this->WP_Widget( 'post_tabs_widget', __('Post Tabs Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
		
        $rand = rand(2, 999);
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
		$num_popular = $instance['num_popular'];
        $num_recent = $instance['num_recent'];

		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
        <?php /* display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo $before_title . $title . $after_title;
				?>
                        <div class="tabs-widget post-tabs-widget">
                            <div class="ui-tabs-widget ui-tabs-widget-<?php echo $rand?>">
                            	<ul>
                            		<li><a href="#tabs-1"><?php _e('Popular', GETTEXT_DOMAIN) ?></a></li>
                            		<li><a href="#tabs-2"><?php _e('Recent', GETTEXT_DOMAIN) ?></a></li>
                                    <li><a href="#tabs-3"><?php _e('Tags', GETTEXT_DOMAIN) ?></a></li>
                            	</ul>
                            	<div id="tabs-1">
                                    <ul class="news-wrap">
                                     <?php
                                        global $wpdb;
                                        $posts = $wpdb->get_results("SELECT comment_count, ID, post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , $num_popular");
                                        foreach ($posts as $post_) {
                                            setup_postdata($post_);
                                            $id = $post_->ID;
                                            $title = $post_->post_title;
                                            $count = $post_->comment_count;
                                            $videoURL = theme_parse_video(get_post_meta($id, 'video-url_value', true));
                                            $linkURL = get_post_meta($id, 'link-url_value', true);
                                            $comments = get_comments('post_id='.$id.'&status=approve');
                                            $comments_number  = count($comments);
                                            if ($count != 0) {
                                                ?><li class="post"><?php
                                                    ?><div class="icon
                                                    <?php if ( $linkURL ) { ?>
                                                    link
                                                    <?php }elseif((function_exists('has_post_thumbnail')) && (has_post_thumbnail($post_->ID))){?>
                                                    pencil
                                                    <?php }elseif($videoURL){?>
                                                    video
                                                    <?php }else{?>
                                                    pencil
                                                    <?php }?>
                                                    "><?php
                                                        if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail($post_->ID))) {
                                                        echo get_the_post_thumbnail($id, 'post-tabs-widget');
                                                        };
                                                    ?></div><?php
                                                    ?><div class="content"><?php
                                                        ?><a href="
                                                        <?php if ( $linkURL ) { ?>
                                                        <?php echo $linkURL; ?>
                                                        <?php }else{?>
                                                        <?php echo get_permalink($id); ?>
                                                        <?php }?>
                                                        "><?php echo $title?></a><?php
                                                        ?><a class="date" href="<?php echo get_day_link(get_the_time('Y', $id), get_the_time('m', $id), get_the_time('d', $id)); ?>"><span><?php echo get_the_time('j M Y', $id); ?></span></a> <a class="comments" href="<?php echo get_permalink($id); ?>#comments"><span><?php echo $comments_number; ?> </span></a><?php
                                                    ?></div><?php
                                                    ?><div class="clear"></div><?php
                                                ?></li><?php
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            	<div id="tabs-2">
                                    <ul class="news-wrap">
                                    <?php $query = new WP_Query();?>
                                    <?php $query->query('posts_per_page='.$num_recent.'&ignore_sticky_posts=1');?>
                                    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                                    <?php $videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));?>
                                    <?php $linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);?>
                                    <li class="post"><?php
                                        ?><div class="icon
                                        <?php if ( $linkURL ) { ?>
                                        link
                                        <?php }elseif((function_exists('has_post_thumbnail')) && (has_post_thumbnail())){?>
                                        pencil
                                        <?php }elseif($videoURL){?>
                                        video
                                        <?php }else{?>
                                        pencil
                                        <?php }?>
                                        "><?php
                                            if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) {
                                            the_post_thumbnail('post-tabs-widget');
                                            };
                                        ?></div><?php
                                        ?><div class="content"><?php
                                            ?><a href="
                                            <?php if ( $linkURL ) { ?>
                                            <?php echo $linkURL; ?>
                                            <?php }else{?>
                                            <?php the_permalink(); ?>
                                            <?php }?>
                                            "><?php the_title()?></a><?php
                                            ?><a class="date" href="<?php echo get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')); ?>"><span><?php echo get_the_time('j M Y'); ?></span></a> <a class="comments" href="<?php comments_link(); ?> "><span><?php comments_number( '0', '1', '%' ); ?> </span></a><?php
                                        ?></div><?php
                                        ?><div class="clear"></div><?php
                                    ?></li>
                                    <?php endwhile; endif; ?> 
                                    <?php wp_reset_query(); ?>
                                    </ul>
                                </div>
                            	<div id="tabs-3">
                            		<div class="tags">
                                        <?php wp_tag_cloud('smallest=10&largest=10&unit=px&number=0'); ?>
                                    </div>
                                </div>
                            </div>
                        	<script>
                            	$(function() {
                            		$( ".ui-tabs-widget-<?php echo $rand?>" ).tabs();
                            	});
                        	</script> 
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
		$instance['num_popular'] = strip_tags( $new_instance['num_popular'] );
        $instance['num_recent'] = strip_tags( $new_instance['num_recent'] );
        
		/* no need to strip tags for.. */

		return $instance;
	}
	

/* widget settings
================================================== */
	 
	function form( $instance ) {

		/* set up some default widget settings. */
		$defaults = array(
		'title' => 'Title',
		'num_popular' => 3,
		'num_recent' => 3
		
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>
		
        <!-- widget title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
        
		<!-- widget title: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num_popular' ); ?>"><?php _e('Amount to show popular post:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'num_popular' ); ?>" name="<?php echo $this->get_field_name( 'num_popular' ); ?>" value="<?php echo $instance['num_popular']; ?>" />
		</p>
        
		<!-- widget num: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num_recent' ); ?>"><?php _e('Amount to show recent post:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'num_recent' ); ?>" name="<?php echo $this->get_field_name( 'num_recent' ); ?>" value="<?php echo $instance['num_recent']; ?>" />
		</p>

	
	<?php
	}
}
?>