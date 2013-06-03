  <!--sidebar-->
  <?php 
    global $post; 
    $page_sidebar_position = get_post_meta($post->ID,'_page_sidebar_position',true);
    $enable_child_sidebar = get_option('corbiz_enable_child_sidebar');
  ?>
  <div id="sidebar" class="col_13<?php if ($page_sidebar_position != "Left") echo ' last';?>">
  
    <?php
    if ($enable_child_sidebar == "true") { 
  		$children=wp_list_pages( 'echo=0&child_of=' . $post->ID . '&title_li' );
  		if ($children) {
  			$parent = $post->ID;
  		}else{
  			$parent = $post->post_parent;
  			if(!$parent){
  				$parent = $post->ID;
  			}
  		}              
      $children = wp_list_pages("title_li=&child_of=".$parent."&echo=0&depth=1&menu_order=sort_column");
      $parent_title = get_the_title($parent);
      ?>      
      
      <?php
      if (!is_home() && !is_front_page()) { 
        if ($children) { 
        ?>
        <div class="sidebox">
        <div class="sidebox-top"></div>
          <div class="sidebox-content">
            <h4 class="sidebox-heading"><?php echo $parent_title;?></h4>             
              <ul>
       	      <?php echo $children;?>
            </ul>                                                  
          </div>                  
        <div class="sidebox-bottom"></div>
      </div>
      
    <?php } 
      }
    }
    ?>   
    
    <?php 
    $sidebar_name = get_post_meta($post->ID,"_page_sidebar_widget",true);
    dynamic_sidebar($sidebar_name);
    
    if (is_single() || is_archive() || is_category() || is_search() || is_404()) {
		  dynamic_sidebar('Blog Sidebar');
    }
    ?>
  </div>
  <!--sidebar end-->