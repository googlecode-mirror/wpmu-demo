<?php
/*
Template Name: Full Width Template
*/
?>
<?php get_header(); ?>

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
                    <?php if (  (function_exists('has_post_thumbnail')) && (has_post_thumbnail())  ) { ?>
                    <div class="sixteen columns">
                        <div class="frame"><?php the_post_thumbnail('full-width-page'); ?></div>
                    </div>
                    <?php }?>
                    <div class="sixteen columns main-content">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; else: ?>
                        <p><?php _e("Sorry, but you are looking for something that isn't here.", GETTEXT_DOMAIN) ?></p>
        			<?php endif; ?>
                    <div class="clear"></div>
                    <?php edit_post_link(__('edit', GETTEXT_DOMAIN), '<span class="edit-post">[', ']</span>' ); ?>
                    </div>
                </div><!-- container -->
            </div>
        </div>
        
<?php get_footer(); ?>