<?php get_header();?>
  
   <?php
      global $post;
      
      $blog_page = get_option('corbiz_blog_page');
      $blog_page_id = get_page_by_title($blog_page);
      $heading_image = get_post_meta($blog_page_id->ID,"_heading_image",true); 
      $page_short_desc = get_post_meta($blog_page_id->ID,"_page_short_desc",true);
    ?>
              <div id="pageheading">
                <!--Page Heading Image -->
                <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading1.jpg';?>" alt="" />        
                
                <?php if ($page_short_desc !="") { ?>
                  <div id="page-slogan">      
                     <h4><?php echo $page_short_desc;?></h4>
                     <div class="clear"></div>
                  </div>
                <?php } else { ?>
                <!-- page heading title-->  
                  <div id="page-title" class="col_13">
                    <h3><?php echo __('404 Page','corbiz');?></h3>
                  </div>
                  <!-- page heading title end-->
                  
                  <!-- page heading description-->  
                  <div id="page-desc" class="col_23 last">
                  <?php $enable_breadcrumbs = get_option('corbiz_enable_breadcrumb');?>
                  <?php if ($enable_breadcrumbs =="true") { ?>
                    <div class="breadcrumbs">
                      <?php if ( function_exists( 'breadcrumbs_plus' ) ) breadcrumbs_plus(); ?>
                    </div>
                    <?php } ?>
                  </div>  
                  <!-- page heading description end-->            
                  <?php } ?>
              
              </div>  
              <div class="clear"></div>
          </div>
          </div>
          <div class="round-wrapper-bottom"></div>
          <?php $heading_shadow = get_option('corbiz_heading_shadow');?>
          <img src="<?php echo get_template_directory_uri();?>/images/shadow/<?php echo $heading_shadow ? $heading_shadow : "shadow1.png";?>" alt="" class="bottom-shadow"/>
      </div>
    </div>
  </div>

  <div class="clear"></div>
  
  <!--main content-->
  <div class="center">
    <div class="maincontent">
      <div class="pagecontent col_23<?php if ($page_sidebar_position == "Left") echo ' last';?>">
      <?php $_404_text = (get_option('corbiz_404_text')) ? get_option('corbiz_404_text') : __("Apologies, but the page you requested could not be found",'corbiz');?>
      <h2><?php echo stripslashes($_404_text);?></h2>
      <h4><?php echo __('Try different search?','efolio');?></h4>
      <!-- search-->
      <div class="searchbox" style="float: left;">
        <form  method="get" id="search" action="<?php echo home_url(); ?>/">
          <div>
            <input type="text" class="searchtext" value="<?php echo __('Search...','corbiz');?>" onblur="if (this.value == ''){this.value = '<?php echo __('Search...','corbiz');?>'; }" onfocus="if (this.value == '<?php echo __('Search...','corbiz');?>') {this.value = ''; }"   name="s" id="s"/>
            <input type="submit" class="searchbutton" value="" />
          </div>      						                	
        </form>
      </div>
      
      </div>
      <?php get_sidebar();?>            
            
    </div>
  </div>
  
<?php get_footer();?>