<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Personal
 */

?>

	<footer id="colophon" class="site-footer">
		  <div class="credits">
		    Developed by <a href="<?php the_field( 'developer_link', 'option' ); ?>"><?php the_field( 'developer_name', 'option' ); ?></a>
		  </div>
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>
