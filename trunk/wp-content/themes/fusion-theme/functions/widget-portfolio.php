<?php

/*-----------------------------------------------------------------------------------

	Plugin Name: Portfolio Widget
	Plugin URI: http://www.lpd-themes.com
	Description: A widget that allows the display the portfolio carousel.
	Version: 1.0
	Author: lidplussdesign
	Author URI: http://www.lpd-themes.com

-----------------------------------------------------------------------------------*/


// add function to widgets_init that'll load our widget.
add_action( 'widgets_init', 'portfolio_widget' );


// register widget.
function portfolio_widget() {
	register_widget( 'Portfolio_Widget' );
}

// widget class.
class portfolio_widget extends WP_Widget {


/* widget setup
================================================== */
	function Portfolio_Widget() {
	
		/* widget settings. */
		$widget_ops = array( 'classname' => 'portfolio_widget', 'description' => __('A widget that displays the portfolio carousel (only for front page sidebar).', GETTEXT_DOMAIN) );

		/* widget control settings. */
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'portfolio_widget' );

		/* create the widget. */
		$this->WP_Widget( 'portfolio_widget', __('Portfolio Widget', GETTEXT_DOMAIN), $widget_ops, $control_ops );
	}

/* display widget
================================================== */	
	function widget( $args, $instance ) {
		extract( $args );
        
        global $wpdb;
		
		$title = apply_filters('widget_title', $instance['title'] );

		/* variables from the widget settings. */
        $left_col = $instance['left_col'];
        $button_url = $instance['button_url'];
        $num = $instance['num'];
        $filter = $instance['filter-cat'];
        $rand = rand(2, 9999);        
        
		/* before widget. */
		echo $before_widget;

		/* display Widget */
		?> 
                
                <div class="container work">
            		<div class="four columns">
                        <div class=" rt-border">
                            <?php /* display the widget title if one was input (before and after defined by themes). */
                            if ( $title )
            					echo $before_title . $title . $after_title;
            				?>
                            <div class="i"><?php echo !empty( $instance['filter'] ) ? wpautop( $left_col ) : $left_col; ?></div>
                            <?php if($button_url){?><a class="small_button" href="<?php echo $button_url?>"><?php _e('view more', GETTEXT_DOMAIN); ?></a><?php }?>
                            <div class="clear"></div>               		      
                        </div>
                    </div>
            		<div class="twelve columns alpha omega">
                        <div class="navi_carousel">
                            <?php
                            $filter_slugs = explode(",", $filter);
                            foreach($filter_slugs as $filter_slug){
                                 $filter_id .= $wpdb->get_var("SELECT term_id FROM $wpdb->terms WHERE slug='$filter_slug'").',';
                            }
                            ?>
                            <ul class="filter_navi filter_navi-<?php echo $rand?>">
            					<li><a href="javascript:void(0)" rel="all" title="<?php _e('All Categories', GETTEXT_DOMAIN); ?>"><?php _e('All Categories', GETTEXT_DOMAIN); ?></a></li>
            					<?php if($filter){?>
                                    <?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'portfolio_category', 'include' => $filter_id, 'walker' => new portfolio_filter_walker())); ?>
            				    <?php }else{?>
                                    <?php wp_list_categories(array('title_li' => '', 'taxonomy' => 'portfolio_category', 'walker' => new portfolio_filter_walker())); ?>
                                <?php }?>
            				</ul>
                            <div class="pager pager-<?php echo $rand?>"></div>
                            <div class="clear"></div>
                        </div> 
             			<div class="list_carousel list_carousel-<?php echo $rand?>">
            				<ul class="list_items-<?php echo $rand?>">
                                <?php 
                                $query = new WP_Query();?>
                                <?php if($filter){?>
                                    <?php $query->query('post_type=portfolio&portfolio_category='. $filter .'&posts_per_page='.$num.'');?>
                                <?php }else{?>
                                    <?php $query->query('post_type=portfolio&posts_per_page='.$num.'');?>
                                <?php }?>
                                <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
                                $terms = get_the_terms( get_the_ID(), 'portfolio_category' );
                                ?>
                                <?php $lightbox = get_post_meta(get_the_ID(), 'lightbox_value', true);?>
                                <?php $videoURL = theme_parse_video(get_post_meta(get_the_ID(), 'video-url_value', true));?>
                                <?php $linkURL = get_post_meta(get_the_ID(), 'link-url_value', true);?>
                                <?php $rand_pp = rand(2, 9999);?>
                                <li class="four columns item item-<?php echo $rand?> all <?php if($terms) : foreach ($terms as $term) { echo ''.$term->name.' '; } endif; ?>">
                                    <?php if ( $lightbox) { ?>
                                    <div class="img">
                                        <a rel="prettyPhoto[pp_gal-widget-<?php echo $rand_pp ?>]" href="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' ); echo $image[0];?>">
                                            <img class="sb-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '420x207' ); echo $image[0];?>" width="220" height="108" alt="<?php _e('view more', GETTEXT_DOMAIN) ?>"/>
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
                                        <a class="hide" rel="prettyPhoto[pp_gal-widget-<?php echo $rand_pp ?>]" href="<?php echo $imageArrayFull[0] ?>" title="<?php echo $imageDescription ?>"></a>
                                    <?php }?>
                                    <?php } elseif ( $linkURL ) { ?>
                                        <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                                        <div class="img"><img class="home-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '420x207' ); echo $image[0];?>" width="220" height="108"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php echo $linkURL; ?>"/></div>
                                        <?php }?>
                                    <?php } elseif ( $videoURL ) { ?>
                                    <div class="vimeoOrYoutube">
                                        <iframe width="220" height="108" src="<?php echo $videoURL ?>?rel=0&amp;autohide=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                    <?php } elseif ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
                                    <div class="img"><img class="home-overlay-item" src="<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), '420x207' ); echo $image[0];?>" width="220" height="108"  alt="<?php _e('view more', GETTEXT_DOMAIN) ?>" rel="<?php the_permalink(); ?>"/></div>
                                    <?php }?>
                                    <div class="info">
                                        <?php if ( $videoURL ) { ?>
                                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                        <?php }else { ?>
                                            <h4><?php the_title(); ?></h4>
                                        <?php }?>
                                        <p><?php echo excerpt(8)?></p>
                                    </div>
                                    <div class="clear"></div>
                                </li>
                                <?php endwhile; endif; ?>           
            				</ul>
                            <script>
                            jQuery(document).ready(function() {
                                
                            carouFredSel_<?php echo $rand?>();
                        	carouFredSelFilter_<?php echo $rand?>();
                            
                            function carouFredSel_<?php echo $rand?>() {
                            
                                if(screen.width < 500 || 
                                navigator.userAgent.match(/Android/i) || 
                                navigator.userAgent.match(/webOS/i) || 
                                navigator.userAgent.match(/iPhone/i) || 
                                navigator.userAgent.match(/iPod/i)){
                                    var iTems = 1;
                                }else{
                                    var iTems = 3;
                                }
                            	$('.list_items-<?php echo $rand?>').carouFredSel({
                                    width   : "100%",
                                    align : 'left',
                                    //height   : "auto",
                            		circular: false,
                            		infinite: false,
                            		auto : false,
                            		pagination  : {
                            			container : '.pager-<?php echo $rand?>',
                            			items : iTems
                            		}
                            	});
                            }    
                                
                            function carouFredSelFilter_<?php echo $rand?>() {
                            	
                            	$('.list_carousel-<?php echo $rand?>').append('<ul class="list_archive-<?php echo $rand?>" />');
                            	$('.list_archive-<?php echo $rand?>').hide();
                            	
                            	$('.filter_navi-<?php echo $rand?> li a').click(function() {
                            			
                                        
                            			var filter_navi = $(this).attr('rel');
                            			
                                        $('.filter_navi-<?php echo $rand?> li').first().addClass('alpha');
                            			$('.filter_navi-<?php echo $rand?> li a').removeClass('active');
                            			$(this).addClass('active');
                            			
                            			if($(this).attr('rel') == 'all') {
                            				$('.item-<?php echo $rand?>').attr('rel', 'categ');
                            			}
                            			else {
                            				$('.item-<?php echo $rand?>').each(function() {
                            					if($(this).hasClass(filter_navi)) {
                            						$(this).attr('rel', 'categ');
                            					}
                            					else {
                            						$(this).attr('rel', 'archive');
                            					}
                            				});
                            			}
                            			
                                        $('.list_items-<?php echo $rand?>').fadeOut(300, function() {
                                			$('.item-<?php echo $rand?>[rel="categ"]').appendTo('.list_items-<?php echo $rand?>');
                                			$('.item-<?php echo $rand?>[rel="archive"]').appendTo('.list_archive-<?php echo $rand?>');
                                        $('.list_items-<?php echo $rand?>').fadeIn(300);
                                        if($('.list_items-<?php echo $rand?>')) carouFredSel_<?php echo $rand?>();
                                        });
                                		
                            	});
                                
                            	$('.filter_navi li a').eq(0).click();	
                            	
                            }
                            	
                            });
                            </script>
            			</div>
                        <div class="clear"></div>
                    </div>
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
        
        $instance['button_url'] = strip_tags( $new_instance['button_url'] );
        $instance['num'] = strip_tags( $new_instance['num'] );
        $instance['filter-cat'] = strip_tags( $new_instance['filter-cat'] );

        
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
        
		<!-- widget button_url: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'button_url' ); ?>"><?php _e('Button Url:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'button_url' ); ?>" name="<?php echo $this->get_field_name( 'button_url' ); ?>" value="<?php echo $instance['button_url']; ?>" />
		</p>
        
        <!-- widget num: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'num' ); ?>"><?php _e('Number of posts to show:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'num' ); ?>" name="<?php echo $this->get_field_name( 'num' ); ?>" value="<?php echo $instance['num']; ?>" />
		</p>
        
        <!-- widget filter: text input -->
		<p>
			<label for="<?php echo $this->get_field_id( 'filter-cat' ); ?>"><?php _e('Categories Filter:', GETTEXT_DOMAIN) ?></label>
			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'filter-cat' ); ?>" name="<?php echo $this->get_field_name( 'filter-cat' ); ?>" value="<?php echo $instance['filter-cat']; ?>" />
            <small><?php _e('(enter categories [slugs separated by commas] you would like to display)', GETTEXT_DOMAIN) ?></small>
        </p>
        
        <!-- widget filter: text input -->
        <p><input id="<?php echo $this->get_field_id('filter'); ?>" name="<?php echo $this->get_field_name('filter'); ?>" type="checkbox" <?php checked(isset($instance['filter']) ? $instance['filter'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('filter'); ?>"><?php _e('Automatically add paragraphs', GETTEXT_DOMAIN) ?></label></p>

	
	<?php
	}
}
?>