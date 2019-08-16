<?php
/**
 * The template for displaying all single posts.
 *
 * @package storefront
 */

get_header(); ?>

<?php 

  $user = get_current_user_id(); 
  var_dump($user);

var_dump ($_POST);
?>

<form id="form-id" method="post" action="https://educacion-emocional.abbviecare.es">
  <input type="hidden" name="user" value="<?php echo $user; ?>">
</form>

<div onclick="document.getElementById('form-id').submit();">Click Me</div>


  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post();

      do_action( 'storefront_single_post_before' );

      get_template_part( 'content', 'ruta' );

      do_action( 'storefront_single_post_after' );

    endwhile; // End of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
