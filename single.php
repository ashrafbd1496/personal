<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Personal
 */

get_header();
?>
<style>
	#header{
		display: none;
	}
</style>
  <main id="main">

    <!-- ======= Portfolio Details ======= -->
    <div id="portfolio-details" class="portfolio-details">
      <div class="container">

        <div class="row">

          <div class="col-lg-8">
            <h2 class="portfolio-title"><?php the_title(); ?></h2>

            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
              	<?php $portfolio_slider__images = get_field( 'portfolio_slider_' ); ?>
				<?php if ( $portfolio_slider__images ) :  ?>
					<?php foreach ( $portfolio_slider__images as $portfolio_slider__image ): ?>
						<div class="swiper-slide">
                 
						<a href="<?php echo esc_url( $portfolio_slider__image['url'] ); ?>">
							<img class="img-fluid" src="<?php echo esc_url( $portfolio_slider__image['sizes']['prtslide-thumb'] ); ?>" alt="<?php echo esc_attr( $portfolio_slider__image['alt'] ); ?>" />
						</a>
						<p><?php echo esc_html( $portfolio_slider__image['caption'] ); ?></p>
				 </div>
					<?php endforeach; ?>
				<?php endif; ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>

          </div>

          <div class="col-lg-4 portfolio-info">
            <h3>Project information</h3>
            <ul>
             <?php if ( have_rows( 'portfolio_project_info' ) ) : ?>
				<?php while ( have_rows( 'portfolio_project_info' ) ) : the_row(); ?>
					 <li><strong><?php the_sub_field( 'project_info_title' ); ?></strong>: <?php the_sub_field( 'porject_info_desc_' ); ?></li>
				<?php endwhile; ?>
					<?php else : ?>
						<?php // no rows found ?>
					<?php endif; ?>
	            </ul>
            <p>
              <?php the_content(); ?>
            </p>
          </div>

        </div>

      </div>
    </div><!-- End Portfolio Details -->

  </main><!-- End #main -->

<?php
get_sidebar();
get_footer();
