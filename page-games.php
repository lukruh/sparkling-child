<?php
 /*
  Template Name: Games Page Template
 */

get_header();
?>

<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
        
      <header class="entry-header">
        <?php the_post_thumbnail(); ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header>

      <div class="entry-content">
        <?php the_content(); ?>
        <?php
          $args = array(
            'post_type' => 'game', // enter custom post type
            'orderby' => 'date',
            'order' => 'DESC',
          );
              
          $loop = new WP_Query( $args );
          if( $loop->have_posts() ):
          while( $loop->have_posts() ): $loop->the_post(); global $post;
	      echo '<div class=col-md-4>';
		$custom_fields = get_post_custom();
            echo '<div class="game-entry">';
	    echo '<div class="game-thumb">'.get_the_post_thumbnail( $id ).'</div>';
            echo '<div class="game-header"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></div>';
	    echo '<div class="game-desc">'.get_the_excerpt().'</div>';
	    echo '<a href="'.$custom_fields['wpcf-apk-url'][0].'">apk</button></a>';
            //echo '<div class="portfolio-image">'. get_the_post_thumbnail( $id ).'</div>';
            //echo '<div class="portfolio-work">'. get_the_content().'</div>';
            echo '</div>';
	      
	echo '</div>';
          endwhile;
          endif;
        ?>
      </div><!-- #entry-content -->
    <?php endwhile; // end of the loop. ?>                
  </main><!-- #main -->
</div><!-- #primary -->


<?php 
//get_sidebar();
get_footer();
?>
