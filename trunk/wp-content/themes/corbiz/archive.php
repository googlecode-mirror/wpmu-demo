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
                    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
                 	  <?php /* If this is a category archive */ if (is_category()) { ?>
                		<h3><?php single_cat_title(); ?></h3>
                 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                		<h3><?php single_tag_title(); ?></h3>
                 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                		<h3><?php echo __('Archive for ','ecobiz');?><?php the_time('F jS, Y'); ?></h3>
                 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                		<h3><?php echo __('Archive for ','ecobiz');?><?php the_time('F, Y'); ?></h3>
                 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                		<h3><?php echo __('Archive for','ecobiz');?> <?php the_time('Y'); ?></h3>
                	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                		<h3><?php echo __('Author Archive','ecobiz');?></h3>
                 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                		<h3><?php echo __('Archives','ecobiz');?></h3>
                 	  <?php } ?>  
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

