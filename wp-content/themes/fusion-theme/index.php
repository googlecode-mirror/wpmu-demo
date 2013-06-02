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
            		<div class="twelve columns blog">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php get_template_part('includes/blog-post' ) ?>
                        <?php endwhile; else: ?>
                        <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                        <?php endif; ?>
                        <div class="pagination">
                        <?php if($wp_query->max_num_pages>1){?>
                        <span class="pages">Page <?php echo max( 1, get_query_var('paged') );?> of <?php echo $wp_query->max_num_pages;?></span>
                        <?php }?>
                        <?php
                        $big = 999999999; // need an unlikely integer
                        echo paginate_links( array(
                        	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                        	'format' => '?paged=%#%',
                        	'current' => max( 1, get_query_var('paged') ),
                        	'total' => $wp_query->max_num_pages
                        ) );
                        ?>
                        <div class="clear"></div>
                        </div>
            		</div>
                    <div class="four columns sidebar">
                    <?php get_sidebar(); ?>
                    </div>
                </div><!-- container -->
            </div>
        </div>

<?php get_footer(); ?>