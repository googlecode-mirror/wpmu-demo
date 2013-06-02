<?php if (is_page_template('template-contact.php')) { ?>
    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Contact Page Sidebar') ) ?>
<?php }elseif(is_singular( 'portfolio' )){ ?>
    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Portfolio Post Sidebar') ) ?>
<?php }else{ ?>
    <?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('Main Sidebar') ) ?>
<?php } ?>