<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action( 'wp_head', 'fb_instant_articles' );
add_action( 'wp_head', 'google_search_console' );

function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

/*
function modify_header($content) {
    $link = "<a href=\"example.com\">link</a>";

    return $content . $link;
}
*/

//add_filter( 'get_header_image', 'modify_header' );

add_filter("wp_nav_menu", "my_nav_menu");

// Remove woocommerce styles one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );     // Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
    return $enqueue_styles;
}

function fb_instant_articles( )
{
    $wp_head = "<meta property=\"fb:pages\" content=\"1384459845146149\" />";
    echo $wp_head;
}

function google_search_console( )
{
    $wp_head = "<meta name=\"google-site-verification\" content=\"0De5f8n8YQ9Cd4bSINw0hG_0xx6XsoXvtoNao_5pBXI\" />";
    echo $wp_head;
}

function ryu_entry_meta()
{
    ?>
    <!--TODO: move this into HTML / CSS file -->
    </footer><!--entry-meta-->
    <footer class = "author-bubble">
        <!--author-bubble-->
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


function my_nav_menu($content)
{
    /** Function to display content below the nav-bar. */
    /* TODO: More dynamic announcements 
     */

   $searchBox = get_search_form(); 

   $emptyTable = "<table>
                <tr>
                   <td>
                        %s
                   </td>
                   <td>
                       %s
                   </td>
                </tr>
             </table>
            ";

    $links[0] = "https://goo.gl/NSeSZi";
    $links[1] = "https://www.amazon.com/David-Nees/e/B01DQYPYAM";
    $imgs[0] = "http://i.imgur.com/cmPslI9.gif";
    $imgs[1] = "http://i.imgur.com/956ddON.jpg";

    $num = rand(0, count($links)-1);
    $link = $links[$num];
    $img = $imgs[$num];

    $adFrame = "<div id=\"ad\" style=\"text-align: center\">
    <a href=\"%s\">
    <img style=\"width: 50%%; height: 50%%\" src=\"%s\">
    </a>
    </div>";

    $adBox = sprintf($adFrame, $link, $img);
    
    if(!is_user_logged_in()){
        //$registerBox = "<div class = \"notification\"><a href = \"" . wp_registration_url() . "\">Register</a> to post stories and leave comments</div>";
        $registerBox = "<div id=\"mainNotification\" class = \"notification\"><a href = \"https://docs.google.com/forms/d/1fAcqY-JyM2keH5LMw-I2cwv2zCV03BZz4TpvdWHGEO4/viewform?edit_requested=true\">Fill out a quick survey</a> to help us with the site!</div>";
    }
    else
    {
        $registerBox = "<div id=\"mainNotification\" class = \"notification\">Want to start writing? Visit the <a href = \"http://thousandonestories.com/wp-admin/post-new.php\">post story</a> page! You can also send stories to <a href=\"mailto:thousandonestories@gmail.com\">thousandonestories@gmail.com</a>. We will review your story and send feedback as soon as possible.</div>";
    }
    $fullTable = sprintf($emptyTable, $adBox, $registerBox);
    return $adBox . $content . $searchBox;
}
/*
function view_hits_function($atts , $content=null) {
    global $wpdb;
    $table_name = $wpdb->prefix . "top_ten";
    echo ' table-name: ' . $table_name;
    $myid = get_the_ID();
    echo '  the ID: ' .$myid;

        return ($wpdb->get_var($wpdb->prepare("SELECT cntaccess FROM $table_name WHERE ((postnumber = '$myid') AND (blog_ID =1))")));

        }
add_shortcode("view_hits","view_hits_function");
*/
?>
