<?php
/*
Template Name: Anything Slider
*/
?>

<?php get_header();?>
  <?php 
    global $post; 
    $slideshow_cat = get_option('corbiz_slideshow_cat');
    $slideshow_order = get_option('corbiz_slideshow_order') ? get_option('corbiz_slideshow_order') : "date";
  ?>           
            <div id="slideshow">
              <?php 
              
              //get_anythingslider($slideshow_cat,$slideshow_order); 
              get_anythingslider("Anything slider",$slideshow_order);
              ?>
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
  
  
  <div class="homepage-content">
    <div class="center">
    
      <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <?php the_content();?>
      <?php endwhile;endif;?>
      
  </div>
  </div>
  
<?php get_footer();?>