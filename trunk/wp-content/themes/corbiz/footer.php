    <div class="clear"></div>
    
    <?php
      $info_address = get_option('corbiz_info_address') ? stripslashes(get_option('corbiz_info_address')) : "Jln. Damai menuju Syurga No. 14,<br />Jakarta 20035,<br />Indonesia";
      $info_phone = get_option('corbiz_info_phone');
      $info_fax = get_option('corbiz_info_fax');
      $info_email= get_option('corbiz_info_email');
      $info_website = get_option('corbiz_info_website');
      $info_latitude = get_option('corbiz_info_latitude') ? get_option('corbiz_info_latitude') : "-6.229555086277892";
      $info_longitude = get_option('corbiz_info_longitude') ? get_option('corbiz_info_longitude') : "106.82551860809326";
    ?> 
    
    <!-- footer -->
      <div class="footer-wrapper">
        <div class="center">
          <div class="footerbox col_12">
            <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom 1')) { ?>
            <h4>Text Note</h4>
            <p>Duis at velit tellus, quis mollis purus. Vivamus molestie, purus eget congue egestas, turpis tellus lacinia tellus, rhoncus pulvinar metus odio ac quam. Sed eget nulla turpis. mauris ac ultrices scelerisque, ligula enim ultricies massa</p>
            <?php } ?>
             <?php
              $twitter_id = get_option('corbiz_twitter_id');
              $facebook_url = get_option('corbiz_facebook_url');
              $linkedin_url = get_option('corbiz_linkedin_url');
              $flickr_id = get_option('corbiz_flickr_id');
            ?>
            <!-- social -->
            <div class="social">
            <?php if ($twitter_id !="") { ?>
             <a href="http://twitter.com/<?php echo $twitter_id ;?>"> <img src="<?php echo get_template_directory_uri();?>/images/twitter.png" alt="" /></a>
            <?php } ?>
            <?php if ($linkedin_url !="") { ?>
             <a href="<?php echo $linkedin_url;?>"> <img src="<?php echo get_template_directory_uri();?>/images/linkedin.png" alt=""/></a>
            <?php } ?>
             <?php if ($facebook_url !="") { ?>
             <a href="<?php echo $facebook_url;?>"> <img src="<?php echo get_template_directory_uri();?>/images/facebook.png" alt=""/> </a>
             <?php } ?>
              <?php if ($info_email !="") { ?>
             <a href="mailto:<?php echo $info_email;?>"> <img src="<?php echo get_template_directory_uri();?>/images/email.png" alt=""/> </a>
             <?php } ?>
             <a href="<?php bloginfo('rss2_url');?>"><img src="<?php echo get_template_directory_uri();?>/images/rss.png" alt="RSS" /></a>
            </div>
            <!-- social end-->
          </div>
        
          <!-- office -->
          <div class="footerbox col_14">
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom 2')) { ?>
              <h4><?php echo __('Office','corbiz');?></h4>
              <p><?php echo $info_address;?></p>
          <?php } ?>
          </div>
           <!-- office end -->
           
           <!-- contact -->
          <div class="footerbox col_14 last">
          <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom 3')) { ?>
              <h4><?php echo __('Contact Information','corbiz');?></h4>
              <ul class="contactinfo">
                <?php if ($info_phone !="" ) { ?><li> <?php echo __('Phone ','corbiz');?> : <?php echo $info_phone;?></li> <?php } ?>
                <?php if ($info_fax !="") { ?> <li><?php echo __('Fax ','corbiz');?> : <?php echo $info_fax;?></li> <?php } ?>
                <?php if ($info_email !="") {?> <li><?php echo __('Email ','corbiz');?>: <a href="mailto:<?php echo $info_email;?>"><?php echo $info_email;?></a></li> <?php } ?>
                <?php if ($info_website !=""){ ?> <li><?php echo __('Website ','corbiz');?> : <a href="http://<?php echo $info_website;?>"><?php echo $info_website;?></a></li> <?php } ?>
              </ul>
            <?php } ?>
          </div>
          <!-- contact end-->
          
        <div class="clear"></div>
        
        <div id="footer-bottom">  
          <!-- footer menu-->
          <div id="footer-menu" class="col_12">
            <?php 
              if (function_exists('wp_nav_menu')) { 
                wp_nav_menu( array( 'menu_class' => '', 'theme_location' => 'footernav', 'fallback_cb'=>'imediapixel_footermenu_pages','depth' =>1 ) );
              } 
            ?>        
          </div>
          <!-- footer menu end-->
          
          <!-- copyright-->
          <div id="copyright" class="col_12 last">
            <?php $footer_text = get_option('corbiz_footer_text');?>
            <p><?php echo ($footer_text) ? $footer_text : "&copy; 2007 - 2012 - Designed by <a href='http://www.vectors4all.net'>vectors</a>";?></p>
          </div>
          <!-- copyright end-->
        </div>
        
      </div>
      <div class="clear"></div>
    </div>
    <!-- footer end-->
  <?php wp_footer();?>
  <?php 
  $ga_code = get_option('corbiz_ga_code');
  if ($ga_code) echo stripslashes($ga_code);
  ?>    
</body>
</html>