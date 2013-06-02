<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* General Settings
    ================================================== */
    $disable_headermeta = get_option_tree('disable_headermeta',$theme_options);
    $left_headermeta = get_option_tree('left_headermeta',$theme_options);
    $right_headermeta = get_option_tree('right_headermeta',$theme_options);
    $header_twitter = get_option_tree('header_twitter',$theme_options);
    $custom_logo = get_option_tree('custom_logo',$theme_options);
    $google_cse = get_option_tree('google_cse',$theme_options);
    /* SEO Settings
    ================================================== */
    $disable_seo = get_option_tree('disable_seo',$theme_options);
    $theme_title = get_option_tree('theme_title',$theme_options);
    $keywords = get_option_tree('keywords',$theme_options);
    $description = get_option_tree('description',$theme_options);
    /* Theme Options
    ================================================== */
	$skin = get_option_tree('skin',$theme_options);
	$bg_pattern = get_option_tree('bg_pattern',$theme_options);
 	$bg_img = get_option_tree('bg_img',$theme_options);
 	$bg_color = get_option_tree('bg_color',$theme_options);
    $light_background = get_option_tree('light_background',$theme_options);
    $favicon = get_option_tree('favicon',$theme_options);
    $iphone_icon = get_option_tree('iphone_icon',$theme_options);
    $ipad_icon = get_option_tree('ipad_icon',$theme_options);
    $iphone4_icon = get_option_tree('iphone4_icon',$theme_options);
    /* Menu Options
    ================================================== */
    /* update 1.0.2 */
	$exclude_primarynavi = get_option_tree('exclude_primarynavi',$theme_options);
	$menu_order = get_option_tree('menu_order',$theme_options);
}
?>
	<!-- Basic Page Needs
  ================================================== -->

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        
    <?php
    echo '<title>' ;
    if($disable_seo != 'Disable'):
    	$out = '';
    	$out = $theme_title;
    	
    	$out = str_replace('%blog_title%', get_bloginfo('name'), $out);
    	$out = str_replace('%blog_description%', get_bloginfo('description'), $out);
    	$out = str_replace('%page_title%', wp_title('', false), $out);
    	
    	echo $out;
    else:
    	echo wp_title('', false) . ' | ' . get_bloginfo('name');
    endif;
    echo '</title>';
    
    if($disable_seo != 'Disable') {
        if($keywords):
    	?>
    		<meta name="keywords" content="<?php echo $keywords; ?>">
    	<?php
    	endif;
    
    	if($description):
    	?>
    		<meta name="description" content="<?php echo $description; ?>"> 
    	<?php
    	endif;
    }?>
    
    <meta name="author" content="lidplussdesign" />

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
	<!-- Google Web Fonts
  ================================================== -->
  
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Arvo:400,700,400italic' rel='stylesheet' type='text/css'>

	<!-- CSS
  ================================================== -->
  
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    
    <?php if($light_background){ ?>
    <!-- use if light background -->
    <link rel="stylesheet" href="<?php echo THEME_ASSETS; ?>css/light-bg.css">
    <!-- use if light background END -->
    <?php } ?>
    
    <!-- skin -->
    <link rel="stylesheet" href="<?php echo THEME_ASSETS; ?>css/skin/<?php if($skin){echo $skin;}else{echo'unitedNationsBlue';} ?>.css">
    <!-- skin END -->
    
    <?php if($bg_color){ ?>
    
        <style>
        body{
            background: <?php echo $bg_color ?>;
        }
        </style>
        
    <?php }else{ ?>
    
        <?php if($bg_pattern){ ?>
        <!-- pattern bg -->
        <link rel="stylesheet" href="<?php echo THEME_ASSETS; ?>css/pattern-bg/white_<?php echo $bg_pattern ?>.css">
        <!-- pattern bg END -->
        <?php }?>
        
        <?php if($bg_img){ ?>
        <!-- bg image-->
        <style>
        body{
            background: url(<?php echo $bg_img ?>);
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            background-attachment: fixed;
            background-position: center top;
            background-repeat: repeat;
        }
        </style>
        <!-- bg imeage END -->
        <?php }?>
    
    <?php } ?>

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
    <?php if($favicon){ ?>
	<link rel="shortcut icon" href="<?php echo $favicon ?>">
    <?php } ?>
    
    <?php if($iphone_icon){ ?>
	<link rel="apple-touch-icon" href="<?php echo $iphone_icon ?>">
    <?php } ?>
    
    <?php if($ipad_icon){ ?>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $ipad_icon ?>">
    <?php } ?>
    
    <?php if($iphone4_icon){ ?>
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $iphone4_icon ?>">
    <?php } ?>
    

	<!-- JS
	================================================== -->
    
    <script src="http://www.google.com/jsapi" type="text/javascript"></script>
    <?php wp_head(); ?>
    
    <?php if(is_page_template('template-cse.php')){?>
        <?php if($google_cse){ ?>
        <!-- [Google Custom Search Engine] -->
        <link href="<?php echo THEME_ASSETS; ?>css/cse.css" rel="stylesheet"  type="text/css" media="screen" />
        
        <script type="text/javascript"> 
          function parseQueryFromUrl () {
            var queryParamName = "q";
            var search = window.location.search.substr(1);
            var parts = search.split('&');
            for (var i = 0; i < parts.length; i++) {
              var keyvaluepair = parts[i].split('=');
              if (decodeURIComponent(keyvaluepair[0]) == queryParamName) {
                return decodeURIComponent(keyvaluepair[1].replace(/\+/g, ' '));
              }
            }
            return '';
          }
          google.load('search', '1', {language : 'en'});
          google.setOnLoadCallback(function() {
            var customSearchControl = new google.search.CustomSearchControl('<?php echo $google_cse;?>');
            customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
            var options = new google.search.DrawOptions();
            options.enableSearchResultsOnly();     
            customSearchControl.draw('cse', options);
            var queryFromUrl = parseQueryFromUrl();
            if (queryFromUrl) {
              customSearchControl.execute(queryFromUrl);
            }
          }, true);
        </script>
        <!-- [Google Custom Search Engine] END -->
        <?php }?>
    <?php }?>
    
    <?php if($header_twitter){?>
    <!-- seaofclouds-->
    <script>
    jQuery(function($){
        $(".meta-tweet").tweet({
            username: "<?php echo $header_twitter ?>",
            join_text: "auto",
            count: 1,
            auto_join_text_default: "<?php _e('we said,', GETTEXT_DOMAIN) ?>",
            auto_join_text_ed: "<?php _e('we', GETTEXT_DOMAIN) ?>",
            auto_join_text_ing: "<?php _e('we were', GETTEXT_DOMAIN) ?>",
            auto_join_text_reply: "<?php _e('we replied to', GETTEXT_DOMAIN) ?>",
            auto_join_text_url: "<?php _e('we were checking out', GETTEXT_DOMAIN) ?>",
            loading_text: "<?php _e('loading tweets...', GETTEXT_DOMAIN) ?>"
        });
    });
    </script>
    <!-- seaofclouds END -->
    <?php }?>
    
    <?php if (is_singular('portfolio')) {?>
    <!-- facebook comments -->
    <link rel="stylesheet" href="<?php echo THEME_ASSETS; ?>css/facebook-comments.css">
    <!-- facebook comments END -->
    <?php }?>
    
</head>
<body
<?php if(is_page_template('template-contact.php')){?>onload="initialize()"<?php }?>
>
	<!-- Primary Page Layout
	================================================== -->

    <div id="wrap" <?php if(is_page_template('home-template.php')){?>class="home"<?php }?>>
    
    	<?php //OptionTree Stuff
        if ( function_exists( 'get_option_tree') ) {?>
    
        <?php if($disable_headermeta != 'Disable') {?>
        <div id="headerMeta">
            <div class="container">
                <?php if($left_headermeta||$header_twitter){?>
                <div class="meta-left">
                <?php if($header_twitter){?>
                    <div class="meta"><?php _e('Twitter', GETTEXT_DOMAIN); ?> :&nbsp;</div>
                    <div class="meta-tweet"></div>
                    <div class="clear"></div>
                <?php }else{?>
                    <?php
                        $separator = "%:%";
                        $left_meta = '';
                        list($span_, $text_) = explode($separator, trim($left_headermeta));
                        $left_meta .= 
                        '<span>'.$span_.':&nbsp;</span>'.$text_;
                        echo $left_meta;
                    ?>
                <?php }?> 
                </div>
                <?php }?> 
                <?php if($right_headermeta){?>
                <div class="meta-right">
                    <?php
                        $separator = "%:%";
                        $right_meta = '';
                        list($span, $text) = explode($separator, trim($right_headermeta));
                        $right_meta .= 
                        '<span>'.$span.':&nbsp;</span>'.$text;
                        echo $right_meta;
                    ?>                           
                </div>
                <?php }?>
            </div>
        </div>
        <?php }?>
        <div id="header">
            <div class="container">
                <div class="sixteen columns">
                    <div class="logo">
                    <?php if($custom_logo){?>
            			<h1><a href="<?php echo home_url(); ?>"><img src="<?php echo $custom_logo?>"/></a></h1>
            			<h5><?php bloginfo( 'description' ); ?></h5>
                    <?php }else{?>
            			<h1><a href="<?php echo home_url(); ?>"><span><?php bloginfo( 'name' ); ?></span></a></h1>
            			<h5><?php bloginfo( 'description' ); ?></h5>
                    <?php }?>
                    <div class="clear"></div>
                    </div>
                    <div class="navi">
                        <?php if ( has_nav_menu( 'primary-menu' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'menu_class' => 'sf-menu', 'container' => '', 'walker' => new nav_menu_walker() ) ); ?>
                        <?php } else { /* else use wp_list_pages */?>
                        <ul class="sf-menu">
                            <?php wp_list_pages( array( 'exclude' => $exclude_primarynavi, 'title_li' => '', 'sort_column' => $menu_order, 'walker' => new page_menu_walker() )); ?>
                        </ul>
                        <?php } ?>
                    </div>
                    <div class="mobileNavi_wrap"></div>
        		</div>
            </div>
        </div>
        
        <?php }?>