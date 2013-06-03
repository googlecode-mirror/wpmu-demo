<?php
/* Register Custom Post Type for Portfolio */
add_action('init', 'portfolio_post_type_init');
function portfolio_post_type_init() {
  $labels = array(
    'name' => __('Portfolio', 'post type general name','corbiz'),
    'singular_name' => __('portfolio', 'post type singular name','corbiz'),
    'add_new' => __('Add New', 'portfolio','corbiz'),
    'add_new_item' => __('Add New portfolio','corbiz'),
    'edit_item' => __('Edit portfolio','corbiz'),
    'new_item' => __('New portfolio','corbiz'),
    'view_item' => __('View portfolio','corbiz'),
    'search_items' => __('Search portfolio','corbiz'),
    'not_found' =>  __('No portfolio found','corbiz'),
    'not_found_in_trash' => __('No portfolio found in Trash','corbiz'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 1000,
    'rewrite' => array(
      'slug' => 'portfolio_item',
      'with_front' => FALSE,
    ),    
    'supports' => array(
      'title',
      'editor',
      'author',
      'thumbnail',
      'excerpt',
      'comments',
      'thumbnail',
      'trackbacks',
      'custom-fields',
      'revisions',
      'page-attributes'
    )
  );

  register_post_type('portfolio',$args);
}

register_taxonomy("portfolio_category", 
			    	array("portfolio"), 
			    	array( "hierarchical" => true, 
			    			"label" => __("Portfolio Categories",'corbiz'), 
			    			"singular_label" => __("Portfolio Categories",'corbiz'), 
			    			"rewrite" => true,
			    			"query_var" => true,
                "rewrite" => array(
                  "slug" => "portfolio_category"
                )
			    		));  
			    		
/* Register Custom Post Type for Slideshow */
add_action('init', 'slideshow_post_type_init');

function slideshow_post_type_init() {
  $labels = array(
    'name' => __('Slideshow', 'post type general name','corbiz'),
    'singular_name' => __('slideshow', 'post type singular name','corbiz'),
    'add_new' => __('Add New', 'slideshow','corbiz'),
    'add_new_item' => __('Add New slideshow','corbiz'),
    'edit_item' => __('Edit slideshow','corbiz'),
    'new_item' => __('New slideshow','corbiz'),
    'view_item' => __('View slideshow','corbiz'),
    'search_items' => __('Search slideshow','corbiz'),
    'not_found' =>  __('No slideshow found','corbiz'),
    'not_found_in_trash' => __('No slideshow found in Trash','corbiz'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 1000,
    'rewrite' => array(
      'slug' => 'slideshow_item',
      'with_front' => FALSE,
    ),
    'supports' => array(
      'title',
      'editor',
      'author',
      'thumbnail',
      'excerpt',
      'comments',
      'thumbnail',
      'trackbacks',
      'custom-fields',
      'revisions'       
    )
  );
  register_post_type('slideshow',$args);
}

register_taxonomy("slideshow_category", 
  	array("slideshow"), 
  	array( "hierarchical" => true, 
  			"label" => __("Slideshow Categories",'efolio'), 
  			"singular_label" => __("Slideshow Categories",'efolio'), 
  			"rewrite" => true,
  			"query_var" => true,
        "rewrite" => array(
          "slug" => "slideshow_item"
        )				    			
  		));

      
                
/* Register Custom Post Type for Products */
add_action('init', 'products_post_type_init');
function products_post_type_init() {
  $labels = array(
    'name' => __('Product', 'post type general name','corbiz'),
    'singular_name' => __('product', 'post type singular name','corbiz'),
    'add_new' => __('Add New', 'product','corbiz'),
    'add_new_item' => __('Add New product','corbiz'),
    'edit_item' => __('Edit product','corbiz'),
    'new_item' => __('New product','corbiz'),
    'view_item' => __('View product','corbiz'),
    'search_items' => __('Search product','corbiz'),
    'not_found' =>  __('No product found','corbiz'),
    'not_found_in_trash' => __('No product found in Trash','corbiz'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'rewrite' => true,
    'query_var' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'show_in_nav_menus' => false,
    'menu_position' => 1000,
    'rewrite' => array(
      'slug' => 'product',
      'with_front' => FALSE,
    ),    
    'supports' => array(
      'title',
      'editor',
      'author',
      'thumbnail',
      'excerpt',
      'comments',
      'thumbnail',
      'trackbacks',
      'custom-fields',
      'revisions'       
    )
  );
  register_post_type('product',$args);
}

  
	register_taxonomy_for_object_type('post_tag', 'product');

	register_taxonomy("product_category", 
				    	array("product"), 
				    	array( "hierarchical" => true, 
				    			"label" => __("Product Categories",'corbiz'), 
				    			"singular_label" => __("Product Categories",'corbiz'), 
				    			"rewrite" => true,
				    			"query_var" => true,
                  "rewrite" => array(
                    "slug" => "products"
                  )				 				    			
				    		));
                
  
?>