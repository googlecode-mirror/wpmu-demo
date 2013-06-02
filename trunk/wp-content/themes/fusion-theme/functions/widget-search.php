<?php
/**
 * Search widget
 *
 */
class WP_Widget_Search_m extends WP_Widget {

	function __construct() {
		$widget_ops = array('classname' => 'widget_search_m', 'description' => __('A search form for your site', GETTEXT_DOMAIN) );
		parent::__construct('search', __('Search', GETTEXT_DOMAIN), $widget_ops);
	}

	function widget( $args, $instance ) {
		extract($args);
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $before_widget;
		if ( $title )
			echo $before_title . $title . $after_title;?>
            
        <div class="search-widget">
            <form role="search" method="get" action="<?php echo site_url(); ?>">
                <fieldset>
                    <input id="s" class="search_input" type="text" name="s" value="<?php get_search_query()?>"/>
                    <input class="submit" id="searchsubmit" type="submit" value="<?php _e('Search', GETTEXT_DOMAIN) ?>"/>
                </fieldset>
            </form>
        </div>

		<?php echo $after_widget;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'title' => '') );
		$title = $instance['title'];
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', GETTEXT_DOMAIN); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></label></p>
<?php
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$new_instance = wp_parse_args((array) $new_instance, array( 'title' => ''));
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
	}

}

// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'search_widget' );


// register widget.
function search_widget() {
	register_widget( 'WP_Widget_Search_m' );
}
?>