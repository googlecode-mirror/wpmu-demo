<?php
/* Widgets Functions  */
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name'=>'Site Features Box',
    'before_widget' => '',
    'after_widget' => '',
    'before_title' => '',
    'after_title' => ''
));

$dynamic_widget_sidebar_areas = array(
		/* rename or create new dynamic sidebars */
    "General Sidebar",
		"Homepage Sidebar",
		"Blog Sidebar",
    "Contact Sidebar",
		"Sidebar Page 1",
		"Sidebar Page 2",
		"Sidebar Page 3",
		"Sidebar Page 4",
		"Sidebar Page 5"
		);
if ( function_exists('register_sidebar') ) {
    foreach ($dynamic_widget_sidebar_areas as $widget_area_name) {
        register_sidebar(array(
           'name'=> $widget_area_name,
           'before_widget' => '<div  id="%1$s"  class="sidebox %2$s"><div class="sidebox-top"></div><div class="sidebox-content">',
           'after_widget' => '</div><div class="sidebox-bottom"></div></div>',
           'before_title' => '<h4 class="sidebox-heading">',
           'after_title' => '</h4>'
        ));
    }
}

$dynamic_widget_bottom_areas = array(
		/* rename or create new dynamic sidebars */
    "Bottom 1",
		"Bottom 2",
		"Bottom 3"
		);
if ( function_exists('register_sidebar') ) {
    foreach ($dynamic_widget_bottom_areas as $widget_area_name) {
        register_sidebar(array(
           'name'=> $widget_area_name,
           'before_widget' => '<div id="%1$s" class="widgets %2$s">',
           'after_widget' => '</div>',
           'before_title' => '<h4>',
           'after_title' => '</h4>'
        ));
    }
}


class PageBox_Widget extends WP_Widget {
  function PageBox_Widget() {
    $widgets_opt = array('description'=>'Display pages as small box in sidebar');
    parent::WP_Widget(false,$name= "corbiz - Page to Box",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $pageid = esc_attr($instance['pageid']);
    $opt_thumbnail = esc_attr($instance['opt_thumbnail']);
    $pageexcerpt = esc_attr($instance['pageexcerpt']);
    
		$pages = get_pages();
		$listpages = array();
		foreach ($pages as $pagelist ) {
		   $listpages[$pagelist->ID] = $pagelist->post_title;
		}
  ?>  
	 <p><label>Please select the page
		<select  name="<?php echo $this->get_field_name('pageid'); ?>"  id="<?php echo $this->get_field_id('pageid'); ?>" >
			<?php foreach ($listpages as $opt => $val) { ?>
		<option value="<?php echo $opt ;?>" <?php if ( $pageid  == $opt) { echo ' selected="selected" '; }?>><?php echo $val; ?></option>
		<?php } ?>
		</select>
		</label></p>
  <p>
		<input class="checkbox" type="checkbox" <?php if ($opt_thumbnail == "on") echo "checked";?> id="<?php echo $this->get_field_id('opt_thumbnail'); ?>" name="<?php echo $this->get_field_name('opt_thumbnail'); ?>" />
		<label for="<?php echo $this->get_field_id('opt_thumbnail'); ?>"><small>display thumbnail?</small></label><br />
    </p>
    <p><label for="pageexcerpt">Number of words for excerpt :
  		<input id="<?php echo $this->get_field_id('pageexcerpt'); ?>" name="<?php echo $this->get_field_name('pageexcerpt'); ?>" type="text" class="widefat" value="<?php echo $pageexcerpt;?>" /></label></p>  
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $pageid = apply_filters('pageid',$instance['pageid']);
    $opt_thumbnail = apply_filters('opt_thumbnail',$instance['opt_thumbnail']);
    $pageexcerpt = apply_filters('pageexcerpt',$instance['pageexcerpt']);
    if ($pageexcerpt =="") $pageexcerpt = 20;
  
    $pagelist = new WP_Query('post_type=page&page_id='.$pageid);
    
    echo $before_widget;
    
    while ($pagelist->have_posts()) : $pagelist->the_post();
    $image_thumbnail = get_post_meta($post->ID, '_page_thumbnail_image', true );
    
    $title = $before_title.get_the_title().$after_title;
    
    echo $title;
    ?>
     <?php if ($opt_thumbnail == "on") { ?>
        <div class="boximg2">
        <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
        <div class="side-box">
          <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
            <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=124&amp;w=236&amp;zc=1"  alt="" />
          <?php } ?>
        </div>
        <?php } ?>
        </div>
        <?php 
        }  
      ?>
    <p><?php echo excerpt($pageexcerpt);?><a href="<?php the_permalink();?>"  class="linkreadmore"> Read more &raquo;</a></p>
    <?php      
    endwhile;
    echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("PageBox_Widget");'));

/* Latest News Widget */

class LatestNews_Widget extends WP_Widget {
  
  function LatestNews_Widget() {
    $widgets_opt = array('description'=>'corbiz Latest News Theme Widget');
    parent::WP_Widget(false,$name= "corbiz - Latest News",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $catid = esc_attr($instance['catid']);
    $newstitle = esc_attr($instance['newstitle']);
    $numnews = esc_attr($instance['numnews']);
    
    $categories_list = get_categories('hide_empty=0');
    
    $categories = array();
    foreach ($categories_list as $catlist) {
    	$categories[$catlist->cat_ID] = $catlist->cat_name;
    }

  ?>
    <p><label for="newstitle">Title:
  		<input id="<?php echo $this->get_field_id('newstitle'); ?>" name="<?php echo $this->get_field_name('newstitle'); ?>" type="text" class="widefat" value="<?php echo $newstitle;?>" /></label></p>  
	 <p><small>Please select category for <b>News</b>.</small></p>
		<select  name="<?php echo $this->get_field_name('catid'); ?>"  id="<?php echo $this->get_field_id('catid'); ?>" >
			<?php foreach ($categories as $opt => $val) { ?>
		<option value="<?php echo $opt ;?>" <?php if ( $catid  == $opt) { echo ' selected="selected" '; }?>><?php echo $val; ?></option>
		<?php } ?>
		</select>
		</label></p>	
    <p><label for="numnews">Number to display:
  		<input id="<?php echo $this->get_field_id('numnews'); ?>" name="<?php echo $this->get_field_name('numnews'); ?>" type="text" class="widefat" value="<?php echo $numnews;?>" /></label></p>
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $catid = apply_filters('catid',$instance['catid']);
    $newstitle = apply_filters('newstitle',$instance['newstitle']);
    $numnews = apply_filters('numnews',$instance['numnews']);    
    
    if ($numnews == "") $numnews = 3;
    if ($newstitle == "") $newstitle = "Latest News";
    
    echo $before_widget;
    echo $title = $before_title.$newstitle.$after_title;
    echo imediapixel_latestnews($title,$catid,$numnews,"date",12,"square",20);
    ?>
   <div class="clear"></div>
   <?php
   wp_reset_query();    
   echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("LatestNews_Widget");'));

/* Latest News Widget */

class LatestWorks_Widget extends WP_Widget {
  
  function LatestWorks_Widget() {
    $widgets_opt = array('description'=>'Display latest portfolio item randomly in sidebar');
    parent::WP_Widget(false,$name= "corbiz - Latest Work",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $pftitle = esc_attr($instance['pftitle']);
    
    
  ?>
    <p><label for="pftitle">Title:
  		<input id="<?php echo $this->get_field_id('pftitle'); ?>" name="<?php echo $this->get_field_name('pftitle'); ?>" type="text" class="widefat" value="<?php echo $pftitle;?>" /></label></p>
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $pftitle = apply_filters('pftitle',$instance['pftitle']);
    
    if ($pftitle == "") $pftitle = __("Latest Work",'corbiz');
    
    echo $before_widget;
    $title = $before_title.$pftitle.$after_title;
    //echo imediapixel_latest_portfolio(1,1,"random","DESC",$category="",$description="true","false",12,"View Detail");
    imediapixel_latestworks($num=1,$title)
    ?>
    <div class="clear"></div>
   <?php
   wp_reset_query();    
   echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("LatestWorks_Widget");'));

/* Testimonial Widget */

class Testimonial_Widget extends WP_Widget {
  function Testimonial_Widget() {
    $widgets_opt = array('description'=>'corbiz Testimonial Theme Widget');
    parent::WP_Widget(false,$name= "corbiz - Testimonial",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $catid = esc_attr($instance['catid']);
    $testititle = esc_attr($instance['testititle']);
    $numtesti = esc_attr($instance['numtesti']);
    
    $categories_list = get_categories('hide_empty=0');
    
    $categories = array();
    foreach ($categories_list as $catlist) {
    	$categories[$catlist->cat_ID] = $catlist->cat_name;
    }

  ?>
    <p><label for="testititle">Title:
  		<input id="<?php echo $this->get_field_id('testititle'); ?>" name="<?php echo $this->get_field_name('testititle'); ?>" type="text" class="widefat" value="<?php echo $testititle;?>" /></label></p>  
	 <p><small>Please select category for <b>Testimonial</b>.</small></p>
		<select  name="<?php echo $this->get_field_name('catid'); ?>"  id="<?php echo $this->get_field_id('catid'); ?>" >
			<?php foreach ($categories as $opt => $val) { ?>
		<option value="<?php echo $opt ;?>" <?php if ( $catid  == $opt) { echo ' selected="selected" '; }?>><?php echo $val; ?></option>
		<?php } ?>
		</select>
		</label></p>	
    <p><label for="numtesti">Number to display:
  		<input id="<?php echo $this->get_field_id('numtesti'); ?>" name="<?php echo $this->get_field_name('numtesti'); ?>" type="text" class="widefat" value="<?php echo $numtesti;?>" /></label></p>
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $catid = apply_filters('catid',$instance['catid']);
    $testititle = apply_filters('testititle',$instance['testititle']);
    $numtesti = apply_filters('numtesti',$instance['numtesti']);    
        
    if ($numtesti == "") $numtesti = 1;
    if ($testititle == "") $testititle = "Testimonials";
    
    echo $before_widget;
    $title = $before_title.$testititle.$after_title;
    echo imediapixel_testimonial($catid,$numtesti,$title,"");
   echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("Testimonial_Widget");'));


/* Post to Homepage Box or Sidebar Box Widget */

class PostBox_Widget extends WP_Widget {
  function PostBox_Widget() {
    $widgets_opt = array('description'=>'Display Posts as small box in sidebar');
    parent::WP_Widget(false,$name= "corbiz - Post to Box",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $postid = esc_attr($instance['postid']);
    $opt_thumbnail = esc_attr($instance['opt_thumbnail']);
    $postexcerpt = esc_attr($instance['postexcerpt']);
    
		$corbizposts = get_posts('numberposts=-1')
		?>  
	<p><label>Please select post display
			<select  name="<?php echo $this->get_field_name('postid'); ?>"  id="<?php echo $this->get_field_id('postid'); ?>" >
				<?php foreach ($corbizposts as $post) { ?>
			<option value="<?php echo $post->ID;?>" <?php if ( $postid  ==  $post->ID) { echo ' selected="selected" '; }?>><?php echo  the_title(); ?></option>
			<?php } ?>
			</select>
	</label></p>
  <p>
		<input class="checkbox" type="checkbox" <?php if ($opt_thumbnail == "on") echo "checked";?> id="<?php echo $this->get_field_id('opt_thumbnail'); ?>" name="<?php echo $this->get_field_name('opt_thumbnail'); ?>" />
		<label for="<?php echo $this->get_field_id('opt_thumbnail'); ?>"><small>display thumbnail?</small></label><br />
    </p>
    <p><label for="postexcerpt">Number of words for excerpt :
  		<input id="<?php echo $this->get_field_id('postexcerpt'); ?>" name="<?php echo $this->get_field_name('postexcerpt'); ?>" type="text" class="widefat" value="<?php echo $postexcerpt;?>" /></label></p>  
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $postid = apply_filters('postid',$instance['postid']);
    $opt_thumbnail = apply_filters('opt_thumbnail',$instance['opt_thumbnail']);
    $postexcerpt = apply_filters('postexcerpt',$instance['postexcerpt']);
    if ($postexcerpt =="") $postexcerpt = 20;
    
    echo $before_widget;
    $postlist = new WP_Query('p='.$postid);
    
    while ($postlist->have_posts()) : $postlist->the_post();
    $image_thumbnail = get_post_meta($post->ID, '_image_thumbnail', true );
    $title = $before_title.get_the_title().$after_title;
    
    echo $title;
    ?>
      <?php if ($opt_thumbnail == "on") { ?>
        <div class="boximg2">
        <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
        <div class="side-box">
          <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
            <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=124&amp;w=236&amp;zc=1"  alt="" />
          <?php } ?>
        </div>
        <?php } ?>
        </div>
        <?php 
        }  
      ?>
    <p><?php echo excerpt($postexcerpt);?><a href="<?php the_permalink();?>"  class="linkreadmore"> <?php echo __('Read more &raquo;','corbiz');?></a></p>
    <?php   endwhile;
    echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("PostBox_Widget");'));



/* Contact Info Widget */
class OfficeAdress_Widget extends WP_Widget {
  function OfficeAdress_Widget() {
    $widgets_opt = array('description'=>'display your contact information');
    parent::WP_Widget(false,$name= "corbiz - Contact Info",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $contact_title = esc_attr($instance['contact_title']);
  ?>
  <p><label for="contact_title"><?php echo __('Title','corbiz');?>:
  		<input id="<?php echo $this->get_field_id('contact_title'); ?>" name="<?php echo $this->get_field_name('contact_title'); ?>" type="text" class="widefat" value="<?php echo $contact_title;?>"/></label></p>
    <?php    
  } 
  
  function update($new_instance, $old_instance) {
		
		return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $contact_title = apply_filters('contact_title',$instance['contact_title']);
    
    echo $before_widget;
    
    echo $before_title.$contact_title.$after_title;
    
    ?>
    
    <?php
      $info_address = get_option('corbiz_info_address') ? stripslashes(get_option('corbiz_info_address')) : "Jln. Damai menuju Syurga No. 14,<br />Jakarta 20035,<br />Indonesia";
      $info_phone = get_option('corbiz_info_phone');
      $info_fax = get_option('corbiz_info_fax');
      $info_email= get_option('corbiz_info_email');
      $info_website = get_option('corbiz_info_website');
      $info_latitude = get_option('corbiz_info_latitude') ? get_option('corbiz_info_latitude') : "-6.229555086277892";
      $info_longitude = get_option('corbiz_info_longitude') ? get_option('corbiz_info_longitude') : "106.82551860809326";
    ?>        
    <div id="contact-map">
      <?php echo theme_widget_text_shortcode(do_shortcode('[gmap width="260" height="280" latitude="'.$info_latitude.'" longitude="'.$info_longitude.'" zoom="15" html="'.$info_address.'" popup="true" controls="true" marker="true"]'));?>
    </div>
    <ul class="addresslist">
        <li><?php echo stripslashes($info_address);?></li>
        <li><strong><?php echo __('Phone ','corbiz');?></strong>: <?php echo $info_phone ? $info_phone : "+62 525625";?></li>
        <?php if ($info_fax !="") { ?>
          <li><strong><?php echo __('FAX ','corbiz');?></strong>: <?php echo $info_fax ? $info_fax : "+62 525625";?></li>
          <?php } ?>
        <li><strong><?php echo __('Email ','corbiz');?></strong>: <a href="mailto:<?php echo $info_email;?>"><?php echo $info_email ? $info_email : "info@mydomain.com";?></a></li>
        <li><strong><?php echo __('Website ','corbiz');?></strong>: <a href="http://<?php echo $info_website;?>"><?php echo $info_website ? $info_website : "www.mydomain.com";?></a></li>
      </ul>    

   <?php
    echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("OfficeAdress_Widget");'));

/* Twitter Widget */
class Twitter_Widget extends WP_Widget {
  function Twitter_Widget() {
    $widgets_opt = array('description'=>'display your latest twitter feed');
    parent::WP_Widget(false,$name= "corbiz - Twitter Update",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $twittertitle = esc_attr($instance['twittertitle']);
    $twitternum = esc_attr($instance['twitternum']);

  ?>
    <p><label for="twittertitle">Title:
  		<input id="<?php echo $this->get_field_id('twittertitle'); ?>" name="<?php echo $this->get_field_name('twittertitle'); ?>" type="text" class="widefat" value="<?php echo $twittertitle;?>" /></label></p>
    <p><label for="twitternum">Number to dispay:
  		<input id="<?php echo $this->get_field_id('twitternum'); ?>" name="<?php echo $this->get_field_name('twitternum'); ?>" type="text" class="widefat" value="<?php echo $twitternum;?>" /></label></p>                            
	  <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    echo $before_widget;
    
    $twittertitle = apply_filters('twittertitle',$instance['twittertitle']);
    $twitternum = apply_filters('twitternum',$instance['twitternum']);
       
    if ($twittertitle =="") $twittertitle = __("Twitter Update!",'corbiz');
    $title = $before_title.$twittertitle.$after_title;
    
    imediapixel_twitter_feed($title,$twitternum);
    
    echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("Twitter_Widget");'));

/* Flickr Widget */
class Flickr_Widget extends WP_Widget {
  function Flickr_Widget() {
    $widgets_opt = array('description'=>'display your latest twitter feed');
    parent::WP_Widget(false,$name= "corbiz - Flickr Gallery",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $flickrtitle = esc_attr($instance['flickrtitle']);
    $flickrnum = esc_attr($instance['flickrnum']);

  ?>
    <p><label for="flickrtitle">Title:
  		<input id="<?php echo $this->get_field_id('flickrtitle'); ?>" name="<?php echo $this->get_field_name('flickrtitle'); ?>" type="text" class="widefat" value="<?php echo $flickrtitle;?>" /></label></p>
    <p><label for="flickrnum">Number to dispay:
  		<input id="<?php echo $this->get_field_id('flickrnum'); ?>" name="<?php echo $this->get_field_name('flickrnum'); ?>" type="text" class="widefat" value="<?php echo $flickrnum;?>" /></label></p>                            
	  <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    echo $before_widget;
    
    $flickrtitle = apply_filters('flickrtitle',$instance['flickrtitle']);
    $flickrnum = apply_filters('flickrnum',$instance['flickrnum']);
    
    if ($flickrtitle =="") $flickrtitle = __("Flickr Gallery",'corbiz');
    if ($flickrnum == "") $flickrnum = 6;
    
    $title = $before_title.$flickrtitle.$after_title;
    
    $flickr_id = get_option('corbiz_flickr_id');
    
    imediapixel_flickr_gallery($title,$flickr_id,$flickrnum);
    
    echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("Flickr_Widget");'));

/* Brochure Widget */
/**
 * Brochure_Widget
 * 
 * @package wp
 * @author AllBots.ORG
 * @copyright 2011
 * @version $Id$
 * @access public
 */
class Brochure_Widget extends WP_Widget {
  function Brochure_Widget() {
    $widgets_opt = array('description'=>'Display your brochure and download link');
    parent::WP_Widget(false,$name= "corbiz - Brochure",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $brochure_title = esc_attr($instance['brochure_title']);
    $brochure_desc = esc_attr($instance['brochure_desc']);
    $brochure_download_url = esc_attr($instance['brochure_download_url']);

  ?>
    <p><label for="brochure_title">Title:
  		<input id="<?php echo $this->get_field_id('brochure_title'); ?>" name="<?php echo $this->get_field_name('brochure_title'); ?>" type="text" class="widefat" value="<?php echo $brochure_title;?>" /></label></p>
    <p><label for="brochure_download_url">Brochure Download Url:
  		<input id="<?php echo $this->get_field_id('brochure_download_url'); ?>" name="<?php echo $this->get_field_name('brochure_download_url'); ?>" class="widefat" value="<?php echo $brochure_download_url;?>"/></label></p>
    <p><label for="brochure_desc"><?php echo __('Description','corbiz');?>:</label>
		<textarea id="<?php echo $this->get_field_id('brochure_desc'); ?>" name="<?php echo $this->get_field_name('brochure_desc'); ?>" class="widefat" rows="6" cols="20" ><?php echo $brochure_desc;?></textarea></p>  
	  <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $brochure_title = apply_filters('brochure_title',$instance['brochure_title']);
    $brochure_desc = apply_filters('brochure_desc',$instance['brochure_desc']);
    $brochure_download_url = apply_filters('brochure_download_url',$instance['brochure_download_url']);    
    
    echo $before_widget;
    echo $before_title.$brochure_title.$after_title;
    ?>
    <a href="<?php echo $brochure_download_url;?>"><img src="<?php echo get_template_directory_uri();?>/images/pdf.png" alt="" class="alignleft" /></a>
    <p><?php echo $brochure_desc;?></p>
    <a href="<?php echo $brochure_download_url;?>" class="button"><span><?php echo __('DOWNLOAD NOW!','corbiz');?><img src="<?php echo get_template_directory_uri();?>/images/arrow_grey.png" alt="" class="readmore"/></span></a>
    <div class="clear"></div>    
  <?php 
   echo $after_widget;
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("Brochure_Widget");'));

/* Site Feature 1 Column Widget */
class SiteFeature_1Col_Widget extends WP_Widget {
  function SiteFeature_1Col_Widget() {
    $widgets_opt = array('description'=>'Display your site feature in one column (Quote box)');
    parent::WP_Widget(false,$name= "corbiz - 1 Column Site Feature",$widgets_opt);
  }
  
  function form($instance) {
    global $post;
    
    $quotetext = esc_attr($instance['quotetext']);

  ?>
    <p><label for="quotetext"><?php echo __('Box Content','corbiz');?>:</label>
		<textarea id="<?php echo $this->get_field_id('quotetext'); ?>" name="<?php echo $this->get_field_name('quotetext'); ?>" class="widefat" rows="6" cols="20" ><?php echo $quotetext;?></textarea></p>                            
	  <?php    
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    $quotetext= apply_filters('quotetext',$instance['quotetext']);
    get_template_part('featureslist-1col','1 column text');
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("SiteFeature_1Col_Widget");'));

/* Site Feature 2 Columns Widget */
class SiteFeature_2Col_Widget extends WP_Widget {
  function SiteFeature_2Col_Widget() {
    $widgets_opt = array('description'=>'Display your site feature in two columns');
    parent::WP_Widget(false,$name= "corbiz - 2 Column Site Feature",$widgets_opt);
  }
  
  function form($instance) {
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    
    extract($args);
    
    get_template_part('featureslist-2col','2 columns site features');
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("SiteFeature_2Col_Widget");'));

/* Site Feature 3 Columns Widget */
class SiteFeature_3Col_Widget extends WP_Widget {
  function SiteFeature_3Col_Widget() {
    $widgets_opt = array('description'=>'Display your site feature in three columns');
    parent::WP_Widget(false,$name= "corbiz - 3 Column Site Features",$widgets_opt);
  }
  
  function form($instance) {
  } 
  
  function update($new_instance, $old_instance) {
    return $new_instance;
  }
  
  function widget( $args, $instance ) {
    global $post;
    
    extract($args);
    
    get_template_part('featureslist-3col','3 columns site features');
  } 
}

add_action('widgets_init', create_function('', 'return register_widget("SiteFeature_3Col_Widget");'));
?>