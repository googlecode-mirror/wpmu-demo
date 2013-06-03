<?php
/*
Template Name: Blog
*/
?>
<?php get_header();?>
  
  <?php 
    global $post; 
    $page_sidebar_position = get_post_meta($post->ID,'_page_sidebar_position',true);
    $page_slideshow_type = get_post_meta($post->ID,"_page_slideshow_type",true);
    $slideshow_cat = get_post_meta($post->ID,"_page_slideshow_category",true);
    $heading_image = get_post_meta($post->ID,"_heading_image",true);
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
           <!--blog-->
      <ul class="bloglist">
      <?php
          $blog_cats_include = get_option('corbiz_blog_categories');
          if(is_array($blog_cats_include)) {
            $blog_include = implode(",",$blog_cats_include);
          } 
          
          $paged = (get_query_var('paged')) ?get_query_var('paged') : ((get_query_var('page')) ? get_query_var('page') : 1);
          $blog_items_num = (get_option('corbiz_blog_items_num')) ? get_option('corbiz_blog_items_num') : 3;
          $blog_order = (get_option('corbiz_blog_order')) ? get_option('corbiz_blog_order')  : "date"; 
          $blog_text_num = (get_option('corbiz_blog_text_num')) ? get_option('corbiz_blog_text_num') : 90;
          
          $r = new WP_Query(array('cat'=>$blog_include,'showposts'=>$blog_items_num,'orderby'=>$blog_order,'paged'=>$paged));
          while ( $r->have_posts() ) : $r->the_post();
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
                <?php echo excerpt($blog_text_num);?>
              <?php } ?>
            </p>
            <a href="<?php the_permalink();?>" class="blog-readmore"><?php echo __('Continue Reading &raquo;','corbiz');?></a>
          </div>  
          <div class="clear"></div>
        </li>
      <?php endwhile;wp_reset_query();?>
      </ul>
      
      <div class="clear"></div>
      <div class="pagination">
        <?php theme_blog_pagenavi('', '', $r, $paged);?>
      </div>  
      
      </div>
      
      <?php get_sidebar();?>            
            
    </div>
  </div>
  
<?php get_footer();?>

