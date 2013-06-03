<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>"  />
<title><?php if (is_home () ) { bloginfo('name'); echo " - "; bloginfo('description'); 
} elseif (is_category() ) {single_cat_title(); echo " - "; bloginfo('name');
} elseif (is_single() || is_page() ) {single_post_title(); echo " - "; bloginfo('name');
} elseif (is_search() ) {bloginfo('name'); echo " search results: "; echo esc_html($s);
} else { wp_title('',true); }?></title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<meta name="robots" content="follow, all" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php $favico = get_option('corbiz_custom_favicon');?>
<link rel="shortcut icon" href="<?php echo ($favico) ? $favico : get_template_directory_uri().'/images/favicon.ico';?>"/>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<!--[if IE 7]>
<style type="text/css">
.content {
  margin-top:130px;
}
#maincontent {
  margin-top:70px;
}
.overlay-rounded-small {
  margin-left: -83px;  
  margin-top: 1px;  
}
.overlay-rounded-medium {
  margin-left: -123px;
  margin-top: 1px;  
} 
.overlay-rounded-big {
  margin-left: -163px;
  margin-top: 1px;   
}
.shadow-divider {
  height: 1%;  
}
</style>
<![endif]-->

<!-- stylesheet end -->
<style type="text/css">
<?php
  $predefined_skins = get_option('corbiz_predefined_skins');
  $custom_color = get_option('corbiz_custom_color');  
  $body_text_color = get_option('corbiz_body_text_color'); 
  $bgpattern = get_option('corbiz_bg_pattern') ? get_option('corbiz_bg_pattern') : "minimalist-grid3.png";
  $custom_css = get_option('corbiz_custom_css');
  $custom_body_text = get_option('corbiz_custom_body_text');
  
  if ($predefined_skins !="") {
    if ($predefined_skins == "#20a9dc") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/blue.css");';
    } else if ($predefined_skins == "#C4703C") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/brown.css");';
    } else if ($predefined_skins == "#333333") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/dark.css");';
    } else if ($predefined_skins == "#354b7c") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/darkblue.css");';
    } else if ($predefined_skins == "#888888") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/grey.css");';
    } else if ($predefined_skins == "#f59028") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/orange.css");';
    } else if ($predefined_skins == "#993966") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/pink.css");';
    } else if ($predefined_skins == "#8e40a2") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/purple.css");';
    } else if ($predefined_skins == "#b83037") {
      echo '@import url("'.get_template_directory_uri().'/css/styles/red.css");';
    } else {
      echo '@import url("'.get_template_directory_uri().'/css/styles/green.css");';
    }
  } 
  
  if ($custom_color != "") {
    echo '.header-wrapper,.header-wrapper-inner { background-color: '.$custom_color.';}';
  } 
  
  if ($bgpattern != "") {
    echo '.header-wrapper,.header-wrapper-inner  {background-image: url('.get_template_directory_uri().'/images/pattern/'.$bgpattern.'); } ';
  }  
  
  if ($custom_body_text !== "") {
    echo 'body { font-family: '.$custom_body_text['face'].';color: '.$custom_body_text['color'].';font-size:'.$custom_body_text['size'].'px;font-style:'.$custom_body_text['style'].';}';
  }
  
  if ($custom_css !="") {
    echo $custom_css;
  }
  
  $enable_bgimage = get_option('corbiz_enable_bgimage');
  $bgimage = get_option('corbiz_bgimage');
  $bgimage_position = get_option('corbiz_bgimage_position');
  
  if ($enable_bgimage == "true") {
    if ($bgimage !="") {
      echo '.header-wrapper,.header-wrapper-inner {
        background-image: url('.$bgimage.');
        background-position:  '.$bgimage_position.';
        background-repeat: no-repeat;
      }';  
    }
  }
?>
</style>
<!-- Javascript Start //-->
<?php
  $disable_cufon = get_option('corbiz_disable_cufon');
  if ($disable_cufon != "true") { 
?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/cufon-yui.js"></script>
<?php $cufon_font = get_option('corbiz_cufon_font'); if ($cufon_font == "") $cufon_font = "titillium-text.js";?>
<script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/fonts/<?php echo $cufon_font;?>"></script>
<script type="text/javascript">
  Cufon.replace('h1, h2, h3, h4, h5,h6',{hover:true})('.jqueryslidemenu li a',{hover:true})('.button',{hover:true})('.big-button',{hover:true})('#phone h4',{textShadow: '#555555 1px 1px'})('.date');
</script>
<?php } ?>
<!-- Javascript End //-->

</head>

<body>
  <?php  $page_slideshow_type = get_post_meta($post->ID,"_page_slideshow_type",true); ?>
  <div class="shadow<?php if ($page_slideshow_type =="" || !isset($page_slideshow_type) || $page_slideshow_type == "None" && !is_page_template('homepage-nivoslider.php') && !is_page_template('homepage-kwicksslider.php') && !is_page_template('homepage-skitterslider.php') && !is_page_template('homepage-anythingslider.php') && !is_page_template('homepage-static.php') && !is_front_page())  echo '-inner';?>"></div>
  
  <div class="header-wrapper<?php if ($page_slideshow_type =="" || !isset($page_slideshow_type) || $page_slideshow_type == "None" && !is_page_template('homepage-nivoslider.php') && !is_page_template('homepage-kwicksslider.php') && !is_page_template('homepage-skitterslider.php') && !is_page_template('homepage-anythingslider.php') && !is_page_template('homepage-static.php') && !is_front_page())  echo '-inner';?>">
    <div class="pattern">
      <div id="header" class="wrapper">
        <!-- logo -->
        <div id="logo" class="col_12">
          <?php $logo = get_option('corbiz_logo'); ?>
          <a href="<?php echo home_url();?>"><img src="<?php echo ($logo) ? $logo : get_template_directory_uri().'/images/logo.png';?>" alt="Logo"/></a>
        </div>
       <!-- logo end -->
       
       <!-- phone -->
        <div id="phone" class="col_12 last">
        <?php $info_phone = get_option('corbiz_info_phone');?>
        <?php //if ($info_phone !="") { ?>
          <h4><?php echo __('Call Us Today ','corbiz');?>:  <span class="phone"><?php echo $info_phone ? $info_phone : "+62 23456987";?></span></h4>
        <?php //} ?>
       </div>
      <!-- phone end -->
    
      <div class="clear"></div>
      
      <div class="round-wrapper">
        <div class="round-wrapper-top"></div>
        <div class="round-wrapper-content">
          <div class="heading-box">
           
            <div id="top-container">
             <!-- menu -->
            <div id="menu">
              <div id="myslidemenu" class="jqueryslidemenu">
              <?php 
                if (function_exists('wp_nav_menu')) { 
                  wp_nav_menu( array( 'menu_class' => '', 'theme_location' => 'topnav', 'fallback_cb'=>'imediapixel_topmenu_pages','depth' =>4 ) );
                } 
                ?>
              <br style="clear: left" />
              </div>
            </div>
            <!-- menu end -->
            
            <?php get_template_part('searchbox','Search Box');?>
              <!-- search end -->
              <div class="clear"></div>
            </div>
            