<?php
get_header(); ?>

	<div id="content">
		<div id="inner-wrap">
			<?php
				while ( have_posts() ) : the_post();
					get_template_part( 'content-single' );
					if ( comments_open() || get_comments_number() ) { comments_template(); }
				endwhile;
			?>
		</div>
	</div>

<?php
get_footer(); ?>
