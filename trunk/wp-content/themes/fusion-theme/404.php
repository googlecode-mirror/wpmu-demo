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
            		<div class="twelve columns sitemap">
                        <h3><?php _e('Theme Shared on www.MafiaShare.net - Nothing Found', GETTEXT_DOMAIN) ?></h3>
                        <p><?php _e('Sorry, the post you are looking for is not available. Maybe you want to perform a search?', GETTEXT_DOMAIN) ?></p>
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
                            <h4><?php _e('Available Pages:', GETTEXT_DOMAIN) ?></h4>
                            <ul class="_sitemap">
                            <?php wp_list_pages('title_li='); ?>
                            </ul>
                        </div>
                        <div class="four columns">
                            <h4><?php _e('Archives by Categories:', GETTEXT_DOMAIN) ?></h4>
                            <ul class="_sitemap">
                                <?php wp_list_categories('title_li='); ?>
                            </ul>
                        </div>
                        <div class="four columns omega">
                            <h4><?php _e('Archives by Date:', GETTEXT_DOMAIN) ?></h4>
                            <ul class="_sitemap">
                                <?php wp_get_archives('type=monthly'); ?>
                            </ul>
                        </div>
                        <div class="clear"></div>
            		</div>
                    <div class="four columns sidebar">
                    <?php get_sidebar(); ?>
                    </div>
                </div><!-- container -->
            </div>
        </div>
        
<?php get_footer(); ?>