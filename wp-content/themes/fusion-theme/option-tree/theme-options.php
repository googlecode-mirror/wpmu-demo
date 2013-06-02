<?php
/**
 * Initialize the options before anything else.
 */
add_action( 'admin_init', 'custom_theme_options', 1 );

/**
 * Build the custom settings & update OptionTree.
 */
function custom_theme_options() {
  /**
   * Get a copy of the saved settings array. 
   */
  $saved_settings = get_option( 'option_tree_settings', array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $custom_settings = array( 
    'contextual_help' => array(
      
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'general_default',
        'title'       => 'General Settings'
      ),
      array(
        'id'          => 'seo_settings',
        'title'       => 'SEO Settings'
      ),
      array(
        'id'          => 'theme_options',
        'title'       => 'Theme Options'
      ),
      array(
        'id'          => 'menu_options',
        'title'       => 'Menu Options'
      ),
      array(
        'id'          => 'social_media_options',
        'title'       => 'Social Media Options'
      ),
      array(
        'id'          => 'google_map_options',
        'title'       => 'Google Map Options'
      ),
      array(
        'id'          => 'front_page_options',
        'title'       => 'Front Page Options'
      )
    ),
    'settings'        => array( 
      array(
        'id'          => 'disable_headermeta',
        'label'       => 'Header Meta',
        'desc'        => 'Disable if you wnat to hide header meta.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'left_headermeta',
        'label'       => 'Left Header Meta',
        'desc'        => 'Enter a value for left header meta. Use the shortcode - Call Us Free%:%+44 (0) 1234567890',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'right_headermeta',
        'label'       => 'Right Header Meta',
        'desc'        => 'Enter a value for right header meta. Use the shortcode - Call Us Free%:%+44 (0) 1234567890',
        'std'         => 'Call Us Free%:%+44 (0) 1234567890',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'header_twitter',
        'label'       => 'Header Twitter',
        'desc'        => 'Enter your twitter username for displaying twitter at the left header meta.',
        'std'         => 'seaofclouds',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'custom_logo',
        'label'       => 'Custom Logo',
        'desc'        => 'Upload a logo for your theme.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'portfolio_title',
        'label'       => 'Portfolio Title',
        'desc'        => 'Enter a title for breadcrumb, the default title - "portfolio".',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'footer_copyright',
        'label'       => 'Footer Copyright Text',
        'desc'        => 'Enter the copyright text you\'d like to show in the footer of your site.',
        'std'         => 'Copyright &copy; 2012 <a href="http://themeforest.net/user/lidplussdesign/">lpd-themes</a>',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'contact_form_email_address',
        'label'       => 'Contact Form Email Address',
        'desc'        => 'Enter the email address where you\'d like to receive emails from the contact form, or leave blank to use admin email.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_cse',
        'label'       => 'Google CSE',
        'desc'        => 'Enter a (<a href="http://www.google.com/cse/">custom search engine</a>) ID.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'general_default',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'disable_seo',
        'label'       => 'Disable Theme SEO',
        'desc'        => 'If you are using an external SEO plug-in you should disable this option.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'seo_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Disable',
            'label'       => 'Disable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'theme_title',
        'label'       => 'Browser Page Title',
        'desc'        => '%blog_title% - Will display name of your blog,
%blog_description% - Will blog description,
%page_title% - Will display current page title.',
        'std'         => '%page_title%, %blog_description%',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'keywords',
        'label'       => 'Keywords',
        'desc'        => 'Enter a list of keywords separated by commas.',
        'std'         => 'keyword1, keywords2',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'description',
        'label'       => 'Description',
        'desc'        => 'Enter a description for your site.',
        'std'         => 'website description',
        'type'        => 'textarea-simple',
        'section'     => 'seo_settings',
        'rows'        => '4',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'skin',
        'label'       => 'Theme Skin',
        'desc'        => 'Select your themes alternative color scheme.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'appleGreen',
            'label'       => 'appleGreen',
            'src'         => ''
          ),
          array(
            'value'       => 'magenta',
            'label'       => 'magenta',
            'src'         => ''
          ),
          array(
            'value'       => 'orange',
            'label'       => 'orange',
            'src'         => ''
          ),
          array(
            'value'       => 'unitedNationsBlue',
            'label'       => 'unitedNationsBlue',
            'src'         => ''
          ),
          array(
            'value'       => 'violet',
            'label'       => 'violet',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'bg_pattern',
        'label'       => 'Pattern Background',
        'desc'        => 'Select one of pattern background for displaying it.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'pattern_01',
            'label'       => 'pattern_01',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_02',
            'label'       => 'pattern_02',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_03',
            'label'       => 'pattern_03',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_04',
            'label'       => 'pattern_04',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_05',
            'label'       => 'pattern_05',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_06',
            'label'       => 'pattern_06',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_07',
            'label'       => 'pattern_07',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_08',
            'label'       => 'pattern_08',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_09',
            'label'       => 'pattern_09',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_10',
            'label'       => 'pattern_10',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_11',
            'label'       => 'pattern_11',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_12',
            'label'       => 'pattern_12',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_13',
            'label'       => 'pattern_13',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_14',
            'label'       => 'pattern_14',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_15',
            'label'       => 'pattern_15',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_16',
            'label'       => 'pattern_16',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_17',
            'label'       => 'pattern_17',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_18',
            'label'       => 'pattern_18',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_19',
            'label'       => 'pattern_19',
            'src'         => ''
          ),
          array(
            'value'       => 'pattern_20',
            'label'       => 'pattern_20',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'bg_img',
        'label'       => 'Background Image',
        'desc'        => 'Upload an image for backgrond.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'bg_color',
        'label'       => 'Background Color',
        'desc'        => 'Pick the color for your site background.',
        'std'         => '',
        'type'        => 'colorpicker',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'light_background',
        'label'       => 'Light Background',
        'desc'        => 'Check if you are using light background color/image.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Enable styles',
            'label'       => 'Enable styles',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'favicon',
        'label'       => 'Favicon',
        'desc'        => 'Upload an .ico image (dimensions 16x16) for favicon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'iphone_icon',
        'label'       => 'Iphone Icon',
        'desc'        => 'Upload an .png image (dimensions 57x57) for touch icon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ipad_icon',
        'label'       => 'Ipad Icon',
        'desc'        => 'Upload an .png image (dimensions 72x72) for touch icon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'iphone4_icon',
        'label'       => 'Iphone4 Icon',
        'desc'        => 'Upload an .png image (dimensions 114x114) for touch icon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'theme_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'exclude_primarynavi',
        'label'       => 'Exclude From Primary Navigation',
        'desc'        => 'Enter a comma-separated list of any Page IDs you wish to exclude from the navigation (e.g. 1,3,6,)',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'menu_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'menu_order',
        'label'       => 'Menu Order',
        'desc'        => 'Select the view order you wish to set for the main navigation.',
        'std'         => '',
        'type'        => 'select',
        'section'     => 'menu_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'post_title',
            'label'       => 'post_title',
            'src'         => ''
          ),
          array(
            'value'       => 'menu_order',
            'label'       => 'menu_order',
            'src'         => ''
          ),
          array(
            'value'       => 'ID',
            'label'       => 'ID',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'twitter',
        'label'       => 'Twitter',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'youtube',
        'label'       => 'Youtube',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'vimeo',
        'label'       => 'Vimeo',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'facebook',
        'label'       => 'Facebook',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google',
        'label'       => 'Google+',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'linkedin',
        'label'       => 'LinkedIn',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'rss',
        'label'       => 'Rss',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'digg',
        'label'       => 'Digg',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'google_buzz',
        'label'       => 'Google Buzz',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'delicious',
        'label'       => 'Delicious',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'tumbler',
        'label'       => 'Tumbler',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'dribble',
        'label'       => 'Dribble',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'stubleupon',
        'label'       => 'Stubleupon',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'lastfm',
        'label'       => 'Lastfm',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'moby_picture',
        'label'       => 'Moby Picture',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'skype',
        'label'       => 'Skype',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'myspace',
        'label'       => 'Myspace',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'dropbox',
        'label'       => 'Dropbox',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'four_square',
        'label'       => 'Four Square',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'ichat',
        'label'       => 'iChat',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'flickr',
        'label'       => 'Flickr',
        'desc'        => 'Input the full URL you\'d like the button to link.',
        'std'         => '',
        'type'        => 'text',
        'section'     => 'social_media_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'required_options',
        'label'       => 'Required Options',
        'desc'        => 'For displaying the google map, enter latitude and longitude values.',
        'std'         => '',
        'type'        => 'textblock',
        'section'     => 'google_map_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'latitude',
        'label'       => 'Latitude',
        'desc'        => 'Enter a <a href="http://itouchmap.com/latlong.html">latitude</a> value.',
        'std'         => '51.507335',
        'type'        => 'text',
        'section'     => 'google_map_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'longitude',
        'label'       => 'Longitude',
        'desc'        => 'Enter a <a href="http://itouchmap.com/latlong.html">longitude</a> value.',
        'std'         => '-0.127683',
        'type'        => 'text',
        'section'     => 'google_map_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'marker_icon',
        'label'       => 'Marker Icon',
        'desc'        => 'Upload your marker icon.',
        'std'         => '',
        'type'        => 'upload',
        'section'     => 'google_map_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'map_zoom',
        'label'       => 'Map Zoom',
        'desc'        => 'Set the map zoom.',
        'std'         => '13',
        'type'        => 'select',
        'section'     => 'google_map_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => '8',
            'label'       => '8',
            'src'         => ''
          ),
          array(
            'value'       => '9',
            'label'       => '9',
            'src'         => ''
          ),
          array(
            'value'       => '10',
            'label'       => '10',
            'src'         => ''
          ),
          array(
            'value'       => '11',
            'label'       => '11',
            'src'         => ''
          ),
          array(
            'value'       => '12',
            'label'       => '12',
            'src'         => ''
          ),
          array(
            'value'       => '13',
            'label'       => '13',
            'src'         => ''
          ),
          array(
            'value'       => '14',
            'label'       => '14',
            'src'         => ''
          ),
          array(
            'value'       => '15',
            'label'       => '15',
            'src'         => ''
          ),
          array(
            'value'       => '16',
            'label'       => '16',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'slogan',
        'label'       => 'Slogan',
        'desc'        => 'Enter a slogan for front page. Use span tag for selected text.',
        'std'         => '"I can never stand still. I must explore and experiment. I am never satisfied with my work.<span>I resent the limitations of my own imagination</span>." &mdash;Walt Disney',
        'type'        => 'textarea-simple',
        'section'     => 'front_page_options',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'enable_callout',
        'label'       => 'Enable Callout Box',
        'desc'        => 'Check to enable the callout box.',
        'std'         => '',
        'type'        => 'checkbox',
        'section'     => 'front_page_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => '',
        'choices'     => array( 
          array(
            'value'       => 'Enable',
            'label'       => 'Enable',
            'src'         => ''
          )
        ),
      ),
      array(
        'id'          => 'callout_title',
        'label'       => 'Callout Title',
        'desc'        => 'The title of the callout box. Use span tag for selected text.',
        'std'         => 'The <span>Fusion</span> is perfect <span>Business</span> solution',
        'type'        => 'text',
        'section'     => 'front_page_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'callout_caption',
        'label'       => 'Callout Caption',
        'desc'        => 'The caption of the callout box.',
        'std'         => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pulvinar, felis fringillaconvallis rhoncus, lorem arcu feugiat nisi, vel accumsan nisi arcu sit amet metus.Pellentesque id lorem in dolor condimentum varius. Fusce cursus, leo eget auctor imperdiet,purus turpis facilisis est, quis gravida ipsum nunc pellentesque massa. Sed nec ornare elit.',
        'type'        => 'textarea-simple',
        'section'     => 'front_page_options',
        'rows'        => '2',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'callout_button',
        'label'       => 'Callout Button',
        'desc'        => 'The text that displays on the button.',
        'std'         => 'Find Of More',
        'type'        => 'text',
        'section'     => 'front_page_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      ),
      array(
        'id'          => 'callout_button_url',
        'label'       => 'Callout Button URL',
        'desc'        => 'The link the button directs to.',
        'std'         => '#',
        'type'        => 'text',
        'section'     => 'front_page_options',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'class'       => ''
      )
    )
  );
   
  /* settings are not the same update the DB */
  if ( $saved_settings !== $custom_settings ) {
    update_option( 'option_tree_settings', $custom_settings ); 
  }
  
}