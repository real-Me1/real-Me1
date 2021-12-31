<?php if ( post_password_required() ) {  return; } ?>
<div id="comments">
  
  <h2 class="title"><?php comments_number(); ?> <a href="#show-comments" id="toggle-comments"> +Show</a></h2>
  <p>What did the other viewers think of this video?</p>
  
  <div id="wrap-comments">
  <?php if ( have_comments() ) : ?>
  <ul class="list-of-comments">
    <?php wp_list_comments(); ?>
  </ul>
  
  <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
  <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
    <div class="previous-comments">
      <?php previous_comments_link( __( 'Older Comments', 'porntheme' ) ); ?>
    </div>
    <div class="next-comments">
      <?php next_comments_link( __( 'Newer Comments', 'porntheme' ) ); ?>
    </div>
  </nav>
  
  <?php endif; ?>
  <?php if ( ! comments_open() ) : ?>
  <p class="no-comments">
    <?php _e( 'Writing comments is not possible for this video.', 'porntheme' ); ?>
  </p>
  <?php endif; endif; ?>
  <?php 
  $args = array('label_submit' => 'Post your comment', 'title_reply' => 'Share your opinion', 'porntheme');
  comment_form($args); ?>
  </div>
</div>
