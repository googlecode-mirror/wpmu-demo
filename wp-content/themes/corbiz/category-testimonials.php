<?php get_header();?>
  
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
                    <h3><?php single_cat_title();?></h3>
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
  
  <div class="center">
    <div class="maincontent fullwidth">
        
    <?php 
        $counter = 0; 
        while (have_posts()) : the_post();
        $counter++;
      ?>
      <div class="col_12 <?php if ($counter %2 ==0) echo ' last';?>" style="margin-bottom: 20px;">
      <blockquote>    
        <?php
         if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {
          echo do_shortcode('[image source="'.thumb_url().'" align="left" size="medium" image_style="rounded" margin_bottom=30]');
         }
        ?>
        <p><?php echo get_the_content();?></p>
        </blockquote>
        <p class="testiname"><strong><?php the_title();?></strong></p>
      </div>
      <?php endwhile;?>
      
    </div>
  </div>
  
<?php get_footer();?>