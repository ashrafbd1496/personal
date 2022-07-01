<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Personal
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

  <header id="header">
    <div class="container">

      <h1><a href="<?php home_url(); ?>"><?php the_field( 'title', 'option' ); ?></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->
      <h2><?php the_field( 'description', 'option' ); ?></h2>

      <nav id="navbar" class="navbar">
        <?php 
           wp_nav_menu( array(
            'theme_location'  => 'main-menu',
            'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
        ?>
        
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
        <?php if ( have_rows( 'social_media', 'option' ) ) : ?>
        <?php while ( have_rows( 'social_media', 'option' ) ) : the_row(); ?>
            <a href="<?php the_sub_field( 'icon_url' ); ?>" class="twitter"><?php the_sub_field( 'social_icon' ); ?></a>     
        <?php endwhile; ?>
      <?php else : ?>
        <?php // no rows found ?>
      <?php endif; ?>
    </div>

    </div>
  </header><!-- End Header -->
