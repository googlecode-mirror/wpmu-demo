<div class="search-post">
    <h4><?php the_title(); ?></h4>
    <span><small><?php echo get_the_time('j F Y'); ?></small></span>
    <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
    <hr />
</div>