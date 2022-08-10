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

    <!-- ======= Resume Section ======= -->
  <section id="resume" class="resume">
    <div class="container">

      <div class="section-title">
        <h2>Resume</h2>
        <p><?php the_field( 'resume_section', 'option' ); ?></p>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <h3 class="resume-title"><?php the_field( 'summery_block_name', 'option' ); ?></h3>
          <div class="resume-item pb-0">
            <h4><?php the_field( 'summery_block_title', 'option' ); ?></h4>
           <?php the_field( 'summery_block_description', 'option' ); ?>
          </div>

          <?php if ( have_rows( 'other_blocks', 'option' ) ) : ?>
              <h3 class="resume-title">EDUCATION</h3>
            <?php while ( have_rows( 'other_blocks', 'option' ) ) : the_row(); ?>
              <div class="resume-item">
                <h4><?php the_sub_field( 'block_title' ); ?></h4>
                <h5><?php the_sub_field( 'block_year' ); ?></h5>
                <?php the_sub_field( 'block_description' ); ?>
              </div>
            <?php endwhile; ?>
          <?php else : ?>
            <?php // no rows found ?>
          <?php endif; ?>
        </div>
        <div class="col-lg-6">
          <?php if ( have_rows( 'professional_experience_block', 'option' ) ) : ?>
             <h3 class="resume-title">Professional Experience</h3>
            <?php while ( have_rows( 'professional_experience_block', 'option' ) ) : the_row(); ?>
                <div class="resume-item">
                  <h4><?php the_sub_field( 'pe_title' ); ?></h4>
                  <h5><?php the_sub_field( 'pe__year' ); ?></h5>
                 <?php the_sub_field( 'pe_description' ); ?>
                </div>
        <?php endwhile; ?>
          <?php else : ?>
            <?php // no rows found ?>
              <?php endif; ?>
        </div>
      </div>

    </div>
  </section><!-- End Resume Section -->

    <!-- ======= Services Section ======= -->
  <section id="services" class="services">
    <div class="container">
      <div class="section-title">
        <h2>Services</h2>
        <p><?php the_field( 'service_section_title', 'option' ); ?></p>
      </div>
      <div class="row">
        <?php if ( have_rows( 'service_items', 'option' ) ) : ?>
          <?php while ( have_rows( 'service_items', 'option' ) ) : the_row(); ?>
            <div class="col-lg-4 col-md-6  mb-4 d-flex align-items-stretch">
              <div class="icon-box">
                <div class="icon"><?php the_sub_field( 'service_icon' ); ?></div>
                <h4><a href=""><?php the_sub_field( 'service_item_title' ); ?></a></h4>
               <?php the_sub_field( 'service_item_desc' ); ?>
              </div>
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <?php // no rows found ?>
        <?php endif; ?>
      </div>
    </div>
  </section><!-- End Services Section -->

  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">
      <div class="section-title">
        <h2>Portfolio</h2>
        <p>My Works</p>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
         <!--  <li data-filter="*" class="filter-active">All</li> -->
          <?php
          $terms = get_terms(
            array(
              'taxonomy'  => 'portfolio_category',
              'hide_empty'  =>true,
              'order' => 'DSC',
             
            )
          );
        if (! empty($terms) || is_array($terms)){
        foreach( $terms as $term ) { ?>
           <li data-filter=".<?php echo $term->slug; ?>"><?php echo $term->name; ?></li>
        <?php }} ?>
            </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        <?php 
          $args = array(
            'post_type' => 'portfolio',
            'post_status' => 'publish',
            'posts_per_page' =>-1,
            'paged' => get_query_var('paged', 1),
            'order' => 'ASC',

          );

          $prt_items = new WP_Query($args);
          while ($prt_items->have_posts()) : $prt_items->the_post();
            $filter = "";
            $termSlug = "";
            $categories = get_the_terms($post->ID, 'portfolio_category');
            if (! empty($categories) || is_array($categories)){
            foreach($categories as $category){
              $filter =  $category->name; 
              $termSlug = $category->slug;
            }}
           ?>
        <div class="col-lg-4 col-md-6 portfolio-item <?php echo $termSlug; ?>">
          <div class="portfolio-wrap">
            <?php
             $img_url = get_the_post_thumbnail_url($post->ID, 'post-thumbnails'); 
             ?>
            <img src="<?php echo $img_url;  ?>" class="img-fluid" alt="">

            <div class="portfolio-info">
              <h4><?php the_title(); ?></h4>
              <p>
              <?php 
                $categories = get_the_terms($post->ID, 'portfolio_category');
                foreach($categories as $category){
                  echo sanitize_title($category->name). "<br>"; 
                }
               ?></p>
              <div class="portfolio-links">
                <a href="<?php echo $img_url; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php the_title(); ?>"><i class="bx bx-plus"></i></a>
                <a href="<?php the_permalink(); ?>" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Portfolio Details"><i class="bx bx-link"></i></a>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; 
       wp_reset_postdata();
      ?>
      </div>
    
    </div>
  </section><!-- End Portfolio Section -->


  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Me</p>
      </div>

      <div class="row mt-2">
        <?php if ( have_rows( 'contact_', 'option' ) ) : ?>
          <?php while ( have_rows( 'contact_', 'option' ) ) : the_row(); ?>

              <div class="col-md-6 mb-4 d-flex align-items-stretch">
                <div class="info-box">
                 <?php the_sub_field( 'icon' ); ?>
                  <h3> <?php the_sub_field( 'c_title' ); ?></h3>
                  <p> <?php the_sub_field( 'c_details' ); ?></p>
                </div>
              </div>

              <?php endwhile; ?>
            <?php else : ?>
              <?php // no rows found ?>
            <?php endif; ?>

          <div class="col-md-6 mt-4 mt-md-0 align-items-stretch">
            <div class="info-box">
           <?php the_field( 'contact_social_icon', 'option' ); ?>
               <h3><?php the_field( 'contact_soical_title', 'option' ); ?></h3>
              <div class="social-links">
                <?php if ( have_rows( 'contact_social', 'option' ) ) : ?>
                  <?php while ( have_rows( 'contact_social', 'option' ) ) : the_row(); ?>
                     <a href="<?php the_sub_field( 's_icon_url' ); ?>" class="twitter"> <?php the_sub_field( 's_icon' ); ?></a>
                  <?php endwhile; ?>
                <?php else : ?>
                  <?php // no rows found ?>
                <?php endif; ?>
              </div>
          </div>
        </div>

      </div>

      <form action="<?php the_permalink(); ?>" method="post" role="form" class="php-email-form mt-4">
          <?php echo do_shortcode('[contact-form-7 id="190" title="Personal Contact fro"]'); ?>
      </form>
  </section><!-- End Contact Section -->


