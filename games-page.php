<?php
 /*
  Template Name: Games Template
 */

get_header();
?>

<div id="primary" class="site-content">
  <div id="content" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
   <div class=col-md-3>
        
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
          echo 'test';
          while( $loop->have_posts() ): $loop->the_post(); global $post;
            echo '<div class="game-entry post-inner-content">';
            echo '<div class="game-header"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></div>';
            //echo '<div class="portfolio-image">'. get_the_post_thumbnail( $id ).'</div>';
            //echo '<div class="portfolio-work">'. get_the_content().'</div>';
            echo '</div>';
          endwhile;
          endif;
        ?>
      </div><!-- #entry-content -->
      <?php comments_template( '', true ); ?>    
   </div>
    <?php endwhile; // end of the loop. ?>                
  </div><!-- #content -->
</div><!-- #primary -->


<?php 
//get_sidebar();
get_footer();
?>
