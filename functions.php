<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}

function ryu_entry_meta()
{
    ?>
    <!--TODO: move this into HTML / CSS file -->
    </footer><!--entry-meta-->
    <footer class = "author-bubble">
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
    </footer><!--author-bubble-->
    <footer class = "entry-meta">
    <?php
}
add_filter("wp_nav_menu", "my_nav_menu");

function my_nav_menu($content)
{
    /** Function to display content below the nav-bar. */
    /* TODO: More dynamic announcements 
     * i.e. send a secret email to admin address and it will pop up
     */
    if(!is_user_logged_in()){
        $myst = "<div class = \"notification\"><a href = \"wp-login.php?action=register\">Register</a> to:
        <br \>get notified about new stories
        <br \>comment on stories</div>";
    }
    else
    {
        $myst = "";
    }
    return $content . $myst;
}

?>
