<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_title( '<header id="page-header"><h1 id="page-title">', '</h1></header>' ); ?>

	<div class="content">
		<?php
			the_content(); edit_post_link( __( 'Edit this page', 'pornaffiliate' ), '<span class="edit">', '</span>' );
		?>
	</div>
</article>
