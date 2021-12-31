<div id="single-wrap">
  <?php if ( is_active_sidebar( 'single-left' ) ) : ?>
  <div id="single-left">
    <?php dynamic_sidebar( 'single-left' ); ?>
  </div>
  <?php endif; ?>
  <?php if ( is_active_sidebar( 'single-right' ) ) : ?>
  <div id="single-right">
    <?php dynamic_sidebar( 'single-right' ); ?>
  </div>
  <?php endif; ?>
  <article id="video-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="single-wrap">
  	<h1><?php single_post_title(); ?></h1>
    <?php if ( get_theme_mod( 'single_header_meta' ) != "below_video") : ?>
    <div id="single-header-meta">
    <div class="published-date"><?php the_date(); ?></div>
    <div class="video-quality"><?php echo get_post_meta($post->ID, 'quality', true); ?></div>
    </div>
    <?php endif; ?>
    <?php if( get_post_meta($post->ID, 'video', true) ) : ?>
    <video loop autoplay controls width='100%' height='100%' src='<?php echo get_post_meta($post->ID, 'video', true); ?>' type='video/mp4' id="single-video" onClick='playPause();'>
      Your browser does not support the HTML 5 video. We suggest using <a href="http://www.google.no/search?q=google+chrome‎">Google Chrome</a> and you need <a href="http://www.google.no/search?q=adobe+flash‎">Adobe Flash</a> (it is free) to see this site and it's videos as intended, thanks!
    </video>
    <?php elseif ( get_post_meta($post->ID, 'iframe', true)) : ?>
    <?php echo get_post_meta($post->ID, 'iframe', true); ?>
    <?php endif; ?>
    <?php if( get_post_meta($post->ID, 'link', true) ) : ?>
    <div class="c2a-wrap"><a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" target="_blank" class="c2a">Watch Full Video!</a></div>
    <?php endif; ?>
    <span class="<?php if( get_post_meta($post->ID, 'link', true) ) { echo "video-link-set"; } ?>">
    <div id="video-meta">
      <?php if ( get_theme_mod( 'single_header_meta' ) == "below_video") : ?>
      <div id="wrap-single-bottom-date-quality" style="float:right;margin: 0 0 5px 5px;">
      <div class="published-date-below-video" style="float: left; margin: 0 !important;"><?php the_date(); ?></div><div class="video-quality-below-video" title="Video Quality" style="float: left; margin: 0 0 0 5px !important;"><?php echo get_post_meta($post->ID, 'quality', true); ?></div>
      </div>
      <?php endif; ?>
      <?php if( get_post_meta($post->ID, 'movie_title', true) ) : ?>
      <div class="film-name">Movie Title: <?php echo get_post_meta($post->ID, 'movie_title', true); ?></div>
      <?php endif; ?>
      <div class="tags">
        <?php the_tags('Niches: ') ?>
      </div>
      <div class="cat">Girls:
        <?php the_category(', ') ?>
      </div>
      </div></span>
      <div id="single-video-rating">
      <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
      </div>
      <div id="single-content"><?php echo the_content(); ?></div>
  </div>
  </article>
</div>
