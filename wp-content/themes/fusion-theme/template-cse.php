<?php
/*
Template Name: Google CSE
*/
?>
<?php get_header(); ?>
<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* General Settings
    ================================================== */
    $google_cse = get_option_tree('google_cse',$theme_options);
}
?>
        <div id="main_wrap">
            <div id="title">
                <div class="container">
            		<div class="sixteen columns">
            			<span class="wrap"><?php echo the_breadcrumb()?></span>
            		</div>
                </div><!-- container -->
            </div>
            <div id="main">
                <div class="container">
                    <div class="sixteen columns">
                        <?php if($google_cse){ ?>
                        <form action="<?php the_permalink($page->ID); ?>" method="get" class="search_cse">
                            <input type="text" value="<?php echo $_GET['q'];?>" name="q" id="q"/>
                            <button type="submit"><span><?php _e('Search', GETTEXT_DOMAIN) ?></span></button>
                            <div class="clear"></div>
                        </form>
                        <div id="cse"><?php _e('Loading...', GETTEXT_DOMAIN) ?></div>
                        <?php }else{?>
                        <p><?php _e('Enter a Google (custom search engine) ID in theme options.', GETTEXT_DOMAIN) ?></p>
                        <?php }?>
                    </div>
                </div><!-- container -->
            </div>
        </div>
        
<?php get_footer(); ?>