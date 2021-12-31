<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:700|Open+Sans" rel="stylesheet">
	<title><?php wp_title( '•', true, 'right' ); bloginfo('name'); if (is_front_page()) { echo " • "; echo bloginfo('description'); } ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <?php if ( get_theme_mod( 'favicon_enable' ) == "yes") {echo '<link rel="icon" type="image/png" href="'.get_stylesheet_directory_uri().'/images/favicon/favicon-32x32.png" sizes="32x32" /><link rel="icon" type="image/png" href="'.get_stylesheet_directory_uri().'/images/favicon/favicon-16x16.png" sizes="16x16" />';} ?>
    <?php if ( get_theme_mod( 'rta_label' ) == "yes") {echo '<meta name="RATING" content="RTA-5042-1996-1400-1577-RTA" />';} ?>
    <?php if ( get_theme_mod( 'starry_bg' ) == "yes") {echo '<style>body {background-image: url('.get_stylesheet_directory_uri().'/images/bg.jpg) !important; background-repeat: repeat !important;}</style>';} ?>
    <?php if ( get_theme_mod( 'rounded_ads' ) == "no") {echo '<style>#top-center img, #top-center iframe, #bot-center img, #bot-center iframe, #single-left img, #single-right img, #single-left iframe, #single-right iframe, #left-ads img, #right-ads img, #left-ads iframe, #right-ads iframe, #four-rows-bottom img, #four-rows-bottom iframe { border-radius: 0px !important; }</style>';} ?>
    <?php if ( get_theme_mod( 'absolute_ads' ) == "no") {echo '<style>#left-ads, #right-ads { position: absolute !important; }</style>';} ?>
    <?php if ( get_theme_mod( 'four_rows_text_align' ) == "left") {echo '<style>#four-rows-bottom { text-align:center !important; }</style>';} ?>
    <?php if ( get_theme_mod( 'show_comments' ) == "yes") {echo '<style>#comments {display:block !important;}</style>';} ?>
    <?php if(isset($_SERVER['HTTP_USER_AGENT'])){$agent = $_SERVER['HTTP_USER_AGENT'];}
	if (stripos( $agent, 'Chrome') !== false){$browser = 'chrome';}
	elseif (stripos( $agent, 'Safari') !== false){ $browser = 'safari';}
	if($browser=='safari'){ echo '<style>article a:hover .play {display: none !important;} article a:hover img {box-shadow:none !important;}</style>';} ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<img src="/wp-content/uploads/sites/3/2018/09/bg.jpg" style="display:none;">
<div id="wrap">
	<header id="site-header">
    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>">
    	<?php if ( get_theme_mod( 'porntheme_logo' ) ) : ?>
		<img class="" src="<?php echo get_theme_mod( 'porntheme_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
		<?php else : ?>
		<?php bloginfo( 'name' ); ?>
        <?php endif; ?>
        </a></h1>
		<?php $description = get_bloginfo( 'description', 'display' ); if ( ! empty ( $description ) ) : ?>
		<h2 class="site-description"><?php echo esc_html( $description ); ?></h2>
		<?php endif; ?>
		<nav id="header-menu">
			<button class="toggle-header-menu"><?php _e( '&#9776;', 'porntheme' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'header-menu', 'menu_class' => 'header-menu-class', 'menu_id' => 'header-menu-id', 'depth' => 3 ) ); ?>
		</nav>
        <nav id="main-menu">
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class' => 'main-menu-class', 'menu_id' => 'main-menu-id' ) ); ?>
        </nav>
	</header>

	<div id="wrap-2">
    
    <div class="lightbar"></div>
    
    <?php if ( is_active_sidebar( 'top-center' ) ) : ?>
	<div id="top-center">
		<?php dynamic_sidebar( 'top-center' ); ?>
	</div>
	<?php endif; ?>
    
    <?php if ( is_active_sidebar( 'left-ads' ) ) : ?>
	<div id="left-ads">
		<?php dynamic_sidebar( 'left-ads' ); ?>
	</div>
	<?php endif; ?>
	
    <?php if ( is_active_sidebar( 'right-ads' ) ) : ?>
	<div id="right-ads">
		<?php dynamic_sidebar( 'right-ads' ); ?>
	</div>
	<?php endif; ?>