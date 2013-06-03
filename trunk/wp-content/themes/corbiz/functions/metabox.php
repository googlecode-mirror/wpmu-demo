<?php  

/* Add Meta Box for Portfolio */
function imediapixel_portfolio_meta_boxes() {
  $meta_boxes = array(
    "portfolio_link" => array(
      "name" => "_portfolio_link",
      "title" => __("Preview link",'corbiz'),
      "description" => "please enter image or video url if you want to create video post.<br/>Images : <br />http://localhost/corbiz/wp-content/uploads/2010/07/image.jpg<br/> Video : <br />
      http://www.youtube.com/watch?v=tESK9RcyexU<br />
      http://vimeo.com/12816548<br />
      http://localhost/corbiz/wp-content/uploads/2010/07/sample.3gp<br />
      http://localhost/corbiz/wp-content/uploads/2010/07/sample.mp4<br />
      http://localhost/corbiz/wp-content/uploads/2010/07/sample.mov<br />
      http://www.adobe.com/jp/events/cs3_web_edition_tour/swfs/perform.swf?width=680&height=405<br />
      Note : for swf movie, you need to specify the width and height for movie, as above example",
      "type" => "text"
    ),
    "portfolio_url" => array(
      "name" => "_portfolio_url",
      "title" => __("Custom URL",'corbiz'),
      "description" => "Add link / custom URL for your portfolio items, eg. link to external url.",
      "type" => "text"
    ),
    "portfolio_images" => array(
      "name" => "_portfolio_images",
      "title" => __("Portfolio Images ",'corbiz'),
      "description" => "please enter your images url in comma-separated, this will be used portfolio single page showcase.",
      "type" => "textarea"
    ),
  );
  
  return apply_filters( 'imediapixel_portfolio_meta_boxes', $meta_boxes );
}

function imediapixel_slideshow_meta_boxes() {

  $meta_boxes = array(
    "slideshow_url" => array(
      "name" => "_slideshow_url",
      "title" => __("Custom Slideshow URL",'corbiz'),
      "description" => __("Custom URL for slideshow items.",'corbiz'),
      "type" => "text"
    )
  );

	return apply_filters( 'imediapixel_slideshow_meta_boxes', $meta_boxes );
}


function imediapixel_product_meta_boxes() {

  $meta_boxes = array(
    "product_price" => array(
      "name" => "_product_price",
      "title" => __("Product Price",'corbiz'),
      "description" => __("Add price for your product",'corbiz'),
      "type" => "text"
    ),
    "product_feature" => array(
      "name" => "_product_feature",
      "title" => __("Product Features",'corbiz'),
      "description" => __("Please enter your product features in comma-separated, eg. feature 1, feature 2",'corbiz'),
      "type" => "textarea"
    ),
    "product_url" => array(
      "name" => "_product_url",
      "title" => __("Custom Product Url",'corbiz'),
      "description" => __("Please enter your custom url for your product,if not setted then will be linked to actual product page",'corbiz'),
      "type" => "text"
    )
  );

	return apply_filters( 'imediapixel_product_meta_boxes', $meta_boxes );
}

function imediapixel_page_meta_boxes() {

  $meta_boxes = array(
    "heading_image" => array(
      "name" => "_heading_image",
      "title" => __("Page Heading Image",'corbiz'),
      "description" => __("Add your image URL that will be used as page heading image.",'corbiz'),
      "type" => "text"
    ),
    "page_short_desc" => array(
      "name" => "_page_short_desc",
      "title" => __("Tagline",'corbiz'),
      "description" => __("Add short tagline for your page.",'corbiz'),
      "type" => "textarea"
    ),
    "page_sidebar_widget" => array(
      "name" => "_page_sidebar_widget",
      "title" => __("Sidebar Position",'corbiz'),
      "description" => __("Select default page sidebar widget",'corbiz'),
      "std" => "None",
      "type" => "select_sidebar_widget"
    ),
    "page_slideshow_type" => array(
      "name" => "_page_slideshow_type",
      "title" => __("Page slideshow type",'corbiz'),
      "description" => __("Select default slideshow for page if your page does not assigned to Full With page template",'corbiz'),
      "std" => "None",
      "type" => "select",
      "options" => array("None","Nivo slider","Kwicks slider","Skitter slider","Anything slider")
    ),
    "page_slideshow_category" => array(
      "name" => "_page_slideshow_category",
      "title" => __("Page slideshow category",'corbiz'),
      "description" => __("Select default slideshow category for page",'corbiz'),
      "std" => "None",
      "type" => "select_slidehow"
    ),
  );

	return apply_filters( 'imediapixel_slideshow_meta_boxes', $meta_boxes );
}

function  portfolio_meta_boxes() {
  global $post;
  $meta_boxes = imediapixel_portfolio_meta_boxes();
  ?>

  <table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = get_post_meta( $post->ID, $meta['name'], true );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );

	endforeach; ?>
  </table>
  <?php
}

function slideshow_meta_boxes() {
	global $post;
	$meta_boxes = imediapixel_slideshow_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );

	endforeach; ?>
	</table>
<?php
}


function product_meta_boxes() {
	global $post;
	$meta_boxes = imediapixel_product_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );

	endforeach; ?>
	</table>
<?php
}

function page_meta_boxes() {
	global $post;
	$meta_boxes = imediapixel_page_meta_boxes(); ?>

	<table class="form-table">
	<?php foreach ( $meta_boxes as $meta ) :

		$value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) );

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
    elseif ( $meta['type'] == 'select_slidehow' )
			get_meta_select_slideshow( $meta, $value );
    elseif ( $meta['type'] == 'select_sidebar_widget' )
			get_meta_select_sidebar_widget( $meta, $value );

	endforeach; ?>
	</table>
<?php
}

function get_meta_text_input( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:10%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_html( $value, 1 ); ?>" size="30" tabindex="30" style="width: 97%;" /><br /><small><?php echo $args['description']; ?></small>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

function get_meta_select( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:10%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach ( $options as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option ) echo ' selected="selected"'; ?>>
					<?php echo $option; ?>
				</option>
			<?php endforeach; ?>
			</select><br /><small><?php echo $args['description']; ?></small>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}


function get_meta_select_slideshow( $args = array(), $value = false ) {

	extract( $args ); 
  
  $slideshow_categories =  get_categories('taxonomy=slideshow_category&orderby=ID&title_li=&hide_empty=0');
  ?>
  
	<tr>
		<th style="width:10%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach ( $slideshow_categories as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option->cat_name ) echo ' selected="selected"'; ?>>
					<?php echo $option->cat_name; ?>
				</option>
			<?php endforeach; ?>
			</select><br /><small><?php echo $args['description']; ?></small>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}


function get_meta_select_sidebar_widget( $args = array(), $value = false ) {

	extract( $args ); 
  
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
  ?>
	<tr>
		<th style="width:10%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<?php foreach ( $dynamic_widget_sidebar_areas as $option ) : ?>
				<option <?php if ( htmlentities( $value, ENT_QUOTES ) == $option) echo ' selected="selected"'; ?>>
					<?php echo $option; ?>
				</option>
			<?php endforeach; ?>
			</select><br /><small><?php echo $args['description']; ?></small>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

function get_meta_textarea( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:10%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="2" tabindex="30" style="width: 97%;"><?php echo esc_html( $value, 1 ); ?></textarea><br /><small><?php echo $args['description']; ?></small>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php
}

function imediapixel_create_meta_box() {
	global $theme_name;
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  
  if ($template_file != "homepage-nivoslider.php" && $template_file != "homepage-kwicksslider.php" && $template_file != "homepage-skitterslider.php" && $template_file != "homepage-anythingslider.php" && $template_file != "homepage-static.php" ) {
    add_meta_box( 'page-meta-boxes', __('Page options','corbiz'), 'page_meta_boxes', 'page', 'normal', 'high' ); 
  }
	add_meta_box( 'slideshow-meta-boxes', __('Slideshow options','corbiz'), 'slideshow_meta_boxes', 'slideshow', 'normal', 'high' );
	add_meta_box( 'portfolio-meta-boxes', __('Portfolio options','corbiz'), 'portfolio_meta_boxes', 'portfolio', 'normal', 'high' );
	add_meta_box( 'product-meta-boxes', __('Product options','corbiz'), 'product_meta_boxes', 'product', 'normal', 'high' );
}

function imediapixel_save_meta_data( $post_id ) {
	global $post;
  
  if ( 'slideshow' == $_POST['post_type'] )
    $meta_boxes = array_merge( imediapixel_slideshow_meta_boxes() );
  else if ( 'page' == $_POST['post_type'] )
    $meta_boxes = array_merge( imediapixel_page_meta_boxes() );
  else if ( 'product' == $_POST['post_type'] )
    $meta_boxes = array_merge( imediapixel_product_meta_boxes() );    
  else
    $meta_boxes = array_merge( imediapixel_portfolio_meta_boxes() );
  
	foreach ( $meta_boxes as $meta_box ) :

		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
			return $post_id;
    
    elseif ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
      
		elseif ( 'slideshow' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		elseif ( 'portfolio' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		elseif ( 'product' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
			
		$data = stripslashes( $_POST[$meta_box['name']] );

		if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
			add_post_meta( $post_id, $meta_box['name'], $data, true );

		elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
			update_post_meta( $post_id, $meta_box['name'], $data );

		elseif ( $data == '' )
			delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );

	endforeach;
}



/* Add a new meta box to the admin menu. */
	add_action( 'admin_menu', 'imediapixel_create_meta_box' );

/* Saves the meta box data. */
	add_action( 'save_post', 'imediapixel_save_meta_data' );

?>