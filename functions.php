<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

get_template_part( 'content', get_post_format());
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