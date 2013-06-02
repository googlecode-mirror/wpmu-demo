<?php
/* walker for wp_list_categories (portfolio filter)
================================================== */
class portfolio_filter_walker extends Walker_Category {
   function start_el(&$output, $category, $depth, $args) {
      extract($args);
      $cat_name = esc_attr( $category->name);
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
	  $link = '<a href="javascript:void(0)" ';
      $link .= 'title="' . sprintf( __('View all items filed under', GETTEXT_DOMAIN), $cat_name) . '" ';
      $link .= 'rel="'.$cat_name.'"';
      $link .= '>';
      // $link .= $cat_name . '</a>';
      $link .= $cat_name;
      $link .= '</a>';
      if ( isset($current_category) && $current_category )
         $_current_category = get_category( $current_category );
      if ( 'list' == $args['style'] ) {
          $output .= "<li class='cat-item cat-item-".$category->term_id;
          $output .= "'>$link\n";
       } else {
          $output .= "\t$link<br />\n";
       }
   }
}
/* walker for wp_list_categories (sidebar,blog-post)
================================================== */
class category_walker extends Walker_Category {
   function start_el(&$output, $category, $depth, $args) {
      extract($args);
      $cat_name = esc_attr( $category->name);
      $cat_name = apply_filters( 'list_cats', $cat_name, $category );
	  $link = '<a href="' . get_category_link( $category->term_id ) . '" data-value="term-'.$category->term_id.'" ';
      if ( $use_desc_for_title == 0 || empty($category->description) )
         $link .= 'title="' . sprintf( __('View all items filed under %s', GETTEXT_DOMAIN), $cat_name) . '"';
      else
         $link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
      $link .= '>';
      // $link .= $cat_name . '</a>';
      $link .= $cat_name;
      if(!empty($category->description)) {
         $link .= ' <span>'.$category->description.'</span>';
      }
      $link .= '</a>';
      if ( (! empty($feed_image)) || (! empty($feed)) ) {
         $link .= ' ';
         if ( empty($feed_image) )
            $link .= '(';
         $link .= '<a href="' . get_category_feed_link($category->term_id, $feed_type) . '"';
         if ( empty($feed) )
            $alt = ' alt="' . sprintf( __('Feed for all posts filed under %s', GETTEXT_DOMAIN), $cat_name ) . '"';
         else {
            $title = ' title="' . $feed . '"';
            $alt = ' alt="' . $feed . '"';
            $name = $feed;
            $link .= $title;
         }
         $link .= '>';
         if ( empty($feed_image) )
            $link .= $name;
         else
            $link .= "<img src='$feed_image'$alt$title" . ' />';
         $link .= '</a>';
         if ( empty($feed_image) )
            $link .= ')';
      }
      if ( isset($show_count) && $show_count )
         $link .= ' (' . intval($category->count) . ')';
      if ( isset($show_date) && $show_date ) {
         $link .= ' ' . gmdate('Y-m-d', $category->last_update_timestamp);
      }
      if ( isset($current_category) && $current_category )
         $_current_category = get_category( $current_category );
      if ( 'list' == $args['style'] ) {
          $output .= "<li class='cat-item cat-item-".$category->term_id;
          if ( isset($current_category) && $current_category && ($category->term_id == $current_category) )
             $output .=  ' current-cat';
          elseif ( isset($_current_category) && $_current_category && ($category->term_id == $_current_category->parent) )
             $output .=  ' current-cat-parent';
          $output .= "'>$link\n";
       } elseif('comma' == $args['style']) {
          $output .= "\t$link&#44;\n";
       } elseif('blank-space' == $args['style']) {
          $output .= "\t$link\n";
       } else {
          $output .= "\t$link<br />\n";
       }
   }
}
/* walker for the wp_list_pages menu
================================================== */
class page_menu_walker extends Walker {
	var $tree_type = 'page';
	var $db_fields = array ('parent' => 'post_parent', 'id' => 'ID'); //TODO: decouple this

	function start_lvl($output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
		return $output;
	}

	function end_lvl($output, $depth) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
		return $output;
	}

	function start_el($output, $page, $depth, $current_page, $args) {
		if ( $depth )
			$indent = str_repeat("\t", $depth);
		$css_class = 'page_item';
		$_current_page = get_page( $current_page );
		if ( $page->ID == $current_page )
			$css_class .= ' current_page_item';
		elseif ( $_current_page && $page->ID == $_current_page->post_parent )
			$css_class .= ' current_page_parent';
            
       $hover = '<em class="hover"></em><span>';
       $hoverEnd = '</span>';

        if($depth != 0){
            $hover = $hoverEnd = "";
        }

		$output .= $indent . '<li class="' . $css_class . '"><a href="' . get_page_link($page->ID) . '" title="' . esc_attr(apply_filters('the_title', $page->post_title)) . '">'.$hover.'' . apply_filters('the_title', $page->post_title) . ''.$hoverEnd.'</a>';

		if ( !empty($show_date) ) {
			if ( 'modified' == $show_date )
				$time = $page->post_modified;
			else
				$time = $page->post_date;

			$output .= " " . mysql2date($date_format, $time);
		}

		return $output;
	}

	function end_el($output, $page, $depth) {
		$output .= "</li>\n";

		return $output;
	}

}

/* walker for the wp_nav_menu menu
================================================== */
class nav_menu_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '';
           $append = '';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';
           $hover = '<em class="hover"></em><span>';
           $hoverEnd = '</span>';

           if($depth != 0)
           {
                     $description = $append = $prepend = $hover = $hoverEnd = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>'.$hover;
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $hoverEnd .'</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}
?>