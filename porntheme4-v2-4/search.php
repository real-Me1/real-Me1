<?php 
get_header(); ?>

<div id="content">
  <div id="inner-wrap">
    <div id="loop-wrap">
    <?php if ( have_posts() ) : ?>
    <header id="archive-header">
      <h1 id="archive-title"><?php printf( __( 'Search: %s', 'porntheme' ), get_search_query() ); ?></h1>
    </header>
	<?php 
	  if ( get_theme_mod( 'thumb_rounded_borders' ) != 'no') {$rounded = "yes";}
	  if ( is_active_sidebar( 'first-in-tube-ad' )) { if ($rounded == "yes") { echo '<span class="rounded-borders">';} echo '<div id="first-in-tube-ad">'; dynamic_sidebar( 'first-in-tube-ad' ); echo '</div>'; if ($rounded == "yes") { echo '</span>';} }
	  while ( have_posts() ) : the_post();
      get_template_part( 'content' );
	  if ( get_theme_mod( 'thumb_rounded_borders' ) != 'no') {$rounded = "yes";}
	  if ( is_active_sidebar( 'second-in-tube-ad' )) { if( $wp_query->current_post == 10 ) { if ($rounded == "yes") { echo '<span class="rounded-borders">';} echo '<div id="second-in-tube-ad">'; dynamic_sidebar( 'second-in-tube-ad' ); echo '</div>'; if ($rounded == "yes") { echo '</span>';} } }
	  if ( is_active_sidebar( 'third-in-tube-ad' )) { if( $wp_query->current_post == 24 ) { if ($rounded == "yes") { echo '<span class="rounded-borders">';} echo '<div id="third-in-tube-ad">'; dynamic_sidebar( 'third-in-tube-ad' ); echo '</div>'; if ($rounded == "yes") { echo '</span>';}  } }
	  endwhile;
	  else : get_template_part( 'content', 'none' );
	  endif; 
		if ( get_theme_mod( 'thumb_rounded_borders' ) != 'no') {$rounded = "yes";}
		if ( is_active_sidebar( 'last-in-tube-ad' )) { if ($rounded == "yes") { echo '<span class="rounded-borders">';} echo '<div id="last-in-tube-ad">'; dynamic_sidebar( 'last-in-tube-ad' ); echo '</div>'; if ($rounded == "yes") { echo '</span>';} }
	  echo "</div>";
      $pagination = paginate_links( array(
      'prev_text' => __('Previous'),
      'next_text' => __('Next'),
      ) ) .'</div>';
      if ($pagination != "</div>") :
      echo '<div class="pagination">'. $pagination; ?>
      <div class="lightbar-bot"></div>
      <?php else : echo '<div class="lightbar-bot-no-pagination"></div>'; endif; ?>
  </div>
</div>

<?php get_footer();
?>