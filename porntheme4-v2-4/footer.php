<?php if ( is_active_sidebar( 'bot-center' ) ) : ?>

<div id="bot-center">
  <?php dynamic_sidebar( 'bot-center' ); ?>
</div>
<?php endif; ?>
</div>
<?php if ( is_active_sidebar( 'four-rows-bottom' ) ) : ?>
<div id="four-rows-bottom">
  <?php dynamic_sidebar( 'four-rows-bottom' ); ?>
</div>
<?php endif; ?>
</div>
<nav id="footer-menu">
  <?php
		  $menuParameters = array(
			  'container'       => false,
			  'echo'            => false,
			  'items_wrap'      => '%3$s',
			  'depth'           => 0,
			  'theme_location'  => 'footer-menu',
			  'container_class' => 'footer-menu'
			);
			echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
			?>
</nav>
<footer>
  <div class="site-info">
    <div class="site-copyright-info">Copyright &copy; <?php echo date("Y"); ?>
      <div class="site-title"><a href="<?php echo esc_url( __( '/', 'porntheme' ) ); ?>">
        <?php if ( get_theme_mod( 'porntheme_logo' ) ) : ?>
        <img class="" src="<?php echo get_theme_mod( 'porntheme_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" >
        <?php else : ?>
        <?php bloginfo( 'name' ); ?>
        <?php endif; ?>
        </a></div>
    </div>
    <div class="porntheme-credits"><a href="<?php echo esc_url( __( 'https://pornaffiliate.xxx/themes/', 'porntheme' ) ); ?>" rel="external nofollow"><?php printf( __( 'Theme Design by %s', 'porntheme' ), 'Porn Affiliate' ); ?></a></div>
  </div>
</footer>
</div>
<script type="javascript">
        function playPause() {
            var singleVideo = $("#single-video");
            if (singleVideo.paused) {
                singleVideo.play();
            } else {
                singleVideo.pause();
            }
        }
        </script> 
<script>
	$( ".toggle-header-menu" ).click(function() {
	  $( "#header-menu > div" ).fadeToggle("slow", function(){});
	});
	$( "#toggle-comments" ).click(function() {
	  $( "#wrap-comments" ).fadeToggle("slow", function(){});
	});
	</script>
<?php wp_footer(); ?>
<!-- Porn Theme is copyright www.PornAffiliate.xXx - Do not redistribute without a visible link to "http://pornaffiliate.xxx/wordpress-porn-themes/" - Thanks! -->
</body></html>