<?php get_header();?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/portfolio-video.js"></script>
    <?php
    $nivo_transition = get_option('corbiz_nivo_transition');
    $nivo_slices = get_option('corbiz_nivo_slices');
    $nivo_animspeed = get_option('corbiz_nivo_animspeed');
    $nivo_pausespeed = get_option('corbiz_nivo_pausespeed');
    $nivo_directionNav = get_option('corbiz_nivo_directionNav');
    $nivo_directionNavHide = get_option('corbiz_nivo_directionNavHide');
    $nivo_controlNav = get_option('corbiz_nivo_controlNav');
    $nivo_disable_permalink = get_option('corbiz_nivo_disable_permalink');
    $slideshow_order = get_option('corbiz_slideshow_order') ? get_option('corbiz_slideshow_order') : "date";
    $enable_caption = get_option('corbiz_nivo_caption');
    $slideshow_cat = get_option('corbiz_slideshow_cat');
    ?>
    <script type="text/javascript">
      jQuery(window).load(function($) {
        jQuery('#portfolio-slider').nivoSlider({
          effect:'<?php echo ($nivo_transition) ? $nivo_transition : "random";?>',
          slices:<?php echo ($nivo_slices) ? $nivo_slices : "15";?>,
          animSpeed:<?php echo ($nivo_animspeed) ? $nivo_animspeed : "500";?>, 
          pauseTime:<?php echo ($nivo_pausespeed) ? $nivo_pausespeed : "3000";?>,
          directionNav:<?php echo ($nivo_directionNav) ? $nivo_directionNav : "true";?>,
          directionNavHide:<?php echo ($nivo_directionNavHide) ? $nivo_directionNavHide : "true";?>,
          controlNav:<?php echo ($nivo_controlNav) ? $nivo_controlNav : "true";?>
        });
      });
      </script> 
  <?php 
    global $post; 
    $page_short_desc = get_post_meta($post->ID,"_page_short_desc",true);
    $portfolio_page = get_option('corbiz_portfolio_page');
	  $portfolio_pid = get_page_by_title($portfolio_page);
    $heading_image = get_post_meta($portfolio_pid->ID,"_heading_image",true);
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
                    <h3><?php echo __('Portfolio','corbiz');?></h3>
                  </div>
                  <!-- page heading title end-->
                  
                  <!-- page heading description-->  
                  <div id="page-desc" class="col_23 last">
                  <?php //$enable_breadcrumbs = get_option('corbiz_enable_breadcrumb');?>
                  <?php //if ($enable_breadcrumbs =="true") { ?>
                    <div class="breadcrumbs">
                      <?php if ( function_exists( 'breadcrumbs_plus' ) ) breadcrumbs_plus(); ?>
                    </div>
                    <?php //} ?>
                  </div>  
                  <!-- page heading description end-->            
                  <?php } ?>
              
              </div>  
              <div class="clear"></div>
              </div>
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
    <div class="maincontent fullwidth">
    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : the_post();?>

      <?php
        $pf_link = get_post_meta($post->ID, '_portfolio_link', true );
        $pf_url = get_post_meta($post->ID, '_portfolio_url', true );
        $portfolio_type = get_post_meta($post->ID, '_portfolio_type', true );
        $more_images = get_post_meta($post->ID,'_portfolio_images',true);
      ?>
      <div class="pf-img col_23">
        <div class="portfolio-single-box">
        <?php if ($more_images) { ?> 
        <div id="portfolio-slider">
          <?php
            $pf_images = explode(',',$more_images);         
            if (is_array($pf_images )) {  
              foreach ($pf_images as $pf_image) { ?>
                <a href="<?php echo $pf_image;?>" rel="prettyPhoto[portfolio]" title="<?php the_title();?>">
                  <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo $pf_image;?>&amp;h=345&amp;w=590&amp;zc=1" alt="" />
                </a>
              <?php } ?> 
            <?php }  else { ?>
              <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=345&amp;w=590&amp;zc=1"  alt="" />
              <?php } ?>
            <?php } ?>
          </div>
        <?php } else if ($pf_link) { ?>
        <div class="pf-video-wrapper">
        <?php
          if (is_youtube($pf_link)) { ?>
            <div class="portfolio_movie_container"><a href="<?php echo $pf_link;?>"  rel="youtube"></a></div>
          <?php
          } else if (is_vimeo($pf_link)) { ?>
            <div class="portfolio_movie_container"><a href="<?php echo $pf_link;?>"  rel="vimeo"></a></div>    
          <?php  
          } else if (is_quicktime($pf_link)) { 
            ?>
            <div class="portfolio_movie_container"><a href="<?php echo $pf_link;?>"  rel="quicktime"></a></div>
            <?php
          } else if (is_flash($pf_link)) { ?>
            <div class="portfolio_movie_container"><a href="<?php echo $pf_link;?>"  rel="flash"></a></div>
            <?php
          } else { ?>
              <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=345&amp;w=590&amp;zc=1" class="fade" alt="" />
              <?php } ?>
            <?php } 
          ?>
          </div>  
        <?php } ?>
        </div>
      </div>
      <div class="pf-text col_13 last">
        <h3><?php the_title();?></h3>
        <?php the_content();?>
      </div>
      <?php endwhile;endif;?>
      
      <div class="clear"></div>
      
      <div class="random-portfolio">
      <?php imediapixel_get_related_portfolio($num=4,$title="Similar Works");?>
      </div>
      
    </div>
  </div>
      <!--portfolio end-->
  
 <!--main content end-->
<?php get_footer();?>