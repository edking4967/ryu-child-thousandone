<?php
/*
 * Template Name: Stories
 * Description: Stories page for thousandonestories.com
 */

get_header(); ?>
	<div id="primary" class="content-area">

		<div id="content" class="site-content" role="main">

        <h2 class="genres">Series</h2>
        <table class="genre-table">
          <tr>
             <td class="genres"><a href="http://thousandonestories.com/stories/crystal-dragon"><img src="http://thousandonestories.com/wp-content/uploads/2017/05/crystal-dragon.png"></a></td>
             <td class="genres"><a href="http://thousandonestories.com/stories/lycaon"><img src="http://thousandonestories.com/wp-content/uploads/2017/05/lycaon.jpeg"></a></td>
          </tr>
        </table>
        <h2 class="genres">Genres</h2>
        <table class="genre-table">
          <tr>
             <td class="genres"><a href="http://thousandonestories.com/stories/detective"><img src="http://thousandonestories.com/wp-content/uploads/2017/05/detective.jpeg"></a></td>
             <td class="genres"><a href="http://thousandonestories.com/stories/fantasy"><img src="http://thousandonestories.com/wp-content/uploads/2017/05/fantasy.jpeg"></a></td>
          </tr>
             <td class="genres"><a href="http://thousandonestories.com/stories/scifi"><img src="http://thousandonestories.com/wp-content/uploads/2017/05/scifi.jpeg"></a></td>
             <td class="genres"><a href="http://thousandonestories.com/stories/literary"><img src="http://thousandonestories.com/wp-content/uploads/2017/05/literary.jpeg"></a></td>
          <tr>
          </tr>
        </table>
        <p></p>
        <h2 class="genres">All Stories</h2>
        <?php

        $args = array( 'posts_per_page' => 100, 'category' => 4 );

        $myposts = get_posts( $args );

        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
              <p align = "right" class="story_block">
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
              </p>
        <?php endforeach; 
        wp_reset_postdata();?>

		</div><!-- #content -->
	</div><!-- #primary -->
<?php get_footer(); ?>
