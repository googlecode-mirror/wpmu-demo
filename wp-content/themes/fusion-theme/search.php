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
            		<div class="
                    <?php if (have_posts()){?>
                    sixteen
                    <?php }else{?>
                    twelve
                    <?php }?>columns sitemap">
                        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <?php get_template_part('includes/search-post') ?>
                        <?php endwhile; else: ?>
                        <h3><?php _e('Nothing Found', GETTEXT_DOMAIN); ?></h3>
                        <p><?php _e('Sorry, no posts matched your criteria.', GETTEXT_DOMAIN); ?></p>
                        <div class="four columns search-widget alpha omaga">
                            <form role="search" method="get" action="<?php echo site_url(); ?>">
                                <fieldset>
                                    <input id="s" class="search_input" type="text" name="s" value="<?php get_search_query()?>"/>
                                    <input class="submit" id="searchsubmit" type="submit" value="<?php _e('Search', GETTEXT_DOMAIN) ?>"/>
                                </fieldset>
                            </form>
                        </div>
                        <div class="clear"></div>
                        <hr />
                        <div class="four columns alpha">
                            <h4><?php _e('Available Pages:', GETTEXT_DOMAIN); ?></h4>
                            <ul class="_sitemap">
                            <?php wp_list_pages('title_li='); ?>
                            </ul>
                        </div>
                        <div class="four columns">
                            <h4><?php _e('Archives by Categories:', GETTEXT_DOMAIN); ?></h4>
                            <ul class="_sitemap">
                                <?php wp_list_categories('title_li='); ?>
                            </ul>
                        </div>
                        <div class="four columns omega">
                            <h4><?php _e('Archives by Date:', GETTEXT_DOMAIN); ?></h4>
                            <ul class="_sitemap">
                                <?php wp_get_archives('type=monthly'); ?>
                            </ul>
                        </div>
                        <div class="clear"></div>
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
                    <?php if (!have_posts()){?>
                    <div class="four columns sidebar">
                    <?php get_sidebar(); ?>
                    </div>
                    <?php }?>
                </div><!-- container -->
            </div>
        </div>
        
<?php get_footer(); ?>