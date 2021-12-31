<article id="video-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php if( get_post_meta($post->ID, 'video', true) ) : ?>
  <a href="<?php echo the_permalink(); ?>" class="video-thumb">
  <?php elseif ( get_post_meta($post->ID, 'iframe', true)) : ?>
  <a href="<?php echo the_permalink(); ?>" class="video-thumb">
  <?php else : ?>
  <a href="<?php echo get_post_meta($post->ID, 'link', true); ?>" target="_blank" class="video-thumb">
  <?php endif; ?>
  <?php if ( get_theme_mod( 'show_rating' ) != "no") : ?>
  <?php if( get_post_meta($post->ID, 'ratings_average', true) ) : ?>
  <span class="star-icon"></span><div class="thumb-rating" title="Rating"><span><?php echo (round(get_post_meta($post->ID, 'ratings_average', true))) ; ?>/10</span></div>
  <?php elseif ( get_post_meta($post->ID, 'rating', true) ) : ?>
  <span class="star-icon"></span><div class="thumb-rating" title="Rating"><span><?php echo (int)(round(get_post_meta($post->ID, 'rating', true)) / 10) ; ?>/10</span></div>
  <?php endif; endif; ?>
  <div class="play"></div>
  <span class="<?php if ( get_theme_mod( 'thumb_hover_effects' ) == "none") {echo "none";} if ( get_theme_mod( 'thumb_hover_effects' ) == "light") {echo "light";} if ( get_theme_mod( 'thumb_rounded_borders' ) != "no") {echo " rounded-borders";}?>">
  <?php if ( has_post_thumbnail() ) : the_post_thumbnail('porntheme-thumb'); else : echo '<img src="'.get_template_directory_uri().'/images/no-img.png" class="size-porntheme-thumb" alt="No video image preview available" />'; endif; ?>
  </span>
  <?php if ( get_theme_mod( 'show_quality' ) != "no") : ?>
  <?php if( get_post_meta($post->ID, 'quality', true) ) : ?>
  <div class="thumb-quality" title="Quality"><span><?php echo get_post_meta($post->ID, 'quality', true); ?></span></div>
  <?php endif; endif; ?>
  <?php if ( get_theme_mod( 'show_duration' ) != "no") : ?>
  <?php if( get_post_meta($post->ID, 'duration', true) ) : ?>
  <div class="thumb-duration" title="Duration"><span><?php if (is_numeric(get_post_meta($post->ID, 'duration', true))) { echo gmdate("i:s", get_post_meta($post->ID, 'duration', true)); } else { echo get_post_meta($post->ID, 'duration', true); } ?></span></div>
  <?php endif; endif; ?>
  </a>
</article>