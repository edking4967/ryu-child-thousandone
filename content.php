<?php
/**
 * @package Ryu
 */
?>
<?php if (! is_admin()) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear' ); ?>>
  <div class="entry-wrap wrap clear">
    <?php if ( '' != get_the_post_thumbnail() ) : ?>
      <?php if (( ! is_single() ) && (! wp_is_mobile()) ): ?>
      <div class="post_image">
      <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'ryu' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="<?php the_ID(); ?>" class="ryu-featured-thumbnail">
        <?php the_post_thumbnail( 'ryu-featured-thumbnail' ); ?>
      </a></div>
      <?php else : ?>
        <?php //the_post_thumbnail( 'ryu-featured-thumbnail' ); ?>
      <?php endif; ?>
    <?php endif; ?>

    <div class="entry-header">
      <?php
        if ( ! is_single() ) :
          the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
        else :
          the_title( '<h1 class="entry-title">', '</h1>' );
        endif;
      ?>
      <div class = "author-bubble">
          <!--BLABBOS WAS HERE-->
          <span><?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?></span>
          <span>
          <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) )?>">
          <?php echo get_the_author(); ?></a>
          </span>
          <span>
          <?php if(function_exists('wp_ulike')) wp_ulike('get'); ?>
          </span><br>
          <!--<span>+ -</span>-->
          <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
          <span class="comments-link"><?php comments_popup_link( __( 'leave a comment', 'ryu' ), __( '1 Comment', 'ryu' ), __( '% Comments', 'ryu' ) ); ?></span>
          <?php endif; ?>

          <?php edit_post_link( __( 'edit', 'ryu' ), '<span class="edit-link">', '</span>' ); ?>
      </div><!--author-bubble-->      
    </div><!-- .entry-header -->
    
      <?php if ( is_search() ) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
          <?php the_excerpt(); ?>
        </div><!-- .entry-summary -->
      <?php else : ?>
        <?php if ( '' == get_the_post_thumbnail() ) : ?>    
            <div style="float: left;margin-left:20px;">
        <?php else : ?>
            <div class="paragraph">
        <?php endif; ?>        
          <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ryu' ) ); ?>
          <?php
            wp_link_pages( array(
              'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'ryu' ) . '</span>',
              'after'       => '</div>',
              'link_before' => '<span>',
              'link_after'  => '</span>',
            ) );
          ?>
        <div>
      <?php endif; ?>
  </div><!-- .entry-wrap -->
</article><!-- #post-## -->
<?php endif; ?>