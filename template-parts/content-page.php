<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Personal
 */

?>
  <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

      <div class="section-title">
        <h2>About</h2>
        <p>Learn more about me</p>
      </div>

      <div class="row">
        <div class="col-lg-4" data-aos="fade-right">
          <?php $about_bio_image_ = get_field( 'about_bio_image_', 'option' ); ?>
          <?php if ( $about_bio_image_ ) : ?>
            <img class="img-fluid" src="<?php echo esc_url( $about_bio_image_['url'] ); ?>" alt="<?php echo esc_attr( $about_bio_image_['alt'] ); ?>" />
          <?php endif; ?>
          
        </div>
        <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
          <h3><?php the_field( 'about_title', 'option' ); ?></h3>
          <p class="fst-italic">
           <?php the_field( 'about_subtitle', 'option' ); ?>
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <?php if ( have_rows( 'about_info_left', 'option' ) ) : ?>
                <?php while ( have_rows( 'about_info_left', 'option' ) ) : the_row(); ?>
                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span><?php the_sub_field( 'birth_day' ); ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span> <?php the_sub_field( 'website' ); ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span> <?php the_sub_field( 'phone' ); ?></span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>  <?php the_sub_field( 'city' ); ?></span></li>
                  <?php endwhile; ?>
              <?php endif; ?>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <?php if ( have_rows( 'about_info_right', 'option' ) ) : ?>
                <?php while ( have_rows( 'about_info_right', 'option' ) ) : the_row(); ?>
                <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span><?php the_sub_field( 'age' ); ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>    <?php the_sub_field( 'degree' ); ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>   <?php the_sub_field( 'email' ); ?></span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>   <?php the_sub_field( 'freelance' ); ?></span></li>
                <?php endwhile; ?>
              <?php endif; ?>
              </ul>
            </div>
          </div>
          <p>
           <?php the_field( 'about_details', 'option' ); ?>
          </p>
        </div>
      </div>

    </div><!-- End About Me -->

    <!-- ======= Counts ======= -->
    <div class="counts container">

      <div class="row">
        <?php if ( have_rows( 'counter_items', 'option' ) ) : ?>
        <?php while ( have_rows( 'counter_items', 'option' ) ) : the_row(); ?>

        <div class="col-lg-3 col-md-6">
          <div class="count-box">
              <?php the_sub_field( 'counter_icon' ); ?>
            <span data-purecounter-start="0" data-purecounter-end="   <?php the_sub_field( 'counter_number' ); ?>" data-purecounter-duration="1" class="purecounter"></span>
            <p> <?php the_sub_field( 'counter_text' ); ?></p>
          </div>
        </div>

      <?php endwhile; ?>
        <?php else : ?>
          <?php // no rows found ?>
            <?php endif; ?>
      </div>

    </div><!-- End Counts -->

    <!-- ======= Skills  ======= -->
    <div class="skills container">

      <div class="section-title">
        <h2>Skills</h2>
      </div>

      <div class="row skills-content">

        <div class="col-lg-6">
          <?php if ( have_rows( 'skill_items_left', 'option' ) ) : ?>
            <?php while ( have_rows( 'skill_items_left', 'option' ) ) : the_row(); ?>
      
          <div class="progress">
            <span class="skill"> <?php the_sub_field( 'skill_title' ); ?> <i class="val">    <?php the_sub_field( 'skill_percentage' ); ?>%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="<?php the_sub_field( 'skill_percentage' ); ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

             <?php endwhile; ?>
              <?php else : ?>
                <?php // no rows found ?>
              <?php endif; ?>
        </div>

        <div class="col-lg-6">
          <?php if ( have_rows( 'skill_items_right', 'option' ) ) : ?>
            <?php while ( have_rows( 'skill_items_right', 'option' ) ) : the_row(); ?>
          <div class="progress">
            <span class="skill"><?php the_sub_field( 'skill_title' ); ?> <i class="val">   <?php the_sub_field( 'skill_percentage' ); ?>%</i></span>
            <div class="progress-bar-wrap">
              <div class="progress-bar" role="progressbar" aria-valuenow="<?php the_sub_field( 'skill_percentage' ); ?>" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
            <?php endwhile; ?>
          <?php else : ?>
            <?php // no rows found ?>
          <?php endif; ?>
        </div>

      </div>

    </div><!-- End Skills -->

    <!-- ======= Interests ======= -->
     <?php if ( have_rows( 'about_interests_items', 'option' ) ) : ?>
    <div class="interests container">
      <div class="section-title">
        <h2>Interests</h2>
      </div>
      <div class="row">
          <?php while ( have_rows( 'about_interests_items', 'option' ) ) : the_row(); ?>
        <div class="col-lg-3 col-md-4 mt-4 mt-md-4">
          <div class="icon-box">
            <i class="fa <?php the_sub_field( 'interests_item_icon' ); ?>" style="color:  <?php the_sub_field( 'interests_icon_color' ); ?>"></i>
            <h3><?php the_sub_field( 'interests_item_name' ); ?></h3>
          </div>
        </div>
       <?php endwhile; ?>
        <?php else : ?>
          <?php // no rows found ?>
      </div>
    </div><!-- End Interests -->
  <?php endif; ?>

    <!-- ======= Testimonials ======= -->
    <?php if ( have_rows( 'about_testimonial', 'option' ) ) : ?>
    <div class="testimonials container">
      <div class="section-title">
        <h2>Testimonials</h2>
      </div>

      <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">
          <?php while ( have_rows( 'about_testimonial', 'option' ) ) : the_row(); ?>
          <div class="swiper-slide">
            <div class="testimonial-item">
              <p>
                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                <?php the_sub_field( 'slide_description' ); ?>
                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
              </p>
              <?php $slide_image = get_sub_field( 'slide_image' ); ?>
              <?php if ( $slide_image ) : ?>
              <img class="testimonial-img" src="<?php echo esc_url( $slide_image['url'] ); ?>" alt="<?php echo esc_attr( $slide_image['alt'] ); ?>" />
              <?php endif; ?>
              <h3><?php the_sub_field( 'slide_name' ); ?></h3>
              <h4><?php the_sub_field( 'slide_designation' ); ?></h4>
            </div>
          </div><!-- End testimonial item -->
         <?php endwhile; ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="owl-carousel testimonials-carousel">
      </div>
    </div><!-- End Testimonials  -->
  <?php else : ?>
    <?php // no rows found ?>
    <?php endif; ?>

  </section><!-- End About Section -->