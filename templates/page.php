<?php
/*
  Template Name: Nom du template
*/
  
  get_header();
  if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

  <h1><?php the_title(); ?></h1>

  <div class="content">
    <?php the_content(); ?>
  </div>

<?php
  endwhile;
  endif;
  get_footer();
?>
