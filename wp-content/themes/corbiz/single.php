<?php get_header();?>
  
   <?php
      global $post;
      
      $blog_page = get_option('corbiz_blog_page');
      $blog_page_id = get_page_by_title($blog_page);
      $heading_image = get_post_meta($blog_page_id->ID,"_heading_image",true); 
      $bgtext_heading_position = get_post_meta($blog_page_id->ID,"_bgtext_heading_position",true);
      $page_short_desc = get_post_meta($blog_page_id->ID,"_page_short_desc",true);
    ?>
  
              <div id="pageheading">
                <!--Page Heading Image -->
                <img src="<?php echo $heading_image ? $heading_image : get_template_directory_uri().'/images/page-heading1.jpg';?>" alt="" />
              <!-- page heading description end-->
              
              <?php if ($page_short_desc !="") { ?>
                  <div id="page-slogan">      
                     <h4><?php echo $page_short_desc;?></h4>
                     <div class="clear"></div>
                  </div>
                <?php } else { ?>
                <!-- page heading title-->  
                  <div id="page-title" class="col_13">
                    <h3><?php echo $blog_page;?></h3>
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
          <?php $heading_shadow = get_option('corbiz_heading_shadow');?>
          <img src="<?php echo get_template_directory_uri();?>/images/shadow/<?php echo $heading_shadow ? $heading_shadow : "shadow1.png";?>" alt="" class="bottom-shadow"/>
        </div>
      </div>
    </div>
  </div>
  
              
  <div class="clear"></div>
  
  <!--main content-->
  <div class="center">
    <div class="maincontent">
      <div class="pagecontent col_23<?php if ($page_sidebar_position == "Left") echo ' last';?>">
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <h3><?php the_title();?></h3>
        <?php the_content();?>
      <?php endwhile;endif;?>
      
      <div class="clear"></div>

          <!-- Author Box Start //-->
          <?php $author_box = get_option('corbiz_author_box');?>
          <?php if ($author_box != "true") { ?>
          <div id="authorbox">
            <div class="blockavatar">
              <?php if (function_exists('get_avatar')) { echo get_avatar(get_the_author_meta('user_email'), '48'); }?>
            </div>
             <div class="detail">
                <h4><?php echo __('About ','corbiz');?><a href="<?php the_author_meta('url') ?>"><?php the_author_meta('display_name'); ?></a></h4>
                <p><?php the_author_meta('description'); ?></p>
             </div>
             <div class="clear"></div>
          </div> 
          <?php } ?>
          <!-- Author Box End //-->
          
          <div class="clear"></div>
          <?php $disable_comment = get_option('corbiz_disable_comment'); ?>
          <?php 
          if ($disable_comment !="true") {
            comments_template('', true);  
          }
          ?>
          
      </div>
      <?php wp_reset_query();?>
      <?php get_sidebar();?>            
            
    </div>
  </div>
  
<?php get_footer();?>