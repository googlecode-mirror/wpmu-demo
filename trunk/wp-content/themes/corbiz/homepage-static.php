<?php
/*
Template Name: Homepage Static
*/
?>

<?php get_header();?>
          <?php $static_slideshow_source = get_option('corbiz_static_slideshow_source'); ?>            
            <div id="slideshow">
              <?php switch_slideshow_src($static_slideshow_source,960,346); ?>
            </div>
              
              <div class="clear"></div>
              <?php 
              if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Site Features Box')) {
                get_template_part('featureslist','4 Columns Features List'); 
              }
              ?>
              <div class="clear"></div>
            </div>
            <!-- page heading end-->
          </div>
          </div>
          <div class="round-wrapper-bottom"></div>
          <?php $heading_shadow = get_option('corbiz_heading_shadow');?>
          <img src="<?php echo get_template_directory_uri();?>/images/shadow/<?php echo $heading_shadow ? $heading_shadow : "shadow1.png";?>" alt="" class="bottom-shadow"/>
      </div>
  </div>
  </div>

  <div class="clear"></div>
  
  
  <div class="center">
    <div class="homepage-content">
    
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <?php the_content();?>
      <?php endwhile;endif;?>
      <div class="clear"></div>
    </div>
  </div>
  
<?php get_footer();?>