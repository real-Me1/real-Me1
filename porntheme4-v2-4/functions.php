<?php

// Porn Theme #4 Functions
// Please visit pornaffiliate.xxx/themes for support.

// Random video order on all archive pages
if ( get_theme_mod( 'rand_video_order' ) == "yes") :
add_action('pre_get_posts','alter_query');
function alter_query($query){
    if ($query->is_main_query())
        $query->set('orderby', 'rand');
}
endif;
// Include Stylesheet

function porntheme_enqueue_style() {
	wp_enqueue_style( 'style', get_stylesheet_uri() ); 
}

add_action( 'wp_enqueue_scripts', 'porntheme_enqueue_style' );

// Tag Cloud: No of Items
function widget_custom_tag_cloud($args) {
    // Choose number of tags to display.
    $args['number'] = 50;
	$args['smallest'] = 12;
	$args['largest'] = 12;
    return $args;
}
add_filter( 'widget_tag_cloud_args', 'widget_custom_tag_cloud' );

// Pagination

global $wp_query;
$big = 999999999;
echo paginate_links( array(
	'prev_text' => __('aPrevious'),
	'next_text' => __('aNext'),
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages
) );

// New Videos Last X Days

function wp_posts_in_days( $args = '' ) {
	global $wpdb;
	$defaults = array(
		'echo' => 1,
		'days' => 30,
		'lookahead' => 0
	);
	$the_args = wp_parse_args( $args, $defaults );
	extract( $the_args , EXTR_SKIP );
	unset( $args , $the_args , $defaults );
	$days = intval( $days );
	$operator = ( $lookahead != false ) ? '+' : '-';
	$postsindays = $wpdb->get_col( "
		SELECT COUNT(ID)
		FROM $wpdb->posts
		WHERE (1=1
		AND post_type = 'post'
		AND post_status = 'publish'
		AND post_date >= '" . date('Y-m-d', strtotime("$operator$days days")) . "')"
	);
		if($echo != false) :
			echo $postsindays[0];
		else :
			return $postsindays[0];
		endif;
	return;
}

// Custom Video Thumb Size

add_theme_support( 'post-thumbnails' );
add_image_size( 'porntheme-thumb', 320, 240, array( 'center', 'center' )  );

// Porn Theme Sidebars

function register_widget_areas() {
		register_sidebar( array(
		'name'          => __( 'Four Rows Bottom', 'porntheme' ),
		'id'            =>'four-rows-bottom',
		'description'   => __( 'Displays as four rows until Xpx then two.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
				register_sidebar( array(
		'name'          => __( 'Top Center', 'porntheme' ),
		'id'            =>'top-center',
		'description'   => __( 'Full width centered widget area above the content and below the main menu. Perfect for a tag cloud.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => __( 'Bottom Center', 'porntheme' ),
		'id'            =>'bot-center',
		'description'   => __( 'Full width centered widget area below the content and above the footer. Perfect for a tag cloud.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Single Video Left', 'porntheme' ),
		'id'            =>'single-left',
		'description'   => __( 'Fits 315px width ads or whatever you want to place there.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Single Video Right', 'porntheme' ),
		'id'            =>'single-right',
		'description'   => __( 'Fits 315px width ads or whatever you want to place there.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Left Ad', 'porntheme' ),
		'id'            =>'left-ads',
		'description'   => __( '120px width widget area that will only display on screens larget than 1900px, so it will be shown on full HD and larger screens. Perfect for ads and other things that is not important to the usage of the site.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => __( 'Right Ad', 'porntheme' ),
		'id'            =>'right-ads',
		'description'   => __( '120px width widget area that will only display on screens larget than 1900px, so it will be shown on full HD and larger screens. Perfect for ads and other things that is not important to the usage of the site.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => __( 'First In-Tube Ad', 'porntheme' ),
		'id'            =>'first-in-tube-ad',
		'description'   => __( 'Same size as a video thumb. Images (banner ads) placed here will automatically fill so you might want to do some pre editing of the images. Will display no matter how many videos are currently displayed on the index, search pages etc.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
		register_sidebar( array(
		'name'          => __( 'Second In-Tube Ad', 'porntheme' ),
		'id'            =>'second-in-tube-ad',
		'description'   => __( 'Same size as a video thumb. Images (banner ads) placed here will automatically fill so you might want to do some pre editing of the images.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
			register_sidebar( array(
		'name'          => __( 'Third In-Tube Ad', 'porntheme' ),
		'id'            =>'third-in-tube-ad',
		'description'   => __( 'Same size as a video thumb. Images (banner ads) placed here will automatically fill so you might want to do some pre editing of the images.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
			register_sidebar( array(
		'name'          => __( 'Last In-Tube Ad', 'porntheme' ),
		'id'            =>'last-in-tube-ad',
		'description'   => __( 'Same size as a video thumb. Images (banner ads) placed here will automatically fill so you might want to do some pre editing of the images. Will display no matter how many videos are currently displayed on the index, search pages etc.', 'porntheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'register_widget_areas' ); 
;

// Porn Theme Menus

function register_porntheme_menus() {
  register_nav_menus(
    array(
      'main-menu' => __( 'Main Menu' ),
	  'header-menu' => __( 'Header Menu' ),
	  'footer-menu' => __( 'Footer Menu' )
    )
  );
}
add_action( 'init', 'register_porntheme_menus' );

// Porn Theme Customization Options

function porntheme_custom_logo_customizer_settings($wp_customize) {
$wp_customize->add_setting('porntheme_logo');
$wp_customize->add_control(new WP_Customize_Image_Control( $wp_customize, 'porntheme_logo',
array(
'label' => 'Upload Logo',
'section' => 'title_tagline',
'settings' => 'porntheme_logo',
) ) );
}
add_action('customize_register', 'porntheme_custom_logo_customizer_settings');
//
function porntheme_custom_bg_customizer_settings($wp_customize) {
$wp_customize->add_setting('starry_bg');
$wp_customize->add_control('starry_bg', array(
'label' => 'Starry Background',
'section' => 'title_tagline',
'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes',
		'no' => 'No (default)',
	),
) );
}
add_action('customize_register', 'porntheme_custom_bg_customizer_settings');
//
function porntheme_show_duration_customizer_settings($wp_customize) {
$wp_customize->add_setting('show_duration');
$wp_customize->add_control('show_duration', array(
  'label' => __( 'Show Duration' ),
  'description' => __('Show the small video duration in the bottom right on the thumbs? This is the value of the custom field "duration" of each post.' ),
  'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes (default)',
		'no' => 'No',
	),
  'section' => 'thumb_options',
) );
$wp_customize->add_section( 'thumb_options', array(
  'title' => __( 'Thumbnails' ),
  'description' => __( 'Change the way video thumbs are displyed.' ),
  'capability' => 'edit_theme_options',
  'priority' => 111,
) );
}
add_action('customize_register', 'porntheme_show_duration_customizer_settings');
//
function porntheme_show_rating_customizer_settings($wp_customize) {
$wp_customize->add_setting('show_rating');
$wp_customize->add_control('show_rating', array(
  'label' => __( 'Show Rating' ),
  'description' => __('Show the rating in the top right on the thumbs? This is the value rounded bvalue of the custom field "rating" of each post.' ),
  'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes (default)',
		'no' => 'No',
	),
  'section' => 'thumb_options',
) );
}
add_action('customize_register', 'porntheme_show_rating_customizer_settings');
//
function porntheme_show_quality_customizer_settings($wp_customize) {
$wp_customize->add_setting('show_quality');
$wp_customize->add_control('show_quality', array(
  'label' => __( 'Show Quality' ),
  'description' => __('Show the video quality in the bottom left on the thumbs? This is the value of the custom field "quality" of each post.' ),
  'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes (default)',
		'no' => 'No',
	),
  'section' => 'thumb_options',
) );
}
add_action('customize_register', 'porntheme_show_quality_customizer_settings');
//
function porntheme_thumb_hover_effects_customizer_settings($wp_customize) {
$wp_customize->add_setting('thumb_hover_effects');
$wp_customize->add_control('thumb_hover_effects', array(
  'label' => __( 'Hover Effects' ),
  'description' => __('Choose the video thumb hover effects.' ),
  'type' => 'radio',
  'choices' => array(
		'shadow' => 'Shadow (default)',
		'light' => 'Light',
		'none' => 'None'
	),
  'section' => 'thumb_options',
) );
}
add_action('customize_register', 'porntheme_thumb_hover_effects_customizer_settings');
//
function porntheme_thumb_rounded_borders_customizer_settings($wp_customize) {
$wp_customize->add_setting('thumb_rounded_borders');
$wp_customize->add_control('thumb_rounded_borders', array(
  'label' => __( 'Rounded Borders' ),
  'description' => __('Should the thumbs have rounded borders?' ),
  'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes (default)',
		'no' => 'No',
	),
  'section' => 'thumb_options',
) );
}
add_action('customize_register', 'porntheme_thumb_rounded_borders_customizer_settings');
//
function porntheme_single_header_meta_customizer_settings($wp_customize) {
$wp_customize->add_setting('single_header_meta');
$wp_customize->add_control('single_header_meta', array(
  'label' => __( 'Date and Quality' ),
  'description' => __('Where to display the date the video was published to this site and the quality from the custom field "quality". If you do not use the quality custom field it will not be display and it will not break anything!' ),
  'type' => 'radio',
  'choices' => array(
		'above_video' => 'Yes, above the video (Default)',
		'below_video' => 'Yes, below the video',
	),
  'section' => 'single_options',
) );
$wp_customize->add_section( 'single_options', array(
  'title' => __('Single' ),
  'description' => __( 'Options for the single video pages.' ),
  'capability' => 'edit_theme_options',
  'priority' => 112,
) );
}
add_action('customize_register', 'porntheme_single_header_meta_customizer_settings');
//
function porntheme_rounded_ads_customizer_settings($wp_customize) {
$wp_customize->add_setting('rounded_ads');
$wp_customize->add_control('rounded_ads', array(
  'label' => __( 'Rounded Ads' ),
  'description' => __('Enable rounded corners on ads (images and iframes). Does not apply to "In-Tube" ads, these have the same corners as the video thumbs. Rounding corners on iframes does not always work.' ),
  'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes (default)',
		'no' => 'No',
	),
  'section' => 'ad_options',
) );
$wp_customize->add_section( 'ad_options', array(
  'title' => __( 'Advertisements' ),
  'description' => __( 'Change the way banner advertisements are displyed.' ),
  'capability' => 'edit_theme_options',
  'priority' => 113,
) );
}
add_action('customize_register', 'porntheme_rounded_ads_customizer_settings');
//
function porntheme_absolute_ads_customizer_settings($wp_customize) {
$wp_customize->add_setting('absolute_ads');
$wp_customize->add_control('absolute_ads', array(
  'label' => __( 'Follow Ads' ),
  'description' => __('Ads / Widget Area on the left and right outside the content follow screen on scrolling down.' ),
  'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes (default)',
		'no' => 'No',
	),
  'section' => 'ad_options',
) );
}
add_action('customize_register', 'porntheme_absolute_ads_customizer_settings');
//
function porntheme_show_comments_customizer_settings($wp_customize) {
$wp_customize->add_setting('show_comments');
$wp_customize->add_control('show_comments', array(
  'label' => __( 'Enable Comments' ),
  'description' => __('Display the comment section under applicable videos and pages.' ),
  'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes',
		'no' => 'No (default)',
	),
  'section' => 'misc_options',
) );
$wp_customize->add_section( 'misc_options', array(
  'title' => __( 'Miscellaneous' ),
  'description' => __( 'Misc options for customizing the theme to your requirements.' ),
  'capability' => 'edit_theme_options',
  'priority' => 114,
) );
}
add_action('customize_register', 'porntheme_show_comments_customizer_settings');
//
function porntheme_rand_video_order_customizer_settings($wp_customize) {
$wp_customize->add_setting('rand_video_order');
$wp_customize->add_control('rand_video_order', array(
  'label' => __( 'Random Video Order' ),
  'description' => __('Make your front page and archive pages display the videos in a random order.' ),
  'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes',
		'no' => 'No (default)',
	),
  'section' => 'misc_options',
) );
}
add_action('customize_register', 'porntheme_rand_video_order_customizer_settings');
//
function porntheme_rta_label_customizer_settings($wp_customize) {
$wp_customize->add_setting('rta_label');
$wp_customize->add_control('rta_label', array(
  'label' => __( 'RTA Label' ),
  'description' => __('Rate your your site as inappropriate for minors with the RTA header meta. <a href="http://www.rtalabel.org/index.php?content=terms&content=terms" target="_blank">Terms & Conditions</a>.' ),
  'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes',
		'no' => 'No (default)',
	),
  'section' => 'misc_options',
) );
}
add_action('customize_register', 'porntheme_rta_label_customizer_settings');
//
function porntheme_favicon_enable_customizer_settings($wp_customize) {
$wp_customize->add_setting('favicon_enable');
$wp_customize->add_control('favicon_enable', array(
  'label' => __( 'Enable Favicon' ),
  'description' => __('Display a xXx favicon for your site.' ),
  'type' => 'radio',
  'choices' => array(
		'yes' => 'Yes',
		'no' => 'No (default)',
	),
  'section' => 'misc_options',
) );
}
add_action('customize_register', 'porntheme_favicon_enable_customizer_settings');

// WP Post Rating Functions
/**
 * Override initial rating.
 * 
 * Set new posts and pages initial rating to the value
 * of the metadata whose key is initial_rating.
 * 
 * @author Nabil Kadimi <nabil@kadimi.com>
 * @link   https://goo.gl/l5exac
 */
add_action( 'added_post_meta', function( $meta_id, $post_id, $meta_key, $meta_value ) {

	/**
	 * Filter out all keys except ratings_average.
	 */
	if ( 'ratings_average' !== $meta_key ) {
		return;
	}

	/**
	 * Make sure intial value is valid.
	 */
	$initial_rating = ( int ) get_post_meta( $post_id, 'rating', true );
	if ( $initial_rating > 100 || $initial_rating < 1 ) {
		return;
	}
	$rating_converted_for_porn_theme = (round($initial_rating / 10));
	/**
	 * Update ratings fields.
	 */
	delete_post_meta( $post_id, 'rating' );
	delete_ratings_fields( $post_id );
	add_post_meta( $post_id, 'ratings_users', 1, true );
	add_post_meta( $post_id, 'ratings_score', $rating_converted_for_porn_theme, true );
	add_post_meta( $post_id, 'ratings_average', $rating_converted_for_porn_theme, true );

}, 10, 5 );

// Remove Emoji Code
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// Remove Admin Bar
show_admin_bar( false );
