<?php get_header();?>
  
  <?php 
              global $post; 
              $page_sidebar_position = get_post_meta($post->ID,'_page_sidebar_position',true);
              $page_slideshow_type = get_post_meta($post->ID,"_page_slideshow_type",true);
              $slideshow_cat = get_post_meta($post->ID,"_page_slideshow_category",true);
              $heading_image = get_post_meta($post->ID,"_heading_image",true);
              $bgtext_heading_position = get_post_meta($post->ID,"_bgtext_heading_position",true);
              $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
              $slideshow_order = get_option('corbiz_slideshow_order') ? get_option('corbiz_slideshow_order') : "date";
            ?>
  
            <?php if ($page_slideshow_type !="None"  || $page_slideshow_type == "Nivo slider" || $page_slideshow_type == "Kwicks slider" || $page_slideshow_type == "Skitter slider" || $page_slideshow_type == "Anything slider") { ?>
              <!-- Slideshow Start -->
              <div id="slideshow">
              <?php
                if ($page_slideshow_type == "Nivo slider") {
                  get_nivoslider($slideshow_cat,$slideshow_order);
                } else if ($page_slideshow_type == "Kwicks slider") {
                  get_kwicksslider($slideshow_cat,$slideshow_order);
                } else if ($page_slideshow_type == "Skitter slider") {
                  get_skitterslider($slideshow_cat,$slideshow_order);
                } else if ($page_slideshow_type == "Anything slider") {
                  get_anythingslider($slideshow_cat,$slideshow_order);
                }
                ?>
                <!-- Slideshow End  -->
              </div>
              <?php } else { ?>
              <div id="pageheading">
                <!--Page Heading Image -->
                <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading1.jpg';?>" alt="" />        
                <?php } ?>
              <!-- page heading description end-->
              
              <?php if ($page_short_desc !="") { ?>
                  <div id="page-slogan">      
                     <h4><?php echo $page_short_desc;?></h4>
                     <div class="clear"></div>
                  </div>
                <?php } else { ?>
                <!-- page heading title-->  
                  <div id="page-title" class="col_13">
                    <h3><?php the_title();?></h3>
                  </div>
                  <!-- page heading title end-->
                  
                  <!-- page heading description-->  
                  <div id="page-desc" class="col_23 last">
                  <?php $enable_breadcrumbs = get_option('corbiz_enable_breadcrumb');?>
                  <?php if ($enable_breadcrumbs =="true") { ?>
                      <?php if ( function_exists( 'breadcrumbs_plus' ) ) breadcrumbs_plus(); ?>
                    <?php } ?>
                  </div>  
                  
                        
              <?php } ?>
                
              </div>  

              <div class="clear"></div>
              </div>
            </div>
          <div class="round-wrapper-bottom"></div>
          <img src="<?php echo get_template_directory_uri();?>/images/shadow/shadow1.png" alt="" class="bottom-shadow"/>
        </div>
      </div>
    </div>
  </div>
  
              
  <div class="clear"></div>
  
  <!--main content-->
  <div class="center">
    <div class="maincontent" >
      <div class="pagecontent col_23<?php if ($page_sidebar_position == "Left") echo ' last';?>">
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <?php the_content();?>
      <?php endwhile;endif;?>
      </div>
      
      <?php get_sidebar();?>       
    </div>
    <div class="clear"></div>
  </div>
  
<?php get_footer();?>