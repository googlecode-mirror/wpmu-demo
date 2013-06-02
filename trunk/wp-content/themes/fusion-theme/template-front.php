<?php
/*
Template Name: Front Template
*/
?>
<?php get_header(); ?>
<?php 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* Front Page Options
    ================================================== */
    $slogan = get_option_tree('slogan',$theme_options);
    $enable_callout = get_option_tree('enable_callout',$theme_options);
    $callout_title = get_option_tree('callout_title',$theme_options);
    $callout_caption = get_option_tree('callout_caption',$theme_options);
    $callout_button = get_option_tree('callout_button',$theme_options);
    $callout_button_url = get_option_tree('callout_button_url',$theme_options);
}
?>

        <?php $select_type = get_post_meta($post->ID, 'select-type_value', true);?>
        <?php $layer_slider = get_post_meta($post->ID, 'layer-slider_value', true);?>
        <?php $uno_slider = get_post_meta($post->ID, 'uno-slider_value', true);?>
        <?php $video = theme_parse_video(get_post_meta($post->ID, 'video_value', true));?>
            
        <?php if($select_type == 'layerslider') {?>
		<div id="slider"><?php echo do_shortcode('[layerslider id="'.$layer_slider.'"]'); ?></div>
        <?php }elseif($select_type == 'unoslider') {?>
        <div id="slider"><?php echo unoslider($uno_slider);?></div>
        <?php }elseif($select_type == 'video') {?>
        <div id="slider"><iframe width="940" height="528" src="<?php echo $video;?>?wmode=transparent;rel=0&amp;autohide=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe></div>
        <?php }else{?>
        <?php }?>
        
        <div id="main_wrap">
            <?php if($slogan) {?>
            <div id="slogan">
                <div class="container">
            		<div class="sixteen columns">
            			<p><?php echo $slogan;?></p>
            		</div>
                </div><!-- container -->
            </div>
            <?php }?>
            <div id="main">
                <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Front Page') ) ?>
                <div class="clear"></div>
            </div>
            <?php if($enable_callout) {?>
            <div id="bottomSlogan">
                <div class="container">
            		<div class="<?php if(!$callout_button) {?>sixteen<?php }else{?>twelve<?php }?> columns">
            			<?php if($callout_title) {?><!-- update 1.0.1 -->
                        <h3><?php echo $callout_title;?></h3>
                        <?php }?>
                        <?php if($callout_caption) {?><!-- update 1.0.1 -->
                        <p><?php echo $callout_caption;?></p>
                        <?php }?>
            		</div>
                    <?php if($callout_button) {?>
                    <div class="four columns">
                        <a href="<?php echo $callout_button_url;?>" class="large_button info"><span class="icon"></span><?php echo $callout_button;?></a>
                    </div>
                    <?php }?>
                </div><!-- container -->
            </div>
            <?php }?>
        </div>
        
<?php get_footer(); ?>