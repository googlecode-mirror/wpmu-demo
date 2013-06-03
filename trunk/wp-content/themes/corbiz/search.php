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
      <div class="pagecontent  col_23<?php if ($page_sidebar_position == "Left") echo ' last';?>">
           <!--blog-->
      <ul class="bloglist">
      <?php
        $paged = (get_query_var('paged')) ?get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
        $blog_items_num = (get_option('corbiz_blog_items_num')) ? get_option('corbiz_blog_items_num') : 5;
        $blog_order = (get_option('corbiz_blog_order')) ? get_option('corbiz_blog_order')  : "date"; 
        
        while ( have_posts() ) : the_post();
        ?>
          
        <li>
          <div class="postimage">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
            <div class="blog-thumb">
                <img src="<?php echo get_template_directory_uri();?>/timthumb.php?src=<?php echo thumb_url();?>&amp;h=134&amp;w=134&amp;zc=1" alt=""/>
            </div>
            <?php } ?>
            <div class="metapost">
              <span class="date"><?php the_time( get_option('date_format') ); ?></span>
              <span class="category"><?php echo __('Posted on ','corbiz');?> <?php the_category(',');?>, <?php comments_popup_link(__('0 Comment','corbiz'),__('1 Comment','corbiz'),__('% Comments','corbiz'));?></span>
            </div>
          </div>
          <div class="postcontent">                
            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
            <p>
              <?php if($post->post_excerpt) { ?> 
                <?php echo get_the_excerpt();?> 
              <?php } else { ?>
                <?php echo excerpt(90);?>
              <?php } ?>
            </p>
            <a href="<?php the_permalink();?>" class="blog-readmore"><?php echo __('Continue Reading &raquo;','corbiz');?></a>
          </div>  
          <div class="clear"></div>
        </li>
      <?php endwhile;?>
      </ul>
      
      <div class="clear"></div>
      <div class="pagination">
        <?php theme_blog_pagenavi('', '', '',$paged);?>
      </div>  
      
      </div>
      
      <?php get_sidebar();?>            
            
    </div>
  </div>
  
<?php get_footer();?>

