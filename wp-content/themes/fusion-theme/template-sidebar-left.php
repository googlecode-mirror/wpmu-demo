<?php
/*
Template Name: Sidebar Left Template
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
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="twelve columns main-content right">
                        <?php the_content(); ?>
                    </div>
                    <?php endwhile; else: ?>
                    <div class="twelve columns main-content">
                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN) ?></p>
                    </div>
                    <?php endif; ?>
            		<div class="four columns sidebar">
                    <?php get_sidebar(); ?>
            		</div>
                </div><!-- container -->
            </div>
        </div>
        
<?php get_footer(); ?>